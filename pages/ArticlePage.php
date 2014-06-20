<?php
	include '../main.php';
	
	class ArticlePage extends htmlPage
	{
		
		public function insLeftMenu() {
		  $this->utils->putLeftSideMenus("BusExcursions");
		}
	  
		/*insert new article in the page*/
		public function insContent()
		{
			$this->utils->putPublication(1);
		}
	
	}
	$articlePage = new ArticlePage("Index page");
?>