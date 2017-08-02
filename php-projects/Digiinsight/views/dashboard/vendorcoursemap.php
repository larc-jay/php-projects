<script type="text/javascript">
    $(function() {
        //course vendor map
		   $("#jq-add-vendor-course").click(function(){ 
		    	 $('.add-vendor-course-success').hide();
		    	 $('.add-vendor-course-error').hide();
		    	
		    	 //$("#jq-vendor-name-sel option:selected").each(function() {
				//	 var _this = $(this);
				//	 vendorIds.push(_this.val());
				 //});
		    	 var vendorid=$('#jq-vendor-name-sel').val();
		    	 var courseid=$('#jq-course-name-sel').val();
		    	 var location=$('#jq-location').val();
		    	 var scheduleStart=$('#jq-schedule-start').val();
		    	 var scheduleEnd=$('#jq-schedule-end').val();
		    	 var schedule=$('#jq-schedule-end').val();
		    	 var price=$('#jq-price').val();
		    	 var trainingType= $('#jq-training-type').val();
		    	 if(courseid=='000'){
		    		 $('.add-vendor-course-error').html('Please select course').show(); 
		    		 return false;
		    	 }
		    	 if(vendorid=='000'){
		    		 $('.add-vendor-course-error').html('Please select vendor').show(); 
		    		 return false;
		    	 }
		    	 if(vendorid=='000'){
		    		 $('.add-vendor-course-error').html('Please select vendor').show(); 
		    		 return false;
		    	 }
		    	 if(schedule==''){
		    		 $('.add-vendor-course-error').html('Please select schedule').show(); 
		    		 return false;
		    	 }
		    	 if(location==''){
		    		 $('.add-vendor-course-error').html('Please select location').show(); 
		    		 return false;
		    	 }
		    	 if(price==''){
		    		 $('.add-vendor-course-error').html('Please enter course price').show(); 
		    		 return false;
		    	 }
		    	// data:{'courseId':courseid,'vendorIds':JSON.stringify(vendorIds),'price':price},
		    	 $.ajax({
			             type:'post',
			             url:'insertSchedule',
			             data:{'courseId':courseid,'vendorId':vendorid,'price':price,'location':location,'scheduleStart':scheduleStart,'scheduleEnd':scheduleEnd,'trainingType':trainingType},
			             success:function(data){
			                 $('.add-vendor-course-success').html('Course scheduled '+data).show();
			             },
			             error:function(err) {
			                 $('.add-vendor-course-error').html('Course already scheduled ').show(); 
			              }
	         });
		    }); 
			$("#jq-schedule-end").datepicker({
					dateFormat : "yy-mm-dd"
			}); 
			$("#jq-schedule-start").datepicker({
				dateFormat : "yy-mm-dd"
		}); 
    });
