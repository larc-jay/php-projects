<link rel="stylesheet" href="<?php echo base_url()?>_static/assets/css/jquery.dataTables.css" type="text/css" />
<script type="text/javascript"  src="<?php echo base_url()?>_static/assets/js/jquery.dataTables.min.js"></script>  
<script type="text/javascript">
    $(function() {
    	userReady();
    	$("#users").DataTable();
    });
</script>
<div class="col-md-10">
	<div class="row">
		<div class="col-md-12" style="text-align: center">
			<button id="jq-add-user" class="admin-btn" >Add New User</button>
		</div>
	</div>
	<div class="row add-user-form" style="display: none" >
		<div class="col-md-12" style="text-align: center">
			<div class="row">
			 		<div class="col-sm-2"><label>First Name :</label></div>
			 		<div class="col-sm-4"><input type="text" id="jq-firstname" class="form-control" class="form-control"/></div>
					<div class="col-sm-2"><label>Last Name :</label></div>
					<div class="col-sm-4"><input type="text" id="jq-lastname" class="form-control"  class="form-control"/></div>
			</div>
			<div class="row">
				<div class="col-sm-2"><label> Email :</label></div>
				<div class="col-sm-4"><input type="text" id="jq-email" class="form-control"  class="form-control"/></div>
				<div class="col-sm-2"><label> Phone :</label></div>
				<div class="col-sm-4"><input type="text" id="jq-phone" class="form-control" class="form-control"></div>
			</div>
			<p>&nbsp; </p>
			<div class="row">
				<div class="col-sm-12">
					<div class="add-user-success" style="color:green"></div>
					<div class="add-user-error" style="color:red"></div>
					<button id="jq-add-user-submit" class="btn btn-default">Add User</button> 
			</div>
			</div>	
		</div>
		<a href="#" id="hide-box-add"><div id="orangeBox"><span id="x">X</span></div></a>
		</div>
		<div class="row update-user-form" id="update-user-form" style="display: none">
			<div class="col-md-12" style="text-align: center">
				<div id="jq-update-user" style="width:100%;height: 100px"> </div>
				<div class="update-user-error" style="color:red"></div>
					<div class="update-user-success" style="color:green"></div>
			</div>
			<a href="#" id="hide-box-update"><div id="orangeBox"><span id="x">X</span></div></a>
		</div>
		<div class="row">
		<div class="col-md-12">
		<?php if(isset($this->session->di_admin_logged_in) && $this->session->di_admin_logged_in){?>
			<table id="users" class="display" cellspacing="0" width="100%">
				<thead>
					<tr bgcolor="#f0f0f0">
						<td align="left" width="5%"><b>SNO</b></td>
						<td align="left" width="5%"><b>First Name</b></td>
						<td align="left" width="5%"><b>Last Name</b></td>
						<td align="left" width="5%"><b>Email</b></td>
						<td align="left" width="5%"><b>Phone</b></td>
						<td align="left" width="5%"><b>User Type</b></td>
						<td align="left" width="5%"><b>Status</b></td>
					</tr>
				</thead>
				<tfoot>
					<tr bgcolor="navyblue">
						<td align="left" width="5%"><b>SNO</b></td>
						<td align="left" width="5%"><b>First Name</b></td>
						<td align="left" width="5%"><b>Last Name</b></td>
						<td align="left" width="5%"><b>Email</b></td>
						<td align="left" width="5%"><b>Phone</b></td>
						<td align="left" width="5%"><b>User Type</b></td>
						<td align="left" width="5%"><b>Status</b></td>
					</tr>
				</tfoot>
				<tbody>
				<tbody>
				<?php $ct =1; foreach($rows as $row){ ?>
					<tr>
						<td><button class="u-idx" value="<?php echo $row['id'];?>"><?php echo $ct++;?></button></td>
						<td><?php echo $row['first_name'];?>
						</td>
						<td><?php echo $row['last_name'];?>
						</td>
						<td><?php echo $row['email'];?>
						</td>
						<td><?php echo $row['phone'];?>
						</td>
						<td><?php echo $row['user_type'];?>
						</td>
						<td><?php echo $row['status'];?>
						</td>
					</tr>
					<?php }?>
				</tbody>
			</table>
			<?php } ?>
		</div>
	</div>
</div>
</div>
