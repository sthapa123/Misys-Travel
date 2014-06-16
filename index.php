<?php
  include 'main.php';
  
  class indexPage extends htmlPage
  {
    
  	
  	public function insLeftMenu() {
  		echo "index page";
  	}
  	
  	public function insContent() {
  		echo "index page";
  	}
  	
  }
  
  $index_page = new indexPage("Index page");
?>
