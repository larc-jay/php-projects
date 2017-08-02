<?php echo '<div class="row"  >';?>
<div class="col-md-2 admin-left-pannel pdng" style="height: 600px;"> >
	<div style="color: #fff;">
		<h4>
			<a href="#">Admin Pannel</a>
		</h4>
		<?php if(isset($this->session->di_admin_logged_in) && $this->session->di_admin_logged_in){?>
		<p>
			<a href="<?php echo WEBPATH ?>dashboard/dashboard">DashBoard</a>
		</p>
		<p>
			<a href="<?php echo WEBPATH ?>dashboard/users">Users </a>
		</p>
		<p>
			<a href="<?php echo WEBPATH ?>dashboard/courses">Courses </a>
		</p>
		<p>
			<a href="<?php echo WEBPATH ?>dashboard/trainings">Trainings </a>
		</p>
		<p>
			<a href="<?php echo WEBPATH ?>dashboard/seo">SEO </a>
		</p>
		<p>
			<a href="<?php echo WEBPATH ?>dashboard/discoverprograms">Discover
				Programs </a>
		</p>
		<?php }?>
		<p> &nbsp;</p><p> &nbsp;</p><p> &nbsp;</p><p> &nbsp;</p><p> &nbsp;</p><p> &nbsp;</p>
	</div>
</div>
