<div class="row" style="font-size:1em; min-height:500px" id="home5pattern">
   <div class="col-md-12">
   		<div class="row">
   			<div class="col-md-6">
   				<span class="heading-blue-1">Upcomming training schedule</span>
   			</div>
			<div class="col-md-6">
				<span class="heading-blue-1">Pick your dates</span>
					<input type="date" id="jq-pick-up-start-date" placeholder="From">
					<input type="date" id="jq-pick-up-end-date" placeholder="To">
					<button class="book-now">GO</button>
				
			</div>
		</div>
		<p>&nbsp; </p>
		<div class="row txt-color-w pdngrl">	
			<div class="col-sm-1"><b>Date</b></div>
			<div class="col-sm-3"><b>Training Provider</b></div>
			<div class="col-sm-2 "><b>Training</b></div>
			<div class="col-sm-3"><b>Program Name</b></div>
			<div class="col-sm-1"><b>Location</b></div>
			<div class="col-sm-1"><b>Price</b></div>
			<div class="col-sm-1"></div>
	</div>
		<div class="gery-line-nm"></div>
	<?php foreach($schedules as $schedule){?>
		<div class="row txt-color-w pdngr">	
			<div class="col-sm-1 "><span class="vcenter"><?=$schedule['stime'] ?></span></div>
			<div class="col-sm-3"><span class="vcenter"><?=$schedule['vname'] ?></span></div>
			<div class="col-sm-2 "><span class="vcenter"><?=$schedule['trainingtype']?></span></div>
			<div class="col-sm-3"><span class="vcenter"><?=$schedule['cname']?></span></div>
			<div class="col-sm-1"><span class="vcenter"><?=$schedule['loc']?></span></div>
			<div class="col-sm-1"><span class="vcenter"><?=$schedule['price']?></span></div>
			<div class="col-sm-1 "><span class="vcenter"><a href="#enroll-now" _schedul_="<?=$schedule['scid']?>"  class="jq-enroll-now blue-bg">Book Now</a> </span></div>
		</div>	
	<?php }?>
	<br />
	</div>
</div>