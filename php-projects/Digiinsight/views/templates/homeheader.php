  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php  $t =& get_instance();
		$params = array (); 
		$params['page_hash'] = md5("https://www.digiinsight.com"); 
		$rows=$t->db->where($params)->get('seo')->row();
	?>
	<?php if($rows!=null){?>
   		 <meta name="description" content="<?php echo $rows->meta_description; ?>">
    		<meta name="keywords" content="<?php echo $rows->meta_keyword; ?>">
   	 <title><?php echo $rows->title; ?> | DigiInsight</title>
	<?php }else{?>
	 <meta name="description" content="Training, IT training">
    	<meta name="keywords" content="Expert">
    <title> | DigiInsight | Learn to Excel</title>
	<?php }?>
   <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url()?>_static/assets/img/favicon.png">
    
    <!-- Bootstrap core CSS -->
     <link href="<?php echo base_url()?>_static/assets/css/carousel.css" rel="stylesheet">
     <link href="<?php echo base_url()?>_static/assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url()?>_static/assets/css/font-awesome.css" rel="stylesheet">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php echo base_url()?>_static/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>_static/assets/css/di.css" rel="stylesheet">
 	<link href="<?php echo base_url()?>_static/assets/css/grid.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url()?>_static/assets/js/ie-emulation-modes-warning.js"></script>
    <script src="<?php echo base_url()?>_static/assets/js/component.js"></script>
	<script src="<?php echo base_url()?>_static/assets/js/owl.carousel.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
