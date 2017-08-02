<script src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(function() {
    	$('#jq-add-course-details').click(function(){
        	$('.add-course-details-success').hide();
        	$('.add-course-details-error').hide();
			var vendor = $("#jq-vendor-name-sel option:selected").val();
			var course = $("#jq-course-name-sel option:selected").val();
			var details = CKEDITOR.instances['jq-course-detail'].getData();
			var highlight = CKEDITOR.instances['jq-highlights'].getData();
			var overview = CKEDITOR.instances['jq-overview'].getData();
			var agenda = CKEDITOR.instances['jq-agenda'].getData();
			var whocan = CKEDITOR.instances['jq-whocan'].getData();
			var certification = CKEDITOR.instances['jq-certification'].getData();
			var benefit = CKEDITOR.instances['jq-benefits'].getData();
			
		if(course=='000'){
	    		 $('.add-course-details-error').html('Please select course').show(); 
	    		 return false;
	    	 }
	    	 if(vendor=='000'){
	    		 $('.add-course-details-error').html('Please select vendor').show(); 
	    		 return false;
	    	 }
	    	 if(details==null || details==""){
	    		 $('.add-course-details-error').html('Course details is empty').show(); 
	    		 return false;
	    	 }
			$.ajax({
	              type:'post',
	              url:'addCourseDetails',
	              data:{'vendor':vendor,'course':course,'details':details,'highlight':highlight,'overview':overview,'agenda':agenda,'whocan':whocan,'certification':certification,'benefit':benefit},
	              success:function(data){
	                  $('.add-course-details-success').html('Course details added/updated'+data).show();
	              },
	              error:function(err) {
	                  $('.add-course-details-error').html('Course details already exists').show(); 
	               }
			});
    	});
        
    	$('#view-highlights').click(function(){
    		$( ".highlights" ).toggle()
    		   if($('#view-highlights').text()=='+Highlights'){
    			$('#view-highlights').html('-Highlights');
    		   }else{
    			$('#view-highlights').html('+Highlights');
    		  }
    	});
    	$('#view-overview').click(function(){
    		$( ".overview" ).toggle()
    		   if($('#view-overview').text()=='+Overview'){
    			$('#view-overview').html('-Overview');
    		   }else{
    			$('#view-overview').html('+Overview');
    		  }
    	});
    	$('#view-agenda').click(function(){
    		$( ".agenda" ).toggle()
    		   if($('#view-agenda').text()=='+Agenda'){
    			$('#view-agenda').html('-Agenda');
    		   }else{
    			$('#view-agenda').html('+Agenda');
    		  }
    	});
    	$('#view-whocan').click(function(){
    		$( ".whocan" ).toggle()
    		   if($('#view-whocan').text()=='+Who Can Attend'){
    			$('#view-whocan').html('-Who Can Attend');
    		   }else{
    			$('#view-whocan').html('+Who Can Attend');
    		  }
    	});
    	$('#view-certification').click(function(){
    		$( ".certification" ).toggle();
    		   if($('#view-certification').text()=='+Certification Details'){
    			$('#view-certification').html('-Certification Details');
    		   }else{
    			$('#view-certification').html('+Certification Details');
    		  }
    	});
    	$('#view-benefits').click(function(){
    		$( ".benefits" ).toggle();
    		   if($('#view-benefits').text()=='+Benefits'){
    			$('#view-benefits').html('-Benefits');
    		   }else{
    			$('#view-benefits').html('+Benefits');
    		  }
    	});

    	 $("#jq-vendor-name-sel").change(function() {
    		 	$('.add-course-details-success').hide();
				var vid  = $('#jq-vendor-name-sel').val();
				var cid  = $('#jq-course-name-sel').val();
				if(vid=='000' || cid=='000'){
					return false;
				}
				$.ajax({
		              type:'post',
		              url:'getCourseDetails',
		              dataType:'json',
		              data:{'vid':vid,'cid':cid},
		              success:function(data){
		            	  CKEDITOR.instances['jq-course-detail'].setData(data.details);
		            	  CKEDITOR.instances['jq-highlights'].setData(data.highlights);
		            	  CKEDITOR.instances['jq-overview'].setData(data.overview);
		            	  CKEDITOR.instances['jq-agenda'].setData(data.agenda);
		            	  CKEDITOR.instances['jq-whocan'].setData(data.who_can_attend);
		            	  CKEDITOR.instances['jq-certification'].setData(data.certification_details);
		            	  CKEDITOR.instances['jq-benefits'].setData(data.benefits);
		              },
		              error:function(err) {
		                  alert('Error');
		               }
				});
    	 });
    	 $("#jq-course-name-sel").change(function() {
    		 	$('.add-course-details-success').hide();
    			var vid  = $('#jq-vendor-name-sel').val();
				var cid  = $('#jq-course-name-sel').val();
				if(vid=='000' || cid=='000'){
					return false;
				}
				$.ajax({
		              type:'post',
		              url:'getCourseDetails',
		              dataType:'json',
		              data:{'vid':vid,'cid':cid},
		              success:function(data){
		            	  CKEDITOR.instances['jq-course-detail'].setData(data.details);
		            	  CKEDITOR.instances['jq-highlights'].setData(data.highlights);
		            	  CKEDITOR.instances['jq-overview'].setData(data.overview);
		            	  CKEDITOR.instances['jq-agenda'].setData(data.agenda);
		            	  CKEDITOR.instances['jq-whocan'].setData(data.who_can_attend);
		            	  CKEDITOR.instances['jq-certification'].setData(data.certification_details);
		            	  CKEDITOR.instances['jq-benefits'].setData(data.benefits);
		              },
		              error:function(err) {
		                  alert('Error');
		               }
				});
    	 });
    });
