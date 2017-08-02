
function adminlogin(){
	$("#jq-admin-logged-in").click(function() {
		$('#jq-admin-user-pannel').toggle();
	});
}

function userReady(){
	
    $("#jq-add-user").click(function(){   
		$(".add-user-form").show();
    });
    $('#hide-box-add').click(function(){   
    	$('.add-user-form').hide();
    });
    $("#update-add-user").click(function(){   
		$(".update-user-form").show();
    });
    $('#hide-box-update').click(function(){   
    	$('.update-user-form').hide();
    });
    $("#jq-add-user-submit").click(function(){
    	 $('.add-user-success').hide();
    	 $('.add-user-error').hide();
        var id = $(this).val();
           $.ajax({
                  type:'POST',
                  url:'addUsers',
                  data:{'firstname':$('#jq-firstname').val(),'lastname':$('#jq-lastname').val(),'email':$('#jq-email').val(),'phone':$('#jq-phone').val()},
                  success:function(data){
                	  $('#update-user-form').hide();
                      $('.add-user-success').html('User addedd').show();
                  },
                   error:function(err) {
                      $('.add-user-error').html('User already exists :').show(); 
                   }
              });
      });
    $(".u-idx").click(function(){
        var id = $(this).val();
           $.ajax({
                  type:'POST',
                  url:'getUpdateUser',
                  data:{'id':id},
                  success:function(data){
                	  $('#update-user-form').show();
                      $('#jq-update-user').html(data).show();
                  }
              });
      });
}
function updateUserReady(){
    $("#jq-update-user-submit").click(function(){
    	$('update-user-success').hide();
    	$('.update-user-error').hide();
        var id = $('#jq-uid').val();
        var fname = $('#jq-ufirstname').val();
        var lname = $('#jq-ulastname').val();
        var email = $('#jq-uemail').val();
        var phone = $('#jq-uphone').val();
           $.ajax({
                  type:'POST',
                  url:'updateUserDetails',
                  data:{'id':id,'fname':fname,'lname':lname,'phone':phone,'email':email},
                  success:function(data){
                      $('update-user-success').html('User Updated').show();
                  },
                  error:function(err) {
                      $('.update-user-error').html('Error :').show(); 
                  }
              });
      });
}

function seoReady(){
	 $(".nav-tabs a").click(function(){
	        $(this).tab('show');
	 });
	  $('#meta-submit').click(function(){
		    	 $.ajax({
	                 type:'post',
	                 url:'addSeo',
	                 dataType:'json',
	                 data:{'title':$('#page-title').val(),'desc':$('#meta-desc').val(),'keywords':$('#meta-keywords').val(),'name':$('#page-name').val()},
	                 success:function(data){
	                	 if(data.results=="success"){
	                		 alert(data.results);
	                		 $('#page-title').val('');
	                		 $('#meta-desc').val('');
	                		 $('#meta-keywords').val('');
	                		 $('#page-name').val('');
	                	 }else{
	                		 alert(data.results);
	                	 }
	                 }
	             });
	   });
	 $('#analytics-submit').click(function(){
    	 $.ajax({
             type:'post',
             url:'addAnaylitcsCode',
             dataType:'json',
             data:{'google':$('#google').val(),'bing':$('#bing').val(),'yahoo':$('#yahoo').val()},
             success:function(data){
            	 if(data.results=="success"){
            		 alert(data.results);
            	 }else{
            		 alert(data.results);
            	 }
             }
         });
});
}

function discoverProgramReady(){
	 $('#discover-program-submit').click(function(){
		 $.ajax({
             type:'post',
             url:'addDiscoverProgram',
             dataType:'json',
             data:{'pname':$('#p-name').val(),'program':$('#program').val(),'status':$('#pstatus').val()},
             success:function(data){
            	 if(data.results=="success"){
            		 alert(data.results);
            		 $('#p-name').val('');
            	 }else{
            		 alert(data.results);
            	 }
             }
         });
	 });
	 $('.active-discover-program').click(function(){
		 var status = $(this).attr("_status");
		 var pid = $(this).attr("_idx");
		 $.ajax({
             type:'post',
             url:'activeDP',
             dataType:'json',
             data:{'status':status,'pid':pid},
             success:function(data){
            	 if(data.results=="success"){
            		 alert(data.results);
            		 location.reload(); 
            	 }else{
            		 alert(data.results);
            	 }
             }
         });
	 });
	
	 $(".nav-tabs a").click(function(){
	        $(this).tab('show');
	 });
}

