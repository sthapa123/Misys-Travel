<?php

/* The purpose of this class is to establish a connection with MySQL and provide basic
 * information extraction
 *
 * Author: Yordan Yordanov
 * Last modified: 19.04.2014
 */


include "elements/leftMenu.php"; // leftMenu structure
include "elements/subMenus.php";

class mysqlConn
{   
  // Connection parameters
  var $host="localhost";
  var $username="kolygri";    
  var $password="misys1";
  var $database="misysTravel";
  var $conn;
    
  // This function establishes a connection with the MySQL database
  private function connectToDatabase() 
  {
    $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
    
    if ($this->conn->connect_error)
    	die('Database connection failed: '  . $this->conn->connect_error);
    
  }
  
  /* 
   * This function retrieves which left side menus of a given page (as argument)
   * 
   * Returns an array of subMenu structures
   **/
  public function selectLeftMenus($pageRef) 
  {
  	// Set locale to UTF-8 .... magic! 
  	$this->conn->query("SET NAMES UTF8");
  	
  	// Query to select the submenus of given page and their links 
  	$query = ("SELECT id, subMenu, link FROM menus WHERE pageRef='" .$pageRef . "'");
    
  	$rs = $this->conn->query($query);
    
  	// Check query and calculate rows
  	$rows_returned = 0; 
  	if($rs === false) {
  		die('Wrong SQL: ' . $query . ' Error: ' . $this->conn->error);
  	} else {
  		$rows_returned = $rs->num_rows;
  	}
  	
  	// array for the left side menus found
  	$menusFound = array(); 
  	
  	// Set starting position on first row found
  	$rs->data_seek(0);
  	// counts the rows ---- for the array
  	$counter = 0;
  	
  	// fetch every row, one by one, using column names as reference and put it in the 
  	// array
  	while($row = $rs->fetch_assoc())
  	{   
  		$menusFound[$counter] = new leftMenu($row['id'], $row['subMenu'], $row['link']); 
  		$counter++;
  	}
  	
  	// return result as an array of leftMenu structures
  	return $menusFound;	
  } 
  
  /* This function retrieves all submenus of given left side menu of given page
   * It requires the record id of that left side menu as an argument
   * 
   * Returns all submenus found for that menu as an array of subMenus structures 
   */
  public function selectSubMenus($pageRefId)
  {
  	// Set locale to UTF-8 .... magic!
  	$this->conn->query("SET NAMES UTF8");
  	 
  	// Query to select the submenus' id, label, parent and link
  	// of given menu and their links
  	$query = ("SELECT id, label, parent, link
  			   FROM subMenus WHERE pageRefId='" .$pageRefId . "'");
  	
  	$rs = $this->conn->query($query);
  	
  	// Check query and calculate rows
  	$rows_returned = 0;
  	
  	if($rs === false)
  		die('Wrong SQL: ' . $query . ' Error: ' . $this->conn->error);
  	
  	else 
  		$rows_returned = $rs->num_rows;
  	 
  	// Array for the submenus found
  	$menusFound = array();
  	 
  	// Set starting position on first row found
  	$rs->data_seek(0);
  	// counts the rows ---- for the array
  	$counter = 0;
  	 
  	// fetch every row, one by one, using column names as reference
  	while($row = $rs->fetch_assoc())
  	{
  		$menusFound[$counter] = new subMenus($row['id'], $row['label'], $row['parent'],
  				                             $row['link']);
  		$counter++;
  	}
  	
  	// return as an array of subMenus (type!!!!)
  	return $menusFound;
  	
  }
  
  // Closes connection to database
  public function closeConnection()
  {
  	mysqli_close($this->conn);
  }
  
  // Constructor only establishes the connection by invoking connectToDataBase()
  public function __construct() 
  {
   	$this->connectToDatabase();
  }

}

?>