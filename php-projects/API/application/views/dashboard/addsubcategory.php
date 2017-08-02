<?php
?>
  <script type="text/javascript">
  $(function(){
	  addSubCategory();
  });
</script> 
<h1>Add Sub category</h1>
<div class="row">
	<div class="col-md-12">
		<?php echo form_open_multipart('dashboard/addsubcategory');?>
		<div class="row">
			<div class="col-sm-3"><label>Select Main Category</label></div>
			<div class="col-sm-6">  
				<select id="main-cat-id" class="form-control" name="maincatid">
					<option value="000">--Select main category--</option>
					<?php foreach($maincategories as $cat) {?>
					<option value="<?=$cat['id']?>"><?=$cat['course_name'] ?> </option>
					<?php }?>
				</select>
			</div>
		</div>
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-sm-3"><label>Enter Sub Category Name</label> </div>
			<div class="col-sm-6"> <input type="text" class="form-control" id="subcatname" name="subcatname"/> </div>
		</div>
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-sm-3"><label>Details</label> </div>
			<div class="col-sm-6"><textarea rows="3" cols="70" id="jq-details" name="details" ></textarea> </div>
		</div>	
		<p>&nbsp;</p>
		<div class="row">
			<div class="col-sm-3">Select Image</div>
			<div class="col-sm-6"><input type="file"	name="userfile" size="20"  id="userfile" style="float: left;height:45px"/></div>
		</div>	
		<p>&nbsp;</p>
		<div class="row" align="center">
			<input type="submit" value="Add Sub Category" class="btn" onclick="return imgload();" id="upload-img"  />
		</div>	
		</form>	
	</div>
</div>