<?php 
	if (isset($params[1])) {
		$sap = $_SESSION['sap'];
		$comp = getCompany(null,$params[1]);
		if($comp == -1) {
			$notfound = 2;	
		} else {
			$userdetails = getRequiredFields($comp['id']);
			$user = getUser($sap);
			$isReg = isRegistered($sap, $comp['id']);
		}
	} else {
		$notfound = 1;
	}
?>
<div class="col-md-4 col-md-offset-4">
	<?php if(isset($notfound)) { ?>
		<div class='alert alert-dismissible alert-danger' role='alert'>
			Company Not Found
		</div>
	<?php } else { ?>
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><?php echo $comp['name'];?></h3>
			  </div>
			  <div class="panel-body">
			    <?php echo html_entity_decode($comp['descr']); ?>
			  </div>
			  <div class="panel-footer">Following Details will be submitted to <?php echo $comp['name'];?></div>
			  <table class="table">
				  <?php for ($i=0; $i < count($userdetails); $i++) { ?>
				  	<tr>
				  		<td><?php echo $deets[$userdetails[$i]['userdetail']];?></td>
				  		<td><?php echo $user[$userdetails[$i]['userdetail']];?></td>
				  	</tr>
				  <?php } ?>
			  </table>
			</div>
			<form id="registerForm">
				<?php if ($isReg != 0) { ?>
					<div class='alert alert-dismissible alert-info' role='alert'>
						You have already registered for <?php echo $comp['name'];?>
					</div> 
				<?php }?>
				<?php if($comp['open']=='open') { ?>
					<input type="hidden" name="cid" value="<?php echo $comp['id']; ?>">
					<input type="hidden" name="status" value="<?php if($isReg == 0) echo "insert"; else echo "delete";?>">
					<button id="register" type="submit" name="register" value="<?php echo $sap;?>" class="btn btn-primary btn-block"><?php if($isReg==0) echo "Register"; else echo "Cancel Registeration";?> for <?php echo $comp['name'];?></button>
				<?php  } else { ?>
					<div class='alert alert-dismissible alert-warning' role='alert'>
						Registeration for <?php echo $comp['name'];?> has closed
					</div>
				<?php } ?>
			</form>
	<?php } ?>
</div>