<?php
  include 'main.php';
  include 'mysqlConn.php';
  include 'elements/ORHBox.php';
  include 'elements/OfferBox.php';
  
  class indexPage extends htmlPage
  {
    
  	
  	public function insLeftMenu() {
  		$dbConn = new mysqlConn();
  		$dbConn->closeConnection();
  		 
  		$box1 = new ORHBox();
  	}
  	
  	public function insContent() {
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
