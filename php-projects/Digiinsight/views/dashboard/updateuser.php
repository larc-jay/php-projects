<script type="text/javascript">
    $(function() {
    	updateUserReady();
    });
</script>
<?php foreach($rows as $row){ ?>
<div class="row">
	<div class="col-md-12" >
		<table border="0" width="100%" >
			<tr>
				<td align="right" width="15%"><label>First Name :</label></td>
				<td align="left" width="35%"> <input type="text" id="jq-ufirstname" class="form-control" value="<?php echo $row['first_name']; ?>" class="form-control"/></td>
			
				<td align="right" width="15%"><label>Last Name :</label></td>
				<td align="left" width="35%"><input type="text" id="jq-ulastname" class="form-control" value="<?php echo $row['last_name']; ?>" class="form-control"/></td>
			</tr>
			<tr>
				<td align="right"><label> Email :</label></td>
				<td align="left"><input type="text" id="jq-uemail" class="form-control" value="<?php echo $row['email']; ?>" class="form-control"/></td>
			
				<td align="right"><label> Phone :</label>
				<td align="left"><input type="text" id="jq-uphone" class="form-control"
					value="<?php echo $row['phone']; ?>" class="form-control">
				</td>
			</tr>
			<tr>
				<td align="center" colspan="100%" height="60" valign="bottom">
					<input type="hidden" id="jq-uid" value="<?php echo $row['id']; ?>">
					<button id="jq-update-user-submit" class="btn btn-default">Update User</button> 
				</td>
			</tr>	
			</table>
	</div>
</div>
<?php }?>