  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<?php  $t =& get_instance();
		$params = array (); 
		$params['page_hash'] = md5(current_url()); 
		$rows=$t->db->where($params)->get('seo')->row();
	?>
	<?php if($rows!=null){?>
	
    <meta name="description" content="<?php echo $rows->meta_description; ?>">
    <meta name="keywords" content="<?php echo $rows->meta_keyword; ?>">
    <title><?php echo $rows->title; ?> DigiInsight | Learn To Excel</title>
	<?php }else{?>
	 <meta name="description" content="Training, IT training">
    <meta name="keywords" content="Expert">
    <title>DigiInsight</title>
	<?php }?>
    <meta name="author" content="DigiInsight">
    
    <link rel="icon" href="<?php echo base_url()?>_static/assets/img/favicon.png">
   <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <!-- Bootstrap core CSS -->
     <link href="<?php echo base_url()?>_static/assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url()?>_static/assets/css/font-awesome.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url()?>_static/assets/css/jquery-ui.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url()?>_static/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>_static/assets/css/di.css" rel="stylesheet">
 	<link href="<?php echo base_url()?>_static/assets/css/grid.css" rel="stylesheet">
	 <script src="<?php echo base_url()?>_static/assets/js/bootstrap.min.js"></script>
	  <script src="<?php echo base_url()?>_static/assets/js/jquery.min.js"></script>
	  <script src="<?php echo base_url()?>_static/assets/js/jquery-1.12.4.js"></script>
	  <script src="<?php echo base_url()?>_static/assets/js/jquery-ui.js"></script>
    <script src="<?php echo base_url()?>_static/assets/js/component.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <body>
    <div class="di-over-lay-top"></div>
    <div class="user-login-signup" style="display: none"></div>
     <div class="user-forgot-password" style="display: none"></div>
        <div class="head-top">
			<a href="https://www.facebook.com/digiinsight/" class="social-icon-fs"> <i class="fa fa-facebook"></i></a> &nbsp; 
			<a href="https://twitter.com/InsightDigi" class="social-icon-ts"> <i class="fa fa-twitter"></i></a> &nbsp;
			<a href="https://www.linkedin.com/company/digiinsight" class="social-icon-ls"> <i class="fa fa-linkedin"></i></a> &nbsp;
			&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    		<img alt="" src="<?=base_url()?>_static/assets/img/phone-contact.png" style="height: 20px;padding: 2px;"> Call Us (+91) 124 438 3335 &nbsp;
    		 &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
    	</div>	
      <div class="row"  style="font-size:15px;background:#f9f9f9; font-weight: 300;">
    		<div class="col-md-3"> 
			    	<div style="z-index:1050;position:relative;bottom:6px;"> 
			  			<a href="/"><img alt="digiInsight" src="<?php echo base_url()?>_static/assets/img/logo.png" style="height:90px;width:230px;"></a> 
    				</div>
    		</div>
    		<div class="col-md-4" style="padding: 25px 10px 0 40px;"> 
    				      <?php echo form_open('courses/programsearch'); ?>
						    <div class="input-group add-on" >
						      <input class="form-control" placeholder="Find Your Programs......" name="srch-term" id="srch-term" type="text" style="height:40px">
						      <div class="input-group-btn">
						        <button type="submit" class="btn btn-default" id="jq-head-search" type="button" style="border-radius: 0 4px 4px 0;height:40px;border-left:0"><i class="glyphicon glyphicon-search" style="font-size:20px;color:#fff;top:0px"></i></button>
						      </div>
						    </div>
						 <?php echo form_close(); ?>
    		</div>
    		<div class="col-md-1"></div>
    		<div class="col-md-1 " style="padding-top: 24px;"> 
    			<div style="height:30px;width:100%;">
    				<a href="#">Become an Instructor</a> 
    			</div>
    		</div>	
    		 <div class="col-md-1 " style="padding: 24px 0 0 15px"> 
    			<div style="height:30px;width:100%;">
    				<a href="#">Corporate Training</a>
    			</div>
    		</div>
 			
		  <div class="col-md-1 " style="padding: 24px 5px 0 10px"> 
    			<div style="height:30px;width:100%;">
    				<a href="#">Training Provider</a>
    			</div>
    		</div>
 
    		<?php if(isset($this->session->di_logged_in) && $this->session->di_logged_in){?>
    		<div class="col-md-1" style="padding-top: 24px"> 
		    		 <div style="color:#fff;margin-right:0px;">
		    			 	<p style="color:#0088cc;margin:0"><?php echo  substr($this->session->userdata('di_fname').' '.$this->session->userdata('di_lname'),0,10);?>...</p>
		    			 	<p style="margin: 0  0 0 20%"> <a href="#user-pannel" id="jq-logged-in"><i class="fa fa-chevron-down" style=" border: 1px solid;border-radius: 48%;padding: 3px; color: #0088cc;"></i></a></p>
		    			 	 
			    			 	<!--div id="jq-user-pannel" style="display: none;position:absolute;padding: 7px;background:#fff;width:60%;  z-index: 1000;border-radius:0 0 5px 5px">	
			    			 		<p><a href="<?php echo WEBPATH ?>user/profile">Profile</a> </p>
			    			 		<p><a href="<?php echo WEBPATH ?>auth/logout">Logout</a></p>
			    			 	</div-->
			    			 	<div id="jq-user-pannel" class="triangle-isosceles top" style="display: none;">	
										<p><a href="<?php echo WEBPATH ?>user/profile" style="color: #fff">Dashboard</a> </p>
										<p><a href="#change-password" class="user-login-fp" style="color: #fff">Change Password</a> </p>
										<p><a href="<?php echo WEBPATH ?>auth/logout"  style="color: #fff">Logout</a></p>
								</div>
		    			</div>
		    			
		     </div> 
    		<?php }else{?>
    		<div class="col-md-1" style="padding-top: 25px;"> 
    				<a href="#login" id="login-signup" class="login-signup">
    				<span style="background:#0088cc;padding:7px 7px;color:#fff;border-radius:2px;font-size:13px;">
    					 Login / Sign up
    				</span>
    				</a>
    		</div>
    		<?php }?>
    	</div>	
    	<?php
		if($this->session->tempdata('cartcount')>0 && substr(base_url(uri_string()),-4)!="cart")
			{?>
			<div class="cart">
						<a href="<?php echo WEBPATH?>cart/ordercart">
						<span class="glyphicon glyphicon-shopping-cart" ></span>
						<span style="background:#fff;color:#ffc300;padding:0px 5px;border-radius:50%;border:1px solid;"><?=$this->session->tempdata('cartcount');?></span>
						</a>
			</div>
		<?php }?>
    	<div class="row" >
    		<div class="col-md-12" id="header-bar" style="height:40px"> 
    			<?php if (isset($this->breadcrumbs)){ echo $this->breadcrumbs->show();}?>
    		</div>
    	</div>
    	<div class="di-over-lay"></div>