function courseReady(){
	    $('.add-child-course-tab').click(function(){
	    	$('#jq-parent-course-sel').html('');	
		    	 $.ajax({
	                 type:'get',
	                 url:'getParentCourse',
	                 success:function(data){
	                     $('#jq-parent-course-sel').html(data).show();
	                 }
	             });
	   });
	   $("#jq-parent-course").click(function(){ 
	    	 $('.add-course-error').hide();
	    	 $('.add-success').hide();
	    	 var name=$('#jq-parent-course-name').val();
	    	 if(name=="" || name==null){
	    		 $('.add-course-error').html('Enter Parent Course Name').show(); 
	    		 return false;
	    	 }
	    	 $.ajax({
                 type:'get',
                 url:'addParentCourse',
                 data:{'name':name},
                 success:function(data){
                     $('.add-success').html('Parent course added'+data).show();
                 },
                 error:function(err) {
                     $('.add-course-error').html('Course already exists').show(); 
                  }
             });
	    });

	   //add vendor
	   $("#jq-vendor-submit").click(function(){ 
		   	$('.add-vendor-error').hide();
	    	$('.add-vendor-success').hide();
	    	if($('#jq-company-name').val()==null || $('#jq-company-name').val()==""){
	    		 $('.add-vendor-error').html('Company Name Required').show();
	    		 return false;
	    	}
	    	if($('#jq-contact-person').val()==null ||  $('#jq-contact-person').val()==""){
	    		 $('.add-vendor-error').html('Contact Person Required').show();
	    		 return false;
	    	}
	    	if($('#jq-phone').val()==null || $('#jq-phone').val()==""){
	    		 $('.add-vendor-error').html('Phone Required').show();
	    		 return false;
	    	}
	    	if($('#jq-email').val()==null || $('#jq-email').val()==""){
	    		 $('.add-vendor-error').html('Email Required').show();
	    		 return false;
	    	}
	    	 $.ajax({
              type:'post',
              url:'addVendors',
              data:{'cname':$('#jq-company-name').val(),'email':$('#jq-email').val(),'cperson':$('#jq-contact-person').val(),'desi':$('#jq-designation').val(),'mobile':$('#jq-mobile').val(),'phone':$('#jq-phone').val(),'address':$('#jq-address').val(),'smedia':$('#jq-social-media').val(),'web':$('#jq-web-url').val()},
              success:function(data){
                  $('.add-vendor-success').html('Vendor added'+data).show();
              },
              error:function(err) {
                  $('.add-vendor-error').html('Vendor already exists').show(); 
               }
          });
	    });
	   //vendor course map
	    $('.vendor-course-map-tab').click(function(){  
	    	$('#jq-course-sel').html('');
	    	 $.ajax({
                type:'get',
                url:'getVendorCourse',
                success:function(data){
                    $('#jq-course-sel').html(data).show();
                }
              });
    });
	   
	    $('.course-details-tab').click(function(){  
	    	 $.ajax({
                type:'get',
                url:'addCourseDetail',
                success:function(data){
                    $('#jq-course-details').html(data).show();
                }
              });
	    }); 
	    $('.course-desc-tab').click(function(){  
	    	 $.ajax({
               type:'get',
               url:'courseDescription',
               success:function(data){
                   $('#jq-course-desc').html(data).show();
               }
             });
	    });  
	 $(".nav-tabs a").click(function(){
	        $(this).tab('show');
	 });
 
}
function vendorReady(){
	  $("#add-vendor").click(function(){  
		  $(".add-vendor-course-map-tab").hide();
		  $(".add-course-details-tab").hide();
		  $(".add-vendor-tab").show();
		  $("#add-vendor").css("border-color","#0088cc");
		  $("#add-vendor-course").css("border-color","#fff");
		  $("#add-course-details").css("border-color","#fff");
	   });
	    $('#add-vendor-course').click(function(){  
	    	 	$(".add-vendor-tab").hide();
	    	 	$(".add-course-details-tab").hide();
	    	    $(".add-vendor-course-map-tab").show();
	    	    $("#add-vendor-course").css("border-color","#0088cc");
	    	    $("#add-course-details").css("border-color","#fff");
	    	    $("#add-vendor").css("border-color","#fff");
		    	 $.ajax({
	                type:'get',
	                url:'getVendorCourse',
	                success:function(data){
	                    $('#jq-course-sel').html(data).show();
	                }
	              });
		    	 
				 
	    });
	    $('#add-course-details').click(function(){  
    	    $(".add-course-details-tab").show();
    	    $(".add-vendor-course-map-tab").hide();
    	    $(".add-vendor-tab").hide();
    	    $("#add-course-details").css("border-color","#0088cc");
    	    $("#add-vendor").css("border-color","#fff");
    	    $("#add-vendor-course").css("border-color","#fff");
	    	 $.ajax({
                type:'get',
                url:'addCourseDetails',
                success:function(data){
                    $('#jq-course-details').html(data).show();
                }
              });
			 
    });
	   $("#jq-vendor-submit").click(function(){ 
		   	$('.add-vendor-error').hide();
	    	 $('.add-vendor-success').hide();
	    	 //var details=CKEDITOR.instances['jq-desc'].getData();
	    	 $.ajax({
               type:'post',
               url:'addVendors',
               data:{'cname':$('#jq-company-name').val(),'cperson':$('#jq-contact-person').val(),'desi':$('#jq-designation').val(),'mobile':$('#jq-mobile').val(),'phone':$('#jq-phone').val(),'address':$('#jq-address').val(),'smedia':$('#jq-social-media').val(),'web':$('#jq-web-url').val(),'blog':$('#jq-blog-url').val()},
               success:function(data){
                   $('.add-vendor-success').html('Vendor added'+data).show();
               },
               error:function(err) {
                   $('.add-vendor-error').html('Vendor already exists').show(); 
                }
           });
	    });
	   
	   $("#jq-add-vendor-course").click(function(){ 
	    	 $('.add-vendor-course-success').hide();
	    	 $('.add-vendor-course-error').hide();
	    	 var vendorIds=[];
	    	 $("#jq-vendor-name-sel option:selected").each(function() {
				 var _this = $(this);
				 vendorIds.push(_this.val());
			 });
	    	 var courseid=$('#jq-course-name-sel').val();
	    	 var price=$('#jq-price').val();
	    	 if(courseid=='000'){
	    		 $('.add-vendor-course-error').html('Please select course').show(); 
	    		 return false;
	    	 }
	    	 $.ajax({
	             type:'post',
	             url:'courseVendorMap',
	             data:{'courseId':courseid,'vendorIds':JSON.stringify(vendorIds),'price':price},
	             success:function(data){
	                 $('.add-vendor-course-success').html('Course Vendor mapped'+data).show();
	             },
	             error:function(err) {
	                 $('.add-vendor-course-error').html('Course Vendor already mapped').show(); 
	              }
         });
	    });
	   $("#jq-schedule-1").datepicker({
			dateFormat : "d MM, y"
	   });
	   $("#jq-schedule-2").datepicker({
			dateFormat : "d MM, y"
	   });
	   $("#jq-schedule-3").datepicker({
			dateFormat : "d MM, y"
	   });
	   $("#jq-schedule-4").datepicker({
			dateFormat : "d MM, y"
	   });
	   $("#jq-schedule-5").datepicker({
			dateFormat : "d MM, y"
	   });
	   $("#jq-schedule-6").datepicker({
			dateFormat : "d MM, y"
	   });
}
