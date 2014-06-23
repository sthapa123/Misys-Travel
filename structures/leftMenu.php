<?php
/* This class represents a left-side menu (as in 'menus' table in database). 
 * Has a name (menu title in orange head section), link and id (aquired with the 
 * constructor and returned with the according functions.  It is used to retrive the
 * main categories of menus in a given page (see utilities -> putLeftSideMenus() and 
 * mysqlConn -> selectLeftMenus() )
 *    
 *  Author Yordan Yordanov
 *  Last modified: 19.06.2014
 */
class leftMenu
{
	private $name; 
	private $link;
	private $id;
	
	public function __construct($req_id, $req_name, $req_link)
	{
		$this->id = $req_id;
		$this->name = $req_name;
		$this->link = $req_link;
	}
	
	// Get functions 
	
	public function getName() 
	{
		return $this->name;
	}
	
	public function getLink()
	{
		return $this->link;
	}
	
	public function getId()
	{
		return $this->id;
	}
}

?>