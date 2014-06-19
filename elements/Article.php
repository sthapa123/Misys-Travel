<?php
  /* A template for different articles
   * Author: Konstantin Grigorov
   * Last Modified: 19.06.2014 
   */

	class Article
	{
		public function __construct()
		{
			/*total size of the article*/
			echo '<div id="fullOffer">'."\n";
				
				echo '<div id="offer_title">'."\n";
				echo '</div>'."\n";
			  
				echo '<div id="route">'."\n";
			  echo '</div>'."\n";
			  
			  /*items next to image*/
			  echo '<div id="shortOffer">'."\n";
			 
				  echo '<div id="duration">'."\n";
				  echo '</div>'."\n";
				  
				  /*dates when new trips to this destination start*/
				  echo '<div id="startingDates">'."\n";
				  echo '</div>'."\n";
				  
				  echo '<div id="price">'."\n";
				  echo '</div>'."\n";
				  
				  /*leads to request form about the particular excursion*/
				  echo '<div id="requestButton">'."\n";
				  echo '</div>'."\n";
			  
			  echo '</div>'."\n";
			  
			  echo '<div id="image">'."\n";
			  echo '</div>'."\n";
			  		  
			  /*general description*/
			  echo '<div id="gDescription">'."\n";
			  echo '</div>';
			  
			  /*day by day description*/
			  echo '<div id="dDescription">'."\n";
			  echo "</div>";
			  
			  /*accomodation hotels*/
			  echo '<div id="hotels">'."\n";
			  echo '</div>'."\n";
			  
			  echo '<div id="priceInfo">'."\n";
			  echo '</div>'."\n";
			  
		  echo '</div>'."\n";
		}	
	}
?>