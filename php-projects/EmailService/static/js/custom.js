function dashboard(){
	$(".nav-tabs a").click(function(){
		$(this).tab('show');
	});
 	 $('.amii-main-cat').click(function(){
		 $.ajax({
            type:'get',
            url:'getMainCategories',
            data:{'key':'main'},
            success:function(data){
           	$('.amii-main-cat-data').html(data).show();
            }
        });
	 });	
 	$('.amii-sub-cat').click(function(){
		 $.ajax({
            type:'get',
            url:'getSubCategories',
            data:{'key':'sub'},
            success:function(data){
           		$('.amii-sub-cat-data').html(data).show();
            }
        });
	 });
 	$('.amii-course-enrollment').click(function(){
		 $.ajax({
            type:'get',
            url:'getCourseEnrollments',
            data:{'key':'ce'},
            success:function(data){
           		$('.amii-course-enrollment-data').html(data).show();
            }
        });
	 });
 	$('.amii-add-main-cat').click(function(){
		 $.ajax({
           type:'get',
           url:'maincategory',
           data:{'key':'ce'},
           success:function(data){
          		$('.amii-add-main-cat-data').html(data).show();
           }
       });
	 });
	$('.amii-add-sub-cat').click(function(){
	 $.ajax({
       type:'get',
       url:'subcategory',
       data:{'key':'ce'},
       success:function(data){
      		$('.amii-add-sub-cat-data').html(data).show();
       }
   });
 });
}
function addMainCategory(){
	$('.add-main-cat').click(function(){
		if($('#catname').val()=="" || $('#catname').val()==null){
			alert('Category name is not empty !');
			return false;
		}
		if($('#imageurl').val()=="" || $('#imageurl').val()==null){
			alert('Image url is not empty !');
			return false;
		}
		$.ajax({
		       type:'post',
		       url:'addmaincategory',
		       data:{'catname':$('#catname').val(),'imageurl':$('#imageurl').val()},
		       success:function(data){
		      		if(data.status="success"){
		      			alert('Main category '+$('#catname').val()+' addedd successfully');
		      			$('#catname').val('');
		      			$('#imageurl').val('');
		      		}else{
		      			alert('Main category '+$('#catname').val()+' not added');
		      		}
		       }
		});
	});
}
function addSubCategory(){
$('.add-sub-cat').click(function(){
	
	if($('#main-cat-id').val()=="000"){
		alert('Please select main category');
		return false;
	}
	if($('#subcatname').val()=="" || $('#subcatname').val()==null){
		alert('Category name is not empty !');
		return false;
	}
	
	if($('#jq-details').val()=="" || $('#jq-details').val()==null){
		alert('Category details is not empty !');
		return false;
	}
	if($('#subimageurl').val()=="" || $('#subimageurl').val()==null){
		alert('Image url is not empty !');
		return false;
	}
	$.ajax({
	       type:'post',
	       url:'addsubcategory',
	       data:{'catname':$('#subcatname').val(),'imageurl':$('#subimageurl').val(),'maincatid':$('#main-cat-id').val(),'details':$('#jq-details').val()},
	       success:function(data){
	      		if(data.status="success"){
	      			alert('Sub category '+$('#subcatname').val()+' addedd successfully');
	      			$('#subcatname').val('');
	      			$('#subimageurl').val('');
	      			$('#main-cat-id').val('');
	      			$('#jq-details').val('');
	      		}else{
	      			alert('Sub category '+$('#subcatname').val()+' not added');
	      		}
	       }
	});
});
}
