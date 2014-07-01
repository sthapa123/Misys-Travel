<?php
include "../main.php";

class ArticlePage extends htmlPage
{
		
  public function insLeftMenu() 
  {
    $this->utils->putLeftSideMenus($_GET['menuId']);
  }
	  
  /*insert new article in the page*/
  public function insContent()
  {
	$this->utils->putPublication($_GET['articleId']);
  }
	
}

  $articlePage = new ArticlePage("Article Page");
?>
