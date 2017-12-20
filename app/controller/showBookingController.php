<?php
	
	require_once'app/model/booking.php';

	$bookings = showBookings();

	require_once "app/view/user/" . $view . ".php";

?>