<script type="text/javascript">
$(function() {
		$("#change-password-form-submit").click(function() {
			$('.respose-wait').show();
			$('.reset-psw-success').hide();
			$('.reset-psw-error').hide();
			$('.rsp-error').hide();
			var _oldpasswd = $('#jq-old-password').val();
			var _newpasswd = $('#jq-new-password').val();
			var _renewpasswd = $('#jq-re-new-password').val();
			
			if(_oldpasswd==""){$('.rsp-error').html("Enter Old Password").show();return false;}
			if( _newpasswd==""){$('.rsp-error').html("Enter New Password").show();return false;}
			if( _renewpasswd==""){$('.rsp-error').html("Re Enter New Password").show();return false;}
			if(_newpasswd!=_renewpasswd){
				$('.rsp-error').html("New password is not matched").show();return false;
			}
			 $.ajax({
		         type:'post',
		         url:'<?php echo base_url();?>auth/userPasswordChange',
		         dataType:'json',
		         data:{'oldpasswd':_oldpasswd,'newpasswd':_newpasswd,'renewpasswd':_renewpasswd},
		         success:function(data){
			        if(data.results=="success"){
				        setTimeout(function(){
				        	 $('.respose-wait').hide();
				        	 $('#user-forgot-password').hide();
				        	 $('.change-psswd').hide();
				        	 $('.reset-psw-success').html('Your password have been changed').show(); 
		                 },2000);
			        	
			        }else{
			        	$('.reset-psw-error').html('You have entered wrong old password').show(); 
			        	 $('.respose-wait').hide();
			        } 
		         },
		         error:function(err) {
	                $('.reset-psw-error').html('Some problem to reset password, Try again later or contact to administrator').show(); 
	                $('.respose-wait').hide();
	             }
		         
	   	 });
		});
	$('#hide-box-login').click(function(){   
		$('.user-forgot-password').hide();
		 $('.di-over-lay').hide();	
	});
});
</script>
<p>&nbsp;</p>
<a href="#" id="hide-box-login"><span id="orangeBox"></span></a> 
<div class="row">
	<div class="col-md-12">
		<div class="change-psswd">
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-3"  style="text-align:right">
					<label>Enter Old Password</label>&nbsp;
				</div>
				<div class="col-sm-4">
					<input type="password" id="jq-old-password"  class="form-control" />
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-3"  style="text-align:right">
					<label>Enter New Password</label>&nbsp;
				</div>
				<div class="col-sm-4">
					<input type="password" id="jq-new-password"  class="form-control" />
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="row">
				<div class="col-sm-1"></div>
				<div class="col-sm-3" style="text-align:right">
					<label>Re-Enter New Password</label>&nbsp;
				</div>
				<div class="col-sm-4">
					<input type="password" id="jq-re-new-password" class="form-control" />
				</div>
				<div class="col-sm-3"></div>
			</div>
			
			<div class="row">
				<div class="col-sm-12" style="text-align: center">
				<button class="btn btn-default" id="change-password-form-submit">Change Password</button>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-sm-12" style="text-align: center">
				<div class="rsp-error" style="color:red;"></div>
				<div class="rsp-success" style="color:green;"></div>
				<div class="reset-psw-success" style="color:green;"></div>
				<div class="reset-psw-error" style="color:red;"></div>
				</div>
			</div>
			<div class="respose-wait" style="display:none"><img  src="<?php echo base_url()?>_static/assets/img/loading.gif">  </div>
		</div>
</div>

