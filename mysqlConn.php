<?php

/* The purpose of this class is to establish a connection with MySQL and provide basic
 * information extraction
 *
 * Author: Yordan Yordanov
 * Last modified: 19.04.2014
 */


include "elements/leftMenu.php"; // leftMenu structure
include "elements/subMenus.php";
include "elements/ArticleStruct.php";
include "elements/OfferBoxStruct.php";

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
  
  private function selectFromWhereQuery($table, $s_fields, $w_field, $ref)
  {
  	// Set locale to UTF-8 .... magic!
  	$this->conn->query("SET NAMES UTF8");
  	
  	$sel_fields = explode(",", $s_fields);
  	$num_s_fields = count($sel_fields);
  
  	$query_as_string = "SELECT ";
  	
  	// add all select fields - without last one, because of the coma
  	for ($i = 0; $i < ($num_s_fields - 1); $i++)
  		$query_as_string = $query_as_string . $sel_fields[$i] . ", ";
  	//now add last one 
  	$query_as_string = $query_as_string . $sel_fields[$num_s_fields - 1];
  	 
  	// Query to select the submenus of given page and their links
  	$query = ($query_as_string . " FROM " . $table . " WHERE ". $w_field . "='" . $ref . "'");
  	
  	$rs = $this->conn->query($query);
  	
  	// Check query and return
  	if ($rs === false) 
  		die('Wrong SQL: ' . $query . ' Error: ' . $this->conn->error);
  	 else 
  		return $rs;
  }
  
  /* 
   * This function retrieves which left side menus of a given page (as argument)
   * 
   * Returns an array of subMenu structures
   **/
  public function selectLeftMenus($pageRef) 
  {
  	$rs = $this->selectFromWhereQuery("menus", "id,subMenu,link", "pageRef", $pageRef);
  	
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
  	$rs = $this->selectFromWhereQuery("subMenus", "id,label,parent,link", "pageRefId", $pageRefId);
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
  /*
   * This function gets all offer boxes' info from database with given submenu id. 
   * 
   * Returns array of OfferBoxStructs
   */
  public function selectOfferBoxes($subM_Id)
  {
  	// query for available boxes for this menu
  	$rs = $this->selectFromWhereQuery("offer_boxes", "id,image_link", "subM_Id", $subM_Id);
  	
  	// sets starting search position for fetched rows
  	$rs->data_seek(0);
  	
  	// will contain result of OfferBox structs
  	$offersFound = array();
  	
  	// counter for array current position in array
  	$counter = 0;
  	
  	// fetch all rows and assign them to the array
  	while ($row = $rs->fetch_assoc())
  	{
  		$offersFound[$counter] = new OfferBoxStruct($row['id'], $row['image_link'], $subM_Id);
  		$counter++;
  	}
  	
  	// once the box are fetched, get offer title and price from ex_article table
  	for ($i = 0; $i < $counter; $i++)
  	{
  		$rs2 = $this->selectFromWhereQuery("ex_articles", "offer_title,price",
  			                               "offerBox_Ref", $offersFound[$i]->getId());
  		$rs2->data_seek(0);

  		$row2 = $rs2->fetch_assoc();
  		
  		$offersFound[$i]->setTitle($row2['offer_title']);
  		$offersFound[$i]->setPrice($row2['price']);
  	}  	
  	
  	return $offersFound;
  }
   
  	
  
  public function selectArticle($offerBox_Ref)
  {
  	$rs = $this->selectFromWhereQuery("ex_articles", 
  			                "id,offer_title,route,gen_description,day_by_day_description",
  			  	            "offerBox_Ref", $offerBox_Ref);
  	
  	$rs->data_seek(0);
  	
  	$row = $rs->fetch_assoc();
  	
    $articleFound = new ArticleStruct($row['id'], $row["offer_title"], $row['route'],
    		                          $row['gen_description'], $row['day_by_day_description'],
    		                          $offerBox_Ref);

    return $articleFound;
  	
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