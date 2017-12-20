<!DOCTYPE html>
<html>
<head>
	<title>Show Booking</title>
	<title>Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./app/public/css/bootstrap.css">
</head>
<body>
	<?php
		require_once "./app/view/layouts/userheader.html";

		foreach($bookings as $booking){

			$id = $booking["bookingId"];
			$name = $booking['destination'];

			echo'<div class="card" style="margin: 20px;padding:10px">
				<div class="row"> 
					<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
						<p><a style="font-style:italic">Destinstion</a>: ' . $booking['destination'] .'</p>
						<p><a style="font-style:italic">Car Number</a>: ' . $booking['carNumber'] .'</p>
						<p><a style="font-style:italic">Booking Time</a>: ' . $booking['bookingTime'] .'</p>
						<p><a style="font-style:italic">Return Time</a>: ' . $booking['returnTime'] .'</p>
						<p><a style="font-style:italic">Pickup From</a>: ' . $booking['pickupFrom'] .'</p>
						<p><a style="font-style:italic">Passengers</a>: ' . $booking['passengers'] .'</p>
					</div>
					<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4" style="text-align: right">

						<a href="/carbooking/?edit=' . $booking['bookingId'] . '" class="btn btn-secondary">Edit</a>
						<a href="#" onclick='."'".'confirmDelete("' . 
									$id . '","' . $name . '")'."'".' class="btn btn-danger">X</a>
					</div>
				</div>
			</div>';
		}

	?>
</body>
<script type="text/javascript">
	
	function confirmDelete(id, name){

		if(window.confirm('Click Ok to delete booking for ' + name + '\nClick Cancel otherwise') == true)
			window.location.href = '/carbooking/?delete='+id,true;
	}

</script>
</html>