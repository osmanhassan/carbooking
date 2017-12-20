<?php
	//validating destination
	function isValidDestination($destination){
		
		if($destination != '--DESTINATION--'){
			$GLOBALS['destination'] = $destination;
			return true;
		}
		else{

			$GLOBALS['destinationError'] = 'Please select destination from the dropdown';
			
			return false;
		}

	}

	//validating car
	function isValidCar($car){
			
		if($car != '--CAR NUMBER--'){
			$GLOBALS['car'] = $car;
			return true;
		}
		else{

			$GLOBALS['carError'] = 'Please select car from the dropdown';
			
			return false;
		}

	}

	//validating pickup

	function isValidPickup($pickup){
			
		if($pickup != '--PICKUP FROM--'){
			$GLOBALS['pickup'] = $pickup;
			return true;
		}
		else{

			$GLOBALS['pickupError'] = 'Please select pickup location from the dropdown';
			
			return false;
		}

	}

	//validating booking time
	function isValidBookingTime($bookingTime){

		if(!empty($bookingTime)){
			$GLOBALS['bookTime'] = $bookingTime;
			return true;
		}
		else{

			$GLOBALS['bookingTimeError'] = 'Booking Time is required';
			
			return false;
		}

	}

	//validating return time
	function isValidReturnTime($returnTime){

		if(!empty($returnTime)){
			$GLOBALS['returnTime'] = $returnTime;
			return true;
		}
		else{

			$GLOBALS['returnTimeError'] = 'ReturnTime Time is required';
			
			return false;
		}

	}

	//validating passenger no.
	function isValidPassengers($passengers){

		if(!empty($passengers)){
			$GLOBALS['passengers'] = $passengers;

			if(! preg_match('/^[0-9]+$/', $passengers)){
				$GLOBALS['passengersError'] = "Please provide valid passengers number";
				return false;

			}

			return true;
		}
		else{
			$GLOBALS['passengersError'] = 'passengers number is required';
			
			return false;
		}
	}

	//validating all
	function validateBooking(){

	    $isValidDestination = isValidDestination($_POST['destination']);
		$isValidCar = isValidCar($_POST['carNumber']);
		$isValidPickup = isValidPickup($_POST['pickupFrom']);
		$isValidBookingTime = isValidBookingTime($_POST['bookingTime']);
		$isValidReturnTime = isValidReturnTime($_POST['returnTime']);
		$isValidPassengers = isValidPassengers($_POST['passengers']);

		if($isValidDestination and $isValidCar and 
			$isValidPickup and $isValidBookingTime and 
			$isValidReturnTime and $isValidPassengers)
			return true;
		else
			return false;

	}
?>