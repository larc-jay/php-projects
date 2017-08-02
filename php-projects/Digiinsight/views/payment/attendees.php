		<?php 
			$ct = 1;
			foreach($attendees as $attendee){ ?>
			<div class="row pdngr"  style="float: left;width:250px">	
				<div class="col-sm-12">
				<b><?=$ct?>.&nbsp; <span style="font-size:16px"><?=$attendee['name']?></span></b><br />
				<b>Phone :</b><?=$attendee['phone']?><br />
				<b>Email :</b><?=$attendee['email']?><br />
				<b>Organization :</b><?=$attendee['organization']?><br />
				<b>City :</b><?=$attendee['city']?><br />
				<b>Country :</b><?=$attendee['country']?><br />
				<hr class="solid">
				</div>
			</div>
		<?php $ct++; }	?>
	
