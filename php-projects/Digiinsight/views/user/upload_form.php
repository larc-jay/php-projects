<script type="text/javascript">

function imgload(){
	var selfile=$('#userfile').val();
	if(selfile=="" || selfile==null){
		alert('Please select image file');
		return false;
	}
	$('.di-over-lay').hide();
	return true;
}
$(function(){
	   $('#hide-box-login').click(function(){   
			$('.profile-pic').hide();
			$('.di-over-lay').hide();	
	 });
});
</script>
<a href="#" id="hide-box-login"><div id="orangeBox"></div></a> 
<?php echo $error;?>
<?php echo form_open_multipart('upload/uploadProfileImage');?>
<input type="file"	name="userfile" size="20"  id="userfile" style="float: left;height:45px"/>
<input type="submit" value="upload" class="btn" onclick="return imgload();" id="upload-img"  style="float: right;"/>
</form>
