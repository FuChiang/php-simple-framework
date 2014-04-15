<?php

/*
	I.This framework has use mod_rewrite so you should check is open of mod_rewrite in httpd configure file. 

	II.Web link example:

		1.segment link:
			127.0.0.1/your cntroller name/your method name/arguments_1/arguments_2...  

		2.query link:
			127.0.0.1/index.php?c=your controller name&m=your method name&your arguments.....
*/


//set time zone
date_default_timezone_set("Asia/Taipei");

//Check client environment is windows or linux and define slash direction
(substr(PHP_OS, 0, 3) === 'WIN' )?define('PATHSLASH', '\\'):define('PATHSLASH', '/');

//load all initial set file 
require_once '.' . PATHSLASH . 'core' . PATHSLASH . 'Load.php';

//create web app and to execute
$project = new Web;
$project->run();













































