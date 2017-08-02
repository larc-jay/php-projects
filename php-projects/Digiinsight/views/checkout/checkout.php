<div class="row grl-bg pdngr">	
	<div class="col-md-12 pdngr">
		<div class="row pdngrt">
			<div class="col-sm-12"><span class="heading-blue-2">Billing Details</span>	</div>
		</div>
		<div class="row pdngrt move-topayment-gatway white-bg">
			<div class="col-sm-6 pdngr"><p>&nbsp;</p>
				<!-- span class="heading-grey">Please enter billing details</span><br /><br / -->
				<div class="row">
					<div class="col-sm-2"> Name :</div>
					<div class="col-sm-6"><input type="text" id="billing_name" class="form-control" value="<?=$this->session->di_fname?>"/><div class="required-field-1"></div></div>
					<div class="col-sm-4"> </div>
				</div>
				<div class="row">
					<div class="col-sm-2"> Address :</div>
					<div class="col-sm-10"><input type="text" id="billing_address" class="form-control"/><div class="required-field-2"></div></div>
				</div>
				<div class="row">
					<div class="col-sm-2"> City :</div>
					<div class="col-sm-4"><input type="text" id="billing_city"  class="form-control"/><div class="required-field-3"></div></div>
					<div class="col-sm-2 aligncenter"> State :</div>
					<div class="col-sm-4"><input type="text" id="billing_state"  class="form-control"/><div class="required-field-4"></div></div>
				</div>
				<div class="row">
					<div class="col-sm-2"> Zip :</div>
					<div class="col-sm-4"><input type="text" id="billing_zip" class="form-control"/><div class="required-field-5"></div></div>
					<div class="col-sm-2 aligncenter">Country :</div>
					<div class="col-sm-4"><input type="text" id="billing_country" class="form-control"/><div class="required-field-6"></div></div>
				</div>
				<div class="row">	
					<div class="col-sm-2"> Email :</div>
					<div class="col-sm-10">
						<input type="text" id="billing_email" class="form-control" value="<?=$this->session->di_email?>"/>
						<input type="hidden" id="order_id" class="form-control" value="<?=$order?>"/>
						<div class="required-field-8"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">Phone :</div>
					<div class="col-sm-6">
						<input type="text" id="billing_tel"  class="form-control"/>
							<div class="required-field-7"></div>
					</div><div class="col-sm-4"></div>
				</div><p>&nbsp;</p>
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-5">
				<div class="respose-wait-gateway" style="display:none">
						<img  src="<?php echo base_url()?>_static/assets/img/loading.gif" >  
					</div>
				<div class="row payment-opt white-bga" style="width:75%;margin-left:5%;margin-top:15%">	
					<div class="col-sm-12 aligncenter">
					<p>&nbsp;</p>
						<p style="font-size: 18px;color:#777">Total Amount to Pay:  Rs. <?=$amount ?></p>
						<button id="jq-payment" class="btn or-btn">Proceed to Pay</button>
						<p>&nbsp;</p>
				  </div>
				</div>
			</div>
		</div>
		<div class="row white-bg">
					<div class="col-md-2"></div>
					<div class="col-md-8 aligncenter">
						<div class="payment-gatway-frame-veiw-data"></div>
					</div>
					<div class="col-md-2"></div>
				</div>	
	</div>
</div>
<p>&nbsp; </p>	<p>&nbsp; </p>	
<script type="text/javascript">
  $(function() {
    	checkout();
    });
	</script>