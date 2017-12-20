<?php

	require_once'app/model/booking.php';

	deleteBooking($_GET['delete']);

	header('LOCATION:/carbooking/?showBooking');

?>