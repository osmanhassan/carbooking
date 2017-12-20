<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./app/public/css/bootstrap.css">
</head>
<body>

	<?php require_once "./app/view/layouts/header.html" ?>
	
	<div class="container">
		<div class="card" style="width: 70%;margin: auto;">
		
			<div class="card-header" style="background-color: gray;color:#fff">
				<h2  style="margin: auto;">Sign Up</h2>
			</div>

			<div class="card-body" style="padding: 10px">
				<form method="post">

					<div class="form-group">
						<input type="text" name="userEmail" placeholder="Your Email" value="<?= $userEmail?>" class="form-control">
						<span style="color: red"><?= $emailError ?></span>
					</div>

					<div class="form-group">
						<input type="password" name="password" placeholder="Password" class="form-control">
						<?php 
							foreach($passwordError as $err)
								echo '<span style="color: red">'. $err . '</span><br>';

						?>
					</div>

					<div class="form-group">
						<input type="password" name="Confirmpassword" placeholder="Confirm Password" class="form-control">
						<?php 
							foreach($confirmPassError as $err)
								echo '<span style="color: red">'. $err . '</span><br>';

						?>
					</div>

					<div class="form-group" style="text-align: center;">
						<input type="submit" class="btn btn-success" value="Sign Up">
					</div>

				</form>
			</div>

		</div>
	</div>

	
</body>
</html>