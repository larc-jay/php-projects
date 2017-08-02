 <script type="text/javascript">
<!--
$(function(){
$('.add-new-user').click(function (){
    $('.di-over-lay').show();	
    $('.update-main-cat-block').show();
});
 $('#hide-box').click(function(){   
		 $('.di-over-lay').hide();	
		 $('.update-main-cat-block').hide();
});
$('.jq-add-new-user').click(function(){
	$.ajax({
	       type:'post',
	       url:'addnewadminuser',
	       data:{'name':$('#name').val(),'email':$('#email').val(),'password':$('#password').val()},
	       success:function(data){
	      		if(data.status="success"){
	      			alert('User added');
	      			setTimeout(function(){
	      				 $('.di-over-lay').hide();	
	      				 $('.update-main-cat-block').hide();
	      				 location.reload();
	   	          	},2000); 
	      		}else{
	      			alert('User not added');
	      		}
	       }
	});
});
});
//-->
</script>

 <?php echo "<div class=\"inner-bg\">" ?>
    <?php echo "<div class=\"container\"> "?>
       <?php echo " <div class=\"row\"> " ?>
 <div class="col-md-12">
  	 	<div class="page-bg">
  	 	   <div class="row row-bg">
  	 	   		<div class="col-sm-4"><label>Name</label></div>
  	 	   		<div class="col-sm-4"><label>Email</label></div>
  	 	   		<div class="col-sm-2"><label>Type</label></div>
  	 	   		<div class="col-sm-2"><label>Status</label></div>
  	 	   </div>
  	 	   <?php foreach ($users as $user) {?>
  	 	   		<div class="row">
  	 	   		<div class="col-sm-4"><?=$user['username']?> </div>
  	 	   		<div class="col-sm-4"><?=$user['email']?> </div>
  	 	   		<div class="col-sm-2"><?=$user['user_type']?> </div>
  	 	   		<div class="col-sm-2"><?=$user['status']?> </div>
				</div>  	 	   
  	 	   <?php }?>
  	 	   <p>&nbsp;</p>
  	 	   <p>&nbsp;</p>
  	 	   <div class="row">
  	 	   		<div class="col-sm-12" >
  	 	   				<button class="btn add-new-user">Add New User</button>
  	 	   				<a href="<?=base_url() ?>index.php/dashboard/dashboard" style="padding: 8px;background:#f0f0f0;border-radius:5px;">Dashboard</a>
  	 	   		</div>
  	 	   	</div>	
 <div class="update-main-cat-block" style="display: none">
  	 	   	 <a href="#" id="hide-box"><span id="closebox"></span></a> 
	 <div class="row">
	   <div class="col-md-2"></div>
		<div class="col-md-10">
			<div class="row">
				<div class="col-sm-3">Name </div>
				<div class="col-sm-6"> <input type="text" class="form-control" name="catname"  id="name"/> </div>
			</div>
			<p>&nbsp;</p>
			<div class="row">
				<div class="col-sm-3">Email </div>
				<div class="col-sm-6"><input type="text" class="form-control" name="email" id="email"/> </div>
			</div>	
			<p>&nbsp;</p>
			<div class="row">
				<div class="col-sm-3">Password </div>
				<div class="col-sm-6"><input type="password" class="form-control" name="passwd" id="password"/> </div>
			</div>	
			<p>&nbsp;</p>
			<div class="row" align="center">
				<div class="col-sm-12"><input type="button" class="btn jq-add-new-user" value="Add User" /> </div>
			</div>		
		</div>
</div>
  	 	   	</div>
  		</div>
  </div>
 <?php echo " </div>    </div> </div> "?>
