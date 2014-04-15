<?php

/*
|----------------------------------------------------------------------
| WEB START 
|----------------------------------------------------------------------
|Start web and include controller. 
|
*/

class Web
{
	private $_routerSet;
	private $_default;
	private $_webSet;
	private $_controller;

	public function __construct()
	{
		$this->_routerSet = new RouterDirector;
		$this->_default = PATHSLASH . DEFAULT_C . PATHSLASH . DEFAULT_M;
	}

	public function run()
	{
		//If no any parameter in the web link
		if ($_SERVER['REQUEST_URI'] != '/'):
			$this->_default = str_replace('/', PATHSLASH, $_SERVER['REQUEST_URI']);
		endif;

		$this->_webSet = $this->_routerSet->explode($this->_default);

		//call controller
		$this->create();
	}

	public function create()
	{
		$className = ucfirst($this->_webSet[0]);
		$methodName = $this->_webSet[1];
		$parameter = $this->_webSet[2];

		//Check the include file has existed. 
		if (file_exists(ROOTPATH . PATHSLASH . 'controllers' . PATHSLASH . $className . '.php')):
			$this->_controller = new $className;
			if(method_exists($this->_controller, $methodName)):
				if(empty($parameter)):
					//If no any argument need to send than use simple call
					$this->_controller->$methodName();
				else:
					//Dynamic call function it can send many parameters by array
					call_user_func_array(array($this->_controller, $methodName), $parameter);
				endif;
			else:
				Error::showError(__class__, __function__, 'Can not find the name of method of '. $methodName);
			endif;
		else:
			Error::showError(__class__, __function__, 'Can not find the name of file of '. $className);
		endif;
	}
}