<?php

//Set root dicrectory and declare it  
define('ROOTPATH', $_SERVER['DOCUMENT_ROOT']);

$include_path = array();

//Get system include path now.
$include_path[] = get_include_path();

//Set all folder in include_path array.
$include_path[] = ROOTPATH . PATHSLASH . 'core';
$include_path[] = ROOTPATH . PATHSLASH . 'controllers';
$include_path[] = ROOTPATH . PATHSLASH . 'models';
$include_path[] = ROOTPATH . PATHSLASH . 'views';
$include_path[] = ROOTPATH . PATHSLASH . 'helper';
$include_path[] = ROOTPATH . PATHSLASH . 'config';
$include_path[] = ROOTPATH . PATHSLASH . 'template';
$include_path[] = ROOTPATH . PATHSLASH . 'database';

//Join all relative folder path in system path.
//PATH_SEPARATOR: get separate sign of system path(Linux => : win => ;)
set_include_path(join($include_path, PATH_SEPARATOR));

























