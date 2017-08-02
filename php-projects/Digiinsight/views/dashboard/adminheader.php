  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url()?>_static/assets/img/favicon.png">
    <title>DigiInsight | Learn from experts</title>
    <!-- Bootstrap core CSS -->
     <link href="<?php echo base_url()?>_static/assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url()?>_static/assets/css/font-awesome.css" rel="stylesheet">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url()?>_static/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>_static/assets/css/di.css" rel="stylesheet">
 	<link href="<?php echo base_url()?>_static/assets/css/grid.css" rel="stylesheet">
	
    <script src="<?php echo base_url()?>_static/assets/js/admin-component.js"></script>
	  <script src="<?php echo base_url()?>_static/assets/js/jquery.min.js"></script>
	  <script src="<?php echo base_url()?>_static/assets/js/jquery-1.12.4.js"></script>
	  <script src="<?php echo base_url()?>_static/assets/js/jquery-ui.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 
  </head>
    <body>
      <div class="row" style="padding: 20px 0;background:#f0f0f0;">
    		<div class="col-md-3"> 
			    	<div style="z-index:1050"> 
			  			<a href="<?php echo WEBPATH?>dashboard/dashboard.html"><img alt="digiInsight" src="<?php echo base_url()?>_static/assets/img/logo.png" style="height:50px;width:180px;"></a> 
    				</div>
    		</div>
    		<div class="col-md-4"> 
    				      <form class="navbar-form" role="search">
						    <div class="input-group add-on">
						      <input class="form-control" placeholder="Find Your Programs......" name="srch-term" id="srch-term" type="text">
						      <div class="input-group-btn">l
						        <button class="btn btn-default" type="button" style="border-radius: 0 4px 4px 0;height:45px;border-left:0"><i class="glyphicon glyphicon-search" style="font-size:35px;color:#fff;top:-5px"></i></button>
						      </div>
						    </div>
						  </form>
    		</div>
    		<div class="col-md-3" > </div>
    		<div class="col-md-2" style="padding: 15px 10px;"> 
    				<?php if(isset($this->session->di_admin_logged_in) && $this->session->di_admin_logged_in){?>
    				<div style="color:#fff;">
	    				<p style="color:#0088cc;"><?php echo $this->session->userdata('di_admin_user_name');?>
			    			 <a href="#admin-user-pannel" id="jq-admin-logged-in"><i class="fa fa-chevron-down" style=" border: 1px solid;border-radius: 48%;padding: 3px;"></i></a>
			    		</p>
    						
	    				<div id="jq-admin-user-pannel" style="display: none;position:absolute;padding:7px;background:#fff;width:60%;z-index: 1000;border-radius:0 0 5px 5px">	
				    			<a href="<?php echo WEBPATH ?>dashboard/adminusers">Admin Users</a> <br />
				    			<a href="<?php echo WEBPATH ?>dashboard/logout">Logout</a>
				    	</div>
			   		 </div>	
			    	<?php }?>
    			</div>	
    	<div class="row" >
    		<div class="col-md-12" id="header-bar" style="height:20px"> 
    		</div>
    	</div>
    </div>	

