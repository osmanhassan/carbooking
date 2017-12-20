<?php

	define("APP_ROOT", "$_SERVER[HTTP_HOST]/carbooking");

	//retriving landing view if the request is /carbooking
	if(!isset(array_keys($_GET)[0])){
	    require_once "app/view/index.php";
	    die();
	}

	//else storing the path and view info from the URL
	$path = array_keys($_GET)[0];
	$controller = $path;
	$view = $path;

	//routing mechanism
	$location = "app/controller/".$controller."Controller.php";

	//Middle ware for session checking
	if($controller == 'booking' || $controller == 'delete' 
		|| $controller == 'edit' || $controller == 'showBooking'
		|| $controller == 'timeSource' || $controller == 'logout'
		|| $controller == 'returnTime'){

		session_start();
		if(empty($_SESSION['user']))
			header('LOCATION:/carbooking/?login');
		else
			require_once $location;
	}
	else{
			//requiring the corresponding controller of $controller if exists
			if(file_exists($location))
				require_once $location; 
			else
				echo'<h1>Bad Request</h1>'; 
		}


	

?>