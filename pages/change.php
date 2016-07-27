<div class="col-md-4 col-md-offset-4">
	<div class='alert alert-dismissible alert-success hidden' role='alert' id="updateAlert">
		Update Complete
	</div>
	<div class='alert alert-dismissible alert-danger hidden' role='alert' id="errorAlert">
		Invalid Password
	</div>
	<form method="POST" id="changeForm">
	  <div class="form-group">
	    <label for="sapInput">SAP ID</label>
	    <input type="text" class="form-control" id="sapInput" name="sap" disabled value="<?php echo $_SESSION['sap'] ?>">
	  </div>
	  <div class="form-group">
	    <label for="passwordInput">Old Password</label>
	    <input type="password" class="form-control" id="passwordInput" name="password">
	  </div>
	  <div class="form-group">
	    <label for="newpasswordInput">New Password</label>
	    <input type="password" class="form-control" id="newpasswordInput" name="newpassword">
	  </div>
	  <div class="form-group">
	    <label for="cnewpasswordInput">Confirm New Password</label>
	    <input type="password" class="form-control" id="cnewpasswordInput" name="cnewpassword">
	  </div>
	  <button type="submit" name="change" value="change" class="btn btn-primary btn-block" id="changeButton">Change Password</button>
	</form>
</div>