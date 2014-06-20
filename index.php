<?php
  include 'main.php';
  
  class indexPage extends htmlPage
  { 

  	public function insLeftMenu() 
  	{
  		$this->utils->putLeftSideMenus("BusExcursions");
  	}
  	
  	public function insContent() 
  	{
  		$this->utils->putOffers(1);
  	}
  	
  }
  
  $index_page = new indexPage("Index page");
?>
