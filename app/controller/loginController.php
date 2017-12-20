<?php
	
	require_once "app/request/loginRequest.php";
	

	$userEmail 		= 	"";
	$emailError 	= 	"";
	$passwordError 	= 	"";
	
	if($_SERVER['REQUEST_METHOD'] == "POST"){

		$email = $_POST['userEmail'];
		$password = $_POST['password'];

		$isValidUser = isValidUser($email, $password);

		if($isValidUser){
			session_start();
			$_SESSION['user'] = $email;
			header('LOCATION:/carbooking/?booking');
		}
		
	}
	require_once "app/view/" . $view . ".php";

?>