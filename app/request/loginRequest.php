<?php

	require_once'app/model/user.php';

	function isValidUser($email, $password){

		if(empty($email)){
			$GLOBALS['emailError'] = "Email is required";
			return false;
		}
		if(empty($password)){
			$GLOBALS['passwordError'] = "Password is required";
			return false;
		}

		$usrer = searchByEmail($email);

		if(empty($usrer)){

			$GLOBALS['emailError'] = $email . " is not registered";
			return false;
		}

		$password = md5($password,false);
		
		
		if($usrer[1] != $password){

			$GLOBALS['passwordError'] = "Invalid Password for " . $email;
			return false;
		}

		return true;

	}

?>