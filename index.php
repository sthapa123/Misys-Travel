<?php
  include 'main.php';
  include 'elements/ORHBox.php';
  include 'elements/OfferBox.php';
  
  class indexPage extends htmlPage
  {
    
  	
  	public function insLeftMenu() {
  		$box1 = new ORHBox();
  	}
  	
  	public function insContent() {
  		$offer1 = new OfferBox("Bulgaria", "17-07-14 - 17-08-14", "../img/hotel.jpg",
  				               "100lv", "http://kolygri.eu/offer");
  		$offer2 = new OfferBox("Bulgaria", "17-07-14 - 17-08-14", "../img/hotel.jpg",
  				"100lv", "http://kolygri.eu/offer");
  		$offer3 = new OfferBox("Bulgaria", "17-07-14 - 17-08-14", "../img/hotel.jpg",
  				"100lv", "http://kolygri.eu/offer");
  		$offer4 = new OfferBox("Bulgaria", "17-07-14 - 17-08-14", "../img/hotel.jpg",
  				"100lv", "http://kolygri.eu/offer");
  	}
  	
  }
  
  $index_page = new indexPage("Index page");
?>
