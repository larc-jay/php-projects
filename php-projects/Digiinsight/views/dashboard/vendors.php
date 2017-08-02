<script src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(function() {
    	vendorReady();
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
		 		   <button class="btn-1" id ="add-vendor">Add Vendor</button>
		 		   <button class="btn-1" id="add-vendor-course">Vendor Course Map</button>
		 		   <button class="btn-1" id="add-course-details">Course Details</button>
		 		</div>
		 	</div>
		 	<div class="row add-vendor-tab" style="display: none">
		 		<div class="col-md-12" style="text-align: center">
		 		<p>&nbsp; </p>
				 <table border="0" width="55%" align="center">
					<tr>
						<td align="right" width="30%"><label>Company Name :</label></td>
						<td align="left" > <input type="text" id="jq-company-name" class="form-control"/></td>
					</tr>
					<tr>
						<td align="right" width="10%"><label>Contact Person :</label></td>
						<td align="left" > <input type="text" id="jq-contact-person" class="form-control"/></td>
					</tr>
					<tr>
						<td align="right" width="10%"><label>Designation :</label></td>
						<td align="left" > <input type="text" id="jq-designation" class="form-control"/></td>
					</tr>
					<tr>
						<td align="right" width="10%"><label>Mobile :</label></td>
						<td align="left" > <input type="text" id="jq-mobile" class="form-control"/></td>
					</tr>
					<tr>
						<td align="right" width="10%"><label>Phone :</label></td>
						<td align="left" > <input type="text" id="jq-phone" class="form-control"/></td>
					</tr>
					<tr>
						<td align="right" width="10%"><label>Address :</label></td>
						<td align="left" > <input type="text" id="jq-address" class="form-control"/></td>
					</tr>
					<tr>
						<td align="right" width="10%"><label>Social Media Links :</label></td>
						<td align="left" > <input type="text" id="jq-social-media" class="form-control"/></td>
					</tr>
					<tr>
						<td align="right" width="10%"><label>Company Web Url :</label></td>
						<td align="left" > <input type="text" id="jq-web-url" class="form-control"/></td>
					</tr>
					<tr>
						<td align="right" width="10%"><label>Blog Url :</label></td>
						<td align="left" > <input type="text" id="jq-blog-url" class="form-control"/></td>
					</tr>
					
					<tr>
						<td align="center" colspan="100%" height="60" valign="bottom">
						     <div class="add-vendor-success" style="color: green; width:200px;height:30px;display:none">  </div>
						     <div class="add-vendor-error" style="color: green; width:200px;height:30px;display:none">  </div>
							<button id="jq-vendor-submit" class="btn btn-default">Add Vendor</button> 
						</td>
					</tr>	
				</table>
		 		</div>
		 	</div>
		 	<div class="row add-vendor-course-map-tab" style="display: none">
		 		<div class="col-md-12" style="text-align: center">
		 		 	<div id="jq-course-sel" style="width: 100%;height:100%"> </div>
		 		</div>
		 	</div>
		 		<div class="row add-course-details-tab" style="display: none">
		 		<div class="col-md-12" style="text-align: center">
		 		 	<div id="jq-course-details" style="width: 100%;height:100%"> </div>
		 		</div>
		 	</div>
		 	
		</div>
	</div>
</div>
</div>
