<script src="<?php echo base_url()?>_static/assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function() {
    	courseReady();
    });
</script>
<?php if(!isset($this->session->di_admin_logged_in) && !$this->session->di_admin_logged_in){
	redirect(base_url().'dashboard/');
}
?>
<div class="col-md-10">
	<div class="row">
		<div class="col-md-12" style="text-align:center">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#add-parent-course-tab">Add Parent	Course</a></li>
					<li><a href="#add-vendor-tab">Add Vendor</a></li>
					<li><a href="#add-child-course-tab" class="add-child-course-tab">Add Child Course</a></li>
					<li><a href="#vendor-course-map-tab" class="vendor-course-map-tab">Schedule Course</a></li>
					<li><a href="#course-details-tab" class="course-details-tab">Course Details</a></li>
					<li><a href="#course-desc-tab" class="course-desc-tab">Course Description</a></li>
				</ul>
				<div class="tab-content" style="border: 1px solid #ccc;">
					<div id="add-parent-course-tab" class="tab-pane fade in active">
						<div class="row">
							<div class="col-md-12" style="text-align: center">
								<p>&nbsp; </p>	
									<h3><u>Add Parent Course</u></h3>
								<p>&nbsp;</p>
								<div class="row">
									<div class="col-sm-3">
										<label>Parent Course Name :</label>
									</div>
									<div class="col-sm-6">
										<input type="text" id="jq-parent-course-name"	class="form-control" class="form-control" />
										<div class="add-course-error" style="color: red;"></div>
										<div class="add-success" style="color: green;">	</div>
									</div>

									<div class="col-sm-3">
										
										<button id="jq-parent-course" class="btn btn-default">Add Parent Course</button>
									</div>
								</div>
							</div>
						</div>
						<p>&nbsp; </p>	
					</div>
					<div id="add-child-course-tab" class="tab-pane fade">
						<div class="row">
							<div class="col-md-12" style="text-align: center">
								<h3><u>Add Child Course</u></h3>
								<div id="jq-parent-course-sel" style="width: 100%; height: 100%">
								</div>
							</div>
						</div>
					</div>
					<div id="add-vendor-tab" class="tab-pane fade">
						<h3><u>Add Vendor</u></h3>
						<div class="row" style="text-align: right;">
									<div class="col-sm-2"><label>Company Name :</label></div>
									<div class="col-sm-4"><input type="text" id="jq-company-name" class="form-control"/></div>
									<div class="col-sm-2"><label>Contact Person :</label></div>
									<div class="col-sm-4"><input type="text" id="jq-contact-person" class="form-control"/></div>
						</div>
						<div class="row" style="text-align: right;">
									<div class="col-sm-2"><label>Designation :</label></div>
									<div class="col-sm-4"><input type="text" id="jq-designation" class="form-control"/></div>
									<div class="col-sm-2"><label>Mobile :</label></div>
									<div class="col-sm-4"><input type="text" id="jq-mobile" class="form-control"/></div>
						</div>
						<div class="row" style="text-align: right;">
									<div class="col-sm-2"><label>Phone :</label></div>
									<div class="col-sm-4"><input type="text" id="jq-phone" class="form-control"/></div>
									<div class="col-sm-2"><label>Company Web Url :</label></div>
									<div class="col-sm-4"><input type="text" id="jq-web-url" class="form-control"/></div>								
						</div>
						<div class="row" style="text-align: right;">
									<div class="col-sm-2"><label>Email :</label></div>
									<div class="col-sm-4"><input type="text" id="jq-email" class="form-control"/></div>
									<div class="col-sm-6"></div>
						</div>	
						<div class="row" style="text-align: right;">
									<div class="col-sm-2"><label>Social Media Links :</label></div>
									<div class="col-sm-10"><input type="text" id="jq-social-media" class="form-control"/></div>
						</div>	
						<div class="row" style="text-align: right;">
							<div class="col-sm-2"><label>Address :</label></div>
							<div class="col-sm-10"> <textarea rows="3" id="jq-address" class="form-control"></textarea></div>
						</div>			
						<p>&nbsp; </p>
						<div class="row" style="text-align: center;">
									<div class="col-sm-12"> 
									 	<div class="add-vendor-success" style="color: green; ">  </div>
						     			<div class="add-vendor-error" style="color: red;">  </div>
										<button id="jq-vendor-submit" class="btn btn-default">Add Vendor</button> 
									</div>
						</div>	
						<p>&nbsp; </p>																			
					</div>
					<div id="vendor-course-map-tab" class="tab-pane fade">
						<h3><u>Schedule Course</u></h3>
						<div id="jq-course-sel" style="width: 100%;height:100%"> </div>
					</div>
					<div id="course-details-tab" class="tab-pane fade">
						<h3>Course Details</h3>
						<div id="jq-course-details" style="width: 100%;height:100%"> </div>
					</div>
					<div id="course-desc-tab" class="tab-pane fade">
						<div id="jq-course-desc" style="width: 100%;height:100%"> </div>
					</div>
		</div>
	</div>
</div>
</div>
