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
		echo "offers go here";
	}
}

$offersPage = new Offers("Оферти");

?>