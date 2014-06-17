<?php
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