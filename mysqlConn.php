<?php

class mysqlConn
{   
  // Connection parameters
  var $host="localhost";
  var $username="kolygri";    
  var $password="misys1";
  var $database="misysTravel";
  var $myconn;
    
  // This function establishes a connection with the MySQL database
  private function connectToDatabase() 
  {
    $conn= mysql_connect($this->host,$this->username,$this->password);

    if(!$conn)
      die ("Cannot connect to the database");
 
    else
    {
      $this->myconn = $conn;
      echo "Connection established";
    }

    return $this->myconn;

  }

  private function selectDatabase() 
  {
    mysql_select_db($this->database);  

    if(mysql_error()) 
      echo "Cannot find the database " . $this->database;

    echo "Database selected..";       
  }
  
  public function selectSubMenusQuery($pageRef) 
  {
  	mysql_query("SET NAMES UTF8");
  	$query = mysql_query("SELECT subMenu FROM menus WHERE pageRef='" .$pageRef . "'");
    
    if (!$query)
    	die("Invalid query: " . mysql_error());

    $result = mysql_fetch_row($query);
    return $result;
  }
  
  

  public function closeConnection()
  {
    mysql_close($this->myconn);

    echo "Connection closed";
  }
    
  public function __construct() 
  {
   	$this->connectToDatabase();
   	$this->selectDatabase();
   }

}

?>