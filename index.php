<?php
  include 'main.php';
  include 'elements/ORHBox.php';
  
  class indexPage extends htmlPage
  {
    
  	
  	public function insLeftMenu() {
  		$box1 = new ORHBox();
  	}
  	
  	public function insContent() {
  		echo "index page";
  	}
  	
  }
  
  $index_page = new indexPage("Index page");
?>
