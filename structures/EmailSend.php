<?php
 /* A class to process and send the collected data from 
  * ReservationRequestForm.php to specified email.
  * Last Modified: 04.07.2014
  * Authors: Konstantin Grigorov
  */
  //structure of message received by email
  $subject= htmlspecialchars($_POST['resORreq']).' от '.htmlspecialchars($_POST['customer_names']);
  $text = "Данни на клиент:\n".
  		    "Имена: ".htmlspecialchars($_POST['customer_names'])."\n".
  				"Email: ".htmlspecialchars($_POST['email'])."\n".
  			  "Телефон: ".htmlspecialchars($_POST['phone'])."\n".
  			  
          "\nДанни на желана оферта:\n".
          "Екскурзия: ".htmlspecialchars($_POST['excursion'])."\n".
          "Дата: ".htmlspecialchars($_POST['date'])."\n".
          "Броѝ хора: ".htmlspecialchars($_POST['number_customers'])."\n".
          
          "\nСъобщение:\n".
          "Тема: ".htmlspecialchars($_POST['subject'])."\n".
          "Teкст на съобщение:\n".wordwrap(htmlspecialchars($_POST['Message']), 500, "\r\n");

  //format message, so that there are no more than 500 characters per line
  $message = wordwrap($text, 500, "\r\n");
  
  //change first parameter of mail function to send messages to different email.
  mail('kolygri@gmail.com', $subject, $message);
?>