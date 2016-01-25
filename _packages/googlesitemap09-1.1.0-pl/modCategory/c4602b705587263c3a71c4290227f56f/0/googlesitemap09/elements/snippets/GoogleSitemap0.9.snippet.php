<?php
/**
 * GoogleSitemap0.9
 *
 *
 * GoogleSitemap0.9 is free software; you can redistribute it and/or modify it
 * under the terms of the MIT License
 *
 * Submit it to Google using the Search Console Sitemaps tool
 * https://www.google.com/webmasters/tools/sitemap-list
 *
 * More information on Google Sitemap formats
 * https://support.google.com/webmasters/answer/183668?hl=en&ref_topic=4581190
 *
 * Usage [[!GoogleSitemap0.9? &templates=`1,2,3,4`]]
 *
 */

$input = $modx->getOption('templates', $scriptProperties);
$templates = explode(",", $input);

$c = $modx->newQuery('modResource');
$c->where(array(
    'template:IN' => $templates,
));

// comma separated list including the primary key "id" of properties we need
$includeFields = $modx->getOption('includeFields', $scriptProperties, 'id,pagetitle,longtitle,description,introtext,published,editedon,createdon,hidemenu');
$c->select($includeFields); // only fetch the columns you need

$resources = $modx->getCollection('modResource', $c);

$output = "";
$x = array();

foreach ($resources as $res) {
    $canParse = true;
    $hidden = $res->get('hidemenu');
    $published = $res->get('published');

    if($hidden == 1 || $published == 0){ $canParse = false; }

    //override TV
    $overrideParse = $res->getTVValue('gsm09_include');
    if($overrideParse == "yes"){ $canParse = true; }

    if ($canParse) {
        $id = $res->get('id');
        $x['url'] = $modx->makeUrl($id,'','','full');

        /* Get the date */
        $date = $res->get('editedon') ? $res->get('editedon') : $res->get('createdon');
        $date = date("Y-m-d", strtotime($date));
        $x['date'] = $date;


        /* Get the date difference */
        $datediff = datediff("d", $date, date("Y-m-d"));
        if ($datediff <=1) {
            $x['priority'] = '1.0';
            $x['update'] = 'daily';
        } elseif (($datediff >1) && ($datediff<=7)) {
            $x['priority'] = '0.75';
            $x['update'] = 'weekly';
        } elseif (($datediff >7) && ($datediff<=30)) {
            $x['priority'] = '0.50';
            $x['update'] = 'weekly';
        } else {
            $x['priority'] = '0.25';
            $x['update'] = 'monthly';
        }

        //override changefreq
        $overrideChangefreq = $res->getTVValue('gsm09_changefreq');
        if($overrideChangefreq){ $x['update'] = $overrideChangefreq; }

        //override priority
        $overridePriority = $res->getTVValue('gsm09_priority');
        if($overridePriority){ $x['priority'] = $overridePriority; }

        //check for image
        $x['image'] = "";
        $gsmImg = $res->getTVValue('gsm09_image');
        if($gsmImg){ $x['image'] = "<image:image><image:loc>".$modx->makeUrl(1,'','','full').$gsmImg."</image:loc></image:image>"; }

        /* add item to output */
        $output .= $modx->parseChunk('GoogleSitemap0.9_item', $x);
    }
}

return $output;

    //Date / Priority / Update Equation
    function datediff($interval, $datefrom, $dateto, $using_timestamps = false) {
        if (!$using_timestamps) {
            $datefrom = strtotime($datefrom, 0);
            $dateto = strtotime($dateto, 0);
        }
        $difference = $dateto - $datefrom; /* Difference in seconds */
        switch($interval) {
            case 'yyyy': /* Number of full years */
                $years_difference = floor($difference / 31536000);
                if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
                    $years_difference--;
                }
                if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
                    $years_difference++;
                }
                $datediff = $years_difference;
                break;

            case 'q': /* Number of full quarters */
                $quarters_difference = floor($difference / 8035200);
                while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
                    $quarters_difference++;
                }
                $quarters_difference--;
                $datediff = $quarters_difference;
                break;

            case 'm': /* Number of full months */
                $months_difference = floor($difference / 2678400);
                while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
                    $months_difference++;
                }
                $months_difference--;
                $datediff = $months_difference;
                break;

            case 'y': /* Difference between day numbers */
                $datediff = date('z',$dateto) - date('z',$datefrom);
                break;

            case 'd': /* Number of full days */
                $datediff = floor($difference / 86400);
                break;

            case 'w': /* Number of full weekdays */
                $days_difference = floor($difference / 86400);
                $weeks_difference = floor($days_difference / 7); /* Complete weeks */
                $first_day = date('w', $datefrom);
                $days_remainder = floor($days_difference % 7);
                /* Do we have a Saturday or Sunday in the remainder? */
                $odd_days = $first_day + $days_remainder;
                if ($odd_days > 7) { /* Sunday */
                    $days_remainder--;
                }
                if ($odd_days > 6) { /* Saturday */
                    $days_remainder--;
                }
                $datediff = ($weeks_difference * 5) + $days_remainder;
                break;

            case 'ww': /* Number of full weeks */
                $datediff = floor($difference / 604800);
                break;

            case 'h': /* Number of full hours */
                $datediff = floor($difference / 3600);
                break;

            case 'n': /* Number of full minutes */
                $datediff = floor($difference / 60);
                break;

            default: /* Number of full seconds (default) */
                $datediff = $difference;
                break;
        }
        return $datediff;
    }
