<?php

	require_once'app/request/bookingRequest.php';
	require_once'app/model/booking.php';

	$bookingID		=	$_REQUEST['edit'];
	
	if(!empty($bookingID)){

		$carError 			= 	"";
		$pickupError 		= 	"";
		$passengersError 	= 	"";
		$returnTimeError 	= 	"";
		$destinationError 	= 	"";
		$bookingTimeError 	= 	"";
		
		$bookTime 		= 	""; 
		$returnTime 	= 	""; 
		$passengers 	= 	"";
		$car 			= 	"--CAR NUMBER--";
		$pickup 		= 	"--PICKUP FROM--";
		$destination 	= 	"--DESTINATION--";
		

		showBooking($bookingID);

		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			$validateBooking = validateBooking();

			if($validateBooking){
				editBooking();
				header('LOCATION:/carbooking?showBooking');
			}
			

		}
		require_once "app/view/user/" . $view . ".php";

	}
	else{

		header('LOCATION:/carbooking?showBooking');
	}


?>