<?php
class subMenus
{ 
	private $label;
	private $parent;
	private $ref;
	
	public function __construct($req_label, $req_parent, $req_ref)
	{
		$label = $req_label;
		$parent = $req_parent;
		$ref = $req_ref;
	}
	
	public function getLabel() 
	{
		return $this->label;
	}
	
	public function getParent()
	{
		return $this->parent;
	}
	
	public function getRef()
	{
		return $this->ref;
	}
  	
}