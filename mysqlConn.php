<?php

/* The purpose of this class is to establish a connection with MySQL and provide basic
 * information extraction
 *
 * Author: Yordan Yordanov
 *
 */


include "elements/leftMenu.php"; // leftMenu structure

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
   * This function retrieves which submenus has a given page (as argument)
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
  	
  	// Array for the left side menus found
  	$menusFound = array(); 
  	
  	// Set starting position on first row found
  	$rs->data_seek(0);
  	// counts the rows ---- for the array
  	$counter = 0;
  	
  	// fetch every row, one by one, using column name as reference 
  	while($row = $rs->fetch_assoc())
  	{   
  		// new subMenu object for each row
  		$menusFound[$counter] = new leftMenu($row['id'], $row['subMenu'], $row['link']);
  		$counter++;
  	}
  	
  	return $menusFound;	
  } 
  
  public function selectSubMenus($pageRefId)
  {
  	// Set locale to UTF-8 .... magic!
  	$this->conn->query("SET NAMES UTF8");
  	 
  	// Query to select the submenus of given page and their links
  	$query = ("SELECT id, label, parent, link
  			   FROM subMenus WHERE pageRef='" .$pageRefId . "'");
  	
  	
  	
  }

  // Constructor only establishes the connection by invoking connectToDataBase()
  public function __construct() 
  {
   	$this->connectToDatabase();
  }

}

?>