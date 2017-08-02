<script type="text/javascript">
$(function() {
	attendees();
});
</script>
<div class="row pdngr grl-bg">
<div class="col-md-12">
<div class="row cart-success ">
	<div class="col-md-4 aligncenter">
		<p>&nbsp; </p><p>&nbsp; </p>
		<img alt="" src="<?=base_url()?>_static/assets/img/Confirm-Icon.png" width="180" height="160"/>
	</div>
	<div class="col-md-8">
			<p>&nbsp; </p>
			<p style="color:#0088cc;font-size:4.5em">Thank you !</p>
			<p style="color:#fff;font-weight: 300;font-size:1.8em;letter-spacing:2px;margin-right:20px"><?=$message?></p>
			<p>
			<span style="color: #0088cc;font-size:1.8em">Share your update on </span> &nbsp; &nbsp; &nbsp;
			<span>
			 	 <a href="https://www.facebook.com/digiinsight/" class="social-icon-fs"> <i class="fa fa-facebook"></i></a>
	 	 		 <a href="https://twitter.com/InsightDigi" class="social-icon-ts"> <i class="fa fa-twitter"></i></a>
	 	 		 <a href="https://www.linkedin.com/company/digiinsight" class="social-icon-ls"> <i class="fa fa-linkedin"></i></a>
			</span>
			</p>
			<br />
	</div>
</div>
<div class="row pdngrt">
			<div class="col-sm-12"><span class="heading-blue-2">Order Details</span>	</div>
</div>
		
<div class="row  white-bg pdng">
	<div class="col-md-3 pdngr " >
			<p>&nbsp;</p>
			<p class="order-success"><b>Order Status</b> <br /><?=$status?></p>
			<p class="order-success"><b>Order Id </b> <br /><?=$orderId?></p>
			<p class="order-success"><b>Transaction Id </b> <br /><?=$transactionId?></p>
			<p class="order-success"><b>Bank Reference Id </b> <br /><?=$bankRefNo?></p>
	</div>
	<div class="col-md-9 pdngr" style="border-left:1px solid #ccc">
		<h3>You have registered for :</h3>
		<div class="row">
			<div class="col-sm-12">
				<?php $ct =1; foreach ($this->cart->contents() as $items): ?>
				<br /> <span class="cart-heading"><?=$ct;?>.  <?=$items['course']?></span><br />
				 <span class="cart-messege">
				 	Date :<?=date_format(date_create($items['sdate']),'d M, Y').'-'.date_format(date_create($items['edate']),'d M, Y'); ?> &nbsp;&nbsp;&nbsp;&nbsp;
				    Provider : <?=$items['name']; ?>&nbsp;&nbsp;&nbsp;&nbsp;
				    Training Type :  <?=$items['trainingtype']; ?> &nbsp;&nbsp;&nbsp;&nbsp;
				    No. of attendees :<?=$items['qty']; ?>
				 </span> 	
				 <?php $ct++; endforeach; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<h4>Booked By :</h4>
			</div>
			<div class="col-sm-8">	
				<h4 class="cart-heading"><?=$billings->name?> </h4>
			</div>
		</div>	
		<div class="row">
			<div class="col-sm-2"> </div>
			<div class="col-sm-2">
				Email :<br />
				Phone :<br />
				Address :<br />
			</div>
			<div class="col-sm-8">
				<?=$billings->email?><br />
				<?=$billings->phone?><br />
				
					<?=$billings->address?>, &nbsp; <?=$billings->city?>, &nbsp; <?=$billings->state?>-
					<?=$billings->zip?>,&nbsp;<br><?=$billings->country?>
				
			</div>
		</div>	
		<p>&nbsp;</p>
	</div>
</div>		

<div class="row pdngrt">
			<div class="col-sm-12"><span class="heading-blue-2">Who is going to attend?</span>	<br>
			<span class="success-messege">Don't worry. You can change attendee's Details later</span>
			</div>
</div>
<div class="row white-bg pdngr">	
	<div class="col-md-4 pdngr">
	<p>&nbsp;</p>
		<div class="book-myself" style="color:#333;margin-bottom:20px;"><button id="jq-book-myself" class="btn">I bookes this for myself</button></div>
	<div class="attendees-details" id="add-more">
	 	<div class="row">
			<div class="col-sm-8"><input type="text" class="form-control" id="jq-name" placeholder="Name"/></div>
		</div>	
		<div class="row">
			<div class="col-sm-8"><input type="text" class="form-control"  id="jq-mobile" placeholder="Mobile No"/></div>
		</div>	
		<div class="row">
			<div class="col-sm-8"><input type="text"  class="form-control" id="jq-email" placeholder="Email ID"/></div>
		</div>	
		<div class="row">
			<div class="col-sm-8"><input type="text" class="form-control"  id="jq-organization" placeholder="Organization"/></div>
		</div>	
		<div class="row">
			<div class="col-sm-8"><input type="text"  class="form-control" id="jq-city" placeholder="City"/></div>
		</div>	
		<div class="row">
			<div class="col-sm-8"><input type="text"  class="form-control" id="jq-country" placeholder="Country"/></div>
		</div>	
		<div class="row">
			<div class="col-sm-8 ">
				<input type="hidden" id="jq-orderId" value="<?=$orderId?>"/>
				<button class="btn btn-default" id="jq-attendees-details">   Submit  </button><br /><br />
			</div>
		</div>	
		<br /><br />
		</div>
	</div>
	<div class="col-md-8 pdngr">
	<p>&nbsp;</p>
		<div class="jq-attendees"> </div>
		<div class="row more-attendees" style="display: none;">
			<div class="col-sm-12 aligncenter" >
			<p>&nbsp;</p>
			<img alt="Add more attendees" src="<?=base_url()?>_static/assets/img/more-attendees.png" height="50">
				<a href="#add-more" id="jq-atnd-dt">Add more attendees</button>
			</div>
		</div>
		<p>&nbsp;</p>
	</div>
</div>	

<!-- div class="row white-bg pdngr">	
	<div class="col-md-12 pdngr aligncenter">
		 <span class="success-messege">Don't worry. You can change attendee's Details <b>later</b>
		&nbsp;&nbsp; <button id="jq-atnd-save" class="btn btn-default">&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
		 </span>
		 <div class="attendees-details-msg" style="color:green;"></div>
	</div>
</div-->	
<p>&nbsp;</p>
	<div class="row" style="min-height:500px" id="homebottompattern">
			<div class="col-md-12" >
				<div class="container" style="text-align: center;">
					<h2 style="color:#fff">Get Email Update</h2>
					<hr />
					<p style="color:#fff;font-size:1.5em">
					Newsletter : Sign up and be the first ti reviev:Exclusive offers! and style tips! the latest fashion news: newletter
					Sign upand be the first ti reviev:Exclusive offers! and style tips! Sign up and be the first ti reviev:Exclusive offers!
					 and style tips! the latest fashion news: newletter	Sign upand be the first ti reviev:Exclusive offers! and style tips!</p>
					 <input name="news-letter" id="news-letter" type="text" style="width:50%;border-radius:5px;padding:15px;"  placeholder="you@yourdomain.com......" >
					 <button class="btn btn-default" type="button" style="background: #f89c06 ;border-radius: 5px;color:#fff;font-size:1.5em">Submit</button>
				</div>
			</div>
	</div>	
	<p>&nbsp;</p>
	</div>
</div>	