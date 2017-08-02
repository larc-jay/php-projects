<h1>Course enrollments</h1>
<div class="row row-bg">
	<div class="col-sm-2">
		<label>User ID</label>
	</div>
	<div class="col-sm-2">
		<label>Course ID</label>
	</div>
	<div class="col-sm-2">
		<label>Course Fee</label>
	</div>
	<div class="col-sm-3">
		<label>Payment ID</label>
	</div>
	<div class="col-sm-3">
		<label>Payment Status</label>
	</div>
</div>
<?php foreach($enrollments as $user){?>
<div class="row">
	<div class="col-sm-2">
	<?=$user['user_id']?>
	</div>
	<div class="col-sm-2">
	<?=$user['course_id']?>
	</div>
	<div class="col-sm-2">
	<?=$user['course_fee']?>
	</div>
	<div class="col-sm-3">
	<?=$user['payment_id']?>
	</div>
	<div class="col-sm-3">
	<?=$user['payment_status']?>
	</div>
</div>
	<?php }?>