<script type="text/javascript">
$(function() {
	$(".jq-enroll-now").click(function() {
		 var schedule = $(this).attr('_schedul_');
		 $.ajax({
           type:'get',
           url:BASE_URL+'cart/cart',
           data:{'sid':schedule},
           success:function(data){
          	 window.location.replace(BASE_URL+"cart/ordercart");
           }
       }); 
	 });
});
</script>
<?php foreach($schedules as $schedule){?>
<div class="row white-bg pdngr">	
	<div class="col-sm-1 "><span class="vcenter"><?=$schedule['stime'] ?></span></div>
	<div class="col-sm-3"><span class="vcenter"><?=$schedule['vname'] ?></span></div>
	<div class="col-sm-2 "><span class="vcenter"><?=$schedule['trainingtype']?></span></div>
	<div class="col-sm-3"><span class="vcenter"><?=$schedule['cname']?></span></div>
	<div class="col-sm-1"><span class="vcenter"><?=$schedule['loc']?></span></div>
	<div class="col-sm-1"><span class="vcenter"><?=$schedule['price']?></span></div>
	<div class="col-sm-1 "><span class="vcenter"><a href="#enroll-now" _schedul_="<?=$schedule['scid']?>"  class="jq-enroll-now blue-bg">Book Now</a> </span></div>
</div>	
<?php }?>