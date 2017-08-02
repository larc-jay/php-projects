<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4" style="text-align: center;">
				<?php echo validation_errors(); ?>
				<?php echo form_open('auth/register'); ?>
					<p>&nbsp;</p>
					<p>
						<input type="text" name="firstname" class="form-control"
							value="<?php echo set_value('firstname'); ?>"
							class="form-control" placeholder="Enter First Name">
					</p>
					<p>
						<input type="text" name="lastname" class="form-control"
							value="<?php echo set_value('lastname'); ?>" class="form-control"
							placeholder="Enter Last Name">
					</p>
					<p>
						<input type="text" name="email" class="form-control"
							value="<?php echo set_value('email'); ?>" class="form-control"
							placeholder="Enter Email">
					</p>
					<p>
						<input type="text" name="phone" class="form-control"
							value="<?php echo set_value('phone'); ?>" class="form-control"
							placeholder="Enter Phone">
					</p>
					<p>
						<input type="password" name="password" class="form-control"
							value="<?php echo set_value('password'); ?>"
							placeholder="Enter Password">
					</p>
					<p>
						<input type="password" name="passconf" class="form-control"
							value="<?php echo set_value('passconf'); ?>"
							placeholder="Password Confirm">
					</p>
					<p>
						<input type="submit" class="btn btn-default" value="Sign Up">
					
					<a href="<?php echo WEBPATH ?>auth/login.html" class="btn"
						style="color: #0088cc; background: #fff; float: right">Sign In</a></p>
					</form>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</div>
</div>			