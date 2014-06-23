<?php 

class menuMain
 {
  public function __construct($menus)
  {
		echo '<ul id= "menuMain">'."\n";
		
		echo '<li><a href="http://kolygri.eu">' . 
		     $menus[0]->getName() . 
		     '</a></li>'."\n";
		
		echo '<li><a href="./pages/Offers.php?id=' . 
		     $menus[1]->getId() . '">' . $menus[1]->getName() . 
		     '</a></li>'."\n";
		
		echo '<li><a href="./pages/Offers.php?id=' . 
		     $menus[2]->getId() . '">' .$menus[2]->getName() .
		     '</a></li>'."\n";
		
  		echo '<li><a href="https://www.facebook.com/">Нова Година</a></li>'."\n";
		echo '<li><a href="https://www.facebook.com/">Индивидуални поръчки</a></li>'."\n";
		echo '<li><a href="https://www.facebook.com/">Посетете България</a></li>'."\n";
		echo '<li><a href="https://www.facebook.com/">За нас</a></li>'."\n";
		echo '<li><a href="https://www.facebook.com/">Контакти</a></li>'."\n";
		echo '<li><a href="https://www.facebook.com/">Условия</a></li>'."\n";
		echo '</ul>'."\n";
	}
}
?>
