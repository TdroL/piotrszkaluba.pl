<?php defined('SYSPATH') or die('No direct script access.'); ?>

2010-01-25 01:15:06 --- Exception: exception 'ErrorException' with message 'Argument 1 passed to Kohana_ORM::_load_values() must be an array, boolean given, called in D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php on line 1337 and defined' in D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php:1184
Stack trace:
#0 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1184): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'D:\httpd\WIP\mo...', 1184, Array)
#1 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1337): Kohana_ORM->_load_values(false)
#2 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(762): Kohana_ORM->_load_result(false)
#3 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1008): Kohana_ORM->find(1)
#4 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(248): Kohana_ORM->reload()
#5 [internal function]: Kohana_ORM->__wakeup()
#6 D:\httpd\WIP\morgin\system\classes\kohana\session\native.php(27): session_start()
#7 D:\httpd\WIP\morgin\system\classes\kohana\session.php(177): Kohana_Session_Native->_read(NULL)
#8 D:\httpd\WIP\morgin\system\classes\kohana\session.php(93): Kohana_Session->read(NULL)
#9 D:\httpd\WIP\morgin\system\classes\kohana\session.php(35): Kohana_Session->__construct(NULL, NULL)
#10 D:\httpd\WIP\morgin\application\classes\controller\template.php(36): Kohana_Session::instance()
#11 [internal function]: Controller_Template->before()
#12 D:\httpd\WIP\morgin\system\classes\kohana\request.php(857): ReflectionMethod->invoke(Object(Controller_Public_Images))
#13 D:\httpd\WIP\morgin\application\bootstrap.php(256): Kohana_Request->execute()
#14 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#15 {main}
2010-01-25 01:15:06 --- ERROR: ErrorException [ 4096 ]: Argument 1 passed to Kohana_ORM::_load_values() must be an array, boolean given, called in D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php on line 1337 and defined ~ MODPATH/orm\classes\kohana\orm.php [ 1184 ]
2010-01-25 01:15:06 --- Exception: exception 'ErrorException' with message 'Argument 1 passed to Kohana_ORM::_load_values() must be an array, boolean given, called in D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php on line 1337 and defined' in D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php:1184
Stack trace:
#0 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1184): Kohana_Core::error_handler(4096, 'Argument 1 pass...', 'D:\httpd\WIP\mo...', 1184, Array)
#1 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1337): Kohana_ORM->_load_values(false)
#2 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(762): Kohana_ORM->_load_result(false)
#3 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1008): Kohana_ORM->find(1)
#4 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(248): Kohana_ORM->reload()
#5 [internal function]: Kohana_ORM->__wakeup()
#6 D:\httpd\WIP\morgin\system\classes\kohana\session\native.php(27): session_start()
#7 D:\httpd\WIP\morgin\system\classes\kohana\session.php(177): Kohana_Session_Native->_read(NULL)
#8 D:\httpd\WIP\morgin\system\classes\kohana\session.php(93): Kohana_Session->read(NULL)
#9 D:\httpd\WIP\morgin\system\classes\kohana\session.php(35): Kohana_Session->__construct(NULL, NULL)
#10 D:\httpd\WIP\morgin\application\classes\controller\template.php(36): Kohana_Session::instance()
#11 [internal function]: Controller_Template->before()
#12 D:\httpd\WIP\morgin\system\classes\kohana\request.php(857): ReflectionMethod->invoke(Object(Controller_Public_Images))
#13 D:\httpd\WIP\morgin\application\bootstrap.php(256): Kohana_Request->execute()
#14 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#15 {main}
2010-01-25 01:15:06 --- ERROR: ErrorException [ 4096 ]: Argument 1 passed to Kohana_ORM::_load_values() must be an array, boolean given, called in D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php on line 1337 and defined ~ MODPATH/orm\classes\kohana\orm.php [ 1184 ]
2010-01-25 01:16:35 --- Exception: exception 'ErrorException' with message 'Undefined index: id' in D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php:1356
Stack trace:
#0 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1356): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\httpd\WIP\mo...', 1356, Array)
#1 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1003): Kohana_ORM->pk()
#2 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(248): Kohana_ORM->reload()
#3 [internal function]: Kohana_ORM->__wakeup()
#4 D:\httpd\WIP\morgin\system\classes\kohana\session\native.php(27): session_start()
#5 D:\httpd\WIP\morgin\system\classes\kohana\session.php(177): Kohana_Session_Native->_read(NULL)
#6 D:\httpd\WIP\morgin\system\classes\kohana\session.php(93): Kohana_Session->read(NULL)
#7 D:\httpd\WIP\morgin\system\classes\kohana\session.php(35): Kohana_Session->__construct(NULL, NULL)
#8 D:\httpd\WIP\morgin\application\classes\controller\template.php(36): Kohana_Session::instance()
#9 [internal function]: Controller_Template->before()
#10 D:\httpd\WIP\morgin\system\classes\kohana\request.php(857): ReflectionMethod->invoke(Object(Controller_Public_Images))
#11 D:\httpd\WIP\morgin\application\bootstrap.php(256): Kohana_Request->execute()
#12 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#13 {main}
2010-01-25 01:16:35 --- ERROR: ErrorException [ 8 ]: Undefined index: id ~ MODPATH/orm\classes\kohana\orm.php [ 1356 ]
2010-01-25 01:16:35 --- Exception: exception 'ErrorException' with message 'Undefined index: id' in D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php:1356
Stack trace:
#0 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1356): Kohana_Core::error_handler(8, 'Undefined index...', 'D:\httpd\WIP\mo...', 1356, Array)
#1 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1003): Kohana_ORM->pk()
#2 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(248): Kohana_ORM->reload()
#3 [internal function]: Kohana_ORM->__wakeup()
#4 D:\httpd\WIP\morgin\system\classes\kohana\session\native.php(27): session_start()
#5 D:\httpd\WIP\morgin\system\classes\kohana\session.php(177): Kohana_Session_Native->_read(NULL)
#6 D:\httpd\WIP\morgin\system\classes\kohana\session.php(93): Kohana_Session->read(NULL)
#7 D:\httpd\WIP\morgin\system\classes\kohana\session.php(35): Kohana_Session->__construct(NULL, NULL)
#8 D:\httpd\WIP\morgin\application\classes\controller\template.php(36): Kohana_Session::instance()
#9 [internal function]: Controller_Template->before()
#10 D:\httpd\WIP\morgin\system\classes\kohana\request.php(857): ReflectionMethod->invoke(Object(Controller_Public_Images))
#11 D:\httpd\WIP\morgin\application\bootstrap.php(256): Kohana_Request->execute()
#12 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#13 {main}
2010-01-25 01:16:35 --- ERROR: ErrorException [ 8 ]: Undefined index: id ~ MODPATH/orm\classes\kohana\orm.php [ 1356 ]
2010-01-25 23:51:59 --- Exception: exception 'ErrorException' with message 'Object of class Database_MySQL_Result could not be converted to string' in D:\httpd\WIP\morgin\modules\firephp\classes\database\mysql.php:8
Stack trace:
#0 D:\httpd\WIP\morgin\modules\firephp\classes\database\mysql.php(8): Kohana_Core::error_handler(4096, 'Object of class...', 'D:\httpd\WIP\mo...', 8, Array)
#1 D:\httpd\WIP\morgin\modules\database\classes\kohana\database\mysql.php(251): Database_MySQL->query(1, 'SHOW COLUMNS FR...', false)
#2 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1131): Kohana_Database_MySQL->list_columns('users')
#3 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1030): Kohana_ORM->list_columns(true)
#4 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(512): Kohana_ORM->reload_columns()
#5 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(243): Kohana_ORM->_initialize()
#6 [internal function]: Kohana_ORM->__wakeup()
#7 D:\httpd\WIP\morgin\system\classes\kohana\session\native.php(27): session_start()
#8 D:\httpd\WIP\morgin\system\classes\kohana\session.php(177): Kohana_Session_Native->_read(NULL)
#9 D:\httpd\WIP\morgin\system\classes\kohana\session.php(93): Kohana_Session->read(NULL)
#10 D:\httpd\WIP\morgin\system\classes\kohana\session.php(35): Kohana_Session->__construct(NULL, NULL)
#11 D:\httpd\WIP\morgin\application\classes\controller\template.php(36): Kohana_Session::instance()
#12 [internal function]: Controller_Template->before()
#13 D:\httpd\WIP\morgin\system\classes\kohana\request.php(857): ReflectionMethod->invoke(Object(Controller_Public_Images))
#14 D:\httpd\WIP\morgin\application\bootstrap.php(256): Kohana_Request->execute()
#15 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#16 {main}
2010-01-25 23:51:59 --- ERROR: ErrorException [ 4096 ]: Object of class Database_MySQL_Result could not be converted to string ~ MODPATH/firephp\classes\database\mysql.php [ 8 ]
2010-01-25 23:51:59 --- Exception: exception 'ErrorException' with message 'Object of class Database_MySQL_Result could not be converted to string' in D:\httpd\WIP\morgin\modules\firephp\classes\database\mysql.php:8
Stack trace:
#0 D:\httpd\WIP\morgin\modules\firephp\classes\database\mysql.php(8): Kohana_Core::error_handler(4096, 'Object of class...', 'D:\httpd\WIP\mo...', 8, Array)
#1 D:\httpd\WIP\morgin\modules\database\classes\kohana\database\mysql.php(251): Database_MySQL->query(1, 'SHOW COLUMNS FR...', false)
#2 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1131): Kohana_Database_MySQL->list_columns('users')
#3 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1030): Kohana_ORM->list_columns(true)
#4 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(512): Kohana_ORM->reload_columns()
#5 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(243): Kohana_ORM->_initialize()
#6 [internal function]: Kohana_ORM->__wakeup()
#7 D:\httpd\WIP\morgin\system\classes\kohana\session\native.php(27): session_start()
#8 D:\httpd\WIP\morgin\system\classes\kohana\session.php(177): Kohana_Session_Native->_read(NULL)
#9 D:\httpd\WIP\morgin\system\classes\kohana\session.php(93): Kohana_Session->read(NULL)
#10 D:\httpd\WIP\morgin\system\classes\kohana\session.php(35): Kohana_Session->__construct(NULL, NULL)
#11 D:\httpd\WIP\morgin\application\classes\controller\template.php(36): Kohana_Session::instance()
#12 [internal function]: Controller_Template->before()
#13 D:\httpd\WIP\morgin\system\classes\kohana\request.php(857): ReflectionMethod->invoke(Object(Controller_Public_Images))
#14 D:\httpd\WIP\morgin\application\bootstrap.php(256): Kohana_Request->execute()
#15 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#16 {main}
2010-01-25 23:51:59 --- ERROR: ErrorException [ 4096 ]: Object of class Database_MySQL_Result could not be converted to string ~ MODPATH/firephp\classes\database\mysql.php [ 8 ]
2010-01-25 23:57:02 --- Exception: exception 'ErrorException' with message 'Undefined variable: rows' in D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php:184
Stack trace:
#0 D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php(184): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\httpd\WIP\mo...', 184, Array)
#1 D:\httpd\WIP\morgin\modules\firephp\classes\database\mysql.php(7): Vendor_FirePHP->query(Object(Database_MySQL_Result), 1, 'SELECT `pages`....')
#2 D:\httpd\WIP\morgin\modules\database\classes\kohana\database\query.php(206): Database_MySQL->query(1, 'SELECT `pages`....', false)
#3 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1330): Kohana_Database_Query->execute(Object(Database_MySQL))
#4 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(762): Kohana_ORM->_load_result(false)
#5 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(158): Kohana_ORM->find()
#6 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(115): Kohana_ORM->__construct(Array)
#7 D:\httpd\WIP\morgin\system\base.php(44): Kohana_ORM::factory('page', Array)
#8 D:\httpd\WIP\morgin\application\classes\controller\public\pages.php(7): ORM('page', Array)
#9 [internal function]: Controller_Public_Pages->action_index('WIP/morgin')
#10 D:\httpd\WIP\morgin\system\classes\kohana\request.php(863): ReflectionMethod->invokeArgs(Object(Controller_Public_Pages), Array)
#11 D:\httpd\WIP\morgin\application\bootstrap.php(255): Kohana_Request->execute()
#12 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#13 {main}
2010-01-25 23:57:02 --- ERROR: ErrorException [ 8 ]: Undefined variable: rows ~ MODPATH/firephp\classes\vendor\firephp.php [ 184 ]
2010-01-25 23:57:04 --- Exception: exception 'ErrorException' with message 'Undefined variable: rows' in D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php:184
Stack trace:
#0 D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php(184): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\httpd\WIP\mo...', 184, Array)
#1 D:\httpd\WIP\morgin\modules\firephp\classes\database\mysql.php(7): Vendor_FirePHP->query(Object(Database_MySQL_Result), 1, 'SELECT `pages`....')
#2 D:\httpd\WIP\morgin\modules\database\classes\kohana\database\query.php(206): Database_MySQL->query(1, 'SELECT `pages`....', false)
#3 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1330): Kohana_Database_Query->execute(Object(Database_MySQL))
#4 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(762): Kohana_ORM->_load_result(false)
#5 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(158): Kohana_ORM->find()
#6 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(115): Kohana_ORM->__construct(Array)
#7 D:\httpd\WIP\morgin\system\base.php(44): Kohana_ORM::factory('page', Array)
#8 D:\httpd\WIP\morgin\application\classes\controller\public\pages.php(7): ORM('page', Array)
#9 [internal function]: Controller_Public_Pages->action_index('WIP/morgin')
#10 D:\httpd\WIP\morgin\system\classes\kohana\request.php(863): ReflectionMethod->invokeArgs(Object(Controller_Public_Pages), Array)
#11 D:\httpd\WIP\morgin\application\bootstrap.php(255): Kohana_Request->execute()
#12 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#13 {main}
2010-01-25 23:57:04 --- ERROR: ErrorException [ 8 ]: Undefined variable: rows ~ MODPATH/firephp\classes\vendor\firephp.php [ 184 ]
2010-01-25 23:57:13 --- Exception: exception 'ErrorException' with message 'Undefined variable: rows' in D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php:184
Stack trace:
#0 D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php(184): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\httpd\WIP\mo...', 184, Array)
#1 D:\httpd\WIP\morgin\modules\firephp\classes\database\mysql.php(7): Vendor_FirePHP->query(Object(Database_MySQL_Result), 1, 'SELECT `pages`....')
#2 D:\httpd\WIP\morgin\modules\database\classes\kohana\database\query.php(206): Database_MySQL->query(1, 'SELECT `pages`....', false)
#3 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1330): Kohana_Database_Query->execute(Object(Database_MySQL))
#4 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(762): Kohana_ORM->_load_result(false)
#5 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(158): Kohana_ORM->find()
#6 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(115): Kohana_ORM->__construct(Array)
#7 D:\httpd\WIP\morgin\system\base.php(44): Kohana_ORM::factory('page', Array)
#8 D:\httpd\WIP\morgin\application\classes\controller\public\pages.php(7): ORM('page', Array)
#9 [internal function]: Controller_Public_Pages->action_index('WIP/morgin')
#10 D:\httpd\WIP\morgin\system\classes\kohana\request.php(863): ReflectionMethod->invokeArgs(Object(Controller_Public_Pages), Array)
#11 D:\httpd\WIP\morgin\application\bootstrap.php(255): Kohana_Request->execute()
#12 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#13 {main}
2010-01-25 23:57:13 --- ERROR: ErrorException [ 8 ]: Undefined variable: rows ~ MODPATH/firephp\classes\vendor\firephp.php [ 184 ]
2010-01-25 23:57:14 --- Exception: exception 'ErrorException' with message 'Undefined variable: rows' in D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php:184
Stack trace:
#0 D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php(184): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\httpd\WIP\mo...', 184, Array)
#1 D:\httpd\WIP\morgin\modules\firephp\classes\database\mysql.php(7): Vendor_FirePHP->query(Object(Database_MySQL_Result), 1, 'SELECT `pages`....')
#2 D:\httpd\WIP\morgin\modules\database\classes\kohana\database\query.php(206): Database_MySQL->query(1, 'SELECT `pages`....', false)
#3 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1330): Kohana_Database_Query->execute(Object(Database_MySQL))
#4 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(762): Kohana_ORM->_load_result(false)
#5 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(158): Kohana_ORM->find()
#6 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(115): Kohana_ORM->__construct(Array)
#7 D:\httpd\WIP\morgin\system\base.php(44): Kohana_ORM::factory('page', Array)
#8 D:\httpd\WIP\morgin\application\classes\controller\public\pages.php(7): ORM('page', Array)
#9 [internal function]: Controller_Public_Pages->action_index('WIP/morgin')
#10 D:\httpd\WIP\morgin\system\classes\kohana\request.php(863): ReflectionMethod->invokeArgs(Object(Controller_Public_Pages), Array)
#11 D:\httpd\WIP\morgin\application\bootstrap.php(255): Kohana_Request->execute()
#12 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#13 {main}
2010-01-25 23:57:14 --- ERROR: ErrorException [ 8 ]: Undefined variable: rows ~ MODPATH/firephp\classes\vendor\firephp.php [ 184 ]
2010-01-25 23:57:57 --- Exception: exception 'ErrorException' with message 'Undefined variable: rows' in D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php:184
Stack trace:
#0 D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php(184): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\httpd\WIP\mo...', 184, Array)
#1 D:\httpd\WIP\morgin\modules\firephp\classes\database\mysql.php(7): Vendor_FirePHP->query(Object(Database_MySQL_Result), 1, 'SELECT `pages`....')
#2 D:\httpd\WIP\morgin\modules\database\classes\kohana\database\query.php(206): Database_MySQL->query(1, 'SELECT `pages`....', false)
#3 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1330): Kohana_Database_Query->execute(Object(Database_MySQL))
#4 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(762): Kohana_ORM->_load_result(false)
#5 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(158): Kohana_ORM->find()
#6 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(115): Kohana_ORM->__construct(Array)
#7 D:\httpd\WIP\morgin\system\base.php(44): Kohana_ORM::factory('page', Array)
#8 D:\httpd\WIP\morgin\application\classes\controller\public\pages.php(7): ORM('page', Array)
#9 [internal function]: Controller_Public_Pages->action_index('WIP/morgin')
#10 D:\httpd\WIP\morgin\system\classes\kohana\request.php(863): ReflectionMethod->invokeArgs(Object(Controller_Public_Pages), Array)
#11 D:\httpd\WIP\morgin\application\bootstrap.php(255): Kohana_Request->execute()
#12 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#13 {main}
2010-01-25 23:57:57 --- ERROR: ErrorException [ 8 ]: Undefined variable: rows ~ MODPATH/firephp\classes\vendor\firephp.php [ 184 ]
2010-01-25 23:57:59 --- Exception: exception 'ErrorException' with message 'Undefined variable: rows' in D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php:184
Stack trace:
#0 D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php(184): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\httpd\WIP\mo...', 184, Array)
#1 D:\httpd\WIP\morgin\modules\firephp\classes\database\mysql.php(7): Vendor_FirePHP->query(Object(Database_MySQL_Result), 1, 'SELECT `pages`....')
#2 D:\httpd\WIP\morgin\modules\database\classes\kohana\database\query.php(206): Database_MySQL->query(1, 'SELECT `pages`....', false)
#3 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1330): Kohana_Database_Query->execute(Object(Database_MySQL))
#4 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(762): Kohana_ORM->_load_result(false)
#5 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(158): Kohana_ORM->find()
#6 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(115): Kohana_ORM->__construct(Array)
#7 D:\httpd\WIP\morgin\system\base.php(44): Kohana_ORM::factory('page', Array)
#8 D:\httpd\WIP\morgin\application\classes\controller\public\pages.php(7): ORM('page', Array)
#9 [internal function]: Controller_Public_Pages->action_index('WIP/morgin')
#10 D:\httpd\WIP\morgin\system\classes\kohana\request.php(863): ReflectionMethod->invokeArgs(Object(Controller_Public_Pages), Array)
#11 D:\httpd\WIP\morgin\application\bootstrap.php(255): Kohana_Request->execute()
#12 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#13 {main}
2010-01-25 23:57:59 --- ERROR: ErrorException [ 8 ]: Undefined variable: rows ~ MODPATH/firephp\classes\vendor\firephp.php [ 184 ]
2010-01-25 23:57:59 --- Exception: exception 'ErrorException' with message 'Undefined variable: rows' in D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php:184
Stack trace:
#0 D:\httpd\WIP\morgin\modules\firephp\classes\vendor\firephp.php(184): Kohana_Core::error_handler(8, 'Undefined varia...', 'D:\httpd\WIP\mo...', 184, Array)
#1 D:\httpd\WIP\morgin\modules\firephp\classes\database\mysql.php(7): Vendor_FirePHP->query(Object(Database_MySQL_Result), 1, 'SELECT `pages`....')
#2 D:\httpd\WIP\morgin\modules\database\classes\kohana\database\query.php(206): Database_MySQL->query(1, 'SELECT `pages`....', false)
#3 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(1330): Kohana_Database_Query->execute(Object(Database_MySQL))
#4 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(762): Kohana_ORM->_load_result(false)
#5 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(158): Kohana_ORM->find()
#6 D:\httpd\WIP\morgin\modules\orm\classes\kohana\orm.php(115): Kohana_ORM->__construct(Array)
#7 D:\httpd\WIP\morgin\system\base.php(44): Kohana_ORM::factory('page', Array)
#8 D:\httpd\WIP\morgin\application\classes\controller\public\pages.php(7): ORM('page', Array)
#9 [internal function]: Controller_Public_Pages->action_index('WIP/morgin')
#10 D:\httpd\WIP\morgin\system\classes\kohana\request.php(863): ReflectionMethod->invokeArgs(Object(Controller_Public_Pages), Array)
#11 D:\httpd\WIP\morgin\application\bootstrap.php(255): Kohana_Request->execute()
#12 D:\httpd\WIP\morgin\index.php(106): require('D:\httpd\WIP\mo...')
#13 {main}
2010-01-25 23:57:59 --- ERROR: ErrorException [ 8 ]: Undefined variable: rows ~ MODPATH/firephp\classes\vendor\firephp.php [ 184 ]
2010-01-25 23:58:42 --- Exception: Kohana_View_Exception [ 0 ]: strona "WIP/morgin" nie istnieje ~ APPPATH/classes\controller\public\pages.php [ 10 ]
2010-01-25 23:58:42 --- ERROR: Kohana_View_Exception [ 0 ]: strona "WIP/morgin" nie istnieje ~ APPPATH/classes\controller\public\pages.php [ 10 ]
2010-01-25 23:58:46 --- Exception: Kohana_View_Exception [ 0 ]: strona "WIP/morgin" nie istnieje ~ APPPATH/classes\controller\public\pages.php [ 10 ]
2010-01-25 23:58:46 --- ERROR: Kohana_View_Exception [ 0 ]: strona "WIP/morgin" nie istnieje ~ APPPATH/classes\controller\public\pages.php [ 10 ]
2010-01-25 23:58:53 --- Exception: Kohana_View_Exception [ 0 ]: strona "WIP/morgin" nie istnieje ~ APPPATH/classes\controller\public\pages.php [ 10 ]
2010-01-25 23:58:53 --- ERROR: Kohana_View_Exception [ 0 ]: strona "WIP/morgin" nie istnieje ~ APPPATH/classes\controller\public\pages.php [ 10 ]
2010-01-25 23:58:57 --- Exception: Kohana_View_Exception [ 0 ]: strona "WIP/morgin" nie istnieje ~ APPPATH/classes\controller\public\pages.php [ 10 ]
2010-01-25 23:58:57 --- ERROR: Kohana_View_Exception [ 0 ]: strona "WIP/morgin" nie istnieje ~ APPPATH/classes\controller\public\pages.php [ 10 ]
2010-01-25 23:59:00 --- Exception: Kohana_View_Exception [ 0 ]: strona "WIP/morgin" nie istnieje ~ APPPATH/classes\controller\public\pages.php [ 10 ]
2010-01-25 23:59:00 --- ERROR: Kohana_View_Exception [ 0 ]: strona "WIP/morgin" nie istnieje ~ APPPATH/classes\controller\public\pages.php [ 10 ]