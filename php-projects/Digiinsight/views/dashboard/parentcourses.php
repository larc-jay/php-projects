<script type="text/javascript">
    $(function() {
 	   $("#jq-add-child-course").click(function(){
		   
	    	 $('.add-child-success').hide();
	    	 $('.add-child-course-error').hide();
	    	 var id=$('#jq-parent-course-name-sel').val();
	    	 var name = $('#jq-child-course-name').val();
	    	 var vendorid = $('#jq-vendor-name-sel').val();
	    	 if(id=='000'){
	    		 $('.add-child-course-error').html('Please select parent course').show(); 
	    		 return false;
	    	 }
	    	 if(vendorid=='000'){
	    		 $('.add-vendor-error').html('Please select Vendor').show(); 
	    		 return false;
	    	 }
	    	 if(name=="" || name==null){
	    		 $('.enter-child-course-error').html('Enter Course Name').show(); 
	    		 return false;
	    	 }
	    	 $.ajax({
             type:'get',
             url:'addChildCourse',
             data:{'name':name,'id':id,'vendorid':vendorid},
             success:function(data){
                 $('.add-child-success').html('Course added'+data).show();
             },
             error:function(err) {
                 $('.add-child-course-error').html('Course already exists').show(); 
              }
         });
	    });
    });
</script>
<div class="row">
	<div class="col-sm-3">
		<label>Select Parent Course :</label>
	</div>

	<div class="col-sm-6">
		<select class="form-control" id="jq-parent-course-name-sel">
			<option value="000">--Select parent course--</option>
			<?php foreach($parents as $row){ ?>
			<option value="<?php echo $row['id']?>">
			<?php echo $row['name']?>
			</option>
			<?php }?>
		</select>
		<div class="add-child-course-error" style="color: red;"></div>
	</div>
	<div class="col-sm-3"></div>
</div>
<p>&nbsp;</p>
<div class="row">
	<div class="col-sm-3">
		<label>Select Vendor :</label>
	</div>
	<div class="col-sm-6">
		<select class="form-control" id="jq-vendor-name-sel">
			<option value="000" selected="selected">--Select Vendor--</option>
			<?php foreach($vendors as $vendor){ ?>
			<option value="<?php echo $vendor['id']?>">
			<?php echo $vendor['name']?>
			</option>
			<?php }?>
		</select>
		<div class="add-vendor-error" style="color: red;"></div>
	</div>
	<div class="col-sm-3"></div>
</div>
<p>&nbsp;</p>
<div class="row">

	<div class="col-sm-3">
		<label>Course Name :</label>
	</div>
	<div class="col-sm-6">
		<input type="text" id="jq-child-course-name" class="form-control" class="form-control" />
		<div class="enter-child-course-error" style="color: red;"></div>
	</div>
	<div class="col-sm-3"></div>
</div>
<p>&nbsp;</p>
<div class="row">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<div class="add-child-success" style="color: green;"></div>
		<button id="jq-add-child-course" class="btn btn-default">Add Course</button>
	</div>
	<div class="col-sm-4"></div>
</div>
<p>&nbsp;</p>
