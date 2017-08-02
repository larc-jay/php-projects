<body> 
<div class="di-over-lay"></div>
<div class="di-over-lay-top"></div>
       <div class="user-login-signup" style="display: none"></div>
       <div class="user-forgot-password" style="display: none"></div>
  		<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
          <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div style="font-size:14px;" class="collapse navbar-collapse" id="navbar">
          <ul style="margin:5px 20px" class="nav navbar-nav">
            <li><a href="#" style="color:#ffc300;cursor:default"><img alt="" src="<?=base_url()?>_static/assets/img/phone-contact.png"  style="width: 20px; margin-right: 5px;">Call Us (+91) 124 438 3335</a></li>
            <li><a href="#"  class="h-link">Become an Instructor</a></li>
            <li><a href="#" class="h-link" >Training Provider</a></li>
            <li>
              <?php if(isset($this->session->di_logged_in) && $this->session->di_logged_in){?>
		    		 <div style="color:#fff;padding-left:15px;">
		    			 	<p style="color:#0088cc;margin:17px 10px 0 0;"><?php echo substr($this->session->userdata('di_fname').' '.$this->session->userdata('di_lname'),0,10);?>...
		    			 	 <a href="#user-pannel" id="jq-logged-in" ><i class="fa fa-chevron-down" style=" border: 1px solid;border-radius: 48%;padding: 3px;color:#0088cc"></i></a>
		    			 	 </p>
		    			 </div> 
    		<?php }else{?>
    			<a href="#login" class="login-signup"><span style="background:#0088cc;padding:7px;color:#fff;border-radius:1px;"> <strong>Login / Sign up</strong></span></a>
    		<?php }?>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
    <div id="jq-user-pannel" class="triangle-isosceles-1 top" style="display: none;">	
			<p><a href="<?php echo WEBPATH ?>user/profile" style="color: #fff">Dashboard</a> </p>
			<p><a href="#change-password" class="user-login-fp" style="color: #fff">Change Password</a> </p>
			<p><a href="<?php echo WEBPATH ?>auth/logout"  style="color: #fff">Logout</a></p>
	</div>
    </nav>
    <div class="logo"> 
  		<a href="/"><img alt="digiInsight" src="_static/assets/img/logo.png" style="height: 90px;width:230px;position: relative;bottom:17%;"/></a>
    </div>
    <div class="onscroll-logo" style="display:none"> 
  		<a href="/"><img alt="digiInsight" src="_static/assets/img/logo.png" style="height: 60px;width:150px"/></a>
    </div>
    <div class="row home1pattern">
    		<div class="col-md-9"> 
			    	<div class="search">
			    		 <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
			    		 <div class="home-search-middle">Learn to Excel</div>
			    		
					       <?php echo form_open('courses/programsearch'); ?>
						    <div class="input-group" style="width:90%">
						      <input class="form-control" placeholder="Shape your future by learning; we have 400 professional programs for you" name="srch-term" id="srch-term" type="text">
						      <div class="input-group-btn">
						        <button class="btn btn-default" type="submit" style="border-radius: 0 4px 4px 0;height:55px;border-left:0;padding:7px 25px;font-size:16px;">
						        Search
						        </button>
						      </div>
						    </div>
						     <div  class = "form-group" style="font-size: 15px;color:#ccc;padding:7px 0">
						     		 <div class="dropdown">
										  <input type="hidden" id="location">
										  <div style="float:left;margin-right:10px;">Select your Location&nbsp;&nbsp;</div>
										  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
										  <div class="sel-loc"  style="float:left;margin-right:10px;color:#08c">Change Location</div>
										  <button class="btn" type="button"  style="position: absolute;top:-10px;background: transparent">
										  <!-- span class="caret"></span--></button>
										  </a>
										  <ul class="dropdown-menu">
										  <?php foreach ($locations as $location){ ?>
										    <li class="loc-opt"><a href="#" class="loc dropdown-toggle" onclick="return false;"><?=$location['location']?></a></li>
										   <?php }?> 
										  </ul>
										</div> 
						     </div>
						     <?php echo form_close();?>
			
			</div>
			</div>
    		<div class="col-md-3"> 
    		   	<div style="padding:50px 40px;margin-top:25px">
    		   	     <div class="right-bar">
		    			  <div class="right-bar-top">DISCOVER<strong> PROGRAMES</strong></div>
		    			  <div class="programs">
		    			  		<?php foreach ($discoverProgram as $program){?>
		    			  			<p class="home-links"><a href="<?=base_url()?>courses/coursesvenders/<?=$program['slug'] ?>" class="program"><?=$program['program_name'] ?> </a></p>
		    			  		<?php }?>
				    			 		    			  </div>
		    			  <br />
		    			  <div class="programs" style="font-size:1.3em;">
		    			 	<a href="<?php echo WEBPATH ?>courses/courses"  style="color:#0088cc;"><strong>BROWSE ALL COURSES <bac><i class="fa fa-chevron-right"></i></bac></strong></a>
		    			  </div>
		    			  <hr class="solid">
		    			  <div class="right-bar-middle">
		    			  	<div class="row">
		    			  		<div class="col-sm-3"><img alt="team" src="<?=base_url()?>_static/assets/img/team.png" height="55" width="55"></div>
		    			  		<div class="col-sm-9">	Corporate<strong><br />Training Solutions</strong></div>
		    			  	</div>
		    			  	
		    			  
		    			  </div>
		    			  <div class="programs" style="margin-top:10px;">
		    			 </div>
		    			
		    			 <div class="right-bar-bottom">
		    			 	<div class="row pdngr">	
		    			 			<div class="col-sm-8">
		    			 			<a href="<?php echo WEBPATH ?>courses/trainingcalendar">
		    			 			<span style="font-size: 27px;color:#fff">Training <br />Calender </span>
		    			 			</a>
		    			 			</div>
		    			 			<div  class=" col-sm-4">
		    			 				<span class="calender-bdr">
		    			 					<a href="<?php echo WEBPATH ?>courses/trainingcalendar">
		    			 						<i class="fa fa-calendar" aria-hidden="true"></i>
		    			 					</a>
		    			 				</span>
		    			 			</div>
		    			 	</div>
		    			 </div>
		    		</div>	 
    			 </div>
    		</div>
     </div>
