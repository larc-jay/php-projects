var BASE_URL="https://www.digiinsight.com/";
function login(){
	$("#jq-logged-in").click(function() {
		$('#jq-user-pannel').toggle();
	});
	$('#jq-search').click(function(){
		$('#jq-search').html($('.loc-list').html()).show();
	});
	$('.locx').click(function(){
		alert($(this).html());
		$('#jq-search').html('');
		$('#jq-search').html($('.locx').html());
	});
}
function loginsignup(){
	$(".login-signup").click(function() {
		$('.di-over-lay').show();
		 $.ajax({
             type:'get',
             url:BASE_URL+'auth/login',
             data:{'action':'login'},
             success:function(data){
                 $('.user-login-signup').html(data).show();
             }
         });
	});
	$(".user-login-fp").click(function() {
		$('.di-over-lay').show();
		 $.ajax({
             type:'get',
             url:BASE_URL+'auth/changePassword',
             data:{'action':'changePassword'},
             success:function(data){
                 $('.user-forgot-password').html(data).show();
             }
         });
	});
	
	$('#jq-programm-search').click(function(){
		var keyword = $('#srch-term').val();
		var location = $('#location').val();
			 $.ajax({
	             type:'post',
	             url:BASE_URL+'courses/programsearch',
	             data:{'keyword':keyword,'location':location},
	             success:function(data){
	            	 alert();
	            	 window.location.replace(BASE_URL+"courses/programsearch");
	             }
	         });
	});
}

 function show(){
		$('#location').toggle();
}
function homePageLoad(){
	  	  $("#myCarousel").carousel({interval: 100000});
	  	  $(".classroom").click(function() {
	         $("#myCarousel").carousel(0);
	         $(this).addClass('active');
	         setTimeout(function(){
		         $(".virtual").removeClass('active');
		         $(".elearning").removeClass('active');
		         $(".corporate").removeClass('active');
		         $('.home3pattern').removeClass('home3pattern2')
		         $('.home3pattern').removeClass('home3pattern3')
		         $('.home3pattern').removeClass('home3pattern4')
		         $('.home3pattern').addClass('home3pattern1')
	         },500);
	      });
	      
	      $(".virtual").click(function() {
	         $("#myCarousel").carousel(1);
	         $(this).addClass('active');
	         setTimeout(function(){
		         $(".classroom").removeClass('active');
		         $(".elearning").removeClass('active');
		         $(".corporate").removeClass('active');
		         $('.home3pattern').removeClass('home3pattern1')
		         $('.home3pattern').removeClass('home3pattern4')
		         $('.home3pattern').removeClass('home3pattern3')
		         $('.home3pattern').addClass('home3pattern2')
	         },500);
	      });
	      
	      $(".elearning").click(function() {
	         $("#myCarousel").carousel(2);
	         $(this).addClass('active');
	         setTimeout(function(){
		         $(".classroom").removeClass('active');
		         $(".virtual").removeClass('active');
		         $(".corporate").removeClass('active');
		         $('.home3pattern').removeClass('home3pattern1')
		         $('.home3pattern').removeClass('home3pattern2')
		         $('.home3pattern').removeClass('home3pattern4')
		         $('.home3pattern').addClass('home3pattern3')
	         },500);
	      });
	      $(".corporate").click(function() {
	          $("#myCarousel").carousel(3);
	          $(this).addClass('active');
	          setTimeout(function(){
		          $(".classroom").removeClass('active');
			      $(".elearning").removeClass('active');
			      $(".virtual").removeClass('active');
		         $('.home3pattern').removeClass('home3pattern1')
		         $('.home3pattern').removeClass('home3pattern2')
		         $('.home3pattern').removeClass('home3pattern3')
		         $('.home3pattern').addClass('home3pattern4')
	          },500); 
	       });
	$("#jq-pick-up-start-date").datepicker({
		dateFormat : "yy-mm-dd"
	});
	$("#jq-pick-up-end-date").datepicker({
		dateFormat : "yy-mm-dd"
	});

	$("#mainmenu").click(function() {
		$('.main-menu').toggle();
		$('.category').hide();
	});
	$("#cat").click(function() {
		$('.category').toggle();
		$('.main-menu').hide();
	});
	 $(".nav-tabs a").click(function(){
	        $(this).tab('show');
	 });
	 $('.lfte').click(function(){
		 $('.level-1-lfe').removeClass('level-1-lfe').addClass('level-1-lfe-active');
		 $('.level-1-ac-active').removeClass('level-1-ac-active').addClass('level-1-ac');
		 $('.level-1-hfe-active').removeClass('level-1-hfe-active').addClass('level-1-hfe');
		 $('.level-1-rcs-active').removeClass('level-1-rcs-active').addClass('level-1-rcs');
	 });
	  $('.acurr').click(function(){
		  $('.level-1-ac').removeClass('level-1-ac').addClass('level-1-ac-active');
		  $('.level-1-lfe-active').removeClass('level-1-lfe-active').addClass('level-1-lfe');
		  $('.level-1-hfe-active').removeClass('level-1-hfe-active').addClass('level-1-hfe');
		  $('.level-1-rcs-active').removeClass('level-1-rcs-active').addClass('level-1-rcs');
	 });
	  $('.hfe').click(function(){
		  $('.level-1-hfe').removeClass('level-1-hfe').addClass('level-1-hfe-active');
		  $('.level-1-ac-active').removeClass('level-1-ac-active').addClass('level-1-ac');
		  $('.level-1-lfe-active').removeClass('level-1-lfe-active').addClass('level-1-lfe');
		  $('.level-1-rcs-active').removeClass('level-1-rcs-active').addClass('level-1-rcs');
	 });
	  $('.rcs').click(function(){
		  $('.level-1-rcs').removeClass('level-1-rcs').addClass('level-1-rcs-active');
		  $('.level-1-hfe-active').removeClass('level-1-hfe-active').addClass('level-1-hfe');
		  $('.level-1-ac-active').removeClass('level-1-ac-active').addClass('level-1-ac');
		  $('.level-1-lfe-active').removeClass('level-1-lfe-active').addClass('level-1-lfe');
	 });
	  $('.level-1-lfe-active').click(function(){
		     $('.level-1-lfe').removeClass('level-1-lfe').addClass('level-1-lfe-active');
			 $('.level-1-ac-active').removeClass('level-1-ac-active').addClass('level-1-ac');
			 $('.level-1-hfe-active').removeClass('level-1-hfe-active').addClass('level-1-hfe');
			 $('.level-1-rcs-active').removeClass('level-1-rcs-active').addClass('level-1-rcs');
		 });
	  
	  $('#jq_newsletter').click(function(){
		  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  if($('#news-letter').val()=="" || !emailReg.test($('#news-letter').val())){
			  $('.news-letter-msg').html('Please enter valid email id').show();
			  return false;
		  }
		  $.ajax({
	             type:'get',
	             url:BASE_URL+'user/subscribe',
	             data:{'email':$('#news-letter').val()},
	             dataType:'json',
	             success:function(data){
	                 $('.news-letter-msg').html(data.message).show();
	             },
	             error:function(err) {
	            	 $('.news-letter-msg').html('You have already subscribe').show();
	             }
	         });
	  });
}
function bubble(){
	$('.home-bottom-circle').mouseover(function () {
		  var indx=$(this).attr('data-index');
		  $('#cloud-buble-text-'+indx).css("padding","1%");
	      $('#cloud-buble-text-'+indx).show();  
	      $('#cloud-bubble-'+indx).hide();  
	});
	$('.home-bottom-circle').mouseout(function () {
		 var indx=$(this).attr('data-index');
		 $('#cloud-buble-text-'+indx).hide();  
	     $('#cloud-bubble-'+indx).show();      
	});
	$('.home-bottom-circle-small').mouseover(function () {
		  var indx=$(this).attr('data-index');
		  $('#cloud-buble-text-small-'+indx).css("padding","2%");
	      $('#cloud-buble-text-small-'+indx).show();  
	      $('#cloud-bubble-small-'+indx).hide();  
	});
	$('.home-bottom-circle-small').mouseout(function () {
		 var indx=$(this).attr('data-index');
		 $('#cloud-buble-text-small-'+indx).hide();  
	     $('#cloud-bubble-small-'+indx).show();      
	});
	$('.home-bottom-circle-medium').mouseover(function () {
		  var indx=$(this).attr('data-index');
		  $('#cloud-buble-text-medium-'+indx).css("padding","3%");
	      $('#cloud-buble-text-medium-'+indx).show(); 
	      $('#cloud-bubble-medium-'+indx).hide();  
	});
	$('.home-bottom-circle-medium').mouseout(function () {
		 var indx=$(this).attr('data-index');
		 $('#cloud-buble-text-medium-'+indx).hide();  
	     $('#cloud-bubble-medium-'+indx).show();      
	});
	$('.home-bottom-circle-big').mouseover(function () {
		  var indx=$(this).attr('data-index');
		  $('#cloud-buble-text-big-'+indx).css("padding","3%");
	      $('#cloud-buble-text-big-'+indx).show();  
	      $('#cloud-bubble-big-'+indx).hide();  
	});
	$('.home-bottom-circle-big').mouseout(function () {
		 var indx=$(this).attr('data-index');
		 $('#cloud-buble-text-big-'+indx).hide();  
	     $('#cloud-bubble-big-'+indx).show();      
	});
}

