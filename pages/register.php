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

