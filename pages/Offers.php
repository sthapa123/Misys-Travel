<?php

include "../main.php";

class Offers extends htmlPage
{
	
	public function insLeftMenu()
	{
		$this->utils->putLeftSideMenus($_GET['menuId']);
	}
	
	public function insContent()
	{
		$this->utils->putOffers($_GET['subMenu']);
	}
}

$offersPage = new Offers("Оферти");

?>