function resetPassword(){
	$("#user-signup-form-submit").click(function() {
		var _repasswd = $('#jq-re-password').val();
		var _passwd = $('#jq-new-password').val();
		var _uid = $('#jq-reset-uid').val();
		var _rsid = $('#jq-reset-id').val();
		if(_passwd==""){$('.rsp-error').html("Enter New Password").show();return false;}
		if( _repasswd==""){$('.rsp-error').html("Enter Re Password").show();return false;}
		if(_passwd!=_repasswd){
			$('.rsp-error').html("Password is not matched").show();return false;
		}
		$('.respose-wait').show();
		 $('.reset-psw-success').hide();
		 $.ajax({
	         type:'post',
	         url:'resetNewPassword',
	         dataType:'json',
	         data:{'uid':_uid,'passwd':_passwd,'repasswd':_repasswd,'rsid':_rsid},
	         success:function(data){
		        if(data.results=="success"){
			        setTimeout(function(){
			        	 $('.respose-wait').hide();
			        	 $('#resetpwd').hide();
			        	 $('.reset-psw-success').html('Your password is reset').show(); 
	                 },2000);
		        	
		        }else{
		        	$('.reset-psw-error').html('Some problem to reset password, Try again later').show(); 
		        	 $('.respose-wait').hide();
		        } 
	         },
	         error:function(err) {
                $('.reset-psw-error').html('Some problem to reset password, Try again later or contact to administrator').show(); 
                $('.respose-wait').hide();
             }
	         
   	 });
	});
}

