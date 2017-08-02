	<script type="text/javascript">
<!--
	$('.update-sub-cat').click(function (){
        $('.di-over-lay').show();	
        $('.update-sub-cat-block').show();
        $('#jq-sub-catname').val($(this).attr('_catname'));
        $('#jq-sub-cat-details').text($(this).attr('_details'));
        $('#jq-sub-cat-imageurl').val($(this).attr('_image'));
        $('#jq-sub-cat-id').val($(this).attr('_id'));
	});
	 $('#hide-box1').click(function(){   
			 $('.di-over-lay').hide();	
			 $('.update-sub-cat-block').hide();
	});
	$('.jq-update-sub-cat').click(function(){
		$.ajax({
		       type:'post',
		       url:'updatesubcategory',
		       data:{'catname':$('#jq-sub-catname').val(),'imageurl':$('#jq-sub-cat-imageurl').val(),'catid':$('#jq-sub-cat-id').val(),'details':$('#jq-sub-cat-details').val()},
		       success:function(data){
		      		if(data.status="success"){
		      			alert('Sub category updated successfully');
		      			$('#jq-sub-catname').val('');
		      			$('#jq-sub-cat-imageurl').val('');
		      			$('#jq-sub-cat-details').val('');
		      			$('#jq-sub-cat-id').val('');
		      			setTimeout(function(){
		      				 $('.di-over-lay').hide();	
		      				 $('.update-sub-cat-block').hide();
		   	          	},2000); 
		      		}else{
		      			alert('Sub category id not update');
		      		}
		       }
		});
	});
//-->
</script>
	
	<div class="row row-bg" style="font-size: 14px;">
 	 	<div class="col-sm-2"><label>Category Name</label></div>
     	<div class="col-sm-4" ><label>Details</label></div>
     	<div class="col-sm-5"><label>Images</label></div>
     	<div class="col-sm-1"><label>Edit</label></div>
   </div>
   <?php foreach($categories as $category){?>
   <div class="row" style="font-size: 14px;">
   		<div class="col-sm-2"><?=$category['cat_name'] ?></div>
   		<div class="col-sm-4"><?=$category['details'] ?></div>
   		<div class="col-sm-5"><?=$category['image'] ?></div>
   		<div class="col-sm-1"><a href="#" _id="<?=$category['id'] ?>" _image="<?=$category['image'] ?>" _details="<?=$category['details'] ?>" _catname="<?=$category['cat_name'] ?>" class="update-sub-cat"> Edit</a></div>
   </div>
   <?php } ?>  
   
   
    <div class="update-sub-cat-block" style="display: none;">
   	  <a href="#" id="hide-box1"><span id="closebox"></span></a> 
   	 <div class="row">
   	 <div class="col-md-1"></div>
	<div class="col-md-10"> 
		<p>&nbsp;</p>
			<div class="row">
			<div class="col-sm-3"><label>Category Name</label> </div>
			<div class="col-sm-6"> <input type="text" class="form-control" id="jq-sub-catname"/> </div>
		</div>
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-sm-3"><label>Details</label> </div>
			<div class="col-sm-6"><textarea rows="3" cols="70" id="jq-sub-cat-details"></textarea> </div>
		</div>	
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-sm-3"><label>Image URL</label> </div>
			<div class="col-sm-6"><input type="text" class="form-control" id="jq-sub-cat-imageurl"> </div>
		</div>	
		<p>&nbsp;</p>
		<div class="row" align="center">
			<input type="hidden" id="jq-sub-cat-id" />
			<div class="col-sm-12"><input type="button" class="btn jq-update-sub-cat" value="Update Categoty" /> </div>
		</div>	
   </div>  
   <div class="col-md-1"></div>
   </div>
   </div>