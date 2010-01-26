<?php defined('SYSPATH') or die('No direct script access.'); ?>

2010-01-26 00:00:11 --- Exception: exception 'ErrorException' with message 'Trying to get property of non-object' in D:\httpd\WIP\morgin\application\classes\controller\public\images.php:50
Stack trace:
#0 D:\httpd\WIP\morgin\application\classes\controller\public\images.php(50): Kohana_Core::error_handler(8, 'Trying to get p...', 'D:\httpd\WIP\mo...', 50, Array)
#1 [internal function]: Controller_Public_Images->action_index(1, NULL)
#2 D:\httpd\WIP\morgin\system\classes\kohana\request.php(863): ReflectionMethod->invokeArgs(Object(Controller_Public_Images), Array)
#3 D:\httpd\WIP\morgin\application\bootstrap.php(255): Kohana_Request->execute()
#4 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#5 {main}
2010-01-26 00:00:11 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes\controller\public\images.php [ 50 ]
2010-01-26 00:00:21 --- Exception: exception 'ErrorException' with message 'Trying to get property of non-object' in D:\httpd\WIP\morgin\application\classes\controller\public\images.php:50
Stack trace:
#0 D:\httpd\WIP\morgin\application\classes\controller\public\images.php(50): Kohana_Core::error_handler(8, 'Trying to get p...', 'D:\httpd\WIP\mo...', 50, Array)
#1 [internal function]: Controller_Public_Images->action_index(1, NULL)
#2 D:\httpd\WIP\morgin\system\classes\kohana\request.php(863): ReflectionMethod->invokeArgs(Object(Controller_Public_Images), Array)
#3 D:\httpd\WIP\morgin\application\bootstrap.php(255): Kohana_Request->execute()
#4 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#5 {main}
2010-01-26 00:00:21 --- ERROR: ErrorException [ 8 ]: Trying to get property of non-object ~ APPPATH/classes\controller\public\images.php [ 50 ]
2010-01-26 00:05:41 --- ERROR: ErrorException [ 8 ]: Undefined variable: user ~ APPPATH/views\protected\template.php [ 23 ]