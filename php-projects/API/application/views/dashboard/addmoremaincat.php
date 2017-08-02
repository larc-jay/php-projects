<?php
?>
  <script type="text/javascript">
  $(function(){
	  addMainCategory();
  });
</script>  
<h1>Add main category</h1>
<?php echo form_open_multipart('upload/addmaincategory');?>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-sm-3">Enter Category Name </div>
			<div class="col-sm-6"> <input type="text" class="form-control" name="catname"  id="catname"/> </div>
		</div>
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-sm-3">Select Image</div>
			<input type="file"	name="userfile" size="20"  id="userfile" style="float: left;height:45px"/>
		</div>	
		<p>&nbsp;</p>
		<div class="row" align="center">
			<input type="submit" value="Add Main Categoty" class="btn" onclick="return imgload();" id="upload-img"  />
			 </div>
		</div>		
	</div>
	</form>
	
</div>