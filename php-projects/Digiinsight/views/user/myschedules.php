<script type="text/javascript">
$(function(){
	$('.add-attendees-details').click(function() {
		var sid=$(this).attr("_sid");
		var oid=$(this).attr("_oid");
		$('#jq-scheduleId').val(sid);
		$('#jq-orderId').val(oid);
	        $('.di-over-lay').show();  
	        $('.add-attendees-details-form').show();
	});	
	$('#add-attendees-data').click(function() {
		 $.ajax({
	           type:'get',
	           url:BASE_URL+'user/addattendees',
	           data:{'oid':$('#jq-orderId').val(),'sid':$('#jq-scheduleId').val(),'name':$('#jq-name').val(),'mobile':$('#jq-mobile').val(),'org':$('#jq-organization').val(),'email':$('#jq-email').val(),'country':$('#jq-country').val(),'city':$('#jq-city').val()},
	           success:function(data){
	        	  $('.add-form').hide();  
	          	 $('.add-attendees-success').show();
	           }
	       }); 
	});	
	$('.add-more').click(function(){
		$('.add-attendees-success').hide();  	
		$('.add-form').show();  	
	});
	$('.hide-box-login').click(function(){   
		$('.di-over-lay').hide();	
		$('.add-attendees-details-form').hide();
 });
});
</script>
<div class="linebr"></div><br/>
<div class="row" >
	<div class="col-sm-1"><label>SNO</label></div>
	<div class="col-sm-1"><label>Program ID</label></div>
	<div class="col-sm-3 pdngr"><label>Program Name</label></div>
	<div class="col-sm-1 pdngr"><label>Fee</label></div>
	<div class="col-sm-2"><label>Training Date</label></div>
	<div class="col-sm-2"><label>Status</label></div>
	<div class="col-sm-1"><label>No. of attendees</label></div>
	<div class="col-sm-1"></div>
</div>
<div class="linebrg"></div>
<?php $ct=1; foreach($myschedules as $schedules){ ?>
	<div class="row">
		<div class="col-sm-1"><?=$ct++;?></div>
		<div class="col-sm-1"><?=$schedules['schedule_id'] ?></div>
		<div class="col-sm-3 pdngr"><?=$schedules['name'] ?> </div>
		<div class="col-sm-1 pdngr"><?=$schedules['course_price'] ?> </div>
		<div class="col-sm-2"><?=$schedules['schedule_start_time'] ?></div>
		<div class="col-sm-2"><?=$schedules['order_status'] ?> </div>
		<div class="col-sm-1"><?=$schedules['quantity'] ?> </div>
		<div class="col-sm-1"><?php 
		if($schedules['order_status']=='scheduled'){?>
		    <a href="#" class="add-attendees-details blue-bg" _sid="<?=$schedules['schedule_id'] ?>" _oid="<?=$schedules['id'] ?>"> Add attendees </a>
		<?php }?> </div>
	</div>
	<div class="linehr"></div>
<?php } ?>

<div class="add-attendees-details-form" style="display: none;text-align:center">
<a href="#" class="hide-box-login"><span id="orangeBox"></span></a>
   <div class="row">
     <div class="col-md-2"></div>
      <div class="col-md-8">
       <div class="add-form">
	 	<div class="row">
			<div class="col-sm-12"><input type="text" class="form-control" id="jq-name" placeholder="Name"/></div>
		</div>	
		<div class="row">
			<div class="col-sm-12"><input type="text" class="form-control"  id="jq-mobile" placeholder="Mobile No"/></div>
		</div>	
		<div class="row">
			<div class="col-sm-12"><input type="text"  class="form-control" id="jq-email" placeholder="Email ID"/></div>
		</div>	
		<div class="row">
			<div class="col-sm-12"><input type="text" class="form-control"  id="jq-organization" placeholder="Organization"/></div>
		</div>	
		<div class="row">
			<div class="col-sm-12"><input type="text"  class="form-control" id="jq-city" placeholder="City"/></div>
		</div>	
		<div class="row">
			<div class="col-sm-12"><input type="text"  class="form-control" id="jq-country" placeholder="Country"/></div>
		</div>	
		<div class="row">
			<div class="col-sm-12 aligncenter">
				<input type="hidden" id="jq-orderId" />
				<input type="hidden" id="jq-scheduleId" />
				<button class="btn btn-default" id="add-attendees-data">   Add Attendee  </button><br /><br />
			</div>
		</div>	
		</div>
		<div class="add-attendees-success" style="display: none;font-size:16px">Atendee added<br /><br />
				<a href="#" class="add-more">Add more attendee</a>
		</div>
		</div>
		 <div class="col-md-2"></div>
		</div>
	</div>