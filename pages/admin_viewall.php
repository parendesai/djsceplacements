<?php 
  $users = getAllUsers();
?>
<button style="margin-bottom: 10px;" data-toggle="modal" data-target="#addModal" class="btn btn-default pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
<table class="table table-striped">
	<tr>
		<th>#</th>
		<th>SAP</th>
		<th>Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>CGPA</th>
		<th>10th Standard Marks</th>
		<th>12th Standard / Diploma Marks</th>
		<th>Address</th>
		<th>Status</th>
		<th>Admin Status</th>
		<th>Password</th>
	</tr>
	<?php for ($i=0; $i < count($users); $i++) { ?>
		<tr>
			<td><?php echo ($i+1); ?></td>
			<td><?php echo $users[$i]['sap'];?></td>
			<td><?php echo $users[$i]['fname']." ".$users[$i]['lname']?></td>
			<td><?php echo $users[$i]['email'];?></td>
			<td><?php echo $users[$i]['phone'];?></td>
			<td><?php echo $users[$i]['cgpa'];?></td>
			<td><?php echo $users[$i]['ssc'];?></td>
			<td><?php echo $users[$i]['hsc'];?></td>
			<td><?php echo $users[$i]['address'];?></td>
			<td><?php if($users[$i]['updated']==1)echo "U"; else echo "NU"?></td>
			<td><button class="btn btn-<?php if($users[$i]['admin']==1)echo "danger"; else echo "primary"?> btn-block admin" data-sap="<?php echo $users[$i]['sap']; ?>" ><?php if($users[$i]['admin']==1)echo "Remove Admin"; else echo "Make Admin"?></button></td>
			<td><button class="btn btn-warning btn-block reset" data-sap="<?php echo $users[$i]['sap']; ?>" data-loading-text="Reseting...">Reset</button></td>
		</tr>
	<?php } ?>
</table>
<?php include 'admin_modals/useraddmodal.php' ?>