</script>
<div class="row">
	<div class="col-md-6">
		<div class="row">
			<div class="col-sm-3">
				<label>Select Course :</label>
			</div>
			<div class="col-sm-9">
				<select class="form-control" id="jq-course-name-sel">
					<option value="000" selected="selected">--Select course--</option>
					<?php foreach($courses as $course){ ?>
					<option value="<?php echo $course['id']?>">
					<?php echo $course['name']?>
					</option>
					<?php }?>
				</select>
			</div>
		</div>
		<p>&nbsp; </p>
		<div class="row">
			<div class="col-sm-3">
				<label>Location </label>
			</div>
			<div class="col-sm-9">
				<select class="form-control" id="jq-location">
					<option>Delhi/NCR </option>
					<option>Bangalore </option>
					<option>Chennai </option>
					<option>Chandigarh</option>
					<option>Hyderabad </option>
					<option>Agra</option>
					<option>Ahmedabad </option>
					<option>Ajmer</option>
					<option>Aligarh</option>
					<option>Allahabad</option>
					<option>Ambattur</option>
					<option>Amravati</option>
					<option>Amritsar</option>
					<option>Asansol</option>
					<option>Aurangabad</option>
					<option>Bareilly</option>
					<option>Belgaum</option>
					<option>Bhavnagar</option>
					<option>Bhilai Nagar</option>
					<option>Bhiwandi</option>
					<option>Bhopal</option>
					<option>Bhubaneswar</option>
					<option>Bikaner</option>
					<option>Coimbatore</option>
					<option>Dehradun</option>
					<option>Dhanbad</option>
					<option>Durgapur</option>
					<option>Faridabad</option>
					<option>Firozabad</option>
					<option>Gaya</option>
					<option>Gorakhpur</option>
					<option>Gulbarga</option>
					<option>Guntur</option>
					<option>Gwalior</option>
					<option>Indore</option>
					<option>Jabalpur</option>
					<option>Jaipur</option>
					<option>Jalandhar</option>
					<option>Jalgaon</option>
					<option>Jammu</option>
					<option>Jamnagar</option>
					<option>Jamshedpur</option>
					<option>Jhansi</option>
					<option>Jodhpur</option>
					<option>Kalyan & Dombivali</option>
					<option>Kanpur</option>
					<option>Kochi</option>
					<option>Kolapur</option>
					<option>Kolkata </option>
					<option>Kota</option>
					<option>Loni</option>
					<option>Lucknow</option>
					<option>Ludhiana</option>
					<option>Madurai</option>
					<option>Maheshtala</option>
					<option>Malegoan</option>
					<option>Mangalore</option>
					<option>Meerut</option>
					<option>Moradabad</option>
					<option>Mumbai </option>
					<option>Mysore</option>
					<option>Nagpur</option>
					<option>Nanded Waghala</option>
					<option>Nashik</option>
					<option>Nellore</option>
					<option>Patna</option>
					<option>Pimpri & Chinchwad</option>
					<option>Pune</option>
					<option>Raipur</option>
					<option>Rajkot</option>
					<option>Ranchi</option>
					<option>Saharanpur</option>
					<option>Salem</option>
					<option>Sangli Miraj Kupwad</option>
					<option>Siliguri</option>
					<option>Solapur</option>
					<option>Srinagar</option>
					<option>Surat</option>
					<option>Thane</option>
					<option>Thiruvananthapuram</option>
					<option>Tiruchirappalli</option>
					<option>Tirunelveli</option>
					<option>Udaipur</option>
					<option>Ujjain</option>
					<option>Ulhasnagar</option>
					<option>Vadodara</option>
					<option>Varanasi</option>
					<option>Vasai Virar</option>
					<option>Vijayawada</option>
					<option>Visakhapatnam</option>
					<option>Warangal</option>
				</select>
			</div>
		</div>
		<p>&nbsp; </p>
		<div class="row">
			<div class="col-sm-3">
				<label>Course Price :</label>
			</div>
			<div class="col-sm-3">
				<input type="text" id="jq-price" class="form-control" style="width: 100px" />
			</div>
			<div class="col-sm-3">
				<label>Training type :</label>
			</div>
			<div class="col-sm-3">
				 <select class="form-control" id="jq-training-type">
				 	<option >--Select training type--</option>
				 	<option>Instructor led training</option>
				 	<option>Virtual training</option>
				 	<option>E learning </option>
				 	<option>Conference/Events</option>
				 </select>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="row">
			<div class="col-sm-3">
				<label>Select Vendor :</label>
			</div>
			<div class="col-sm-9">
				<select class="form-control" id="jq-vendor-name-sel">
					<option value="000" selected="selected">--Select Vendor--</option>
					<?php foreach($vendors as $vendor){ ?>
					<option value="<?php echo $vendor['id']?>">
					<?php echo $vendor['name']?>
					</option>
					<?php }?>
				</select>
			</div>
		</div>
		<p>&nbsp; </p>
		<div class="row">
			<div class="col-sm-3">
				<label>Schedule Start Time</label>
			</div>
			<div class="col-sm-3">
				<input type="date" id="jq-schedule-start" placeholder="Schedule"
					class="form-control">
			</div>
			<div class="col-sm-3">
				<label>Schedule End Time</label>
			</div>
			<div class="col-sm-3">
				<input type="date" id="jq-schedule-end" placeholder="Schedule"	class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="text-align: right">
				<p>&nbsp; </p>
				<div class="add-vendor-course-success"	style="color: green;"></div>
				<div class="add-vendor-course-error"style="color: red;"></div>
				<button id="jq-add-vendor-course" class="btn btn-default">Submit</button>
			</div>
		</div>
		<p>&nbsp; </p>
	</div>
</div>


<p>&nbsp; </p>