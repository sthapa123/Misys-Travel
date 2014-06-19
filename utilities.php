<?php
/* 
 * This class provides/will provide functionality concerned with extracting and manipulat-
 * ing data, providing page features etc. It creates a connection with the database upon 
 * construction and closes it with the destructor. main.php has an protected instance of it
 * 
 * Author: Yordan Yordanov
 * Last Modified: 19.06.2014
 */

include 'mysqlConn.php';
include 'elements/ORHBox.php';
include 'elements/OfferBox.php';


class Utilities
{
	// database connection
	private $dbConn;
	
	// constructor establishes connection
	public function __construct()
	{
		$this->dbConn = new mysqlConn();
	}
	
	// This function puts the Left side menus with its submenus on a given (as argument
	// page. To be used inside insLeftMenu() function in all pages with submenus
    public function putLeftSideMenus($ref_page)
    {
    	// Get names/titles of all available left side menus of that page
    	$menus = $this->dbConn->selectLeftMenus($ref_page);
    	
    	// count them
    	$num_menus = count($menus);
    	
    	// for each of them, find all their subMenus and put them in orange head box
    	for ($i = 0; $i < $num_menus; $i++)
    	{
       		$sub = $this->dbConn->selectSubMenus($menus[$i]->getId());
    		new ORHBox($menus[$i]->getName(), $sub);
    	}
    	/* Important note: $menus and $sub are and must be of types 
    	 * leftMenu and submenus respectively
    	 */

    }	
}
?>