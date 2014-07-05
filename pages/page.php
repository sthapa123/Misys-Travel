<?php

// Next location calculator
   $next = $_GET['menuId'];
   
   switch ($next)
   {
   	default:
   	case 1: 
   		{
   			header("Location: ../index.php");
   			die();
   			break;
   		}
   	case 2:
   	case 3:
   	case 4:
   	case 5: 
   		{
   			header("Location: ./Offers.php?menuId=" . $next);
   			die();
   			break;
   		}
   	case 6: 
   		{
   			header("Location: ./ReservationRequestForm.php");
   			die();
   			break;
   		}
   		
   }
   
?>