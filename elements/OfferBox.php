<?php
/*
 * This class represents the yellowish-round-corner-styled preview of offer box. The
 * constructor takes the: 
 *  - destination name
 *  - offer duration
 *  - image link
 *  - price
 *  - link to whole publication
 *  
 *  Css frontend classes:
 *   - OBWrapper - Square shaped empty div to fit the reqired width
 *   - OBBackground - yellowish round cornered background
 *   - ODestName - section where name of destination is shown
 *   - OfferDuration - section where the duration of the offer is shown
 *   - ImageOffer - underying div for <img> for fitting purposes
 *   - PriceAndLink - underlying div for Price and ViewOffer section for positioning purposes
 *   - OfferPrice - price section, floated left in the above class
 *   - OfferLink - section for the 'View offer' button, floated right in PriceAndLink
 *   
 * More stuff to be done here soon... 
 * Author: Yordan Yordanov
 * Last Modified: 16.06.2014
 */

  class OfferBox 
  {
  	public function __construct($dest_name, $offer_duration, $image_link, $price,
  			                    $offer_link)
  	{
  		echo "<div class=\"OBWrapper\">\n";
  		echo "<div class=\"OBBackground\">\n";
  		echo "<div class=\"ODestName\">" . $dest_name . "</div>\n";
  		echo "<div class=\"OfferDuration\">" . $offer_duration . "</div>\n";
  		echo "<div class=\"ImageOffer\"> <img src=\"" . $image_link . "\"> </div>\n";
  		echo "<div class=\"PriceAndLink\">\n";
  		echo "<div class=\"OfferPrice\">" . $price . "</div>\n";
  		echo "<div class=\"OfferLink\"><a href=\"" . $offer_link . "\"> Виж оферта </a>
  		      </div>\n";
  		echo "</div>\n"; //"PriceAndLink
  		echo "</div>\n"; // OBBackground
  		echo "</div>"; //OBWrapper  		
  		
  	}
  }
 ?>