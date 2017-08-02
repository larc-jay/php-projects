<script src="<?php echo base_url()?>_static/assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function() {
    	courseReady();
    	 $(".nav-tabs a").click(function(){
    	        $(this).tab('show');
    	    });
    });
</script>
<?php if(!isset($this->session->di_admin_logged_in) && !$this->session->di_admin_logged_in){
	redirect(base_url().'index.php/dashboard/');
 }
 ?>
<div class="col-md-10">
	<div class="row">
		<div class="col-md-12">
		 	<div class="row" style="text-align: center">
		 		<div class="col-md-12">
		 		
<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a href="#home">Home</a></li>
    <li><a href="#menu1">Menu 1</a></li>
    <li><a href="#menu2">Menu 2</a></li>
    <li><a href="#menu3">Menu 3</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
</div>				 		
					<button class="btn-1" id="add-parent-course">Add Parent Course</button>
		 		   <button class="btn-1" id ="add-course">Add Course</button>
		 		   <button class="btn-1" id ="add-vendor">Add Vendor</button>
		 		   <button class="btn-1" id="add-vendor-course">Vendor Course Map</button>
		 		   <button class="btn-1" id="add-course-details">Course Details</button>
		 		</div>
		 	</div>
		 	<div class="row add-parent-course" style="display: none">
		 		<div class="col-md-12" style="text-align: center">
		 		<p>&nbsp; </p>
				 <div class="row">
			 		<div class="col-sm-3">
						<label>Parent Course Name :</label>
					</div>	
					<div class="col-sm-6">	
						 <input type="text" id="jq-parent-course-name" class="form-control" class="form-control"/>
					</div>
				
			 		<div class="col-sm-3">
						     <div class="add-success" style="color: green; width:200px;height:30px;display:none">  </div>
						     <div class="add-course-error" style="color: green; width:200px;height:30px;display:none">  </div>
							<button id="jq-parent-course" class="btn btn-default">Add Parent Course</button> 
					</div>
		 		</div>
		 	</div>
		 	</div><p>&nbsp; </p>
		 	<div class="row add-course" style="display: none">
		 		<div class="col-md-12" style="text-align: center">
		 		<p>&nbsp; </p>
		 		 <div id="jq-parent-course-sel" style="width: 100%;height:100%"> </div>
		 		</div>
		 	</div>
	</div>
</div>
</div>
