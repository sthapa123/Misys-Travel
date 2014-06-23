<?php

/* The purpose of this class is to establish a connection with MySQL and 
 * provide basic information extraction
 *
 * Author: Yordan Yordanov
 * Last modified: 23.04.2014
 */


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
  
  public function selectFromQuery($table, $s_fields)
  {
  	// Set locale to UTF-8 .... magic!
  	$this->conn->query("SET NAMES UTF8");
  	
  	$query = ("SELECT " . $s_fields . " FROM " . $table);
  	
  	$rs = $this->conn->query($query);
  	 
  	// Check query and if its all good - return it
  	if ($rs === false)
  		die('Wrong SQL: ' . $query . ' Error: ' . $this->conn->error);
  	else
  		return $rs;
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
  public function selectFromWhereQuery($table, $s_fields, $w_field, $ref)
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