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
				echo '<h3>НЕПАЛ И КЛАСИЧЕКА ИНДИЯ С КРАЛСКИ РАДЖАСТАН</h3>'."\n";
				echo '</div>'."\n";
			  
				echo '<div id="route">'."\n";
				echo '<p>Катманду - Агра - Джайпур – Джодпур – Удайпур - Делхи</p>'."\n";
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
				  echo 'Цена: 855 eur'."\n";
				  echo '</div>'."\n";
				  
				  /*leads to request form about the particular excursion*/
				  echo '<div id="requestButton">'."\n";
				  echo '<button type="button">Резервация/Запитване</button>'."\n";
				  echo '</div>'."\n";	  
				/*closin tag for shortOffer*/  
			  echo '</div>'."\n";
			  
			  echo '<div id="image">'."\n";
			  echo '<img src="../img/IndiaNewDelhi.jpg" alt="IndiaNewDelhi" height=100% width=100%>'."\n";
			  echo '</div>'."\n";

			  echo '<div id="restOfOffer">'."\n";
			    /*general description*/
				  echo '<div id="gDescription">'."\n";
				  echo '<p>Делхи (на хинди: दिल्ली; на урду: دهلى; на английски: Delhi) е метрополис в Северна Индия, разположен в обособената административна единица под федерално управление Национална столична територия Делхи.'.
               'В административно отношение Делхи се разделя на няколко селища, сред които е Ню Делхи - официалната столица на Индия, където се намират всички институции на централното управление на страната.</p>'."\n";
				  echo '</div>';
				  
				  /*day by day description*/
				  echo '<div id="dDescription">'."\n";
				  echo '<p> Ден 01: Истанбул - Делхи<br>'.
				       'Полет за Делхи в 00.35 ч от Истанбул</p>'."\n";
				  echo '<p>Ден 02: Делхи<br>'.  
               'Пристигане в Дубай в 06.30 ч Полет за Делхи в 07.40 чПристигане в Делхи 12.30 ч Посрещане от фирмата партньор със свежи гирлянди от цветя и трансфер до хотела.Следобед посещение на мястото където е кремиран Махатма Ганди .Вечеря. Нощувка в хотела. </p>'."\n";
				  echo 'Ден 03: Делхи - City Tour<br>'.
				  		 'След закуска обиколка на града Делхи, столица на Индия и главен вход към страната.Разглеждане на Новия и Стария Делхи ,Jama Masjid- най-голямата джамия в Индия, построена от Шах Джахан.Президентския дворец, Chandni Chowk, Вратата на Индия , Парламента, Qutab Minar.Посещение Червения форт построен от Шах Джахан Вечеря.Нощувка.'."\n";
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