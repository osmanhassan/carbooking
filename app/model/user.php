<?php

	require_once'dataAccess.php';

	function insertUser($email, $password){

		$sql = "INSERT INTO users (userEmail, password) VALUES ('$email', '$password')";
		executeSQL($sql);
	}

	function searchByEmail($email){

		$sql = "SELECT * FROM users WHERE userEmail LIKE '$email'";
		$result = executeSQL($sql);
		$users = [];

		if($result->num_rows > 0){
			foreach(mysqli_fetch_assoc($result) as $user)
				array_push($users, $user);
		}

		return $users;
	}

?>