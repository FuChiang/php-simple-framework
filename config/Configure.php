<?php

/*
|----------------------------------------------------------------------
| DATABASE ACCESS SET
|----------------------------------------------------------------------
|Please input some information of access your database: 
|
*/

$db = array();

$db['hostname'] = '';
$db['username'] = '';
$db['password'] = '';
$db['database'] = '';
$db['dbdrive'] = 'mysql';
$db['dbchar'] = 'utf8';


//define database 
define('DNS',$db['dbdrive'] . ':host=' . $db['hostname'] . ';dbname=' . $db['database']);
define('DB_USER',$db['username']);
define('DB_PWD', $db['password']);
define('DB_CHAR', $db['dbchar']);


/*
|----------------------------------------------------------------------
| DEFAULT CONTROLLER SET
|----------------------------------------------------------------------
|If you want change the set of default controller or method 
|which can be modified  by set below:
*/

$default = array();

$default['controller'] = 'Main';
$default['method'] = 'index';

//define default controller and mothod
define('DEFAULT_C', $default['controller']);
define('DEFAULT_M', $default['method']);