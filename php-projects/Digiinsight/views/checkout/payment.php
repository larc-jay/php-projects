<style type="text/css">
#loginscreenIframe{
display:none;
}
.ccavenue-checkout{
display:none;
}
</style>
<center>
<?php 
	$this->load->library('crypto');
	$working_key='286124AEA1259E445B93C5EC5DC4CE5C';
	$access_code='AVJM67DI03BN17MJNB';
	$merchant_data='';
	//$formValues = $this->input->post(NULL, TRUE);
	foreach ($formValues as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}
	$encrypted_data=$this->crypto->encrypt($merchant_data,$working_key); 
	$production_url='https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='.$encrypted_data.'&access_code='.$access_code;
?>
<iframe src="<?php echo $production_url?>" id="paymentFrame" width="100%" height="450" frameborder="0" scrolling="No" ></iframe>
<script type="text/javascript" src="<?php echo base_url()?>_static/assets/js/jquery-1.7.2.js"></script>
<script type="text/javascript">
    	$(document).ready(function(){
    		 window.addEventListener('message', function(e) {
		    	 $("#paymentFrame").css("height",e.data['newHeight']+'px'); 	 
		 	 }, false);
	 	 	
		});
</script>
</center>