function profileReady(){
	 $(".nav-tabs a").click(function(){
	        $(this).tab('show');
	 });
	 $(".my-learnings").click(function(){
		 $.ajax({
             type:'get',
             url:BASE_URL+'user/getMyLearnings',
             success:function(data){
                 $('.my-learnings-data').html(data).show();
             }
         });
	 });
	 $(".my_schedules").click(function(){
		 $.ajax({
             type:'get',
             url:BASE_URL+'user/getMySchedules',
             success:function(data){
                 $('.my-schedules-data').html(data).show();
             }
         });
	 });
	 $("#upload-prifile-pic").click(function(){
	        $.ajax({
	             type:'get',
	             url:BASE_URL+'upload',
	             success:function(data){
	                 $('.profile-pic').html(data);
	                 $('.di-over-lay').show();
	             }
	         });
	        $('.profile-pic').toggle();
	 });
	 $("#edit-basic-profile").click(function(){
		$('.basic-profile-edit').show();
		$('.di-over-lay').show();
	 });
	 $('.profsum').click(function(){
		 $('.profsum-view').toggle();
	 });
	 $('.skills-edu').click(function(){
		 $('.skills-edu-view').toggle();
	 });
	 $('#hide-box-login').click(function(){   
			$('.basic-profile-edit').hide();
			$('.di-over-lay').hide();	
	 });
	 $("#update-profile").click(function(){
			var skills = CKEDITOR.instances['jq-skills'].getData();
	 		var psummary = CKEDITOR.instances['jq-psummary'].getData();
	 		var fname=$('#jq-fname').val();
	 		var lname=$('#jq-lname').val();
	 		var email=$('#jq-email').val();
	 		var phone=$('#jq-phone').val();
	 		var dob=$('#jq-dob').val();
	 		var desi=$('#jq-designation').val();
	 		var orgni=$('#jq-organization').val();
	 		var address=$('#jq-address').val();
	 		var contact = $('#jq-contact').val();
	 		 $('.respose-wait').show();
	 		 $.ajax({
	             type:'post',
	             url:'updateProfile',
	             dataType:'json',
		         data:{'fname':fname,'lname':lname,'email':email,'phone':phone,'dob':dob,'desi':desi,'orgni':orgni,'address':address,'psummary':psummary,'skills':skills,'contact':contact},
	             success:function(data){
	            	 if(data.results=="success"){
	            		 $('.update-profile-success').show();
	            		 $('.respose-wait').show();
			             setTimeout(function(){
		                      location.reload(); 
			            	 $('.respose-wait').hide();
			             	 $('.basic-profile-edit').hide();
		                 },3000);
			        }else{
			        	$('.update-profile-error').html('Error!!!!!!!').show(); 
			        	 $('.respose-wait').hide();
			        } 
		         },
		         error:function(err) {
	                 $('.update-profile-error').html('Error!!!!!!!').show(); 
	                 $('.respose-wait').hide();
	              }
	         });
	 });
	 
	 
}

