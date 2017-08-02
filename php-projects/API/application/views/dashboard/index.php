 <?php echo "<div class=\"inner-bg\">" ?>
    <?php echo "<div class=\"container\"> "?>
       <?php echo " <div class=\"row\"> " ?>
 <div class="col-md-12">
  	 	<div class="page-bg">
  	 	   	<?php if (validation_errors()) : ?>
						<div class="col-md-12">
							<div class="alert alert-danger" role="alert">
								<?= validation_errors() ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if (isset($error)) : ?>
						<div class="col-md-12">
							<div class="alert alert-danger" role="alert">
								<?= $error ?>
							</div>
						</div>
					<?php endif; ?>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Admin login</h3>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <?=form_open('dashboard/login') ?>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text"  id="username" name="username" placeholder="Username..." class="form-username form-control">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" id="password" name="password"  placeholder="Password..." class="form-password form-control" >
			                        </div>
			                        <input type="submit" class="btn btn-bg-1" value="Login">
			                    <?=form_close() ?>
		                    </div>
                        </div>
                    </div>
  		</div>
  </div>
 <?php echo " </div>    </div> </div> "?>
