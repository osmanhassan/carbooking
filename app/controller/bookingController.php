<?php
	require_once'app/request/bookingRequest.php';
	require_once'app/model/booking.php';

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

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$validateBooking = validateBooking();

		if($validateBooking){
			insertBooking();
			header('LOCATION:/carbooking/?showBooking');
		}
		

	}
	require_once "app/view/user/" . $view . ".php";

?>