function courseReady(){
	 $(".scbn").click(function(){
		 var key = $(this).text();
		 $.ajax({
             type:'get',
             url:'searchCourseByName',
             data:{'key':key},
             success:function(data){
            	 $('.default-course').hide();
                 $('.course-list').html(data).show();
             }
         });
	 });
	 $(".search-by-cat-name").click(function(){
		 var id = $(this).attr('_cid');
		 $.ajax({
             type:'get',
             url:'searchCourseByCategory',
             data:{'id':id},
             success:function(data){
            	 $('.default-course').hide();
                 $('.course-list').html(data).show();
             }
         });
	 });
	
}
function searchByLoc(){
	 $(".search-by-location").change(function() {
		 var cid=$('.search-by-location option').attr('_cid');
		 var loc = $(this).val();
		 if(loc=='000'){return false;}
		 $('.loc').html(loc);
		 $.ajax({
             type:'get',
             url:BASE_URL+'courses/searchCourseByLocation',
             data:{'cid':cid,'loc':loc},
             success:function(data){
            	 $('.default-vendor').hide();
                 $('.search-by-location-data').html(data).show();
             }
         });
	 });
	 $(".schdl-other-city").click(function() {
		 var cid=$('#jq-cid').val();
		 var loc = $(this).text();
		 $.ajax({
             type:'get',
             url:'../searchCourseByLocation',
             data:{'cid':cid,'loc':loc},
             success:function(data){
            	 $('.default-vendor').hide();
            	 $('.schdl-other-city-show').show();
                 $('.search-by-location-data').html(data).show();
             }
         });
	 });
	 $("#jq-submit-c").click(function() {
		 var name=$('#jq-name').val();
		 var email=$('#jq-email').val();
		 var mobile=$('#jq-mobile').val();
		 var from=$('#jq-from').val();
		 var to=$('#jq-to').val();
		 $.ajax({
             type:'post',
             url:'../contactForSchedule',
             dataType:'json',
             data:{'name':name,'email':email,'mobile':mobile,'from':from,'to':to},
             success:function(data){
            	 if(data.results=="success")
            	 {
            		 $('.success-messege').html('We have recieved your query, we will contact you soon').show();
            	 }else{
            	 	$('.msg-error').html('No message email has been sent').show();
             	 }
             }
         });
	 });
	 
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
	 
	 $("#jq-from").datepicker({
			dateFormat : "yy-mm-dd"
	   });
	   $("#jq-to").datepicker({
			dateFormat : "yy-mm-dd"
	   });
	
	   $('.jq-course-details-f').click(function(){
		   var cid=$(this).attr('_cid_');
		   var vid=$(this).attr('_vid_');
		   
		   $.ajax({
	             type:'get',
	             url:BASE_URL+'courses/coursedetails',
	             data:{'cid':cid,'vid':vid},
	             success:function(data){
	            	
	            	 //window.location.replace(BASE_URL+"courses/coursedetails");
	            	 return true;
	             }
	         }); 
	   });
	   $('.locc').click(function(){
			$('#search-by-location').val($(this).text());
			$('.sel-loc').html($(this).text());
			alert($(this).attr("_cid"));
		});	
	   
	   $('#jq-contact-cust').click(function(){
		   $('.di-over-lay').show();
			 $.ajax({
	             type:'get',
	             url:BASE_URL+'pages/customization',
	             data:{'action':'login'},
	             success:function(data){
	                 $('.contact-for-customization').html(data).show();
	             }
	         });
	   });
}
function goToCart(){
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
}
function attendees(){
	$("#jq-attendees-details").click(function() {
		$('.jq-attendees').hide();
		$('.more-attendees').hide();
		$('.jq-book-myself').hide();
		var name= $('#jq-name').val();
		var email= $('#jq-email').val();
		var phone= $('#jq-mobile').val();
		var org= $('#jq-organization').val();
		var city= $('#jq-city').val();
		var country= $('#jq-country').val();
		var orderId= $('#jq-orderId').val();
		$.ajax({
	            type:'post',
	            url:BASE_URL+'payment/attendees',
	            data:{'name':name,'email':email,'phone':phone,'org':org,'city':city,'country':country,'orderId':orderId},
	            success:function(data){
	            	$('.attendees-details').hide();
	           	 	$('.jq-attendees').html(data).show();
	           	 	$('.more-attendees').show();
	            }
	        }); 
	});
	$('#jq-atnd-dt').click(function(){
		$('.attendees-details').show();
	});	
	$('#jq-atnd-save').click(function(){
		$('.attendees-details-msg').html('Your attendee\'s details saved').show();
		$.ajax({
            type:'post',
            url:BASE_URL+'cart/clear_cart',
            success:function(data){
            	setTimeout(function(){             
            		 window.location.replace(BASE_URL);
            	},2000);
            }
        }); 
	});	
	$('#jq-book-myself').click(function(){
		$('.book-myself').html('Your attendee\'s details saved').show();
		$.ajax({
            type:'post',
            url:BASE_URL+'cart/clear_cart',
            success:function(data){
            	setTimeout(function(){             
            		 window.location.replace(BASE_URL);
            	},2000);
            }
        }); 
	});	
}
function trainingcalender(){
	$(".jq-enroll-now").click(function() {
		 var schedule = $(this).attr('_schedul_');
		 var slug = $(this).attr('_slug_');
		 $.ajax({
            type:'get',
            url:BASE_URL+'cart/cart',
            data:{'sid':schedule,'slug':slug},
            success:function(data){
           	 window.location.replace(BASE_URL+"cart/ordercart");
            }
        }); 
	 });
	 $("#jq-from").datepicker({
			dateFormat : "yy-mm-dd"
	    });
	    $("#jq-to").datepicker({
			dateFormat : "yy-mm-dd"
	   });
	   
	   $('.vendor-filter,.location-filter,.ttype-filter').click(function() {
		   var selected = [];
		   $(':checkbox:checked').each(function(){
			   selected.push($(this).val());
		   });
		   if(selected.length>0){
			   $.ajax({
		            type:'post',
		            url:BASE_URL+'courses/filterScheduledCourses',
		            data:{'filter':selected.join(",")},
		            success:function(data){
		            	$('.default-schedules').html('').hide();
		            	$('.filters-schedules').html('');
		            	$('.filters-schedules').html(data).show();
		            }
			   });
		   }
	   });
	  
	   $('#jq-search-by-date').click(function(){
		   $('.required-field-1').hide();
		   $('.required-field-2').hide();
			var from=$('#jq-from').val();
			var to=$('#jq-to').val();
			
			if(from=="" || from==null){
				$('.required-field-1').html("Select from date").show();
				return false;
			}
			if(to=="" || to==null){
				$('.required-field-2').html("Select to date").show();
				return false;
			}
			 $.ajax({
		            type:'get',
		            url:BASE_URL+'courses/filterScheduledCoursesByDate',
		            data:{'from':from,'to':to},
		            success:function(data){
		            	$('.default-schedules').html('').hide();
		            	$('.filters-schedules').html('').hide();
		            	$('.filters-schedules-by-date').html('');
		            	$('.filters-schedules-by-date').html(data).show();
		            }
			   });
	   });
	     
}
function headSearch(){
	$("#jq-head-search").click(function() {
		var keyword = $('#srch-term').val();
		 $.ajax({
             type:'post',
             url:BASE_URL+'courses/programsearch',
             data:{'keyword':keyword},
             success:function(data){
            	 window.location.replace(BASE_URL+"courses/programsearch");
             }
         });
	});
}
function logo(){
	 if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50){
			$(".logo").hide();
			$(".onscroll-logo").show();
			 $('.collapse').css("background","#011122 ");
			 $('.collapse').css("color","#000");
			 $('.collapse').css("opacity","1");
	 }else{
		 $(".logo").show();
		 $(".onscroll-logo").hide();
		 $('.collapse').css("background","url('"+BASE_URL+"_static/assets/img/head-bg.png') repeat scroll 0 0");
		 $('.collapse').css("opacity","0.6");
	 }
	
}
function coursedetails(){
	goToCart();
	 $(".nav-tabs a").click(function(){
        $(this).tab('show');
 	});
	 $(".nav-tabs-cd a").click(function(){
	        $(this).tab('show');
	 	});
	 $(".search-by-location").change(function() {
		 var cvmid=$('.search-by-location option').attr('_cvmid');
		 var loc = $(this).val();
		 if(loc=='000'){return false;}
		 $('.loc').html(loc);
		 $.ajax({
            type:'get',
            url:BASE_URL+'courses/searchScheduledCourseByLocation',
            data:{'cvmid':cvmid,'loc':loc},
            success:function(data){
           	 $('.default-vendor').hide();
                $('.search-by-location-data').html(data).show();
            }
        });
	 });
	 $('#jq-short-msg').click(function(){
		 var name=$('#jq-name').val();
		 var email=$('#jq-email').val();
		 var phone=$('#jq-phone').val();
		 var msg=$('#jq-message').val();
		 $('.msg-send-success').hide();
		 $('.msg-send-error').hide();
		 $.ajax({
	            type:'post',
	            url:BASE_URL+'courses/shortMessage',
	            data:{'name':name,'email':email,'phone':phone,'msg':msg},
	            success:function(data){
	            	$('.msg-send-success').html('Your query send successfully').show();
	            },
	            error:function(err) {
	                 $('.msg-send-error').html('Error!!!!!').show();
	              }
	        });
	 });
	  $('#jq-contact-cust').click(function(){
		   $('.di-over-lay').show();
			 $.ajax({
	             type:'get',
	             url:BASE_URL+'pages/customization',
	             data:{'action':'login'},
	             success:function(data){
	                 $('.contact-for-customization').html(data).show();
	             }
	         });
	   });
}
function checkout(){
	$('#jq-payment').click(function(){
		
		$('.required-field-1').hide();$('.required-field-2').hide();
		$('.required-field-3').hide();$('.required-field-4').hide();
		$('.required-field-5').hide();$('.required-field-6').hide();
		$('.required-field-7').hide();$('.required-field-8').hide();
		var billing_name=$('#billing_name').val();
		var billing_address=$('#billing_address').val();
		var billing_city=$('#billing_city').val();
		var billing_state=$('#billing_state').val();
		var billing_zip=$('#billing_zip').val();
		var billing_country=$('#billing_country').val();
		var billing_tel=$('#billing_tel').val();
		var billing_email=$('#billing_email').val();
		var orderId=$('#order_id').val();
		if(billing_name==''){$('.required-field-1').html('Billing name is requires').show();return false;}
		if(billing_address==''){$('.required-field-2').html('Billing address is requires').show();return false;}
		if(billing_city==''){$('.required-field-3').html('Billing city is requires').show();return false;}
		if(billing_state==''){$('.required-field-4').html('Billing state is requires').show();return false;}
		if(billing_zip==''){$('.required-field-5').html('Billing zip is requires').show();return false;}
		if(billing_country==''){$('.required-field-6').html('Billing country is requires').show();return false;}
		if(billing_tel==''){$('.required-field-7').html('Billing phone is requires').show();return false;}
		if(billing_email==''){$('.required-field-8').html('Billing email is requires').show();return false;}
		if(!validatePin(billing_zip)){
			$('.required-field-5').html('Invalid Zip Code').show();return false;
		}
		if(!validatePhone(billing_tel)){
			$('.required-field-7').html('Invalid Phone number').show();return false;
		}
		if(!validateEmail(billing_email)){
			$('.required-field-8').html('Invalid email').show();return false;
		}
		$('.respose-wait-gateway').show();
		$('.di-over-lay').show();
		$.ajax({
            type:'post',
            url:BASE_URL+'checkout/payment',
            data:{'billing_name':billing_name,'orderId':orderId,'billing_email':billing_email,'billing_tel':billing_tel,'billing_country':billing_country,'billing_zip':billing_zip,'billing_state':billing_state,'billing_city':billing_city,'billing_address':billing_address},
            success:function(data){
            	setTimeout(function(){             
                    $('.respose-wait-gateway').hide();
                    $('.di-over-lay').hide();
                   // $('.payment-opt').hide();
                },2000);
            	//$('.move-topayment-gatway').hide();
            	$('.payment-gatway-frame-veiw-data').html(data).show();
            	$('.ccavenue-checkout').addClass('loginscreenIframe');
            },
            error:function(err) {
            	$('.respose-wait-gateway').hide();
            	$('.di-over-lay').hide();
                alert('Error'); 
             }
   		});
	});
	
	$('#jq-payment-instant').click(function(){
		
		$('.required-field-1').hide();$('.required-field-2').hide();
		$('.required-field-3').hide();$('.required-field-4').hide();
		$('.required-field-5').hide();$('.required-field-6').hide();
		$('.required-field-7').hide();$('.required-field-8').hide();
		var billing_name=$('#billing_name').val();
		var billing_address=$('#billing_address').val();
		var billing_city=$('#billing_city').val();
		var billing_state=$('#billing_state').val();
		var billing_zip=$('#billing_zip').val();
		var billing_country=$('#billing_country').val();
		var billing_tel=$('#billing_tel').val();
		var billing_email=$('#billing_email').val();
		var orderId=$('#order_id').val();
		if(billing_name==''){$('.required-field-1').html('Billing name is requires').show();return false;}
		if(billing_address==''){$('.required-field-2').html('Billing address is requires').show();return false;}
		if(billing_city==''){$('.required-field-3').html('Billing city is requires').show();return false;}
		if(billing_state==''){$('.required-field-4').html('Billing state is requires').show();return false;}
		if(billing_zip==''){$('.required-field-5').html('Billing zip is requires').show();return false;}
		if(billing_country==''){$('.required-field-6').html('Billing country is requires').show();return false;}
		if(billing_tel==''){$('.required-field-7').html('Billing phone is requires').show();return false;}
		if(billing_email==''){$('.required-field-8').html('Billing email is requires').show();return false;}
		if(!validatePin(billing_zip)){
			$('.required-field-5').html('Invalid Zip Code').show();return false;
		}
		if(!validatePhone(billing_tel)){
			$('.required-field-7').html('Invalid Phone number').show();return false;
		}
		if(!validateEmail(billing_email)){
			$('.required-field-8').html('Invalid email').show();return false;
		}
		$('.respose-wait-gateway').show();
		$.ajax({
            type:'post',
            url:BASE_URL+'checkout/paymentInstant',
            data:{'billing_name':billing_name,'orderId':orderId,'billing_email':billing_email,'billing_tel':billing_tel,'billing_country':billing_country,'billing_zip':billing_zip,'billing_state':billing_state,'billing_city':billing_city,'billing_address':billing_address},
            success:function(data){
            	setTimeout(function(){
                    $('.respose-wait-gateway').hide();
                },2000);
            	$('.move-topayment-gatway').hide();
            	$('.payment-gatway-frame-veiw-data').html(data).show();
            },
            error:function(err) {
            	$('.respose-wait-gateway').hide();
                alert('Error'); 
             }
   		});
	});
}
function validatePin(pin) {
	if (/\b[0-9]{5}\b|\b[0-9]{6}\b|\b[0-9]{7}\b|\b[0-9]{8}\b/.test(pin)) {return true;} else {return false;}
}
function validateEmail(email) {
	  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  return emailReg.test(email);
}
function validatePhone(phone){
	if (/\b[0-9]{10}\b/.test(phone)) {return true;} else {false;}
}

