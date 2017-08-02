<script type="text/javascript">
$(function() {
	searchByLoc();
});
</script>
<div class="contact-for-customization" style="display: none"></div>
<div class ="row vendor-index">
	<div <?php if($description==null){?> class="col-md-12 pdng aligncenter" <?php }else{?>class="col-md-6 pdng " <?php }?>>
			<h2 class="heading-blue-1"> <?php echo $coursename; ?> </h2>
			<p style="color:#009900;font-size:1em;padding-top:10px">
				<span class="glyphicon glyphicon-star-empty"></span>&nbsp;36 Reviews     
				<span class="glyphicon glyphicon-bookmark"></span>&nbsp;786 Enrollments
			</p>
			<div style="background:#162a3e ; <?php if($description==null){?>width:50%;left:25% <?php }else{?>width:70%  <?php }?>;padding:10px;opacity:0.50;margin-top:60px;position: relative;text-align:center">
				<h3 class="heading-blue-2">For Corporate / Group Training</h3>
				<button class="green-bg" id="jq-contact-cust">Contact for customization</button>
				<p style="color:#008080;font-size:1.2em;padding-top:10px"><a href="#">View vendor and their schedule</a> </p>
			</div>
			<p>&nbsp;</p>
	</div>
	<?php if($description!=null){?>
	<div class="col-md-6 pdng ">
			<div style="color:#b6b6b6; font-weight: 300;font-size:16px;padding-bottom:50px">
						<?=$description ?>	
			</div>
	</div>
	<?php }?>
</div>
<div class="row   grl-bg">
<div class="col-md-12 pdngr">
<div class="row">
	<div class="col-md-8"><h2>
			<?php if($defaultLocation>0){?>
				Provided by <?php echo count($coursedetails); ?> Vendors</h2>
			<?php }else{?>
				<span class="heading-1">We're Sorry  </span><br />
				<span class="heading-4">No Training Scheduled in your city</span><br />
				
				
			<?php }?>		
		</div>
	<div class="col-md-2 alignright">
	<br />
		<p style="font-weight:bold;margin-top:5px;font-size:16px;">Showing for <a href="#" class="loc"></a> &nbsp; &nbsp; : &nbsp; </p>
	</div>
	<div  class="col-md-2"><br /> 
		<div class="styled">
			<select class="search-by-location caret">
				<option _cid="<?=$cid?>" value="000">Change Location</option>
				<?php foreach($location as $loc){?>
					<option value="<?=$loc?>" _cid="<?=$cid?>"><?=$loc?></option>
				<?php }?>
			</select>
		</div>
	</div>
</div>
<?php if(sizeof($schedules)>0 && $defaultLocation>0){?>
<div class ="row" style="padding:20px;background:#f0f0f0;color:grey;">
	<div class="col-md-12" >
		<?php foreach ($coursedetails as $course){ 
			$ct=0 ;
			?>
			<div class ="row default-vendor white-bg cv-dt" >
				<div class="col-sm-3 verticalign" ><a href="<?=WEBPATH?>courses/coursedetails/<?=$course['slug']?>/<?=$cslug?>/<?=$course['cvid']?>" style="font-size:16px;color:#0088cc;"> <?php echo $course['cname']; ?></a></div>
				<?php foreach($schedules as $schedule){
					if($schedule['course_vendor_map_id'] ==$course['cvid'] && $schedule['location']==$defaultloc) {?>
						<div class="col-sm-3"> 	
							<p><?php echo date_format(date_create($schedule['schedule_start_time']),'M d, Y').' - '.date_format(date_create($schedule['schedule_end_time']),'M d, Y').'<br/>Rs. '. $this->cart->format_number($schedule['course_price']);?></p>
							<p><a href="#enroll-now" _schedul_="<?=$schedule['id']?>" _slug_="<?=$cslug?>"  class="blue-bg-btn jq-enroll-now" >ENROLL NOW</a> </p>
						</div>
				<?php $ct++;}}?>
				<?php if($ct==0){echo '<div class="col-sm-9 verticalign" ><b>Oops! <br/>No schedule availabe in your city</b></div>';}?>
			</div>	 
		<?php }	?>
		<div class="search-by-location-data" style="display:none;"></div>
		<br/>
	</div>
</div>
<?php }else{?>
	<div class ="row">
		<div class="col-md-9" style="padding-right: 20px;">
		    <?php if(count($location)>0){?>
		    <div class="row white-bg"> 
				    <div class="col-md-12 pdngr">	
					    <span class="heading-yellow-2">Currently the training is scheduled in following cities:</span>
					    <p>&nbsp;</p>
					    <?php foreach($location as $loc){?>
							 <a href="#search-by-city" class="schdl-other-city" ><?php echo $loc;?></a>
						<?php }?>
						 <p>&nbsp;</p>
				    </div>
		    </div>
			<?php }?>			
					
			<div class="row white-bg"> 
					<div class="col-md-12 schdl-other-city-show" style="display:none">	
					<input type="hidden" id="jq-cid" value="<?=$cid?>"/>
					<div class="search-by-location-data" style="display:none;"></div>	
					</div>
			</div>
		</div>
		<div class ="col-md-3 blue-bg pdngr">
			<p class="heading-yellow-3" align="left" style="padding: 0 20px">We value your need</p>
			<p align="left" style="padding: 0 20px">Please provide us the details of your requirement. We will try to create a customize solution for you
			</p>
			<p align="left"  style="padding: 0 20px;color:#FFC300">You can contact me on</p>
			
			<div class ="row pdngr">
				<div class ="col-sm-12">
					<input type="text" class="form-control" id="jq-name" placeholder="Name">
				</div>
			</div>
			<div class ="row pdngr">	
				<div class ="col-sm-12 ">
					<input type="text" class="form-control" id="jq-mobile" placeholder="Mobile no.">
				</div>
			</div>
			<div class ="row pdngr">
				<div class ="col-sm-12 ">
					<input type="text" class="form-control" id="jq-email" placeholder="Email ID">
				</div>
			</div>
			<div class ="row pdngr">	
				<div class ="col-sm-12 ">
				     <p align="left"  style="color:#FFC300">I am looking for training in between</p>
					<input type="text" class="form-control" id="jq-from" placeholder="From">
				</div>
			</div>
			<div class ="row pdngr">	
				<div class ="col-sm-12 ">
					<input type="text" class="form-control" id="jq-to" placeholder="To">
				</div>
			</div>	
			<div class ="row pdngr">	
				<div class ="col-sm-12  aligncenter">
				<button id="jq-submit-c" class="yellow-bg">Submit</button> 
				<div class="success-messege"></div>
				<div class="msg-error"></div>
				</div>
			</div>	
		 
		</div>
	</div>
<?php }?>

<br>
</div>
</div>