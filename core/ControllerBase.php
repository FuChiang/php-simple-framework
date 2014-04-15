<?php

/*
|----------------------------------------------------------------------
| CONTROLLER BASE LOAD 
|----------------------------------------------------------------------
|This file is set default controller value and method 
|by controller file extend: 
|
*/

class ControllerBase
{

	protected function loadModel($modelPath)
	{
		$modelName = LoadPath::analyze('models', $modelPath);

		return new $modelName;
	}

	protected function loadHelper($helperPath)
	{
		$helperName = LoadPath::analyze('helper', $helperPath);

		return new $helperName;
	}

	protected function deliver($viewPath, $args = Null)
	{

		if ( ! empty($args)):
			extract($args);
		endif;

		//Get view page contents and save in buffer temporarily
		ob_start();

		require_once LoadPath::analyze('views', $viewPath) . '.php';

		//The contents of output of buffer into variable
		$view = ob_get_contents();

		//Clear all contents of buffer
		ob_end_clean();

		//Import template file
		require_once 'Layout.php';
	}
}