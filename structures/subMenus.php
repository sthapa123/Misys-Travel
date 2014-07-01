<?php
/* 
 * This class represents the pain-in-the-ass submenus of given left side menu (as in 
 * 'submenus' table in database). Each submenu has a:
 *    - id - unique; used also in the childern's parent field 
 *    - label - visible name 
 *    - parent - used to determine which is (supposed to be the) the upper level menu
 *    - pageRef - reference to the page where it is (mainMenu id) 
 *    all of these are aquired from the constructor as usual.
 * Levels(parent field) can be zero to determine that they're not a children to anyone and 
 * any other to suggest the relationship (see database). The database also provides a 
 * 'pageRefId' field to determine which is the father left side menu. Or mother, if it 
 * sounds too sexist. However, this field is only used in mysqlConn -> selectSubMenus()
 * and its not needed here (well, for now, at least.....)
 * 
 *  Author: Yordan Yordanov
 *  Last Modified: 1.07.2014
 */
class subMenus
{ 
	private $label;
	private $parent;
	private $pageRef;
	private $id;
	
	public function __construct($req_id, $req_label, $req_parent, $req_ref)
	{
		$this->id = $req_id;
		$this->label = $req_label;
		$this->parent = $req_parent;
		$this->pageRef = $req_ref;
	}
	
	public function getId()
	{
		return $this->id;
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
		return $this->pageRef;
	}
  	
}