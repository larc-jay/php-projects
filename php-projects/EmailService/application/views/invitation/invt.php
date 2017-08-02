<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	   <?php if(isset($this->session->logged_in) && $this->session->logged_in){?>
						<?php }else{
						redirect(base_url());
						}?>
<?php echo form_open('api/send'); ?>
<div class="page-bg">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-10">
					<textarea rows="3" cols="80" placeholder="Enter Email's line seperated " name="emails"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<input type="submit" value="Send Invitation" />
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<?php echo form_close(); ?>
</div>
