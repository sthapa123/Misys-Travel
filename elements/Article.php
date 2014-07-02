<?php
  /* A template for different articles
   * Author: Konstantin Grigorov
   * 
   * List of constructor arguments:
   *   $offer_title, $route, $duration - as clear as they sound
   *   $dates - DateTime array with the starting dates
   *   $price - .... 
   *   $image - (relative) path to image
   *   $req_gen - (relative) path to general description file
   *   $req_day - (relative) path to day by day description file
   *   $price_info - (relative) path to price info
   *   
   * Last Modified: 23.06.2014 
   */

	class Article
	{
		public function __construct($offer_title,
				                    $route,
				                    $duration,
				                    $dates, 
				                    $price,
				                    $image,
				                    $req_gen,
				                    $req_day,
				                    $price_Info)
				                   
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
				  echo 'Продължителност: '.$duration."\n";
				  echo '</div>'."\n";
				  
				  /*dates when new trips to this destination start*/
				  echo '<div id="startingDates">'."\n";
				  echo 'Дати:<br>'."\n";
				  echo count($dates);
				  for ($i = 0; $i < count($dates); $i++)
				  	echo $dates[$i] . "<br>";
				 
				  echo '</div>'."\n";
				  
				  echo '<div id="price">'."\n";
				  echo 'Цена: '.$price . "\n";
				  echo '</div>'."\n";
				  
				  /*leads to request form about the particular excursion*/
				  echo '<div id="requestButton">'."\n";
				  echo '<a href="../pages/ReservationRequestForm.php">Резервация/Запитване</a>'."\n";
				  echo '</div>'."\n";	  
				/*closin tag for shortOffer*/  
			  echo '</div>'."\n";
			  
			  echo '<div id="image">'."\n";
			  echo '<img src="'. $image . '" alt="IndiaNewDelhi" height=100% width=100%>'."\n";
			  echo '</div>'."\n";

			  echo '<div id="restOfOffer">'."\n";
			    /*general description*/
				  echo '<div id="gDescription">'."\n";
				  $this->readFile($req_gen);
				  echo "<br>\n";
				  echo '</div>';
				  
				  /*day by day description*/
				  echo '<div id="dDescription">'."\n";
				  $this->readFile($req_day);
				  echo "<br>\n";
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
				  $this->readFile($price_Info);
				  echo '</div>'."\n";
	      /*closing tag restOfOffer*/
				echo '</div>'."\n";		
			/*closing tag for fullOffer*/
		  echo '</div>'."\n";
		}	
		
		// This function searches and reads file 
		// returns error if no such file (for now)
		private function readFile($path)
		{
			if (file_exists($path))
				readfile($path);
			else
				echo "readFile(): Could not find " . $path . "\n <br>";
		}
		
	}
?>