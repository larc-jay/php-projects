 <script src="<?php echo base_url()?>_static/assets/js/bootstrap.min.js"></script>
 <script type="text/javascript">
    $(function() {
       discoverProgramReady();
    } );
</script>
<?php if(!isset($this->session->di_admin_logged_in) && !$this->session->di_admin_logged_in){
	redirect(base_url().'index.php/dashboard/');
 }
 ?>
 <div class="col-md-10 pdngr"> 
	<div class="row">
		<div class="col-md-12"> 
			<?php if(isset($this->session->di_admin_logged_in) && $this->session->di_admin_logged_in){?>
				<ul class="nav nav-tabs">
					<li class="active"><a href="#discoverprom">Discover Programs</a></li>
					<li ><a href="#adddisprm">Add Discover Programs</a></li>
				</ul>
				<br/>
				<div class="tab-content" style="border: 1px solid #ccc;">
					
					<div id="discoverprom" class="tab-pane fade in active">
					<h4><u>Discover Program Details</u></h4>
						<div class="row" >
							<div class="col-sm-1"><label>SNO. </label></div>
							<div class="col-sm-4"><label>Program Name </label></div>
							<div class="col-sm-2"><label>Program Id </label></div>
							<div class="col-sm-3"><label>Current Status </label></div>
							<div class="col-sm-2"><label>Change Status</label></div>
						</div>	
							
						<?php 
							$ct=1;
							foreach($discoverPrograms as $result){
						?>
							<div class="row" style="background: #f0f0f0"> 
								<div class="col-sm-1 pdng10" ><?=$ct++ ?></div>
								<div class="col-sm-4 pdng10" ><?=$result['program_name']?> </div>
								<div class="col-sm-2 pdng10"><?=$result['program_id'] ?> </div>
								<div class="col-sm-3 pdng10"><?php if($result['status']==1){?>Active<?php }else{?>Inactive<?php }?> </div>
								<div class="col-sm-2">
									<a href="#" class="active-discover-program btn btn-default" _status=<?=$result['status'] ?>  _idx="<?=$result['id']?>">
									<?php if($result['status']==1){?>Inactive<?php }else{?> &nbsp;Active &nbsp; <?php }?>
									</a> 
								</div>
							</div>
						<?php 		
							}	
						?>
					</div>
					<div id="adddisprm" class="tab-pane fade">
						<h4><u>Add discover programs</u></h4>
						<div class="row" >
							<div class="col-sm-2"><label>Program Name :</label></div>
							<div class="col-sm-10"><input type="text" id="p-name" class="form-control"  style="width: 30%"/></div>
						</div>
						<div class="row" >
							<div class="col-sm-2"><label>Select Program :</label></div>
							<div class="col-sm-10">
								<select id="program"  class="form-control"  style="width:50%">
									<?php foreach($courses as $course){?>
										<option value="<?=$course['id'] ?>"><?=$course['name'] ?> </option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2"><label>Status :</label></div>
							<div class="col-sm-10">
								<select id="pstatus"  class="form-control" style="width: 100px">
									<option value="1">Enable</option>
									<option value="0">Disable</option>
								</select>
							</div>
						</div>
						<div class="row" >
							<div class="col-sm-2"></div>
							<div class="col-sm-10">
							<button id="discover-program-submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	 </div>		
</div>
</div>		
