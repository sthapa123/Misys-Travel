<?php
	include '../main.php';
	include '../elements/Article.php';
	
	class ArticlePage extends htmlPage
	{
		
		public function insLeftMenu() {
		  $this->utils->putLeftSideMenus("BusExcursions");
		}
	  
		/*insert new article in the page*/
		public function insContent()
		{
			$article = new Article();
		}
	
	}
	$articlePage = new ArticlePage("Index page");
?>