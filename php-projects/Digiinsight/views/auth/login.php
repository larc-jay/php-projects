 <script src="<?php echo base_url()?>_static/assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function() {
	$('#hide-box-login').click(function(){   
		$('.user-login-signup').hide();
		 $('.di-over-lay').hide();	
	});
	$('#user-login-submit').click(function(){  
		$('.user-login-error').hide();
		$('.di-over-lay-top').show();
		$('.respose-wait').show();
		 $.ajax({
	         type:'post',
	         url:'<?php echo base_url()?>index.php/auth/signin',
	         dataType:'json',
	         data:{'email':$('#jq-email').val(),'passwd':$('#jq-password').val()},
	         success:function(data){
		        if(data.results=="success"){
		             setTimeout(function(){
	                     location.reload(); 
	                     $('.di-over-lay-top').hide();
		            	 $('.respose-wait').show();
		             	 $('.user-login-signup').hide()
	                 },3000);
		        }else{
		        	$('.user-login-error').html('Wrong Email/Password').show(); 
		        	$('.di-over-lay-top').hide();
		        	 $('.respose-wait').hide();
		        } 
	         },
	         error:function(err) {
                 $('.user-login-error').html('Wrong Email/Password').show(); 
                 $('.di-over-lay-top').hide();
                 $('.respose-wait').hide();
              }
    	 });
	});
	$('#user-signup-form-submit').click(function(){ 
		$('.error').hide(); 
		$('.user-signup-success').hide();
		$('.user-signup-error').hide();
		var firstname = $('#firstname').val();
		var lastname  = $('#lastname').val();
		var email  = $('#email').val();
		var phone  = $('#phone').val();
		var password  = $('#password').val();
		var passconf  = $('#passconf').val();
		var error="";
		var ec=0;
		if(firstname==""){error="First Name Required<br>";ec++;}
		if(lastname==""){error+="Last Name Required<br>";ec++;}
		if(email==""){error+="Email Required<br>";ec++;}
		if(phone==""){error+="Phone Required<br>";ec++;}
		if(password==""){error+="Password Required<br>";ec++;}
		if(passconf==""){error+="Re-Password Required<br>";ec++;}
		if(ec>0){
			$('.error').html(error).show();
			return false;
		}
		
		if(/\d{10}/.test(phone.trim())){$('.invalid-phone-error').hide();}else{$('.invalid-phone-error').html('Invalid Phone').show();return false;}
		var regex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
		
		if(regex.test(email)){$('.invalid-email-error').hide();}
		else{$('.invalid-email-error').html('Invalid Email').show();return false;}
		if(password!=passconf && password!="" && passconf!=""){
			$('.password-no-match-error').html('Password is not matched').show();
			return false;
		}
		$('.di-over-lay-top').show();
		$('.respose-wait').show();
		 $.ajax({
	         type:'post',
	         url:'<?php echo base_url()?>/auth/register',
	         dataType:'json',
	         data:{'email':email,'passwd':password,'fname':firstname,'lname':lastname,'phone':phone.trim()},
	         success:function(data){
		        if(data.results=="success"){
			        $('.user-signup-complete').hide();
			        setTimeout(function(){
			        	$('.di-over-lay-top').hide();
			        	 $('.respose-wait').hide();
	                     $('.user-signup-success').html('You have registerd').show(); 
	                 },2000);
		        	
		        }else{
		        	$('.user-signup-error').html('User already exists').show(); 
		        	$('.di-over-lay-top').hide();
		        	$('.respose-wait').hide();
		        } 
	         },
	         error:function(err) {
                 $('.user-signup-error').html('User already exists').show(); 
                 $('.di-over-lay-top').hide();
                 $('.respose-wait').hide();
              }
    	 });
	});
	$('#user-forgot-passwd-submit').click(function(){ 
		if($('#jq-fp-email').val()==""){
   			 $('.user-fp-error').html('Enter Email ').show(); 
   			 return false;
   		 }
		 $.ajax({
	         type:'post',
	         url:'<?php echo base_url()?>index.php/auth/forgotPassword',
	         dataType:'json',
	         data:{'email':$('#jq-fp-email').val()},
	         success:function(data){
		        if(data.results=="success"){
		             $('.user-fp-success').html('We\'ve sent an email on your registered email.  Please check your INBOX, SPAM, JUNK EMAIL folder for password reset link.').show();
		        }else{
		        	$('.user-fp-error').html('Oops! Email address not found.  Please check for typo errors. ').show(); 
		        } 
	         },
	         error:function(err) {
                 $('.user-fp-error').html('Oops! Email address not found.  Please check for typo errors. ').show(); 
              }
    	 });
	});
	 $(".nav-tabs-cd a").click(function(){
	        $(this).tab('show');
	 });
	
});
</script>
<a href="#" id="hide-box-login"><span id="orangeBox"></span></a> 
	<div class="row">
    		<div class="col-md-12"> 
    				<div  style=" margin: -3% 0 0 -3%">
    				<ul class="nav nav-tabs-cd">
							<li class="<?=$data['lactive']?> tab-um"><a href="#login-ptab">Login</a></li>
							<li class="<?=$data['factive']?> tab-um"><a href="#fp-ptab">Forgot Password</a></li>
							<li class="tab-um"><a href="#sign-up-ptab">Sign Up</a></li>
					</ul>	
					</div>
				<div class="tab-content">			
    				<div id="login-ptab" class="tab-pane fade <?=$data['lshow']?>">
    				<p>&nbsp;</p>
	    				<div class="row" id="jq-login-form">
	    					<div class="col-md-1"></div>
	    					<div class="col-md-10" style="text-align:center;" >
	    						<p>&nbsp; </p>
	    						<div class="row"> 
	    							<div class="col-sm-12">
	    								<input type="text" id="jq-email" class="form-control" placeholder="Enter Email">
	    							</div>
	    						</div>	
	    						<div class="row"> 
	    							<div class="col-sm-12">
	    								<input type="password" id="jq-password"  class="form-control" placeholder="Enter Password"></p>
	    							</div>
	    						</div>
	    						<div class="row"> 
	    							<div class="col-sm-12">
	    								<div style="color:#777;padding:10px 0 20px;font-size:11px">By logging in, you agree to 
	    								<a href="<?=base_url()?>pages/privacy_policy"  style="text-decoration:underline"> terms and conditions</a></div>
	    								<p><button  class="btn" id="user-login-submit" style="color: #fff; background: #0088cc;margin-left:10px">Login</button></p>
	    								<div class="user-login-error" style="color:red"></div>
	    							</div>
	    						</div>
	    					</div>
	    					<div class="col-md-1"></div>
	    				</div>
	    				<div class="row" style="color:#999">
	    					<div class="col-sm-5"> <hr class="solid-grey"></div>
	    					<div class="col-sm-2 aligncenter" style="padding-top: 12px"> OR</div>
	    					<div class="col-sm-5"> <hr class="solid-grey"></div>
						</div>
						<br />
	    				<div class="row">
	    					<div class="col-sm-4">
	    						<span style="font-size:16px">Login using</span>
	    					</div>
		    				<div class="col-sm-8">
								<a href="https://www.linkedin.com/company/digiinsight" class="social-icon-l" style="background:#f0f0f0"> <i class="fa fa-linkedin"></i></a>
								<a href="https://www.linkedin.com/company/digiinsight" class="social-icon-g"  style="background:#f0f0f0;"> <i class="fa fa-google fa-2" ></i></a> 
								<a href="https://www.digiinsight.com/auth/fblogin" onclick="window.open (this.href, 'child', 'width=600,height=400,scrollbars=yes'); return false" class="social-icon-f"  style="background:#f0f0f0;"> <i class="fa fa-facebook"></i></a>
							</div>
	    				</div>
	    				<p>&nbsp; </p>
    				</div>
    				<div id="fp-ptab" class="tab-pane fade <?=$data['fshow']?>"> 
    						<p>&nbsp;</p>
		    				<div class="row" id="jq-forgot-password">
		    					<div class="col-md-12">
		    						<div class="row">
				    					<div class="col-sm-1"> </div>
				    					<div class="col-sm-10">
				    						<input type="text" id="jq-fp-email" class="form-control" placeholder="Please enter your registered email id">
				    					</div>
				    					<div class="col-sm-1"></div>
		    						</div>		
		    						<div class="row">
				    					<div class="col-sm-12" style="text-align: center">
				    						<p> &nbsp;</p>
				    						<p><button  class="btn " id="user-forgot-passwd-submit" style="color: #fff; background: #0088cc;margin-left:10px">Submit</button> </p>
			    							<p> &nbsp;</p>
					    					<div class="user-fp-success" style="color:green"></div>
			    							<div class="user-fp-error" style="color:red"></div>
			    						</div>
		    						 </div>		
		    					</div>		
		    					<br />
		    				</div>	
    				</div>
    				<div id="sign-up-ptab" class="tab-pane fade"> 
    					<p>&nbsp;</p>
	    				<div class="row" id="jq-user-signup"> 
	    					<div class="col-sm-12">
	    						<div class="row user-signup-complete">
	    								<div class="col-md-1"></div>
										<div class="col-md-10" style="text-align: center;">
											<p>
												<input type="text" id="firstname" class="form-control"  placeholder=" First Name"/>
											</p>
											<p>
												<input type="text" id="lastname" class="form-control"  placeholder=" Last Name"/>
											</p>
											<p>
												<input type="text" id="email" class="form-control" 	placeholder=" Email Id" required/>
											</p>
											<p>
												<input type="text" id="phone" class="form-control"  placeholder=" Phone"/>
											</p>
											<p>
												<input type="password" id="password" class="form-control"	placeholder=" Password"/>
											</p>
											<p>
												<input type="password" id="passconf" class="form-control" placeholder="Confirm Password "/>
											</p>
											<div style="color:#777;padding:10px 0 20px;font-size:11px">By signing up, you agree to 
	    								    <a href="<?=base_url()?>pages/privacy_policy"  style="text-decoration:underline"> terms and conditions.</a></div>
											
											<p>
											<button class="btn btn-default" id="user-signup-form-submit">Sign Up</button>
											</p>
										</div>
										<div class="col-md-1"></div>
								</div>
								<div class="user-signup-success" style="color: green;"></div>
								<div class="user-signup-error" style="color: red;"></div>
											    <div class="invalid-phone-error" style="color: red"></div>
											    <div class="invalid-email-error" style="color: red"></div>
												<div class="error" style="color: red; position: absolute;top:1%;right:1%"></div>
												<div class="password-no-match-error" style="color: red"></div>
												
	    					</div>
	    				</div>	
    				</div>
    			 </div>	
    				<div class="respose-wait" style="display:none"><img  src="<?php echo base_url()?>_static/assets/img/loading.gif" >  </div>
    		</div>
    </div>		
