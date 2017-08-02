<div class="row white-bg pdngr">	
	<div class="col-md-12 pdngr">
		<div class="row">
			<div class="col-sm-12">
			
			</div>
		</div>
		<div class="row move-topayment-gatway">
						<div class="col-sm-4">
				<div class="row">
					<div class="col-sm-12 aligncenter"><b>Billing Details</b></div>
				</div>	
				<div class="row">
					<div class="col-sm-2"> Name :</div>
					<div class="col-sm-6"><input type="text" id="billing_name" class="form-control" /><div class="required-field-1"></div></div>
					<div class="col-sm-4"> </div>
				</div>
				<div class="row">
					<div class="col-sm-2"> Address :</div>
					<div class="col-sm-10"><input type="text" id="billing_address" class="form-control"/><div class="required-field-2"></div></div>
				</div>
				<div class="row">
					<div class="col-sm-2"> City :</div>
					<div class="col-sm-4"><input type="text" id="billing_city"  class="form-control"/><div class="required-field-3"></div></div>
					<div class="col-sm-2 alignright"> State :</div>
					<div class="col-sm-4"><input type="text" id="billing_state"  class="form-control"/><div class="required-field-4"></div></div>
				</div>
				<div class="row">
					<div class="col-sm-2"> Zip :</div>
					<div class="col-sm-4"><input type="text" id="billing_zip" class="form-control"/><div class="required-field-5"></div></div>
					<div class="col-sm-2 alignright">Country :</div>
					<div class="col-sm-4"><input type="text" id="billing_country" class="form-control"/><div class="required-field-6"></div></div>
				</div>
				<div class="row">	
					<div class="col-sm-2"> Email :</div>
					<div class="col-sm-10">
						<input type="text" id="billing_email" class="form-control"/>
						<input type="hidden" id="order_id" class="form-control" value="<?=$orderId?>"/>
						<div class="required-field-8"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">Phone :</div>
					<div class="col-sm-6">
						<input type="text" id="billing_tel"  class="form-control"/>
							<div class="required-field-7"></div>
					</div><div class="col-sm-4"></div>
				</div>
			</div>
			<div class="col-sm-8">
				<p style="color: #0088cc;font-size:1.5em; text-align:center">AgileNCR Conference 2016</p>
				<hr>
				<div class="row">	
					<div class="col-sm-4"> </div>
					<div class="col-sm-2"> 
						<p>Amount :</p>
						<p>Tax @15%:</p>
						<p>Total Amount to Pay:</p>
					</div>
					<div class="col-sm-2">
						<p>Rs. <?=$amount ?></p>
						<p><?=$amount*15/100 ?></p>
						<p><?=$amount + $amount*15/100?>
					</div>
					<div class="col-sm-4"><input type="button" id="jq-payment-instant" value="Payment" class="blue-bg"/></div>
					<div class="respose-wait-gateway" style="display:none">
						<img  src="<?php echo base_url()?>_static/assets/img/loading.gif" >  
					</div>
				</div>
				
			</div>
		</div>
		<div class="row">
					<div class="col-sm-12 aligncenter">
						<p>&nbsp; </p>	
					<div class="payment-gatway-frame-veiw-data"></div>
				</div>
		</div>	
	</div>
</div>
<p>&nbsp; </p>	<p>&nbsp; </p>	
<script type="text/javascript">
  $(function() {
    	checkout();
    });
	</script>