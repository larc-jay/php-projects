<script type="text/javascript">
$(function() {
	goToCart();
});
</script>

<div class ="row" >
	<div class="col-md-12">
		<?php foreach ($coursedetails as $course){
			$ct=0;
			?> 
			<div class ="row white-bg-ns" style="padding:0 20px;min-height:65px">
				<div class="col-sm-3 verticalign" >
						<a href="<?=WEBPATH?>courses/coursedetails/<?=$course['slug']?>/<?=$coursename->slug?>/<?=$course['cvid']?>" style="font-size:16px;color:#0088cc;"> 
							<?php echo $course['cname']; ?>
						</a>
				</div>
				<?php foreach($schedules as $schedule){
					if($schedule['course_vendor_map_id'] ==$course['cvid'] && $schedule['location']==$defaultloc) {?>
						<div class="col-sm-3"> 	
							<p><?php echo date_format(date_create($schedule['schedule_start_time']),'M d, Y').' - '.date_format(date_create($schedule['schedule_start_time']),'M d, Y').'<br />Rs. '. $this->cart->format_number($schedule['course_price'])?></p>
							<p><a href="#enroll-now" _schedul_="<?=$schedule['id']?>" class="jq-enroll-now  blue-bg-btn">ENROLL NOW</a>  </p>
						</div>
				<?php $ct++;}}?>
				<?php if($ct==0){echo '<div class="col-sm-9 verticalign" ><b>Oops! <br>No schedule availabe in your city</b></div>';}?>
			</div>	 
		<?php }	?>
		</div>
</div>