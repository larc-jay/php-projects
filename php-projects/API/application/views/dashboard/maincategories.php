<script type="text/javascript">
<!--
	$('.update-main-cat').click(function (){
        $('.di-over-lay').show();	
        $('.update-main-cat-block').show();
        $('#jq_catname').val($(this).attr('_catname'));
        $('#jq-imageurl').val($(this).attr('_image'));
        $('#jq-cat-id').val($(this).attr('_id'));
	});
	 $('#hide-box').click(function(){   
			 $('.di-over-lay').hide();	
			 $('.update-main-cat-block').hide();
	});
	$('.jq-update-main-cat').click(function(){
		$.ajax({
		       type:'post',
		       url:'updatemaincategory',
		       data:{'catname':$('#jq_catname').val(),'imageurl':$('#jq-imageurl').val(),'catid':$('#jq-cat-id').val()},
		       success:function(data){
		      		if(data.status="success"){
		      			alert('Main category updated successfully');
		      			$('#jq_catname').val('');
		      			$('#jq-imageurl').val('');
		      			$('#jq-cat-id').val('');
		      			setTimeout(function(){
		      				 $('.di-over-lay').hide();	
		      				 $('.update-main-cat-block').hide();
		   	          	},2000); 
		      		}else{
		      			alert('Main category id not update');
		      		}
		       }
		});
	});
//-->
</script>
	<div class="row row-bg" style="font-size: 14px;">
 	 	<div class="col-sm-5" align="center"><label>Category Name</label></div>
     	<div class="col-sm-6"><label>Images</label></div>
     	<div class="col-sm-1"><label>Edit</label></div>
   </div>
   <?php foreach($categories as $category){?>
   <div class="row" style="font-size: 14px;">
   		<div class="col-sm-5"><?=$category['course_name'] ?></div>
   		<div class="col-sm-6"><?=$category['image'] ?></div>
   		<div class="col-sm-1"><a href="#" _id="<?=$category['id'] ?>" _image="<?=$category['image'] ?>" _catname="<?=$category['course_name'] ?>" class="update-main-cat"> Edit</a></div>
   </div>
   <?php } ?>
   
   <div class="update-main-cat-block" style="display: none;">
   	  <a href="#" id="hide-box"><span id="closebox"></span></a> 
   	 <div class="row">
   	 <div class="col-md-1"></div>
	<div class="col-md-10"> 
   	  <div class="row">
			<div class="col-sm-3">Category Name </div>
			<div class="col-sm-6"> <input type="text" class="form-control" name="catname"  id="jq_catname"/> </div>
		</div>
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-sm-3">Image URL </div>
			<div class="col-sm-6"><input type="text" class="form-control" name="imageurl" id="jq-imageurl"/> </div>
		</div>	
		<p>&nbsp;</p>
		<div class="row" align="center">
			<div class="col-sm-12">
				<input type="hidden" id="jq-cat-id" />
				<input type="button" class="btn jq-update-main-cat" value="Update Category" /> 
			</div>
		</div>
   </div>  
   <div class="col-md-1"></div>
   </div>
   </div>