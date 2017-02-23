<?php 
	if(isset($_SESSION['sap'])) {$sap = $_SESSION['sap'];} else { $sap = $_SESSION['usap']; }
	$qry =getUser($sap);
?>

<div class="col-md-4 col-md-offset-4">
<form id="editForm"> 
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Personal</a></li>
    <li role="presentation" class="disabled"><a href="#profile" aria-controls="profile" role="tab">School</a></li>
    <li role="presentation" class="disabled"><a href="#messages" aria-controls="messages" role="tab">College</a></li>
    <li role="presentation" class="disabled"><a href="#settings" aria-controls="settings" role="tab">Other</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="personal">
      <?php include 'tabs/editpersonaltab.php'; ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
      <?php include 'tabs/editschooltab.php'; ?>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
      <?php include 'tabs/editcollege.php';?>
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">
      <div class="form-group">
        <label class="control-label" for="intInput">Internships</label>
        <textarea class="form-control" id="intInput" name="internships"><?php echo $qry['internships'];?></textarea>
      </div>
      <div class="form-group">
        <label class="control-label" for="langInput">Preferred Language</label>
        <select class="form-control" id="langInput" name="lang">
          <option value="C/C++" <?php if($qry['preflang'] == "C/C++") echo 'selected';?>>C/C++</option>
          <option value="Java" <?php if($qry['preflang'] == "Java") echo 'selected';?>>Java</option>
        </select>
      </div>
      <button type="submit" name="edit" value="edit" id="editButton" data-loading-text="Saving..." class="btn btn-primary btn-block">Save Details</button>
      <div class="form-group">
        <span ><a class="btn editPrevTab">&larr;Previous</a></span>
      </div>
    </div>
  </div>
</form>
</div>