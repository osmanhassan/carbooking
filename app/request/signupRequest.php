<?php
	
	require_once'app/model/user.php';
	//validating userEmail
	function isValidEmail($email){

		if(!empty($email)){

			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

				$usres = searchByEmail($email);

				if(!empty($usres)){

					$GLOBALS['emailError'] = $email . " is already taken";
					return false;
				}

            	return true;
		    }
		    else{

		    	$GLOBALS['emailError'] = "Invalid Email Address";
		    	return false;
		    }
		}
		else{

			$GLOBALS['emailError'] = "Email is required";
		    return false;
		}
        
	}

	//validating password
	function isValidPassword($password){

		$isValid = true;
		$passwordError = [];

		if(!empty($password)){

			if(strlen($password) < 8){

				$isValid = false;
				$Error = "Password must contain atleast 8 characters";
	            array_push($passwordError, $Error);
			}

			if(strlen($password) > 20){

				$isValid = false;
				$Error = "Password can contain maximum 20 characters";
	            array_push($passwordError, $Error);
			}

	        if (! preg_match('#[A-Z]#', $password)) {
	            $isValid = false;
	            $Error = "Password must contain atleast one uppercase";
	            array_push($passwordError, $Error);
	        }
	        
	        if (! preg_match('#[a-z]#', $password)) {
	            $isValid = false;
	            $Error = "Password must contain atleast one lowerrcase";
	            array_push($passwordError, $Error);
	        }

	        if (! preg_match('#[0-9]#', $password)) {
	            $isValid = false;
	            $Error = "Password must contain atleast one number";
	            array_push($passwordError, $Error);
	        }

	        if (! preg_match('#[\W]#', $password)) {
	            $isValid = false;
	            $Error = "Password must contain atleast one special character";
	            array_push($passwordError, $Error);
	        }

	        if(! $isValid){
	        	$GLOBALS['passwordError'] = $passwordError;
	        }

	    }

	    else{

	       	$isValid = false;
			$Error = "Password is required";
            array_push($GLOBALS['passwordError'], $Error);
	    }

	    return $isValid;
	}

	function  isValidConfirmPass($password, $confirmPass){

		$isValid = true;
		if(!empty($confirmPass)){

			if($password != $confirmPass){
				$isValid = false;
				$Error = "Confirm Password should match with Password";
           		array_push($GLOBALS['confirmPassError'], $Error);
			}

		}
		else{

			$isValid = false;
			$Error = "Confirm Password is required";
       		array_push($GLOBALS['confirmPassError'], $Error);
		}

		return $isValid;
	}

	function valiadateSignup($email, $password, $confirmPass){

		$isValidEmail = isValidEmail($email);
		$isValidPassword = isValidPassword($password);
		$isValidConfirmPass = isValidConfirmPass($password, $confirmPass);

		if($isValidEmail and $isValidPassword and $isValidConfirmPass)
			return true;
		
		else{

			$GLOBALS['userEmail'] = $email;
			return false;
		}	

	}

?>