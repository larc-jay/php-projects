<script src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
<div class="row">
	<div class="col-md-12 heading">Basic Profile
		<a href="#"  id="edit-basic-profile"  style="float: right;">
		<img src="<?=base_url()?>_static/assets/img/pr-edit.png" class="pr-edit"/>
		</a>
	</div>
</div>
<hr class="solid">
	<div class="basic-profile-view">
	<div class="row">
		<div class="col-md-2">
			<label>First Name :</label>
		</div>
		<div class="col-md-4">
		<?php echo $userDetails->first_name;?>
		</div>
		<div class="col-md-2" >
			<label>Last Name :</label>
		</div>
		<div class="col-md-4">
		<?php echo $userDetails->last_name;?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2" >
			<label>Contact :</label>
		</div>
		<div class="col-md-4">
		<?php echo $userDetails->phone;?>
		</div>
		<div class="col-md-2" >
			<label>Alternate Contact :</label>
		</div>
		<div class="col-md-4">
		<?php echo $rows->contact;?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2" >
			<label>Email :</label>
		</div>
		<div class="col-md-4">
		<?php echo $userDetails->email;?>
		</div>
		<div class="col-md-2" >
			<label>Date Of Birth :</label>
		</div>
		<div class="col-md-4">
		<?php echo $rows->dob;?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2" >
			<label>Designation :</label>
		</div>
		<div class="col-md-4">
		<?php echo $rows->designation;?>
		</div>
		<div class="col-md-2" >
			<label>Organization :</label>
		</div>
		<div class="col-md-4">
		<?php echo $rows->organization;?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2" >
			<label>Address :</label>
		</div>
		<div class="col-md-10">
		<?php echo $rows->address;?>
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-md-12 heading">Proffessional Summary</div>
	</div>
	<hr class="solid">
	<div class="row">
		<div class="col-md-12"><?php echo  $rows->professional_summary;?></div>
	</div>
	<br />
	<div class="row">
		<div class="col-md-12 heading">Skills & Education Details</div>
	</div>
	<hr class="solid">
	<div class="row">
		<div class="col-md-12"><?php echo  $rows->skills_education;?></div>
	</div>
</div>
<div class="basic-profile-edit hidediv">
<a href="#" id="hide-box-login"><div id="orangeBox"></div></a> 
		<div class="row">
		<div class="col-md-2" style="text-align: right">
			<label>First Name :</label>
		</div>
		<div class="col-md-4">
		    <input type="text" id="jq-fname" value="<?php echo $userDetails->first_name;?>" class="form-control"/> 
		</div>
	
		<div class="col-md-2" style="text-align: right">
			<label>Last Name :</label>
		</div>
		<div class="col-md-4">
		 <input type="text" id="jq-lname" value="<?php echo $userDetails->last_name;?>" class="form-control"/> 
		</div>
	</div>
	<div class="row">
		<div class="col-md-2" style="text-align: right">
			<label>Contact :</label>
		</div>
		<div class="col-md-4">
			 <input type="text" id="jq-phone" value="<?php echo $userDetails->phone;?>" class="form-control"/> 
		</div>
	<div class="col-md-2" style="text-align: right">
			<label>Alternate Contact :</label>
		</div>
		<div class="col-md-4">
			 <input type="text" id="jq-contact" value="<?php echo $rows->contact;?>" class="form-control"/> 
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-2" style="text-align: right">
			<label>Date Of Birth :</label>
		</div>
		<div class="col-md-4">
			 <input type="text" id="jq-dob" value="<?php echo $rows->dob;?>" class="form-control"/> 
		</div>
		<div class="col-md-2" style="text-align: right">
			<label>Email :</label>
		</div>
		<div class="col-md-4">
			 <input type="text" id="jq-email" value="<?php echo $userDetails->email;?>" class="form-control"/> 
		</div>
	</div>
	<div class="row">
		<div class="col-md-2" style="text-align: right">
			<label>Organization :</label>
		</div>
		<div class="col-md-4">
			 <input type="text" id="jq-organization" value="<?php echo $rows->organization;?>" class="form-control"/> 
		</div>
		
		
		<div class="col-md-2" style="text-align: right">
			<label>Designation :</label>
		</div>
		<div class="col-md-4">
			 <input type="text" id="jq-designation" value="<?php echo  $rows->designation;?>" class="form-control"/> 
		</div>
		
	</div>
	<div class="row">	
		<div class="col-md-2" style="text-align: right">
			<label>Address :</label>
		</div>
		<div class="col-md-10">
			 <input type="text" id="jq-address" value="<?php echo  $rows->address;?>" class="form-control"/> 
		</div>
	</div>
	<div class="row">	
		<div class="col-md-2" style="text-align: right">
			<label> Proffessional Summary :</label>
		</div>
		<div class="col-md-10 ">
			<div class="profsum" style="cursor: pointer;color:#0088cc">Edit Proffessional Summary</div>
			<div class="profsum-view"  style="display:none">
				 <textarea class="form-control" rows="3"	 id="jq-psummary"><?php echo  $rows->professional_summary;?></textarea> 
				 <script>CKEDITOR.replace('jq-psummary');</script>
			</div>
		</div>
	</div>
	<div class="row">	
		<div class="col-md-2" style="text-align: right">
			<label>Skills & Education Details :</label>
		</div>
		<div class="col-md-10"> 
		<div class="skills-edu" style="cursor: pointer;color:#0088cc">Edit Skills & Education Details </div>
		<div class="skills-edu-view"  style="display:none">
			 <textarea class="form-control" rows="3"  id="jq-skills"><?php echo  $rows->skills_education;?></textarea> 
			<script>CKEDITOR.replace('jq-skills');</script>
		</div>	
		</div>
	</div>
	<div class="row">	
		<div class="col-md-12" style="text-align: center">
			<button class="btn btn-default" id="update-profile">Update Profile</button>
		</div>
	</div>	
</div>
<div class="update-profile-success" style="color: green"></div>
<div class="update-profile-error"  style="color: red"></div>
<div class="respose-wait" style="display:none"><img  src="<?php echo base_url()?>_static/assets/img/loading.gif">  </div>