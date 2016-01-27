<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'license' => 'The MIT License (MIT)

Copyright (c) 2015 MODX Systems, LLC (hello@modx.com) 

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.',
    'readme' => '# GoogleSitemap0.9

XML Sitemap Extra with Template Variables to override dynamic processing

After Install:
1. update the "templates" you want to list in the installed template. The default is "1".
2. update the Template => TV Access for the override options

**Friendly URLs must be turned ON**
',
    'changelog' => '# GoogleSitemap0.9 1.0.0
- Basic Override Options

# GoogleSitemap0.9 1.1.0
- Added Image Node per resource
- friendly urls must be turned ON
- added check for deleted == 1 
',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '1affa47e1bf2813138ea3bb6cd394aff',
      'native_key' => 'googlesitemap09',
      'filename' => 'modNamespace/8a874aa3bfdb8a8831cc1fcaa842c2f2.vehicle',
      'namespace' => 'googlesitemap09',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => '65abc6d82b7d62628f61568958565ca5',
      'native_key' => NULL,
      'filename' => 'modCategory/1aeeb8712da7c3113079b2c70e90b05f.vehicle',
      'namespace' => 'googlesitemap09',
    ),
  ),
);