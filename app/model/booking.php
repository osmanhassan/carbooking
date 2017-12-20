<?php

	require_once'dataAccess.php';
	

	function insertBooking(){
		
		$destination 	= 	$_POST['destination']; 
		$carNumber 		= 	$_POST['carNumber']; 
		$pickupFrom 	= 	$_POST['pickupFrom']; 
		$bookingTime	= 	$_POST['bookingTime']; 
		$returnTime 	= 	$_POST['returnTime']; 
		$passengers 	= 	$_POST['passengers']; 
		$bookedBy 		= 	$_SESSION['user'];

		$sql = "INSERT INTO bookings 
				(destination, carNumber, pickupFrom, 
				bookingTime, returnTime, passengers, bookedBy) 
				VALUES ('$destination', '$carNumber', 
						'$pickupFrom', '$bookingTime', 
						'$returnTime', $passengers, 
						'$bookedBy')";

		executeSQL($sql);
	}

	function showBookings(){

		$bookedBy = $_SESSION['user'];

		$sql = "SELECT * FROM bookings WHERE 
				bookedBY LIKE '$bookedBy' 
				ORDER BY bookingId DESC";
				
		$result = executeSQL($sql);

		$bookings = [];

		if($result->num_rows > 0){
			while($booking = mysqli_fetch_assoc($result))
				array_push($bookings, $booking);
		}

		return $bookings;
	}

	function showBooking($id){

		$bookedBy = $_SESSION['user'];

		$sql = "SELECT * FROM bookings WHERE bookedBY LIKE '$bookedBy' AND bookingId = $id ";
		$result = executeSQL($sql);

		if($result->num_rows > 0){
			while($booking = mysqli_fetch_assoc($result)){

				$GLOBALS['bookTime'] 	= 	$booking['bookingTime']; 
				$GLOBALS['returnTime'] 	= 	$booking['returnTime'];
				$GLOBALS['passengers'] 	= 	$booking['passengers'];
				$GLOBALS['car']			= 	$booking['carNumber'];
				$GLOBALS['pickup'] 		= 	$booking['pickupFrom'];
				$GLOBALS['destination'] = 	$booking['destination'];

			}
		}

		
	}


	function deleteBooking($id){

		
		$bookedBy = $_SESSION['user'];

		$sql = "DELETE FROM bookings WHERE bookingId = $id AND bookedBY LIKE '$bookedBy'";

		$result = executeSQL($sql);
		
	}

	function editBooking(){

		$bookingId		=	$_POST['bookingId']; 
		$destination 	= 	$_POST['destination']; 
		$carNumber 		= 	$_POST['carNumber']; 
		$pickupFrom 	= 	$_POST['pickupFrom']; 
		$bookingTime	= 	$_POST['bookingTime']; 
		$returnTime 	= 	$_POST['returnTime']; 
		$passengers 	= 	$_POST['passengers']; 
		$bookedBy 		= 	$_SESSION['user'];
		
		$sql = "UPDATE bookings SET 

					destination		=	'$destination',
					carNumber		=	'$carNumber',
					bookingTime		=	'$bookingTime',
					returnTime		= 	'$returnTime',
					pickupFrom		= 	'$pickupFrom',
					passengers		= 	 $passengers
					
				WHERE bookingId = $bookingId 
				AND bookedBy LIKE '$bookedBy'";

		$result = executeSQL($sql);
		
	}

	function giveTime($date, $car){

		$bookedBy = $_SESSION['user'];

		$sql = "SELECT * FROM bookings WHERE 
				STR_TO_DATE(bookingTime, '%Y-%m-%d')
				= STR_TO_DATE('$date', '%Y-%m-%d') 
				 AND carNumber LIKE '$car' 
				 AND bookedBy LIKE '$bookedBy'";

		$result = executeSQL($sql);
		
		return $result;
	}

?>