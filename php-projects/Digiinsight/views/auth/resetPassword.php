<script type="text/javascript">
$(function() {
	resetPassword();
});
</script>
<p>&nbsp;</p>
<div class="row">
	<div class="col-md-12">
<?php 
if($rows!=null){
foreach($rows as $row){?>
<input type="hidden" id="jq-reset-id" value="<?php echo $row['id'];?>"/>
<input type="hidden" id="jq-reset-uid" value="<?php echo $row['user_id'];?>"/>
<?php }?>

		<div class="container">
			<div id="resetpwd">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-2"  style="text-align:right">
					<label>Enter New Password</label>&nbsp;
				</div>
				<div class="col-sm-3">
					<input type="password" id="jq-new-password"  class="form-control" />
				</div>
				<div class="col-sm-4"></div>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-2" style="text-align:right">
					<label>Re-Enter Password</label>&nbsp;
				</div>
				<div class="col-sm-3">
					<input type="password" id="jq-re-password" class="form-control" />
				</div>
				<div class="col-sm-4"></div>
			</div>
			
			<div class="row">
				<div class="col-sm-12" style="text-align: center"><p>&nbsp;</p>
				<button class="btn btn-default" id="user-signup-form-submit">Reset Password</button>
				<p>&nbsp;</p>
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-sm-12" style="text-align: center"><p>&nbsp;</p>
				<div class="rsp-error" style="color:red;"></div>
				<div class="rsp-success" style="color:green;"></div>
				<div class="reset-psw-success" style="color:green;"></div>
				<div class="reset-psw-error" style="color:red;"></div>
				<p>&nbsp;</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="respose-wait" style="display:none"><img  src="<?php echo base_url()?>_static/assets/img/loading.gif">  </div>
<?php }else{?>
<div class="row">
	<div class="col-md-12">
		<div class="container">
			<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
			<div class="user-signup-success" style="color: red;font-size:1.5em;text-align:center">Your session expire, Please reset again</div>
			<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		</div>
	</div>
</div>
<?php }?>
