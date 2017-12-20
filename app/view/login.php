<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./app/public/css/bootstrap.css">
</head>
<body>
	<?php require_once "./app/view/layouts/header.html" ?>

	<div class="container">
		<div class="card" style="width: 70%;margin: auto;">
		
			<div class="card-header" style="background-color: gray;color:#fff">
				<h2  style="margin: auto;">LOG IN</h2>
			</div>

			<div class="card-body" style="padding: 10px">

				<form method="post">

					<div class="form-group">
						<label for="userEmail">Email address:</label>
						<input type="text" name="userEmail" placeholder="Your Email" value="<?= $userEmail?>" class="form-control">
						<span style="color: red"><?= $emailError ?></span>
					</div>

					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" name="password" placeholder="Password" class="form-control">
						<span style="color: red"><?= $passwordError ?></span>
					</div>

					<div class="form-group" style="text-align: center;">
						<input type="submit" class="btn btn-success" value="Log In">

						<a href="/carbooking/?signup" class="btn btn-success">Sign Up</a>

					</div>

				</form>

			</div>

		</div>
	</div>

</body>
</html>