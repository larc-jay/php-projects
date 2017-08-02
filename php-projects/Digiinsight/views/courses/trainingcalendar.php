<script type="text/javascript">
$(function() {
	trainingcalender();
});
</script>
<div class="row grl-bg pdngr">	
	<div class="col-md-9">
	<br />
		<div class="heading-blue-1"> Upcoming training schedule </div>
		<br />
	</div>
	<div class="col-md-3 pdngr"></div>
</div>	
<div class="row grl-bg pdngr">	
<div class="col-md-9" style="border-bottom: 1px solid #ccc;">
<div class="row">	
	<div class="col-sm-1 data-header start">Start Date</div>
	<div class="col-sm-1 data-header ">End Date</div>
	<div class="col-sm-2 data-header">Training Provider</div>
	<div class="col-sm-2 data-header ">Training Type</div>
	<div class="col-sm-3 data-header">Program Name</div>
	<div class="col-sm-1 data-header">Location</div>
	<div class="col-sm-1 data-header">Price</div>
	<div class="col-sm-1 data-header"></div>
</div>
<div style="height: 5px;">&nbsp;</div>
<div class="default-schedules">	
	<?php $ct=1; foreach($schedules as $schedule){
	    $color="#fff";
	    if($ct%2==0){$color="#f9f9f9";}else{$color="#fff";} $ct++;
		?>
	<div class="row white-bg">	
		<div class="col-sm-1 data-body start" style="background:<?=$color ?>"><span class="vcenter"><?=$schedule['stime'] ?></span></div>
		<div class="col-sm-1 data-body " style="background:<?=$color ?>"><span class="vcenter"><?=$schedule['etime'] ?></span></div>
		<div class="col-sm-2 data-body" style="background:<?=$color ?>"><span class="vcenter"><?=$schedule['vname'] ?></span></div>
		<div class="col-sm-2 data-body" style="background:<?=$color ?>"><span class="vcenter"><?=$schedule['trainingtype']?></span></div>
		<div class="col-sm-3 data-body" style="background:<?=$color ?>"><span class="vcenter"><?=$schedule['cname']?></span></div>
		<div class="col-sm-1 data-body"  style="background:<?=$color ?>"><span class="vcenter"><?=$schedule['loc']?></span></div>
		<div class="col-sm-1 data-body" style="background:<?=$color ?>"><span class="vcenter"><?=$schedule['price']?></span></div>
		<div class="col-sm-1 data-body last"  style="background:<?=$color ?>"><span class="vcenter"><a href="#enroll-now" _schedul_="<?=$schedule['scid']?>"  class="jq-enroll-now blue-bg-btn">Book Now</a> </span></div>
	</div>	
	<?php }?>
</div>
<div class="filters-schedules" style="display: none;"></div>
<div class="filters-schedules-by-date" style="display: none;"></div>
</div>
<div class="col-md-3 txt-color-b">
     <div class = "row ">
     	<div class="col-md-12 pdngr">
			<!-- div class="row pdngr">	
				<div class="col-md-12 "></div>
			</div -->
			<div class="data-header">&nbsp;&nbsp;Refine Results</div>
			
			<div class="row ">
				<div class="col-sm-12 white-bg pdngrl">
					<div style="font-size:1.2em;margin:10px 0;">Training Provider </div>
					<span class="font12">
					<?php foreach ($vendors as $vendor){?>
						<input type="checkbox" class="vendor-filter" value="v-<?=$vendor['id']?>"> &nbsp;<?php echo $vendor['vname']?> <br />
					<?php }?>
					</span>
					<p>&nbsp;</p>
				</div>
			</div>
			<div class="gery-line-nm"></div>
			<div class="row white-bg">
				<div class="col-sm-12 pdngr ">
					<div style="font-size:1.2em;margin:10px 0;">Training Date </div>
					  <br />
						<div class="row">
							<div class="col-sm-2">
								From :
							</div>
							<div class="col-sm-8">
								<input type="text" class="form-control txtbox" id="jq-from"/> 
								<div class="required-field-1"></div>
							</div>	
							<div class="col-sm-2"></div>
						</div>
						<div class="row">
							<div class="col-sm-2"> 
								To :
							</div>
							<div class="col-sm-8">
								<input type="text"  class="form-control txtbox" id="jq-to"/>
								<div class="required-field-2"></div>
							</div>
							<div class="col-sm-2"></div>
						</div>	
						<div class="row">
							<div class="col-sm-12 aligncenter"> 
								<button id="jq-search-by-date" class="blue-bg">Search</button>
							</div>
						</div>	
						<p>&nbsp;</p>
		  </div>
		</div>			
		<div class="gery-line-nm"></div>
		<div class="row white-bg">
			<div class="col-sm-12 pdngr">
			<div style="font-size:1.2em;margin:10px 0;">Location</div>
			<span class="font12">
			<?php foreach ($locations as $loc){?>
					<input type="checkbox" class="location-filter" value="l-<?=$loc?>"/> &nbsp;<?=$loc?> <br />
				<?php }?>
			</span>	
				<p>&nbsp;</p>
			</div>
		</div>	
		<div class="gery-line-nm"></div>
		<div class="row white-bg">
			<div class="col-sm-12 pdngr">
			<div style="font-size:1.2em;margin:10px 0;">Training Type</div>
			<span class="font12">
			<?php foreach ($trainingtype as $type){?>
					<input type="checkbox" class="ttype-filter" value = "t-<?=$type?>"/> &nbsp;<?=$type?> <br />
				<?php }?>
			</span>	
				<p>&nbsp;</p>
			</div>
		</div>		
      </div>	
	</div>		
</div>
</div>
<div class="row grl-bg">	
	<div class="col-md-12">
	</div>
</div>	