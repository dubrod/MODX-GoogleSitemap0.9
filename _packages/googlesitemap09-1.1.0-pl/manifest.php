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
',
    'changelog' => '# GoogleSitemap0.9 1.0.0
- Basic Override Options

# GoogleSitemap0.9 1.1.0
- Added Image Node per resource
',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '11661e641f6f6b75e67d2a9f8db6d2d7',
      'native_key' => 'googlesitemap09',
      'filename' => 'modNamespace/0e72c02ec1032602240e2da2c286cc24.vehicle',
      'namespace' => 'googlesitemap09',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => 'd3d191c6938c80793a9b2eb3a8830669',
      'native_key' => NULL,
      'filename' => 'modCategory/c4602b705587263c3a71c4290227f56f.vehicle',
      'namespace' => 'googlesitemap09',
    ),
  ),
);