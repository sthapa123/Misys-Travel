<?php
/* A reservation/request form that a customer needs to fill if interested in this excursion.
 * Author: Konstantin Grigorov
 * Last Modified: 01.07.2014
 */
  //inherit layout and styles of parent
  include "../main.php";
	class ReservationRequestForm extends htmlPage
	{
		public function insLeftMenu() 
	  {
	    $this->utils->putLeftSideMenus($_GET['menuId']);
	  }
		
		public function insContent(){
			  echo '<img id="img_form" src="../img/elements/Request_Form_img.jpg" alt="Holiday travel offer">'."\n";
				echo '<div id="contact_form_wrap">'."\n";
				  echo '<form class="resORreq" method="post" action="../structures/EmailSend.php" target="_self">'."\n";
						echo '<input id="reservation" name="resORreq" type="radio" value="Резервация" required>'."\n";
						echo '<label id="radio_label" for="reservation">Резервация</label>'."\n";
							
						echo '<input id="request" name="resORreq" type="radio" value="Запитване">'."\n";
						echo '<label id="radio_label" for="request">Запитване</label>'."\n";
						
						echo '<label class="required" for="customer_names">Име и фамилия</label>'."\n";
						echo '<input name="customer_names" type="text" required autofocus>'."\n";
						
						echo '<label class="required" for="email">E-mail</label>'."\n";
						echo '<input name="email" type="email" placeholder="example@domain.com" required>'."\n";
						
						echo '<label class="required" for="phone">Телефон</label>'."\n";
						echo '<input name="phone" type="tel" placeholder="Eg. +359000 000000" required>'."\n";
						
						//get the dom of the page which called the form and extract the title from the tags
						$offer_dom = file_get_contents($_SERVER['HTTP_REFERER']);
						$extract = $this->get_tag('id', 'offer_title', $offer_dom);
						echo '<label for="excursion">Екскурзия</label>'."\n";
						echo '<input type="text" name="excursion" value="'.$extract.'">'."\n";
						
						echo '<label for="date">Дата</label>'."\n";
						echo '<input name="date" type="date">'."\n";

            echo '<label for="number_customers">Броѝ хора</label>'."\n";
						echo  '<input type="number" name="number_customers">'."\n";
						
						echo '<label class="required"  for="subject">Teма</label>'."\n";
						echo  '<input type="text" name="subject" required>'."\n";
						
						echo '<textarea class="required" id="message_request" name="Message" placeholder="Напишете съобщение." required></textarea>'."\n";
						
						echo  '<input id="submit_button" type="submit">'."\n";
					echo '</form'."\n";
			echo '</div>'."\n";	
		}
		
		//Function to extract the contents of a div tag with given attribute and value.
		function get_tag( $attr, $value, $html ) {
		
			$attr = preg_quote($attr);
			$value = preg_quote($value);
		  
			//scan the dom for a fully matching div tag
			$tag_regex = '/<div[^>]*'.$attr.'="'.$value.'">(.*?)<\\/div>/si';
		
			//return first match
			preg_match($tag_regex,
			$html,
			$matches);
			return $matches[1];
		}
	}
	
	$reservationForm = new ReservationRequestForm("ReservationRequestForm");
?>