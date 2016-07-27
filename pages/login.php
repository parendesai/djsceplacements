<div class="col-md-4 col-md-offset-4">
	<?php if($params[0] != "login") { ?>
	<div class='alert alert-dismissible alert-info' role='alert'>
		Login to view this page
	</div>
	<?php	} ?>
	<div class='alert alert-dismissible alert-danger hide' role='alert' id="alertInvalid">
		Invalid Login
	</div>
	<form id="loginForm">
	  <div class="form-group">
	    <label for="sapInput">SAP ID</label>
	    <input type="text" class="form-control" id="sapInput" name="sap">
	  </div>
	  <div class="form-group">
	    <label for="passwordInput">Password</label>
	    <input type="password" class="form-control" id="passwordInput" name="password">
	  </div>
	  <button type="submit" class="btn btn-primary btn-block" id="loginButton" data-loading-text="Loggin in...">Login</button>
	</form>
</div>

