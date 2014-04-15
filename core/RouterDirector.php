<?php


interface RouterBase
{
	public function explodeLink();
	public function compositeArguements();
	public function setExplodeFactory($webSite);
	public function getLink();
}


class RouterBuilder implements RouterBase
{
	private $_link;
	private $_parameter;
	private $_explode;
	private $_originAlLink;

	public function __construct()
	{
		$this->_link = array();
		$this->_parameter = array();
	}

	public function setExplodeFactory($webSite)
	{

		$this->_explode = (preg_match('/.*(\?)+.*/', $webSite))? new QueryExplode : new SegmentExplode;

		$this->_originAlLink = $webSite;

		return $this;
	}

	public function explodeLink()
	{

		$this->_link = $this->_explode->analyze($this->_originAlLink);

		//If controller or method has one of empty then mean the link is fail. 
		if (empty($this->_link[0]) OR empty($this->_link[1])):
			Error::showError(__class__, __function__, 'This web link no call controller or method.');
		endif;

		return $this;
	} 

	public function compositeArguements()
	{
		$this->_parameter = $this->_explode->compositeArguements();

		//Let parameter array push in the end of link array.
		//If all parameter does not set any value then default set null value.
		$this->_link[2] = ( ! empty($this->_parameter))? $this->_parameter : Null;

		return $this;
	}

	public function getLink()
	{
		return $this->_link;
	}

}


class RouterDirector
{
	private $_router;

	public function __construct()
	{
		$this->_router = new RouterBuilder;
	}

	public function explode($link)
	{
		if (empty($link)):
			Error::showError(__class__, __function__, 'No web link can be analyze.');
		else:
			return $this->_router->setExplodeFactory($link)->explodeLink()->compositeArguements()->getLink();
		endif;
	}
}
