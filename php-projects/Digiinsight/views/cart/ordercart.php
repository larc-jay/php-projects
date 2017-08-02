<script type="text/javascript">
$(function() {
	cart();
});
</script>
<?php if(count($this->cart->contents())>0){?>
<div class="row grl-bg pdngr">
	<div class="col-md-12 pdngr">
		<div class="row ">
			<div class="col-sm-12">
				<br /><span class="heading-blue-2">Order Summary</span><br /><br />
			</div>
		</div>	
		<div class="white-bg pdngr">
		<?php $ct =1; foreach ($this->cart->contents() as $items): ?>
		<div class="row ">
			<div class="col-sm-12 txtcolorb">
				<h4 style="font-weight:300;font-size:22px;"><?php echo $items['course']; ?></h4>
			</div>
		</div>
		<div class="row txtcolorb">
			<div class="col-sm-3 alignleft color777">Training Date</div>
			<div class="col-sm-3 alignleft color777">Provider</div>
			<div class="col-sm-2 alignleft color777">No. of Participants</div>
			<div class="col-sm-2 alignleft color777">Amount</div>
			<div class="col-sm-2 alignleft color777"> </div>
		</div>
		<div class="row txtcolorg">
			<div class="col-sm-3 alignleft"><?php echo  date_format(date_create($items['sdate']),'d M, Y').' - '.date_format(date_create($items['edate']),'d M, Y'); ?></div>
			<div class="col-sm-3 alignleft"><?php echo $items['name']; ?></div>
			<div class="col-sm-2 alignleft">
					 <span class="glyphicon glyphicon-minus incr-decr downqty "  _id="<?=$ct?>"></span>
				      <input type="text" value="<?php echo $items['qty']; ?>" class="no-of-participant-<?=$ct?>" id="no-of-participant" size="2" style="background:#fff;border:none;text-align:center"/>
				     <span class="glyphicon glyphicon-plus incr-decr upqty" _id="<?=$ct?>"></span><br />
				     <a class="save-qty save-qty-<?=$ct?>" style="display: none" _qid=<?=$ct?>  _rowid="<?=$items['rowid']?>" style="color:#0088cc;">Save</a>
			</div>
			<div class="col-sm-2 alignleft"><?php echo $this->cart->format_number($items['price']); ?></div>
			<div class="col-sm-2 alignleft"> <a href="#remove" class="remove-cart-program"  _rowid="<?=$items['rowid']?>" style="color:#0088cc;font-size:16px;">
				 <button type="button" class="btn btn-sm">
			          <span class="glyphicon glyphicon-remove"></span> Remove 
			        </button>
			</a></div>
		</div>
		<?php $ct++; endforeach; ?>
		<p>&nbsp;</p>
		<div class="gery-line-nm"></div>
		<p>&nbsp;</p>
		<div class="row pdngr">
			<div class="col-sm-2 txtcolorb font-md">
				Promo Code<br />
				<input type="text" id="promo-code"  class="form-control" style="width:200px">&nbsp; 
			</div>
			<div class="col-sm-3 txtcolorb alignleft"><p>&nbsp;</p>
				<p><a href="#apply-promo-code" style="color:#0088cc;padding:10px;font-size:18px">Apply</a></p>
			</div>
			<div class="col-sm-2 txtcolorg alignright font-md">
				<p>Total Amount :</p>
				<p>Service Tax @15% :</p>
				<p class="txtcolorb">Total Payable :</p>
			</div>
			<div class="col-sm-1"></div>
			<div class="col-sm-2 alignleft font-md">
				<p class ="txtcolorg">Rs. <?php echo $this->cart->format_number($this->cart->total()); ?></p>
				<p class ="txtcolorg">Rs.  <?php echo $this->cart->format_number($this->cart->total()*TAX_PERCENT/100); ?></p>
				<p class ="txtcolorb">Rs.  <?php echo $this->cart->format_number($this->cart->total() + $this->cart->total()*15/100);?></p>
			</div>
		</div>
		<div class="row pdngr">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<br />
				<p><button id="register-user-checkout" class="blue-bg" style="padding:5px 20px">Checkout</button></p>
				<p><a href="<?=WEBPATH?>courses/courses" style="color:#0088cc;">Add More Programs</a> </p>
			</div>
		</div>
		<p>&nbsp;</p>
		</div>
	</div>
</div>	
<?php }else {?>
<div class="row pdngr">
	<div class="col-md-12  white-bg aligncenter">
		<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		<div style="color:red ;">Your cart is empty</div>
		<p>&nbsp;</p>
		<a href="<?=WEBPATH?>courses/courses">Add program in cart</a>
		<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	</div>
</div>	
<?php }?>
<input type="hidden" class="ue837hxnslso0e7nxmxdhddhod8e873dhjd" value="<?php if(isset($this->session->di_logged_in) && $this->session->di_logged_in){?>1<?php }else {?>0<?php }?>">
<?php if(!isset($this->session->di_logged_in) && !$this->session->di_logged_in){?>	
<div class="your-details" style="display:none;background:#f0f0f0">
<div class="respose-wait-cart" style="display:none">
	<img  src="<?php echo base_url()?>_static/assets/img/loading.gif" >  
</div>
<br />
<div class="row grl-bg pdngr">
	<div class="col-md-12 pdngr"><span class="heading-blue-2">Your Details</span></div>
</div>
<div class="row pdngr ">
<div class="col-md-12 grl-bg pdngr">
<div class="row   white-bg ">
	<div class="col-md-6 pdngr"><p>&nbsp;</p>
		<p><span class="heading-3">
			<input type="radio" name="loginu" value="r" checked/> Registered Users, Login &nbsp;&nbsp;
			<input type="radio" name="loginu" value="g"/> Continue as Guest</span></p>
		<div class="login-register-user">	
			<div class="user-login-error" style="color:red"></div>
			<p><input type="text" id="jq-email"  class="form-control"  style="width:300px"></p>
			<p><input type="password" id="jq-password" class="form-control"  style="width:300px"></p>
			<p><button id="user-login" class="blue-bg" style="padding: 5px 20px">Login</button> &nbsp; 
			<a href = "#recover-password" id="jq-forgot-password-tab" style="color:#0088cc;">Recover Password</a></p>
			<p>&nbsp;</p><p>&nbsp;</p>
			<div class="row">
				<div class="col-sm-2 txtcolorg font-md">
					Login Using 
				</div>
				<div class="col-sm-10 ">
					<a href="https://www.linkedin.com/company/digiinsight" class="social-icon-l" style="background:#f0f0f0"> <i class="fa fa-linkedin"></i></a>
					<a href="https://www.linkedin.com/company/digiinsight" class="social-icon-g"  style="background:#f0f0f0;"> <i class="fa fa-google fa-2" ></i></a> 
					<a href="https://www.facebook.com/digiinsight/" class="social-icon-f"  style="background:#f0f0f0;"> <i class="fa fa-facebook"></i></a>
				</div>
			</div>	
			<p>&nbsp;</p> <br />
		 </div>
		 <div class="login-as-guest-user" style="display: none">	
		 	<div class="row">
				<div class="col-sm-12">
					<span class="heading-2">Continue as Guest</span>
				</div>
			</div>	
			<div class="row">
				<div class="col-sm-6">
					<p><input type="text" id="user-name"  class="form-control" placeholder="Enter Your Name"><div class="required-field-1"></div></p>
				</div>
			</div>	
			<div class="row">
				<div class="col-sm-6">
					<p><input type="text" id="user-email"  class="form-control"  placeholder="Enter Your Email"><div class="required-field-2"></div></p>
				</div>
			</div>	
			<div class="row">
				<div class="col-sm-6">
					<p><input type="text" id="user-mobile"  class="form-control"  placeholder="Enter Your Mobile"></p>
				</div>
			</div>	
			<div class="row">
				<div class="col-sm-6">
				 	<p><button id="guest-user-checkout" class="blue-bg" style="padding: 5px 20px;">Continue</button></p>
				 	<div class="guest-user-error"></div>
				 	</div>
		 	</div>
		 	 <br /><p>&nbsp;</p>
		 </div>
		<br />
	 </div>
	<div class="col-md-6">
		<div class="row">
			<div class="col-sm-12">
				<br />
				<img alt="" src="<?php echo base_url();?>_static/assets/img/NewUserSignUpIcon.png" style="width:90px;">
				<span class="heading-1">New User ? SignUp</span>
			</div>
		</div>		
		<br />
		<div class="row">
			<div class="col-sm-12">
				<div class="blubox" style="margin-left:35px">
					<span class="heading-yellow-1">Advantages of Sign Up</span>
					<br /><br/> 	
					<ul>
						<li> Manage your Orders </li>
					<li>Easily track Orders, Hassel free cancellation</li>
					<li> Make Informed Decisions</li>
					<li> Get Relevant Alerts and Recommendations </li>
					<li> Engage Socially with wishlists, Reviews, Ratings</li>
				</ul>
				</div>
			</div>
		</div>	
		<br />
	 </div>
 </div>
  <div class="row fp-pass" id="jq-forgot-password" style="display: none;">
	    <div class="col-md-12 aligncenter">
	    	<a href="#close" onclick="return null" id="hide-box-login"><span id="orangeBox"></span></a> 
	    	<p> &nbsp;</p>
			<input type="text" id="jq-fp-email" class="form-control" placeholder="Enter Your Registered Email">
			<button  class="btn blue-bg" id="user-forgot-passwd-submit" style="padding:9px 30px;float:left; margin: 15px 0 0 1%;">Submit</button> 
			<div class="user-fp-success" style="color:green"></div>
		    <div class="user-fp-error" style="color:red"></div>
	    </div>		
 	</div>	
 <br />
</div>
</div>
</div>
<?php }?>