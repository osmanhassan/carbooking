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

				$r = $row['returnTime'];
				$r = strtotime($r);
				$r = date('H:i',$r);

				$initial = explode(':', $b)[0];
				$end = explode(':', $r)[0];

				while ($initial < $end) {

					
					array_push($dontPush, $initial+':00');
					
					$initial++;

				}

				for($i = 0; $i < 23; $i++){

					$t = $i . ':00';
					$t = strtotime($t);
					$t = date('H:i',$t);

					if($t < $b or $t >= $r){
						$flag = 0;
						foreach($times as $time){
							if($time == $t){
								$flag = 1;
								break;
							}
						}
						if($flag == 0 and array_search($t, $dontPush) === False)
							array_push($times, $t);
					}
					else{
						$array = $times;
						foreach($array as $key=>$time){
							if($time == $t){
								unset($array[$key]);
							}
						}
						 $times =[];
						 foreach($array as $t)
						 	array_push($times, $t);
					}

				}

			}
		}

		else{
			for($i = 0; $i < 23; $i++){

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