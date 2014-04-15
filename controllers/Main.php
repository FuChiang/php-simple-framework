<?php

/*
|----------------------------------------------------------------------
| CONTROLLER TEST
|----------------------------------------------------------------------
|1.	If you want send any parameters and you should input receiver parameters   
|	in brackets of function. 
|2.	The file name must same the class name and first char with a capital letter.
|3.	This controller must need extend class from "ControllerBase". 
|
|	I.Load model example:
|		1.Have sub data folder:
|			$model = $this->loadModel('data folder/your model file');
|			$data = $model->method();
|		2.No have data folder:
|			$model = $this->loadModel('your model file');
|			$data = $model->method();
|	
|	II.Display to view example:
|		1..Have parameter:
|			1-1. have sub data folder:
|				$this->deliver('data folder/your view file name', array('variable name'=>variable,....));
|			1-2. no have sub data folder:
|				$this->deliver('your view file name', array('variable name'=>variable,....));
|		2..No have parameter:
|			2-1. have sub data folder:
|				$this->deliver('data folder/your view file name');
|			2-2. no have sub data folder:
|				$this->deliver('your view file name');
*/

class Main extends ControllerBase
{
	public function index()
	{
		/* 
		1.connection to model 
			$model = $this->loadModel('Model');
			$data = $model->getData($name);
		2.send to view 
			$this->deliver('view file name', array('variable name'=>$data));
		*/

		$this->deliver('View');
	}
}



