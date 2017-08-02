
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link	href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
<link rel="icon" href="<?php echo base_url()?>static/images/favicon.png">
<title>Email Service</title>
<link href="<?php echo base_url()?>static/css/bootstrap.min.css"	rel="stylesheet">
<link rel="stylesheet" 	href="<?php echo base_url()?>static/css/style.css">
<script src="<?php echo base_url()?>static/js/jquery-1.12.4.js"></script>
<script src="<?php echo base_url()?>static/js/bootstrap.min.js"></script>
</head>
<body>
<div class="di-over-lay" style="display: none"></div>
	<header id="header" role="banner" class="headroom">
		<div class="container" style="background: #fff" align="center">
				<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand logo-nav" href="/"> <img src="<?php echo base_url()?>static/images/logo.png"  />
					</a>
				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul id="main-menu" class="nav navbar-nav" style="float: right;">
					   <?php if(isset($this->session->logged_in) && $this->session->logged_in){?>
						 <li class="dropdown">
							<a href="#" class="dropdown-toggle"   data-toggle="dropdown">
								<i class="glyphicon glyphicon-user" style="font-size:20px;top:5px"></i> 
								<?=$this->session->username?>
								<b class="caret"></b>
							</a> 
						   <ul class="dropdown-menu">
						   			<li><a href="<?=base_url() ?>index.php/dashboard/manageuser" class="btn-default">Manage User's</a></li>
									<li><a href="<?=base_url() ?>index.php/dashboard/dashboard" class="btn-default">Dashboard</a></li>	
									<li><a href="<?=base_url() ?>index.php/dashboard/logout" class="btn-default">Logout</a> </li>
							  
						   </ul>
						</li>
						<?php }?>
					</ul>
				</div>
			</nav>
		</div>
	</header>