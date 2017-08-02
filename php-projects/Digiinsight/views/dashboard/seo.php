 <script src="<?php echo base_url()?>_static/assets/js/bootstrap.min.js"></script>
 <script type="text/javascript">
    $(function() {
       seoReady();
    } );
</script>
<?php if(!isset($this->session->di_admin_logged_in) && !$this->session->di_admin_logged_in){
	redirect(base_url().'dashboard/');
 }
 ?>
 <div class="col-md-10 pdngr"> 
	<div class="row">
		<div class="col-md-12"> 
			<?php if(isset($this->session->di_admin_logged_in) && $this->session->di_admin_logged_in){?>
				<ul class="nav nav-tabs">
					<li class="active"><a href="#mdtkdetails">Meta details</a></li>
					<li ><a href="#mdtk">Add meta description, title and keywords</a></li>
					<li><a href="#analytics">Add analytics</a></li>
				</ul>
				<br/>
				<div class="tab-content" style="border: 1px solid #ccc;">
					
					<div id="mdtkdetails" class="tab-pane fade in active">
					<h4><u>Add Details</u></h4>
						<div class="row" >
							<div class="col-sm-1"><label>SNO. </label></div>
							<div class="col-sm-3"><label>Page Name </label></div>
							<div class="col-sm-4"><label>Page Title </label></div>
							<div class="col-sm-2"><label>Meta Descriptions </label></div>
							<div class="col-sm-2"><label>Meta Keywords </label></div>
						</div>	
							
						<?php 
							$ct=1;
							foreach($results as $result){
						?>
							<div class="row" style="background: #f0f0f0"> 
								<div class="col-sm-1 aligncenter" ><?=$ct++ ?></div>
								<div class="col-sm-3" ><?=$result['page']?> </div>
								<div class="col-sm-4"><?=$result['title'] ?> </div>
								<div class="col-sm-2"><?=$result['meta_description'] ?> </div>
								<div class="col-sm-2"><?=$result['meta_keyword'] ?> </div>
							</div>
						<?php 		
							}	
						?>
						  <p><?php echo $links; ?></p>
					</div>
					<div id="mdtk" class="tab-pane fade">
						<h4><u>Add meta description, title and keywords</u></h4>
						<div class="row" >
							<div class="col-sm-2"><label>Page URL :</label></div>
							<div class="col-sm-10"><input type="text" id="page-name" class="form-control"/></div>
						</div>
						<div class="row" >
							<div class="col-sm-2"><label>Page Title :</label></div>
							<div class="col-sm-10"><input type="text" id="page-title" class="form-control"/></div>
						</div>
						<div class="row">
							<div class="col-sm-2"><label>Meta Description :</label></div>
							<div class="col-sm-10"><input type="text" id="meta-desc" class="form-control"/></div>
						</div>
						<div class="row" >
							<div class="col-sm-2"><label>Meta Keywords :</label></div>
							<div class="col-sm-10"><input type="text" id="meta-keywords" class="form-control"/> <br /> <br />
							<button id="meta-submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</div>
					<div id="analytics" class="tab-pane fade">
						<div class="row">
							<div class="col-md-2" style="text-align: left">
								<h4><u>Add Analytics</u></h4> <br />
							</div>
							
							<div class="col-md-3"><label>Google :</label> <?=$analytics->google_analytics ?> </div>
							<div class="col-md-3"> <label>Bing :</label> <?=$analytics->bing_analytics ?>  </div>
							<div class="col-md-4">  <label>Yahoo :</label> <?=$analytics->yahoo_analytics ?> </div>
						</div>	
						<div class="row" >
							<div class="col-sm-2"><label>Google Code:</label></div>
							<div class="col-sm-10"><input type="text" id="google" class="form-control" style="width:150px; " value="<?=$analytics->google_analytics ?>"/></div>
						</div>
						<div class="row" >
							<div class="col-sm-2"><label>Bing Code :</label></div>
							<div class="col-sm-10"><input type="text" id="bing" class="form-control" style="width:150px; "  value="<?=$analytics->bing_analytics ?>"/></div>
						</div>
						<div class="row">
							<div class="col-sm-2"><label>Yahoo Code :</label></div>
							<div class="col-sm-10"><input type="text" id="yahoo" class="form-control" style="width:150px; "  value="<?=$analytics->yahoo_analytics ?>"/></div>
						</div>
						<div class="row" >
							<div class="col-sm-2">
							<button id="analytics-submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</div>	
				</div>
			<?php } ?>
		</div>
	 </div>		
</div>
</div>		

</div>
</div>		