function contact(){
	 $('#jq-contact').click(function(){
		 var name=$('#jq-name').val();
		 var email=$('#jq-email').val();
		 var phone=$('#jq-phone').val();
		 var msg=$('#jq-message').val();
		 var org = $('#jq-org').val();
		 var captcha = $('#jq-captcha').val();
		 $('#jq-name').removeClass('error');
		 $('#jq-phone').removeClass('error');
		 $('#jq-email').removeClass('error');
		 $('#jq-org').removeClass('error');
		 $('#jq-message').removeClass('error');
		 $('#jq-captcha').removeClass('error');
		 
		 if(name==null || name==""){$('#jq-name').addClass('error');return false;}
		 if(phone==null || phone==""){$('#jq-phone').addClass('error');return false;}
		 if(email==null || email=="" || !validateEmail(email)){$('#jq-email').addClass('error');return false;}
		 if(org==null || org==""){$('#jq-org').addClass('error');return false;}
		 if(msg==null || msg==""){$('#jq-message').addClass('error');return false;}
		 if(captcha==null || captcha==""){$('#jq-captcha').addClass('error');return false;}
		 $('.msg-send-success').hide();
		 $('.msg-send-error').hide();
		 $.ajax({
	            type:'post',
	            url:BASE_URL+'pages/contactus',
                     dataType:'json',    
	            data:{'name':name,'email':email,'phone':phone,'msg':msg,'org':org,'captcha':captcha},
	            success:function(data){
	            	if(data.results=="success"){
	            		$('.msg-send-success').html('Your query send successfully').show();
	            	}else{
	            		 $('.msg-send-error').html('Error!!!').show();
	            	}
	            },
	            error:function(err) {
	                 $('.msg-send-error').html('Error!!!!!').show();
	              }
	        });
	 });
	 $('#jq_newsletter').click(function(){
		  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		  if($('#news-letter').val()=="" || !emailReg.test($('#news-letter').val())){
			  $('.news-letter-msg').html('Please enter valid email id').show();
			  return false;
		  }
		  $.ajax({
	             type:'get',
	             url:BASE_URL+'user/subscribe',
	             data:{'email':$('#news-letter').val()},
	             dataType:'json',
	             success:function(data){
	                 $('.news-letter-msg').html(data.message).show();
	             },
	             error:function(err) {
	            	 $('.news-letter-msg').html('You have already subscribe').show();
	             }
	         });
	  });
}

