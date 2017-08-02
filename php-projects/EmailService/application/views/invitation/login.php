<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo form_open('api/invitation'); ?>
<div class="page-bg">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2">Username</div>
				<div class="col-md-3">
					<input type="text" name="username" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2">Password</div>
				<div class="col-md-3">
					<input type="password" name="passwd" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col-md-2"></div><div class="col-md-2"></div>
				<div class="col-md-8">
					<input type="submit" value="Login" />
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<?php echo form_close(); ?>
</div>
