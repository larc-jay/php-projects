<?php if(!isset($this->session->di_logged_in) && !$this->session->di_logged_in){
	redirect(base_url());
}
?>
<script src="<?php echo base_url()?>_static/assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function() {
    	profileReady();
    });
</script>
<style>
.nav-tabs > li {
float:none;
}
</style>
<div class="row">
	<div class="col-md-2 user-profile-left-pannel">
		<div class="row">
	        <div class="col-sm-12" style="text-align: center;margin-top:15px;">
	        	<?php if($profileimage==null || $profileimage==""){ ?>
	   				<img src="<?php echo base_url();?>_static/assets/img/no-image.jpg" alt="expert"  style="border-radius: 50%; height: 150px; width: 150px;">
	   				<?php }else{?>
	   					<img src="<?php echo base_url();?>_static/assets/uploads/<?php echo $profileimage;?>" alt="expert" style="border-radius: 50%; height: 150px; width: 150px;">
	   				<?php }?>
	   		</div>
	   	</div>	
	   	<div class="row">
	        <div class="col-sm-12" style="color:#ccc;text-align: center;">
					Welcome ! <?php echo $this->session->userdata('di_fname');?>&nbsp;<?php echo $this->session->userdata('di_lname');?><br />
					<a href="#" id="upload-prifile-pic"  onclick="return false;">Change Image</a>
					<div class="profile-pic" style="display:none;"></div>
					
	   		</div>
	   	</div>	
	   	<hr>   
	   	<div class="row">
	        <div class="col-sm-12">
	   			<ul class="nav nav-tabs">
					<li class="active"><a href="#my-profile-tab" class="my-profile" onclick="return false;">My Profile</a></li>
					<li><a href="#my-learnings-tab" class="my-learnings" onclick="return false;">My	Learnings</a></li>
					<li><a href="#my-programs-tab" class="my-programs" onclick="return false;">My Programs</a></li>
					<li><a href="#my-schedule-tab" class="my_schedules" onclick="return false;">My Schedule</a></li>
					<li><a href="#my-invoices-tab" class="my-invoices" onclick="return false;">My Invoices</a>
					</li>
				</ul>
	   		</div>
	   	</div>	
		
	</div>
	<div class="col-md-10">
	<div class="tab-content" style="padding:15px;font-size:14px">
		<div id="my-profile-tab" class="pr-wt-bg pdngr tab-pane fade in active">
		  <!-- Basic Profile -->
			<?=$basicprofile;?>
		</div>
		<div id="my-learnings-tab" class="pr-wt-bg pdngr tab-pane fade">
			<div class="row">
				<div class="col-md-12">
					<h3>
						My Learnings
					</h3>
					<div class="my-learnings-data"></div>
				</div>
			</div>
		</div>
		<div id="my-programs-tab" class="pr-wt-bg pdngr tab-pane fade">
			<div class="row">
				<div class="col-md-12" style="text-align: center">
					<h3>
						My Programs
					</h3>
				</div>
			</div>
		</div>
		<div id="my-schedule-tab" class="pr-wt-bg pdngr tab-pane fade">
			<div class="row">
				<div class="col-md-12" style="text-align: center">
					<h3>
						My Schedule
					</h3>
					<div class="my-schedules-data"></div>
				</div>
			</div>
		</div>
		<div id="my-invoices-tab" class="pr-wt-bg pdngr tab-pane fade">
			<div class="row">
				<div class="col-md-12" style="text-align: center">
					<h3>
						My Invoices
					</h3>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
<div class="di-over-lay"></div>