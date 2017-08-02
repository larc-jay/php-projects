	<script src="<?php echo base_url()?>_static/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript">
    $(function() {
    	coursedetails();
    });
	</script>
<div class="contact-for-customization" style="display: none"></div>	
<div class="row pdngr cd-bg">	
	<!--div class="col-md-2  ">
	<br /><br /><br />
		<div class="cd-links">
			<ul class="nav nav-tabs">
				<li class="active tabcdl">	<a href="#course-details">Course Details</a></li>
				<li class=" tabcdl">	<a href="#faq">FAQ's</a></li>
				<li class=" tabcdl">	<a href="#reviews">Reviews</a></li>
			</ul>
		</div>
	</div-->
	<div class="col-md-12">
					<div class="row">	
					<div class="col-md-10">
						<h1 class="thin-ft cd-heading"> <?php echo $coursename; ?> </h1>
						<span class="cd-heading cd-vendor"><b>Course Provider :</b> <?=$vendorname?></span><br />
						<div style="color:#00ff00;font-size:1em; padding: 10px 0 25px 0px;">
							<span class="glyphicon glyphicon-star-empty "></span>&nbsp;36 Reviews  &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp;   
							<span class="glyphicon glyphicon-bookmark"></span>&nbsp;786 Enrollments
						</div>
						<br/>
					</div>
					<div class="col-md-2">
						<div  style="padding-top:18%;">
							<span style="font-weight: 300;font-size:17px">Share </span>
							<a href="https://www.facebook.com/digiinsight/" class="social-icon-fs"> <i class="fa fa-facebook"></i></a>
	 	 					<a href="https://twitter.com/InsightDigi" class="social-icon-ts"> <i class="fa fa-twitter"></i></a>
	 	 					<a href="https://www.linkedin.com/company/digiinsight" class="social-icon-ls"> <i class="fa fa-linkedin"></i></a>
						</div>
					</div>
			</div>	
	</div>
</div>		

