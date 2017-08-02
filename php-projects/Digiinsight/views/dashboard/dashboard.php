    		<div class="col-md-10"> 
    			<?php echo validation_errors(); ?>
				<div class="row">
			    		<div class="col-md-12"> 
			    			<?php if(isset($this->session->di_admin_logged_in) && $this->session->di_admin_logged_in){?>
			    				<h1>Logged In</h1>
			    			<?php }
			    			else {?>
				    			<?php echo form_open('dashboard/login'); ?>
				    					<div class="row" id="jq-login-form">
				    					<div class="col-md-4"></div>
				    					<div class="col-md-4" style="text-align:center;" >
				    						<p>&nbsp;</p>
				    						<p><input type="text" name="username" class="form-control" placeholder="Enter Email"></p>
				    						<p><input type="password" name="password"  class="form-control" placeholder="Enter Password"></p>
				    						<p>
				    							<input type="submit"  class="btn btn-default" value="Login">
				    						</p>
				    					</div>
				    					<div class="col-md-4"></div>
				    				</div>
								</form>
			    		     <?php }?>
			    				
			    		</div>
			   	 </div>		
    		</div>
    </div>		
