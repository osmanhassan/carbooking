<?php

	require_once'app/model/booking.php';
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$result = giveTime($_POST['date'], $_POST['car']);
		$times = [];
		$dontPush = [];
		$date = $_POST['date'];
		$date = strtotime($date);
		$date = date('H:i',$date);

		if($result->num_rows > 0){

			while($row = mysqli_fetch_assoc($result)){

				$b = $row['bookingTime'];
				$b = strtotime($b);
				$b = date('H:i',$b);
				if($b > $date)
				array_push($times, $b);
				
			}
			if(!empty($times)){
				sort($times);
				$in = explode(':', $date);
				$in = $in[0];
				$end = explode(':', $times[0]);
				$end = $end[0];
				//var_dump($times);echo $in,$end;
				$times = [];
				$j = 0;
				for($i = $in + 1; $i <= $end; $i++){
					if($i < 10)
						$j = '0' . $i;
					$j = $j . ':00';
					array_push($times, $j);
				}
			}
			else{
				for($i = $date + 1; $i < 24; $i++){

					$t = $i . ':00';
					$t = strtotime($t);
					$t = date('H:i',$t);
					array_push($times, $t);
				}
			}

		}

		else{
			for($i = $date + 1; $i < 24; $i++){

				$t = $i . ':00';
				$t = strtotime($t);
				$t = date('H:i',$t);
				array_push($times, $t);
			}
		}
		header("Content-type:application/json");

		echo (json_encode($times));
		
	}


?>