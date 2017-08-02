<script type="text/javascript">
	$(function(){
		$('#hide-box').click(function(){   
			$('.contact-for-customization').hide();
			 $('.di-over-lay').hide();	
		});
	});
	$(function(){
		$('#jq-contact-customization').click(function(){  
			 var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  
			$('.required-field-1').hide();$('.required-field-5').hide();
			$('.required-field-2').hide();$('.required-field-6').hide();
			$('.required-field-3').hide();$('.required-field-7').hide();
			$('.required-field-4').hide();
			var name = $('#jq-name').val();
			var contact = $('#jq-contact').val();
			var email = $('#jq-email').val();
			var org = $('#jq-org').val();
			var desi = $('#jq-des').val();
			var course = $('#jq-course').val();
			var participant = $('#jq-participant').val();
			var msg = $('#jq-message').val();
			if(name=="" || name==null){$('.required-field-1').html('Name is required field').show();return false; }
			if(contact=="" || contact==null){$('.required-field-2').html('Contact is required field').show();return false; }
			if(email=="" || !emailReg.test(email)){$('.required-field-3').html('Email is required field').show();return false; }
			if(org=="" || org==null){$('.required-field-4').html('Organization is required field').show();return false; }
			if(desi=="" || desi==null){$('.required-field-5').html('Designation is required field').show();return false; }
			if(participant=="" || participant==null){$('.required-field-6').html('Number of Participants is required field').show();return false; }
			if(course=="000"){$('.required-field-7').html('Course is required field').show();return false; }
			 $.ajax({
	             type:'post',
	             url:BASE_URL+'pages/sendCustomization',
	             data:{'name':name,'contact':contact,'email':email,'org':org,'desi':desi,'course':course,'participant':participant,'msg':msg},
	             success:function(data){
	                 $('.success').html('We have recieved your query, We will contact you soon!').show();
	                 setTimeout(function(){             
	                	 $('.contact-for-customization').hide();
		                 $('.di-over-lay').hide();
	            	},3000);
	             }
	         });
		});
	});
	
</script>
<a href="#" id="hide-box"><span id="orangeBox"></span></a> 
<div class="row">
	<div class="col-md-12">
		<div class="heading-blue-1">Contact Us</div>
		Please provide your details below.
		<hr class="solid" />
	</div>
</div>	
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12" style="text-align: center;">
				<div class="row">
					<div class="col-sm-6 pdngr alignleft">
						<label>Name*</label>
						<input type="text" id="jq-name" class="form-control" />
						<div class="required-field-1"></div>
					</div>
					<div class="col-sm-6 pdngr alignleft">
						<label>Contact No*</label>
						<input type="text" id="jq-contact" class="form-control" />
						<div class="required-field-2"></div>
					</div>
				</div>	
				<div class="row">
					<div class="col-sm-6 pdngr alignleft">
						<label>Email Address*</label>
						<input type="text" id="jq-email" class="form-control" />
						<div class="required-field-3"></div>
					</div>
					<div class="col-sm-6 pdngr alignleft">
						<label>Organization*</label>
						<input type="text" id="jq-org" class="form-control" />
						<div class="required-field-4"></div>
					</div>
				</div>	
				<div class="row">
					<div class="col-sm-6 pdngr alignleft">
						<label>Designation*</label>
						<input type="text" id="jq-des" class="form-control" />
						<div class="required-field-5"></div>
					</div>
					<div class="col-sm-6 pdngr alignleft">
						<label>Number of Participants*</label>
						<input type="text" id="jq-participant" class="form-control" />
						<div class="required-field-6"></div>
					</div>
				</div>		
				<div class="row">
					<div class="col-sm-12 pdngr alignleft">
						<label>Course*</label>
						<select id="jq-course" class="form-control">
							<option value="000">-------Select course-------</option>
							<?php foreach ($courses as $course) {?>
							<option value="<?=$course['name'] ?>"><?=$course['name'] ?></option>
							<?php }?>
						</select>
						<div class="required-field-7"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 pdngr alignleft">
						<label>Message</label>
						 <textarea rows="3" cols="50"  class="form-control" id="jq-message"></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 aligncenter">
						 <button class="btn btn-default" id="jq-contact-customization">Submit</button>
						 <div class="success" style="color:green;font-size: 12px;display: none" ></div>
					</div>
				</div>
								
		</div>
	</div>
</div>	