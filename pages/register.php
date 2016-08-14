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
			$updates = getUpdates($comp['id']);
			$unanswered = getMyUnansweredQueires($sap, $comp['id']);
			$private = getMyPrivateQueires($sap, $comp['id']);
			$answered = getAnsweredQueries($comp['id']);
		}
	} else {
		$notfound = 1;
	}
?>
<?php if(isset($notfound)) { ?>
	<div class='alert alert-dismissible alert-danger' role='alert'>
		Company Not Found
	</div>
<?php } else { ?>
  
  <div class="col-md-4 col-md-offset-4">
  	<?php if($user['cgpa']<$comp['mincgpa'] || $user['ssc']<$comp['minssc'] || $user['hsc']<$comp['minhsc']) { ?>
	  	<div class='alert alert-dismissible alert-danger' role='alert'>
			You do not meet the following criteria for <?php echo $comp['name'];?>
			<ul class="list-unstyled">
				<?php if($user['cgpa']<$comp['mincgpa']) { ?><li>Your CGPA: <?php echo $user['cgpa'];?>, Minimum CGPA: <?php echo $comp['mincgpa'];?></li><?php } ?>
				<?php if($user['ssc']<$comp['minssc']) { ?><li>Your 10th Marks: <?php echo $user['ssc'];?>, Minimum 10th Marks: <?php echo $comp['minssc'];?></li><?php } ?>
				<?php if($user['hsc']<$comp['minhsc']) { ?><li>Your 12th/Diploma Marks: <?php echo $user['hsc'];?>, Minimum 12th/Diploma Marks: <?php echo $comp['minhsc'];?></li><?php } ?>
			</ul>
		</div>
	<?php }?>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?php echo $comp['name'];?></h3>
	  </div>
	  <div class="panel-body">
	    <?php echo html_entity_decode($comp['descr']); ?>
	  </div>
	</div>
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	  <?php if(count($updates)>0) include 'tabs/updatestab.php'; ?>
	  <?php include 'tabs/registertab.php'; ?>
	  <?php include 'tabs/queriestab.php'; ?>
	</div>
  </div>	  
<?php include 'modals/addquerymodal.php';
} ?>

