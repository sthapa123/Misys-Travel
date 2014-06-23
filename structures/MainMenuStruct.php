<?php 

class MainMenuStruct 
{
	private $name;
	private $id;
	
	public function __construct($req_id, $req_name)
	{
		$this->id = $req_id;
		$this->name = $req_name;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getName()
	{
		return $this->name;
	}
}
?>