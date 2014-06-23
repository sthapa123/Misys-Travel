<?php

/* The purpose of this class is to establish a connection with MySQL and 
 * provide basic information extraction
 *
 * Author: Yordan Yordanov
 * Last modified: 23.04.2014
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
    $this->conn = new mysqli($this->host,
    		                 $this->username,
    		                 $this->password,
    		                 $this->database);
    
    if ($this->conn->connect_error)
    	die('Database connection failed: '  . $this->conn->connect_error);
    
  }
  
  /*
   * With the following given parameters, this function makes a query
   * to database 
   * 
   * $table - table to select from
   * $s_fields - fields to select from the table, given as string, separated
   *             by comas with no whitespaces. Example
   *             "id,title,description" - selects three fields id, title
   *             and description
   * $w_field - field refering to. what should equal $ref
   * $ref - search value
   * 
   * In short, looks like this
   * 
   * SELECT $s_fields FROM $table WHERE $w_field=$ref
   * 
   * returns the query.
   */
  private function selectFromWhereQuery($table, $s_fields, $w_field, $ref)
  {
  	// Set locale to UTF-8 .... magic!
  	$this->conn->query("SET NAMES UTF8");
  	
  	// The following decodes the $s_fields and puts them in array
  	$sel_fields = explode(",", $s_fields);
  	$num_s_fields = count($sel_fields);
    
  	// start query
  	$query_as_string = "SELECT ";
  	
  	// add all select fields - without last one, because of the coma
  	for ($i = 0; $i < ($num_s_fields - 1); $i++)
  		$query_as_string = $query_as_string . $sel_fields[$i] . ", ";
  	//now add last one 
  	$query_as_string = $query_as_string . $sel_fields[$num_s_fields - 1];
  	 
  	// Query to select the submenus of given page and their links
  	$query = ($query_as_string . " FROM " . $table . " WHERE "
  			  . $w_field . "='" . $ref . "'");
  	
  	// Send query
  	$rs = $this->conn->query($query);
  	
  	// Check query and if its all good - return it
  	if ($rs === false) 
  		die('Wrong SQL: ' . $query . ' Error: ' . $this->conn->error);
  	 else 
  		return $rs;
  }
  
  /* 
   * This function retrieves which left side menus has a given page 
   * (as argument)
   * 
   * Returns an array of subMenu structures
   **/
  public function selectLeftMenus($pageRef) 
  {
  	/*
  	 * Query 
  	 * SELECT id, subMenu FROM menus WHERE pageRef=$pageRef
  	 */
  	$rs = $this->selectFromWhereQuery("menus", "id,subMenu,link", 
  			                          "pageRef", $pageRef);
  	
  	// array for the left side menus found
  	$menusFound = array(); 
  	
  	// Set starting position on first row found
  	$rs->data_seek(0);
  	// counts the rows ---- for the array
  	$counter = 0;
  	
  	// fetch every row, one by one, using column names as
  	// reference and put it in the array
  	while($row = $rs->fetch_assoc())
  	{   
  		$menusFound[$counter] = new leftMenu($row['id'],
  				                             $row['subMenu'],
  				                             $row['link']); 
  		$counter++;
  	}
  	
  	// return result as an array of leftMenu structures
  	return $menusFound;	
  } 
  
  /* This function retrieves all submenus of given left side menu of given page
   * It requires the record id of that left side menu as an argument
   * 
   * Returns all submenus found for that menu as an array of subMenus 
   * structures 
   */
  public function selectSubMenus($pageRefId)
  {
  	/*
  	 * Query 
  	 * SELECT id, label, parent, link FROM subMenus 
  	 * WHERE pageRefId=$pageRefId 
  	 */
  	$rs = $this->selectFromWhereQuery("subMenus", "id,label,parent,link",
  			                          "pageRefId", $pageRefId);
  	// Array for the submenus found
  	$menusFound = array();
  	 
  	// Set starting position on first row found
  	$rs->data_seek(0);
  	// counts the rows ---- for the array
  	$counter = 0;
  	 
  	// fetch every row, one by one, using column names as reference
  	while($row = $rs->fetch_assoc())
  	{
  		$menusFound[$counter] = new subMenus($row['id'], 
  				                             $row['label'],
  				                             $row['parent'],
  				                             $row['link']);
  		$counter++;
  	}
  	
  	// return an array of subMenus (type!!!!)
  	return $menusFound;
  	
  }
  
  /*
   * This function gets all offer boxes' info from database with given
   * submenu id. 
   * 
   * Returns array of OfferBoxStructs
   */
  public function selectOfferBoxes($subM_Id)
  {
  	/*
  	 * Query
  	 * SELECT id, image_link FROM offer_boxes 
  	 * WHERE subM_id=$subM_Id 
  	 */
  	$rs = $this->selectFromWhereQuery("offer_boxes", "id,image_link",
  			                          "subM_Id", $subM_Id);
  	
  	// sets starting search position for fetched rows
  	$rs->data_seek(0);
  	
  	// will contain result of OfferBox structs
  	$offersFound = array();
  	
  	// counter for array current position in array
  	$counter = 0;
  	
  	// fetch all rows and assign them to the array
  	while ($row = $rs->fetch_assoc())
  	{
  		$offersFound[$counter] = new OfferBoxStruct($row['id'],
  				                                    $row['image_link'],
  				                                    $subM_Id);
  		
  		$counter++;
  	}
  	
  	// once the box are fetched, get offer title and price from ex_article 
  	// table
  	for ($i = 0; $i < $counter; $i++)
  	{
  		/*
  		 * Query
  		 * SELECT offer_title, price FROM ex_articles
  		 * WHERE id = $offersFound[$i]->getId()  // i.e.the curren offer's id
  		 */
  		$rs2 = $this->selectFromWhereQuery("ex_articles", 
  				                           "offer_title,price",
  			                               "id", 
  				                           $offersFound[$i]->getId());
        // search at first position
  		$rs2->data_seek(0);

  		$row2 = $rs2->fetch_assoc();
  		$offersFound[$i]->setTitle($row2['offer_title']);
  		$offersFound[$i]->setPrice($row2['price']);
  	}  	
  	
  	return $offersFound;
  }
  
  /* 
   * This function searches for all available starting dates of a offer 
   * (id given as an arg)
   * Returns array of DateTime
   */
  public function selectStartingDates($offer_Id)
  {
  	/*
  	 * Query
  	 * SELECT startingDate FROM ex_starting_dates
  	 * WHERE ex_articleId=$offer_id
  	 */
  	$rs = $this->selectFromWhereQuery("ex_starting_dates", "startingDate",
  			                          "ex_articleId", $offer_Id);
  	
  	// search position at 0
  	$rs->data_seek(0);
  	
  	// counter for the return array
  	$counter = 0;
    
  	//the array for results
  	$datesFound = array();
  	
  	// fetch results and assign them in the array
  	while ($row = $rs->fetch_assoc())
  	{
  		$datesFound[$counter] = $row['startingDate'];
  		$counter++;
  	}

  	return $datesFound;
  }
   
  /*
   * This function selects an article from ex_articles by its id
   * 
   * Returns it as AricleStruct
   */	
  
  public function selectArticle($id)
  {
  	/* 
  	 * Query 
  	 * SELECT offer_title, image, route, duration, day_by_day-desciption,
  	 * price_Info FROM ex_articles WHERE id = $id
  	 */
  	$rs = $this->selectFromWhereQuery("ex_articles", 
  	                                  "offer_title,image,route,duration," . //|
  			                          "price,gen_description," .            //|
  			                          "day_by_day_description,price_Info",  //|
  		                              "id", $id);
  	
  	// search position zero
  	$rs->data_seek(0);
  	
  	// fetch article
  	$row = $rs->fetch_assoc();
  	
  	// put it in ArticleStruct
    $articleFound = new ArticleStruct($id,
    		                          $row["offer_title"],
    		                          $row['route'], 
    		                          $row['duration'], 
    		                          $row['price'], 
    		                          $row['image'],
    		                          $row['gen_description'],
    		                          $row['day_by_day_description'],
    		                          $row['price_Info']);
    
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