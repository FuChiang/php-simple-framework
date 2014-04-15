<?php

/*
|----------------------------------------------------------------------
| MODEL LOAD 
|----------------------------------------------------------------------
|Include model file that by user extend: 
*/

class ModelBase
{
	protected $db;
	
	public function __construct()
	{
		$this->db = DBConnection::getSingleConnectDB();
	}
}

