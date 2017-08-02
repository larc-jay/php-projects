<script src="<?php echo base_url()?>_static/assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function() {
	   $(".status").click(function(){ 
		   if($(this).text()=='ACTIVE'){
   				$(this).html('INACTIVE');
   		   }else{
   				$(this).html('ACTIVE');
   		  }
	   });
	   $(".nav-tabs a").click(function(){
	        $(this).tab('show');
	   });
	   $("#jq-admin-user-submit").click(function(){ 
			 $.ajax({
	             type:'post',
	             url:'addAdminUser',
	             data:{'user':$('#jq-admin-user').val(),'email':$('#jq-admin-email').val(),'passwd':$('#jq-admin-passwd').val()},
	             success:function(data){
	                 $('.add-admin-user-success').html('User Added').show();
	                 setTimeout(function(){
	                     location.reload(); 
	                 }, 2000); 
	             },
	             error:function(err) {
	                 $('.add-admin-user-error').html('Error!!! or user exists').show(); 
	              }
     });
   })
}); 
</script>

<p>&nbsp; </p>
<div class="col-md-10" style="padding-left:20px">
	<ul class="nav nav-tabs">
					<li class="active"><a href="#users-tab">Users</a></li>
					<li><a href="#add-new-user-tab" class="add-new-user-tab">Add User</a></li>
		</ul>
				<div class="tab-content" style="border: 1px solid #ccc;">
						<div id="users-tab" class="tab-pane fade in active">
							<div class="row" style="text-align:center;background: url('<?php echo base_url()?>_static/assets/img/event2.png') repeat scroll 0 0"> 
							<div class="col-sm-1"> <b>SNO</b> </div>
							<div class="col-sm-4"> <b>User Name</b> </div>
							<div class="col-sm-4"> <b>Email</b> </div>
							<div class="col-sm-2">  <b>Status</b> </div>
							<div class="col-sm-1">  <b>Operation</b> </div>
						</div>
						<?php $ct =1; foreach($rows as $row){ 
							if($ct%2==0){$color ="#fff";}else{$color="#f0f0f0";}
							?>
							<div class="row" style="text-align:center;background:<?php echo $color;?>"> 
								<div class="col-sm-1"> <?php echo $ct; ?> </div>
								<div class="col-sm-4"> <?php echo $row['username']; ?> </div>
								<div class="col-sm-4"> <?php echo $row['email'];  ?></div>
								<div class="col-sm-2"><a href="#?status" class="status"><?php echo $row['status'];?></a></div>
								<div class="col-sm-1"> <a href="#" id="jq-update-admin-user">Update</a> </div>
							</div>
						<?php $ct++;}?>
					</div>
					<div id="add-new-user-tab" class="tab-pane fade">
					       <div class="row">
									<div class="col-sm-2">
										<label>User Name :</label>
									</div>
									<div class="col-sm-4">
										<input type="text" id="jq-admin-user"	 class="form-control" />
									</div>
							</div>
							<div class="row">
									<div class="col-sm-2">
										<label>Email :</label>
									</div>
									<div class="col-sm-4">
										<input type="text" id="jq-admin-email"	 class="form-control" />
									</div>
							</div>	
							<div class="row">
								
									<div class="col-sm-2">
										<label>Password :</label>
									</div>
									<div class="col-sm-4">
										<input type="password" id="jq-admin-passwd"	 class="form-control" />
									</div>
							</div>	
							<div class="row">
								<div class="col-sm-12">
									<div class="add-admin-user-error" style="color: red;"></div>
									<div class="add-admin-user-success" style="color: green;">	</div>
									<button id="jq-admin-user-submit" class="btn btn-default">Add User</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			
		</div>
</div>