</script>
<p>&nbsp;</p>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-sm-2">
				<label>Select Course :</label>
			</div>
			<div class="col-sm-4">
				<select class="form-control" id="jq-course-name-sel">
					<option value="000" >--Select course--</option>
					<?php foreach($courses as $course){ ?>
					<option value="<?php echo $course['id']?>">
					<?php echo $course['name']?>
					</option>
					<?php }?>
				</select>
			</div>

			<div class="col-sm-2">
				<label>Select Vendor :</label>
			</div>
			<div class="col-sm-4">
				<select class="form-control" id="jq-vendor-name-sel">
					<option value="000" >--Select Vendor--</option>
					<?php foreach($vendors as $vendor){ ?>
					<option value="<?php echo $vendor['id']?>">
					<?php echo $vendor['name']?>
					</option>
					<?php }?>
				</select>
			</div>
		</div>
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-sm-12">
				<p style="color: #0088cc;font-size:1.3em;text-align: left;">Course details</p>
					<div class="course-details" >
						<textarea class="form-control" rows="3"  id="jq-course-detail"></textarea>
						<script>CKEDITOR.replace('jq-course-detail');</script>
					</div>
				</div>	
		</div>
		<div class="row">
			<div class="col-sm-12">
				<p style="color: #0088cc;font-size:1.3em;text-align: left;"><a href="#highilight" id="view-highlights">+Highlights</a></p>
				<div class="highlights" style="display: none">
							<textarea class="form-control" rows="3"	 id="jq-highlights"></textarea> 
							<script>CKEDITOR.replace('jq-highlights');</script>
				</div>
		</div>		
		<div class="row">
			<div class="col-sm-12">
				<p style="color: #0088cc;font-size:1.3em;text-align: left;"><a href="#overview" id="view-overview">+Overview</a></p>
				<div class="overview" style="display: none">
							<textarea class="form-control" rows="3"	id="jq-overview"></textarea> 
							<script>CKEDITOR.replace('jq-overview');</script>
				</div>
			</div>
		</div>		
		<div class="row">
			<div class="col-sm-12">
				<p style="color: #0088cc;font-size:1.3em;text-align: left;"><a href="#agenda" id="view-agenda">+Agenda</a></p>
					<div class="agenda" style="display: none">
								<textarea class="form-control" rows="3"	 id="jq-agenda"></textarea> 
								<script>CKEDITOR.replace('jq-agenda');</script>
					</div>
				</div>	
		</div>
		<div class="row">
			<div class="col-sm-12">
				<p style="color: #0088cc;font-size:1.3em;text-align: left;"><a href="#whocanattend" id="view-whocan">+Who Can Attend</a></p> 
				<div class="whocan" style="display: none">
							<textarea class="form-control" rows="3"	 id="jq-whocan"></textarea> 
							<script>CKEDITOR.replace('jq-whocan');</script>
				</div>
			</div>		
		</div>
		<div class="row">
			<div class="col-sm-12">
				<p style="color: #0088cc;font-size:1.3em;text-align: left;"><a href="#certification" id="view-certification">+Certification Details</a></p>
				<div class="certification"  style="display: none">
							<textarea class="form-control" rows="3"	 id="jq-certification"></textarea> 
							<script>CKEDITOR.replace('jq-certification');</script>
				</div>
		</div>		
		</div>	
		<div class="row">
			<div class="col-sm-12">
				<p style="color: #0088cc;font-size:1.3em;text-align: left;"><a href="#benefits" id="view-benefits">+Benefits</a></p>
				<div class="benefits" style="display: none">
							<textarea class="form-control" rows="3"	 id="jq-benefits"></textarea> 
							<script>CKEDITOR.replace('jq-benefits');</script>
				</div>
			</div>
		</div>	
	</div>
</div>
<div class="row">
	<div class="col-md-12" style="text-align: center">
		<div class="add-course-details-success"	style="color: green; "></div>
		<div class="add-course-details-error" style="color: red; "></div>
		<button id="jq-add-course-details" class="btn btn-default">Submit</button>
	</div>
</div>
     
