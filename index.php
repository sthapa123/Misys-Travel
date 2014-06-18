<?php
  include 'main.php';
  include 'mysqlConn.php';
  include 'elements/ORHBox.php';
  include 'elements/OfferBox.php';
  //include 'elements/subMenu.php';
  
  class indexPage extends htmlPage
  {
    
  	public function insLeftMenu() 
  	{
  		$dbConn = new mysqlConn();
  		$rows = $dbConn->selectLeftMenus("BusExcursions");
  		echo $rows[0]->getName();
  		$num_rows = count($rows);
  		echo $num_rows;
  		for ($i = 0; $i < $num_rows; $i++)
  		{ 
  			new ORHBox($rows[$i]->getName(), 'options');
  		}
  	}
  	
  	public function insContent() 
  	{
  		echo "<div id=\"offerBlocks\">\n";
  		$offer1 = new OfferBox("Bulgaria", "17-07-14 - 17-08-14", "../img/hotel.jpg",
  				               "100lv", "http://kolygri.eu/offer");
  		$offer2 = new OfferBox("Bulgaria", "17-07-14 - 17-08-14", "../img/hotel.jpg",
  				"100lv", "http://kolygri.eu/offer");
  		$offer3 = new OfferBox("Bulgaria", "17-07-14 - 17-08-14", "../img/hotel.jpg",
  				"100lv", "http://kolygri.eu/offer");
  		$offer4 = new OfferBox("Bulgaria", "17-07-14 - 17-08-14", "../img/hotel.jpg",
  				"100lv", "http://kolygri.eu/offer");
  		$offer5 = new OfferBox("Bulgaria", "17-07-14 - 17-08-14", "../img/hotel.jpg",
  				"100lv", "http://kolygri.eu/offer");
  		$offer6 = new OfferBox("Bulgaria", "17-07-14 - 17-08-14", "../img/hotel.jpg",
  				"100lv", "http://kolygri.eu/offer");
  	/*	$offer7 = new OfferBox("Bulgaria", "17-07-14 - 17-08-14", "../img/hotel.jpg",
  				"100lv", "http://kolygri.eu/offer");
  		$offer8 = new OfferBox("Bulgaria", "17-07-14 - 17-08-14", "../img/hotel.jpg",
  				"100lv", "http://kolygri.eu/offer");*/
  		echo "</div>";
  	}
  	
  }
  
  $index_page = new indexPage("Index page");
?>
