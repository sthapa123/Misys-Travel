<?php
/* 
 * This class creates and prints out an orange head box purposed as an entity in the left
 * side menu panel. It consist of an orange section for the menu title and list of 
 * multiple level submenus 
 * 
 * CSS frontend classes: 
 * 	- ORHBWrapper - Square shaped div to fit the width of the left side menu panel
 *  - orangeBox - in fact it is the yellowish box with round corners, covering both submenus
 *                and the head part
 *  - orangeHead - the de facto head for the menu title. It is orange :))
 *  - options - this section is for the submenus
 *  (in progress...)
 *  
 *  Both title and submenus are passed through the constructor. The former is just a string
 *  , the latter is an array of subMenu(!!!) structures
 *
 * Authors: Yordan Yordanov, Konstantin Grigorov
 * 
 * This comment is too damn long, finishing it now...
 */

class ORHBox 
{
	// Array for the submenus -- to be of type 'subMenus'
	private $options;
	
	// The constructor outlines and prints out the html structure and invokes printOptions
	// for handling the submenus
	public function __construct($title, $req_options)
	{
		echo "<div class=\"ORHBWrapper\">\n";
		echo "<div class=\"orangeBox\">\n";
		echo "<div class=orangeHead>" .
		     "<div class=\"orh_tit\">" . $title. "</div>" . 
		     "</div>\n"; // orangeHead
		echo "<div class=\"options\">\n";
		$this->options = $req_options;
		$this->printOptions();
		echo "</div>\n"; // options
		
		echo "</div>\n"; //orangeBox
		echo "</div>\n"; // ORHBWrapper
		
	}
	// printing the submenus
	private function printOptions()
	{
		// only do if $options is not null a.k.a there is one or more submenu for this
		// left menu
	    if ($this->options != null)
	    {
	    	// number of items in the array
	   		$num_items = count($this->options);
	   		
	        echo "<ul class=\"submenus\">\n";
	        
	        // print each submenu item as li 
	        // to be implemented: css classes for different levels, 
	        // javascript for hiding/showing, etc
	        // get id and parents menu, so would be able to know which menu to hide
	        /* Yordan: set menuId and subMenu to calculate which article to show */
	        
	        $current_level = 0; 
	        $prev_level = 0;
	        
	        
	        for ($i=0; $i < $num_items; $i++)
	        { 
	           
	           $par = $this->options[$i]->getParent();
	           
	           $next_parent;
	           $k = $i + 1;
	           if ($k < $num_items)
	             $next_parent = $this->options[$k]->getParent();
	           else 
	           	 $next_parent = -1;
	           
               if ($par == 0)
               {
               	 $current_level = 0; 
               	 $prev_parent = 0;
               }
               elseif ($par > $prev_parent)
               {
               	 $current_level++;
               	 $prev_parent = $par;
               	 echo "<div class=\"subdiv\">";
               }
               elseif ($par < $prev_parent) 
               {
               	 $current_level--;
               	 $prev_parent = $par;
               }
               
               
	   	       echo "<li class=\"level" . $current_level .  
	   	            " par-" . $par . "\"" .
	   	            " id=\"mid-" . $this->options[$i]->getId() ."\">"; 

               if ($next_parent > $par)
               	    echo "<span class=\"opener\"> + </span>"; 
	   	            
	   	       echo  '<a class="mlink"' .
	   	       		  ' href=?menuId=' . $this->options[$i]->getRef()  
	   	       		. "&subMenu=" . $this->options[$i]->getId() . ">"
	   	       		 	   	       		
	   	       		.  $this->options[$i]->getLabel() . "</a> "
	                . "</li>\n";
	   	       
	   	       
	   	       
	   	       if (($par > $next_parent) || ($next_parent == -1))
	   	       	 echo "</div>";
	        }
	        echo "</ul>";
	    }
	}
}

?>
