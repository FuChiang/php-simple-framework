<?php


/*web link example: index.php?c=article&m=view&id=5
*controller = article ; method = view ; id = 5 ...
*/


interface AnalyzeBase
{
	public function analyze($webSite);
	public function compositeArguements();
}

class QueryExplode implements AnalyzeBase
{
	private $link = array();

	public function analyze($webSite)
	{
		if (empty($_SERVER['QUERY_STRING']) OR !preg_match('/c=[^\&]*&m=.*/', $webSite)):
			Error::showError(__class__, __function__, 'This web link is invaild. example=> index.php?c=controll&m=method&arguements');
		endif;

		preg_match('/^c=(.*)&m=(.*)$/iU', $_SERVER['QUERY_STRING'], $result);

		//if user have set parameter then repeat analyze
		if(preg_match('/^.*[&|=]+.*/iU', $result[2])):
			preg_match('/^c=(.*)&m=(.*)&(.*)?$/iU', $_SERVER['QUERY_STRING'], $result);
		endif;

		$this->link[] = $result[1];
		$this->link[] = $result[2];
		$this->link[] = $result[3];

		return $this->link;
	}

	public function compositeArguements()
	{
		$parameter = array();

		$tempLink = explode(' ', str_replace(array('&','='), ' ', str_replace('%20', '', $this->link[2])));
		foreach ($tempLink as $key =>$arg):
			if($key%2 == 1 AND !empty($arg)):
				array_push($parameter, $arg);
			endif;
		endforeach;

		return $parameter;
	}
}


class SegmentExplode implements AnalyzeBase
{
	private $link = array();

	public function analyze($webSite)
	{
		$this->link = explode(PATHSLASH, substr($webSite, 1), 3);

		if(empty($this->link[1])):
			Error::showError(__class__, __function__, 'This web link is invaild. example: 127.0.0.1/your cntroller name/your method name/arguments_1/arguments_2.');
		endif;	

		return $this->link;
	}

	public function compositeArguements()
	{
		$parameter = array();

		$tempLink = explode(PATHSLASH, $this->link[2]);
		foreach ($tempLink as $arg):
			array_push($parameter, $arg);
		endforeach;

		return $parameter;
	}
}

