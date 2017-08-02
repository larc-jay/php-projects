<div class="linebr"></div><br/>
<div class="row" >
	<div class="col-sm-1"><label>SNO</label></div>
	<div class="col-sm-1"><label>Program ID</label></div>
	<div class="col-sm-3 pdngr"><label>Program Name</label></div>
	<div class="col-sm-2 pdngr"><label>Provider</label></div>
	<div class="col-sm-2"><label>Training Date</label></div>
	<div class="col-sm-2"><label>Status</label></div>
	<div class="col-sm-1"></div>
</div>
<div class="linebrg"></div>
<?php $ct=1; foreach($mylearnings as $learning){ ?>
	<div class="row">
		<div class="col-sm-1"><?=$ct++;?></div>
		<div class="col-sm-1"><?=$learning['sid'] ?></div>
		<div class="col-sm-3 pdngr"><?=$learning['cname'] ?> </div>
		<div class="col-sm-2 pdngr"><?=$learning['name'] ?> </div>
		<div class="col-sm-2"><?=$learning['stime'] ?></div>
		<div class="col-sm-2"><?=$learning['ostatus'] ?> </div>
		<div class="col-sm-1"> </div>
	</div>
	<div class="linehr"></div>
<?php } ?>