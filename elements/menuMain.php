<?php 
/* 
 * This class puts the main menu; 
 * Gets array of MainMenuStructs and puts them in unordered list; 
 * Each link leads to pages.php with menuId parameter, from where the next location is 
 * calculated 
 * 
 * Last Modified: 01.07.2014
 * Authors: Konstantin Grigorov, Yordan Yordanov
 *  */

class menuMain 
{
	
  public function __construct($menus)
  {
		echo '<ul id= "menuMain">'."\n";
		
		for ($i = 0; $i < count($menus); $i++)
			echo "<li> " .
			     '<a href="http://kolygri.eu/pages/page.php?menuId=' . 
			     $menus[$i]->getId() . '">' .
			     $menus[$i]->getName() . "</a>" .
			     "</li>\n";
		echo '</ul>'."\n";
  }
}

?>