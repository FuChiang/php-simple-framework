<?php

/*
|----------------------------------------------------------------------
| DATABASE ACCESS OPERATOR
|----------------------------------------------------------------------
|Below is all database operator: 
|
*/

interface DBOperator
{
	public function prepare($sql);
	public function execute($sql);
	public function query($whereSql);
	public function numData();
}

class DBConnection extends PDO implements DBOperator
{
	private static $_instance;
	private $_pdo;
	private $_sql = Null;
	private $fetch = array('obj'=>PDO::FETCH_OBJ, 'assoc'=>PDO::FETCH_ASSOC);

	public function __construct()
	{
		try
		{
			$this->_pdo = parent::__construct(DNS, DB_USER, DB_PWD);
			$this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			//set database default query char
			parent::exec("set names ".DB_CHAR);
		}
		catch(PDOException $e)
		{
			die("Connection Error: " . $e->getMessage());
		}
	}

	public static function getSingleConnectDB()
	{
		if( ! (self::$_instance instanceof DBConnection)):
			self::$_instance = new DBConnection();
		endif;

		return self::$_instance;
	}

	public function prepare($sql)
	{
		$this->_sql = parent::prepare($sql);
	}

	public function execute($sql)
	{
		if (isset($sql)):
			parent::exec($sql);
		elseif ( ! empty($this->_sql)):
			$this->_sql->execute($sql);
			$this->_sql = Null;
		endif;
	}

	public function query($arg, $type = 'OBJ')
	{
		//What data type is you want return? 
		if (strtoupper($type) === 'OBJ'):
			$format = $this->fetch['obj'];
		elseif (strtoupper($type) === 'ASSOC'):
			$format = $this->fetch['assoc'];
		endif;

		if ( ! empty($this->_sql)):
			$this->_sql->execute($arg);
			$result = $this->_sql->fetchAll($format);
			$this->_sql = Null;
		else:
			$result = parent::query($arg, $format);
		endif;

		return $result;
	}

	public function numData()
	{
		return $this->_sql->rowCount();
	}

	private function __destruct()
	{
		unset($this->_pdo);
	}	
}

