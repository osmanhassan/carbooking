<!DOCTYPE html>
<html>
<head>
	<title>Booking</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./app/public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./app/public/css/jquery.datetimepicker.min.css">
</head>
<body>
	<?php require_once "./app/view/layouts/userheader.html" ?>

	<div class="container">
		<div class="card" style="width: 70%;margin: auto;">
		
			<div class="card-header" style="background-color: gray;color:#fff">
				<a style="font-size: 50px;line-height: 100%">EDIT</a>
				<a href="/carbooking/?showBooking" 
					style="font-size: 50px; float: right;line-height: 100%;text-decoration: none;">
						<button class="btn btn-danger">X</button></a>
			</div>

			<div class="card-body" style="padding: 10px">

				<form method="post" autocomplete="off">
					<div class="row">
						<div class="form-group col-lg-6  col-xl-6">
							<label for="destination">Destination:</label>
							<select name="destination" class="form-control">

								<option><?= $destination?></option>
								<option>Location 1</option>
								<option>Location 2</option>
								<option>Location 3</option>

							</select>
							<span style="color: red"><?= $destinationError . '<br>'?></span>
							
							<label for="carNumber">Car Number:</label>
							<select name="carNumber" id="car" class="form-control">

								<option><?= $car?></option>
								<option>Car 1</option>
								<option>Car 2</option>
								<option>Car 3</option>

							</select>
							<span id="carError" style="color: red"><?= $carError?></span><br>

							<label for="pickupFrom">Pickup From:</label>
							<select name="pickupFrom" class="form-control">

								<option><?= $pickup?></option>
								<option>Location 1</option>
								<option>Location 2</option>
								<option>Location 3</option>

							</select>
							<span style="color: red"><?= $pickupError?></span>

						</div>

					

					
						<div class="form-group col col-lg-6  col-xl-6">

							<label for="bookingTime">Booking Time:</label>
							<input type="text" name="bookingTime" id="bookingTime" placeholder="BOOKING TIME" value="<?= $bookTime?>" class="form-control">
							<span id='bookingTimeError' style="color: red"><?= $bookingTimeError?></span><br>

							<label for="returnTime">Return Time:</label>
							<input type="text" name="returnTime" id="returnTime" placeholder="RETURN TIME" value="<?= $returnTime?>" class="form-control">
							<span style="color: red"><?= $returnTimeError . '<br>'?></span>

							<label for="passengers">Passengers:</label>
							<input type="text" name="passengers" placeholder="PASSENGERS" value="<?= $passengers?>" id="passengers" class="form-control">
							<span id="passengersError" style="color: red"><?= $passengersError?></span>

							<input type="hidden" name="bookingId" value="<?= $bookingID?>">

						</div>

					</div>

					<div class="form-group" style="text-align: center;margin-top: 10px">
						<input type="submit" value="EDIT" class="btn btn-success">
					</div>

				</form>
			</div>

		</div>
	</div>


</body>

	<script type="text/javascript" src="./app/public/js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="./app/public/js/jquery.js"></script>
	<script type="text/javascript" src="./app/public/js/jquery.datetimepicker.full.min.js"></script>
	<script type="text/javascript" src="./app/public/js/main.js?nocache=<<?=time()?>"></script>

</html>
