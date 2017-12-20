$('document').ready(function(){
	
	//ajax function for bookingtime
	function timeSource(date){
		$.ajaxSetup({async: false});
		var car = $('#car').val();
		
	   return $.post("/carbooking/?timeSource",
				{date: date,car: car}, 
				function(data, status){});
	}
	
	//ajax function for return time
	function returnTimeSource(date){
		$.ajaxSetup({async: false});
		var car = $('#car').val();
		
	   return $.post("/carbooking/?returnTime",
				{date: date,car: car}, 
				function(data, status){});
	}

	//stops drag and drop in the page
	$(this).bind(
	{
	  dragenter: function (e) {
	  e.stopPropagation();
	  e.preventDefault();
	  var dt = e.originalEvent.dataTransfer;
	  dt.effectAllowed = dt.dropEffect = 'none';
	 },
	dragover: function (e) 
	{
	  e.stopPropagation();
	  e.preventDefault();
	  var dt = e.originalEvent.dataTransfer;
	  dt.effectAllowed = dt.dropEffect = 'none';
	}
	});

	//return time should be empty after changing booking time
	jQuery('#bookingTime').change(function(){
		jQuery('#returnTime').val('');
	});

	//stops context menu for booking time
	$('#bookingTime').bind("contextmenu", function(e) {
                e.preventDefault();
            });

	//stops context menu for returnTime
	$('#returnTime').bind("contextmenu", function(e) {
                e.preventDefault();
            });

	//car validation
	$('#car').change(function(){

		jQuery('#bookingTime').val('');
		jQuery('#returnTime').val('');
	

		if($('#car').val() === '--CAR NUMBER--'){
			$('#carError').html("Choose a car first");
			$('#carError').show(1000);
		}
		else{
			
			$('#carError').hide(1000);
			$('#carError').html("");
		}
	});

	//stops keyboard input for booking time
	$('#bookingTime').keydown(function(event){

		event.preventDefault();
	});

	//booking time validation and datetime picker
	$('#bookingTime').click(function(event){
		
		if($('#car').val() === '--CAR NUMBER--'){
			$('#carError').html("Choose a car first");
			$('#carError').show(1000);
		}

		else{
			
			$('#carError').hide(1000);
			$('#carError').html("");
			var date = new Date;
			var day = date.getDate();
			var month = date.getMonth() + 1;
			var year = date.getFullYear();
			var hours = date.getHours();
			var seconds = date.getSeconds();
			var mindate = year + '-' + month + '-' + day;
			date = year + '-' + month + '-' + day + ' ' + hours + ':' + seconds;

			timeSource(date).done(function(json){
							
							n = json;
							mindate = mindate;
							if(n === ''){

								mindate = parseInt(day) + 1;
								if(mindate < 10)
									mindate = '0' + mindate;
								mindate =  year + '-' + month + '-' + day;
							}
							
					});
			$('#bookingTime').datetimepicker({
				format:'Y-m-d H:i',
				minDate: mindate,
				defaultTime: n[0],
				allowTimes: n,
				
				onSelectDate:function(ct,$input){
					
					 n=0;
					timeSource($input.val()).done(function(json){

							n = json;
							if(n === ''){
								
								$('#bookingTimeError').html("Booked for all day on" + $input.val());
								$('#bookingTimeError').hide();
								$('#bookingTimeError').show(1000);
								setTimeout(function() {
								  $('#bookingTimeError').html("");
								}, 3000);
								jQuery('#bookingTimeError').datetimepicker('hide');
							}
							
					});
					
				     this.setOptions({
					    	allowTimes: n, 
							defaultTime: n[0]
						});

				     jQuery('#bookingTime').datetimepicker('hide');
				     jQuery('#bookingTime').datetimepicker('show');
				    
				  }	
					
			});
			$.ajaxSetup({async: true});
		}
		
	});

	//returnTime validation and datetime picker
	$('#returnTime').keydown(function(event){

		event.preventDefault();
	});

	$('#returnTime').click(function(event){

		if($('#car').val() === '--CAR NUMBER--'){
			$('#carError').html("Choose a car first");
			$('#carError').show(1000);
		}

		else{

			$('#carError').hide(1000);
			$('#carError').html("");

			var bookingTime = jQuery('#bookingTime').val();

			if(bookingTime === ''){

				$('#bookingTimeError').html("First fill up booking time");
				$('#bookingTimeError').hide();
				$('#bookingTimeError').show(1000);
				setTimeout(function() {
				  $('#bookingTimeError').html("");
				}, 3000);
				
				

			}

			else{

				var array = bookingTime.split(" ");
				var aloowDate = [array[0]];
				
				
				returnTimeSource(bookingTime).done(function(json){

					allowTime = json;
					if(n === ''){
								
						$('#returnTimeError').html("Booked for all day on" + $input.val());
						$('#returnTimeError').hide();
						$('#returnTimeError').show(1000);
						setTimeout(function() {
						  $('#returnTimeError').html("");
						}, 3000);
						jQuery('#returnTime').datetimepicker('hide');
					}
				});

				$('#returnTime').datetimepicker({

					 //minDate:jQuery('#bookingTime').val()?jQuery('#bookingTime').val():false,
					 allowDates: aloowDate,
					 allowTimes: allowTime,
					 defaultTime: allowTime[0],
					 formatDate: 'Y-m-d',
					
				});
			}

		}
	});	
	
});