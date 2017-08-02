<script src="<?php echo base_url()?>static/js/jquery-ui.js"></script>
<script src="<?php echo base_url()?>static/js/custom.js"></script>
 <link rel="stylesheet" href="<?php echo base_url()?>static/css/jquery-ui.css">
  <script type="text/javascript">
  $(function(){
	  dashboard();
  });
</script>   
  
<?php
	if(!isset($this->session->logged_in)) {
		redirect(base_url().'index.php/dashboard');
	} 
 echo '<div class="inner-bg">'.
    '<div class="container">'.
    '<div class="row">';
?>        
         <div class="col-md-2">
         	<div class="sidebar-bg">
				    <ul class="nav nav-tabs">
				    			 <li class="active"><a href="#add-main-cat" class="amii-menu amii-add-main-cat"   onclick="return false"/>Add Main Categories</a></li>
					            <li><a href="#add-sub-cat" class="amii-menu amii-add-sub-cat"   onclick="return false"/>Add Sub Categories</a></li>
					            <li ><a href="#users" class="amii-menu amii-users"  onclick="return false"/>Users</a></li> 
					            <li><a href="#main-cat" class="amii-menu amii-main-cat"  onclick="return false"/>Main Categories</a></li>
					            <li><a href="#sub-cat" class="amii-menu amii-sub-cat"   onclick="return false"/>Sub Categories</a></li>
					            <li><a href="#course-enrollment" class="amii-menu amii-course-enrollment"   onclick="return false"/>Course Enrolments</a></li>
					</ul>
         		</div>
         </div>
 