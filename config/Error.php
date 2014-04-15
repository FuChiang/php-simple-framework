<?php


//This space is show all error 

class Error 
{
	public static function showError($class, $function, $msg)
	{
		die(print 'Have a error message: ' . $msg . '<br>Occur in : class=>' . $class .'; function=>: '.$function);
	}
}