<?php
	include '../main.php';
	include '../mysqlConn.php';
	include '../elements/ORHBox.php';
	include '../elements/OfferBox.php';
	
	class BusExcursionsPage extends htmlPage
	{
		public function insLeftMenu() {
		  
			$options = array("Europe", "Albania", "Romania", "Greece", "Kavala and Tasos", "Meteora", "Rodos");
				new ORHBox($options[0], $options);
		}
	}
	
	$busExcursionsPage = new BusExcursionsPage("Index page");
?>