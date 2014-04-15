<?php

/*
|----------------------------------------------------------------------
| MODEL FILE
|----------------------------------------------------------------------
|1.	If you have send some parameters so you should input parameter variable 
|	in brackets of function. 
|2.	The file name must same the class name and first char with a capital letter.
|3.	This model must need extend class from "ModelBase". 
|4.	Php pdo concept link: http://www.php.net/manual/en/book.pdo.php
|
|	Database opeartor example :
|	
|		Note: $this->db => The member object of connection to database.    
|
|	  I. Have prepare opeartor
|		
|		1.select query:
|			$sqlCommand = 'select * from table where field=:field';
|			$this->db->prepare($sqlCommand);
|			$data = $this->db->query(array('field'=> your value));
|		
|			foreach($data as $value):
|				print $value->fieldName;
|			endforeach;
|
|		2.delete or update:
|			$sqlCommand = 'update table set field=:new where field=:field';
|			$this->db->prepare($sqlCommand);
|			$this->db->execute(array("new"=> your value, "field"=> your value));
|
|	II. No prepare opeartor
|	
|		1.select data:
|			$sqlCommand = 'select * from table where field=your field variable';
|			$data = $this->db->query($sqlCommand);
|
|			foreach($data as $value):
|				print $value->fieldName;
|			endforeach;
|
|		2.delete or update:
|			$sqlCommand = 'select * from table where field=your field variable';
|			$data = $this->db->execute($sqlCommand);
|
|	III. Introduce method of connection to database
|	
|		1.$this->db->query()		=>	query data and return a object data
|		2.$this->db->execute()		=>	update or delete data and it will not return anything
|		3.$this->db->prepare()		=>	prepare hide field 
|
|	IV. Parameter category of fetch data from database 
|		
|		1. $this->db->query(your sql command/your prepare array, 'OBJ');
|		   Return object type
|
|		2. $this->db->query(your sql command/your prepare array, 'ASSOC');	
|		   Return array type
|
|		3. $this->db->query(your sql command/your prepare array);
|		   Return object type
*/

class Model extends ModelBase
{
	/*
	public function method($arg1 .....)
	{
		$sqlCommand = 'select * from table where account=:field';
		$this->db->prepare($sqlCommand);
		return $this->db->query(array('field'=>$arg));
	}
	*/
}
