<?php
/* A template for different Reservations
 * Author: Konstantin Grigorov
 * Last Modified: 01.07.2014
 */
  include "../main.php";
	class ReservationRequestForm extends htmlPage
	{
		public function insLeftMenu() 
	  {
	    $this->utils->putLeftSideMenus($_GET['menuId']);
	  }
		
		public function insContent(){
			echo '<form class="ResReqFrom">'."\n";
			
				echo '<div id="radio_buttons">'."\n";
				echo '<input type="radio" name="resORreq" class="radio_button">'."\n";
				echo '<label for="reservation">Резервация</label>'."\n";
				echo '</div>'."\n";
					
				echo '<div id="radio_buttons">'."\n";
				echo '<input type="radio" name="resORreq" class="radio_button">'."\n";
				echo '<label for="request">Запитване</label>'."\n";
				echo '</div>'."\n";
			
				echo 'Име и фамилия: <input type="text" name="customer_names">'."\n";
				
				echo 'E-mail: <input type="text" name="customer_names">'."\n";
				
				echo 'Телефон: <input type="text" name="customer_names">'."\n";
				
				echo 'Екскурзия: <input type="text" name="customer_names">'."\n";
				
				echo 'Броѝ хора: <input type="text" name="customer_names">'."\n";
				
				echo 'Teма: <input type="text" name="customer_names">'."\n";
				
				echo '<textarea name="Message">Напишете съобщение тук.</textarea>'."\n";
				
			echo '</form>'."\n";
			
			echo '<div id="Send_button">'."\n";
			echo '</div>'."\n";
		}
	}
	$reservationForm = new ReservationRequestForm("ReservationRequestForm");
?>