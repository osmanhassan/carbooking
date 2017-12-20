<?php 
	
	$userEmail = "";
	$emailError = "";
	$passwordError = [];
	$confirmPassError = [];

	require_once 'app/request/signupRequest.php';
	require_once'app/model/user.php';

	//handling post request
	if($_SERVER['REQUEST_METHOD'] == "POST"){

		$email = trim($_POST['userEmail']);
		$password = trim($_POST['password']);
		$cofirmPass = trim($_POST['Confirmpassword']);

		$isValidSignup = valiadateSignup($email, $password,$cofirmPass);//calling function from /request/signupRequest.php

		if($isValidSignup == true){
			$password = md5($password);
			insertUser($email, $password);
			header('LOCATION:/carbooking/?login');
		}
		else
			require_once 'app/view/' . $view . '.php';


	}
	else
		require_once 'app/view/' . $view . '.php';

?>