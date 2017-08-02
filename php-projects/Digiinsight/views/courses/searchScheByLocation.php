<script type="text/javascript">
$(function() {
	goToCart();
});
</script>

<div class="row" style="background: #fff; padding: 10px">
	<br />
	<div class="col-sm-12">
	<?php foreach($schedules as $schedule){?>
		<p><span style="font-size:18px;">
		<?php echo date_format(date_create($schedule['schedule_start_time']),'d M');?>
			-
			<?php echo date_format(date_create($schedule['schedule_end_time']),'d M');?>
			(
			<?=$schedule['daycount']?>
			Days)</span> <br />Rs.
			<?=$this->cart->format_number($schedule['course_price'])?>
			<br /> <a href="#enroll-now" _schedul_="<?=$schedule['id']?>" class="jq-enroll-now blue-bg">Book Now</a>
		</p>
		<hr class="solid" style="background:#f0f0f0">
		<?php }?>
	</div>
</div>
