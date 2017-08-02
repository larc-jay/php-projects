 <script type="text/javascript">
    $(function() {
        $('#users').DataTable();
    } );
</script>
<?php if(!isset($this->session->di_admin_logged_in) && !$this->session->di_admin_logged_in){
	redirect(base_url().'index.php/dashboard/');
 }
 ?>
    		<div class="col-md-10"> 
				<div class="row">
			    		<div class="col-md-12"> 
			    			<?php if(isset($this->session->di_admin_logged_in) && $this->session->di_admin_logged_in){?>
			    					
			    			<?php } ?>
			    		</div>
			   	 </div>		
    		</div>
    </div>		
