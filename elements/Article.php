<?php
  /* A template for different articles
   * Author: Konstantin Grigorov
   * Last Modified: 19.06.2014 
   */

	class Article
	{
		public function __construct($offer_title, $route, $price, $image, $req_gen, $req_day)
		{
			/*total size of the article*/
			echo '<div id="fullOffer">'."\n";				
				echo '<div id="offer_title">'."\n";
				echo $offer_title ."\n";
				echo '</div>'."\n";
			  
				echo '<div id="route">'."\n";
				echo $route . "\n";
			  echo '</div>'."\n";
			  
			  /*items next to image*/
			  echo '<div id="shortOffer">'."\n";			 
				  echo '<div id="duration">'."\n";
				  echo '<b>10 Дни/7 Нощувки</b>'."\n";
				  echo '</div>'."\n";
				  
				  /*dates when new trips to this destination start*/
				  echo '<div id="startingDates">'."\n";
				  echo '<b>Дати</b><br>'."\n";
				  echo '<tbody><tr>'.
				       '<td>27.06.2014 г.</td>'.
				       '<td>04.07.2014 г.</td>'.
				       '<td>11.07.2014 г.</td>'.
				       '</tr></tbody>'."\n";
				  echo '</div>'."\n";
				  
				  echo '<div id="price">'."\n";
				  echo $price . "\n";
				  echo '</div>'."\n";
				  
				  /*leads to request form about the particular excursion*/
				  echo '<div id="requestButton">'."\n";
				  echo '<button type="button">Резервация/Запитване</button>'."\n";
				  echo '</div>'."\n";	  
				/*closin tag for shortOffer*/  
			  echo '</div>'."\n";
			  
			  echo '<div id="image">'."\n";
			  echo '<img src="'. $image . '" alt="IndiaNewDelhi" height=100% width=100%>'."\n";
			  echo '</div>'."\n";

			  echo '<div id="restOfOffer">'."\n";
			    /*general description*/
				  echo '<div id="gDescription">'."\n";
				  echo $req_gen ."<br>\n";
				  echo '</div>';
				  
				  /*day by day description*/
				  echo '<div id="dDescription">'."\n";
				  echo $req_day . "<br>\n";
				  echo "</div>";
				  
				  /*accomodation hotels*/
				  echo '<div id="hotels">'."\n";
				  echo '<tbody>'.
				  		 '<tr><td>Делхи - Dee Marks</td></tr>'.
				       '<tr><td>Агра - Howard Park Plaza</td></tr>'.
				       '<tr><td>Джайпур - Jaipur Palace</td></tr>'.
				       '</tbody>'."\n";
				  echo '</div>'."\n";
				  
				  echo '<div id="priceInfo">'."\n";
				  echo '<p>Цената включва :<br>'.
							 'Самолетен билет Истанбул-Делхи-Истанбул<br>'.
							 '7 нощувки със закуски и вечери в хотели 4* по програмата<br>'.
							 'Всички трансфери по програмата<br>'.
							 'Всички такси по програмата<br>'.
							 'Медецинска застраховка<br>'.
							 'Екскурзовод на английски или руски език<br>'.
 							 '</p>'."\n";
				  echo '</div>'."\n";
	      /*closing tag restOfOffer*/
				echo '</div>'."\n";		
			/*closing tag for fullOffer*/
		  echo '</div>'."\n";
		}	
	}
?>