function cart(){
	    $(".upqty").on('click',function(){
	    	var id =$(this).attr('_id');
	    	var val = $(".no-of-participant-"+id).val();
	        $(".no-of-participant-"+id).val(parseInt(val)+1);
	        $('.save-qty-'+id).show();
	    });

	    $(".downqty").on('click',function(){
	    	var id =$(this).attr('_id');
	    	var val = $(".no-of-participant-"+id).val();
	    	$(".no-of-participant-"+id).val(parseInt(val)-1);
	    	 $('.save-qty-'+id).show();
	    });
	    $(".save-qty").on('click',function(){ 
	    	var cartid =  $(this).attr('_qid');
	    	var qty = $('.no-of-participant-'+cartid).val();
	    	var rowid = $(this).attr('_rowid'); 
	    		$.ajax({
		             type:'post',
		             url:BASE_URL+'cart/updatecart',
		             data:{'qty':qty,'rowid':rowid},
		             success:function(data){
		            	location.reload(); 
		             }
	    		});
	    });
	    $(".remove-cart-program").on('click',function(){  
	    	var rowid = $(this).attr('_rowid'); 
	    	$.ajax({
	             type:'post',
	             url:BASE_URL+'cart/updatecart',
	             data:{'qty':0,'rowid':rowid},
	             success:function(data){
	            	location.reload(); 
	             }
	    	});
	    });
	    $("#user-login").on('click',function(){  
	    	$('.user-login-error').hide();
			if(!validateEmail($('#jq-email').val())){
				$('.user-login-error').html('Invalid Email').show(); 
				return false;
			}
			if($('#jq-password').val()=="" || $('#jq-password').val()==null){
				$('.user-login-error').html('Password is required').show(); 
				return false;
			}
			$('.respose-wait-cart').show();
			 $.ajax({
		         type:'post',
		         url:BASE_URL+'auth/signin',
		         dataType:'json',
		         data:{'email':$('#jq-email').val(),'passwd':$('#jq-password').val()},
		         success:function(data){
			        if(data.results=="success"){
			             setTimeout(function(){
		                     location.reload(); 
			            	 $('.respose-wait-cart').hide();
			             	 $('.user-login-signup').hide()
		                 },3000);
			        }else{
			        	$('.user-login-error').html('Wrong Email/Password').show(); 
			        	 $('.respose-wait-cart').hide();
			        } 
		         },
		         error:function(err) {
	                 $('.user-login-error').html('Wrong Email/Password').show(); 
	                 $('.respose-wait-cart').hide();
	              }
	    	 }); 
	    });
	    
	    $('#jq-forgot-password-tab').click(function(){ 
	    	$('.di-over-lay').show();
			$('#jq-forgot-password').show();
		});
	    $('#hide-box-login').click(function(){   
			$('#jq-forgot-password').hide();
			$('.di-over-lay').hide();	
		});
	    $('#user-forgot-passwd-submit').click(function(){ 
	    	if($('#jq-fp-email').val()==""){
	    		 $('.user-fp-error').html('Enter Email ').show(); 
	    		 return false;
	    	}
	    	if(!validateEmail($('#jq-fp-email').val())){
				$('.user-fp-error').html('Invalid Email').show(); 
				return false;
			}
			 $.ajax({
		         type:'post',
		         url:BASE_URL+'auth/forgotPassword',
		         dataType:'json',
		         data:{'email':$('#jq-fp-email').val()},
		         success:function(data){
			        if(data.results=="success"){
			             $('.user-fp-success').html('Forgot password request send, Please check your email').show();
			        }else{
			        	$('.user-fp-error').html('Invalid User').show(); 
			        } 
		         },
		         error:function(err) {
	                 $('.user-fp-error').html('Email does not exists').show(); 
	              }
	    	 });
		});
	    $('input:radio[name="loginu"]').change(function(){
	    	 if ($(this).is(':checked') && $(this).val() == 'r') {
	    		 $('.login-as-guest-user').hide();
	 	    	 $('.login-register-user').show();
	    	 }
	    	 if ($(this).is(':checked') && $(this).val() == 'g') {
	    		 $('.login-register-user').hide();
	 	    	 $('.login-as-guest-user').show();
	    	 }
	    });
	    
	    $('#register-user-checkout').click(function(){ 
	    	var isLoggenIn = $('.ue837hxnslso0e7nxmxdhddhod8e873dhjd').val();
	    	if(isLoggenIn=='0'){
	    		$('.your-details').show();
	    	}else{
	    		window.location.replace(BASE_URL+"checkout");
	    	}
	    	//alert('checkout as a login user'+isLoggenIn);
	    });
	    $('#guest-user-checkout').click(function(){ 
	    	$('.required-field-1').hide();
	    	$('.required-field-2').hide();
	    	$('.guest-user-error').hide();
	    	var name =  $('#user-name').val();
	    	var email = $('#user-email').val();
	    	var mobile = $('#user-mobile').val();
	    	
	    	if(name==""){
	    		$('.required-field-1').html("Name is Required").show();
	    		return false;
	    	}
	    	if(email==""){
	    		$('.required-field-2').html("Email is Required").show();
	    		return false;
	    	}
	    	if(!validateEmail(email)){
				$('.required-field-2').html('Invalid Email').show(); 
				return false;
			}
	    	if(mobile!=""){
	    		if(!validatePhone(mobile)){
	    			$('.required-field-2').html('Invalid Phone').show(); 
	    			return false;
	    		}
	    	}
	    	
	    	$('.respose-wait-cart').show();
	    	$.ajax({
	             type:'post',
	             url:BASE_URL+'cart/guestuser',
	             data:{'name':name,'email':email,'mobile':mobile},
	             success:function(data){
	            	 if(data.results='success'){
	            		 setTimeout(function(){
		                     location.reload(); 
			            	 $('.respose-wait-cart').hide();
		                 },3000);
	            		 window.location.replace(BASE_URL+"checkout");
	            	 }else{
	            		 $('.guest-user-error').html('Error !').show();
	            		 $('.respose-wait-cart').hide();
	            	 }
	             }, error:function(err) {
	                 $('.guest-user-error').html('User Already Exists').show(); 
	                 $('.respose-wait-cart').hide();
	              }
	    	});
	    });
}