<div class="row grl-bg pdngr">	
	<div class="col-md-12">
		<div class="row">	
				<div class="col-md-9   grl-bg">
					<p style="padding:10px 0;font-size:25px;font-weight:300;color:#0088cc">Course Details</p>
					 <div class="row white-bg">
				      <div class="col-sm-12"  id="course-details">
						<?php if($coursesdetails!=null){?>
								<ul class="nav nav-tabs-cd">
									<li class="active tab-cd"><a href="#overview-tab">Overview</a></li>
									<!--li class=" tab-cd"><a href="#details-tab">Details</a></li -->
									<li class=" tab-cd"><a href="#agenda-tab">Agenda</a></li>
									<li class=" tab-cd"><a href="#benefit-tab" class="add-child-course-tab">Benefits</a></li>
									<!-- li class=" tab-cd"><a href="#highlights-tab" class="add-child-course-tab">Highlights</a></li -->
									<li class=" tab-cdb"><a href="#whocan-tab" class="course-details-tab">Who can attend?</a></li>
									<li class=" tab-cdb"><a href="#certification-tab" class="vendor-course-map-tab">Certification Details</a></li>
								</ul>
								<div class="tab-content" style="border-top: 1px solid #0088cc;">
									<div id="overview-tab" class="tab-pane fade in active">
										<div class="pdng txt-color-b"><?php echo $coursesdetails->overview;?></div>
									</div>
									<div id="agenda-tab" class="tab-pane fade">
										<div class="pdng txt-color-b"><?php  echo $coursesdetails->agenda;?></div>
									</div>
									<div id="benefit-tab" class="tab-pane fade">
										<div class="pdng txt-color-b"><?php  echo $coursesdetails->benefits;?></div>																
									</div>
									<div id="certification-tab" class="tab-pane fade">
										<div class="pdng txt-color-b"><?php  echo $coursesdetails->certification_details;?></div>
									</div>
									<div id="whocan-tab" class="tab-pane fade">
										<div class="pdng txt-color-b"><?php  echo $coursesdetails->who_can_attend;?></div>
									</div>
								</div>
								<p>&nbsp;</p>
								<?php }else{?>
									<h3>Course Details not available</h3>
								<?php }?>
							</div>
						</div>	
						<p>&nbsp;</p>
						<div class="row grl-bg"  id="faq">
				     		 <div class="col-sm-12">
				     		 	<span class="heading-blue-1">Frequently Asked Questions</span>
				     		 </div>
				     	</div>	
				     	<div class="row white-bg">
				     		 <div class="col-sm-12 pdng">
				     		 	<p><strong>No FAQ's found for this product.</strong> <br />
				     		 		Please contact us with your questions. We're happy to help you.
				     		 	</p> <br />
				     		 </div>
				     		
				     	</div>	
				     	<p>&nbsp;</p>
				     	<div class="row grl-bg"  id="reviews">
				     		 <div class="col-sm-12">
				     		 	<span class="heading-blue-1">Reviews</span>
				     		 </div>
				     	</div> 
				     	<div class="row white-bg">
				     		 <div class="col-sm-12 pdng">
				     		 	<p><strong>There are no reviews yet.</strong> <br />
				     		 	</p> <br />
				     		 </div>
				     		
				     	</div>		
				</div>
				<div class="col-md-3"  style="padding-left: 20px;">
				   <div class="row">
				      <div class="col-sm-12">
				      		<p style="padding-top:35px ">&nbsp;</p>
							<div class="pdng gr-bg aligncenter">
								<h4 style="margin-top:5px;">For Corporate/Group Training</h4>
								<button class="blue-bg pdng10" id="jq-contact-cust">Contact for Customization</button>
							</div>
						</div>
						</div>		
					    <div class="row">
					    	<div class="col-sm-6">
					    	<p style="font-weight:300;margin-top:5px;font-size:15px;">Showing for <a href="#" class="loc"></a>:</p>
					    	</div>
				     	 <div class="col-sm-6">
								<div class="styled">	
										<select class="search-by-location  caret">
											<option _cvmid="<?=$cvmid?>" value="000">Change Location</option>
											<?php foreach($location as $loc){?>
												<option value="<?=$loc?>" _cvmid="<?=$cvmid?>"><?=$loc?></option>
											<?php }?>
										</select>
									</div>	
						</div>
						</div>	
						 <div class="row">
					    	<div class="col-sm-12">
						<div class="ggr-bg">
								<span class="headings">Scheduled Trainings</span>
							</div>	
							</div>
							</div>
					 <div class="row default-vendor">
					      <div class="col-sm-12 ">
							<?php if(sizeof($schedules)>0){?>
											<?php foreach ($coursedetails as $course){ 
												$ct=0 ;
												?>
													<div class ="row" style="background:#fff;padding:10px">
														<br />	
														<div class="col-sm-12"> 	
														<?php foreach($schedules as $schedule){
															if($schedule['course_vendor_map_id'] ==$course['cvid'] && $schedule['location']==$defaultloc) {?>
																<p><span style="font-size:18px;"><?php echo date_format(date_create($schedule['schedule_start_time']),'d M');?> -
																	<?php echo date_format(date_create($schedule['schedule_end_time']),'d M');?> (<?=$schedule['daycount']?> Days)</span>	
																<br />Rs. <?=$this->cart->format_number($schedule['course_price'])?><br />
																<a href="#enroll-now" _schedul_="<?=$schedule['id']?>"  class="jq-enroll-now blue-bg" >Book Now</a> </p>
																<hr class="solid" style="background:#f0f0f0">
														<?php $ct++;}}?>
														<?php if($ct==0){echo '<div class="col-sm-9 verticalign" ><b>No schedule available for this provider</b></div>';}?>
													</div>	 
												</div>
												<?php }	?>
								<?php }?>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="search-by-location-data" style="display:none;"></div>
							</div>
						</div>
						<div class="blue-bg alignleft pdng" style="width: 100%;">
							<div class="row">
								<div class="col-sm-12"> 
									<span class="heading-white-1">Question?</span><br>
									<span class="heading-yellow-1">Drop us a line.</span>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12"> 
									<input type="text" id="jq-name" placeholder="Your Name" class="inputtxtbox"/>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12"> 
									<input type="text" id="jq-email"  placeholder="Your Email"  class="inputtxtbox"/>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12"> 
										<input type="text" id="jq-phone" value="+91 | "  class="inputtxtbox">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12"> 
									<input type="text" id="jq-message"  placeholder="Your message"  class="inputtxtbox">
								</div>
							</div>
							<div class="row aligncenter">
								<div class="col-sm-12"> <br />
									<button class="yellow-bg" id="jq-short-msg">Submit</button>
									<div class="msg-send-success" style="color:#fff"></div><div class="msg-send-error"  style="color:red"></div>
								</div>
							</div>
						</div>
						<br /><br />
				</div>
		</div>
	</div>
</div>	