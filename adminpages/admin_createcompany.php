<div class="col-md-6 col-md-offset-3">
	<div id="alert" class="hide">
		<div class='alert alert-dismissible alert-success' role='alert'>
			Event Added. Forward the following link to students to regiter <a href="/register/" id="linktoregister"><?php echo $_SERVER['SERVER_NAME'].'/register/'?></a>
		</div>
		<div class='alert alert-dismissible alert-success hidden' id="notfiedAlert" role='alert'>
			Notification Successfully sent.
		</div>
		<button id="notify" class="btn btn-success btn-block" data-loading-text="Notifying...">Notify Students</button>
		<button id="reset" class="btn btn-primary btn-block">Create a new Company</button>
	</div>
	<form method="POST" id="compsform">
	  <div class="form-group">
	    <label for="sapInput">Company Name</label>
	    <input type="text" class="form-control" id="sapInput" name="name">
	  </div>
	  <div class="form-group">
	    <label for="sapInput">Description</label>
	    <input type="hidden" name="descr" id="suminp">
	    <div id="descr"></div>
	  </div>
	  <div class="form-group">
	    <label for="sapInput">Fields Required</label>
	    <p class="text-muted">Hold down control for Windows/Linux and Command for Macs</p>
			<?php $x = getAllFields(); ?>
	    <select multiple class="form-control" size="9" name="details[]" id="fields">
				<?php foreach ($x as $key => $value) { ?>
					<option value="<?php echo $value['key']; ?>" <?php if($value['priority']<6 && $value['priority']!=2 && $value['priority']!=3) { ?>selected<?php } ?>><?php echo $value['title']; ?></option>
				<?php } ?>
	    </select>
	  </div>
	  <div class="form-group">
	    <label for="mincgpaInput">Minumum CGPA</label>
	    <input type="text" class="form-control" id="mincgpaInput" name="mincgpa" value=0>
	  </div>
	  <div class="form-group">
	    <label for="minsscInput">Minimum 10th Standard</label>
	    <input type="text" class="form-control" id="minsscInput" name="minssc" value="0">
	  </div>
	  <div class="form-group">
	    <label for="minhscInput">Minimum 12th Standard/Diploma</label>
	    <input type="text" class="form-control" id="minhscInput" name="minhsc" value="0">
	  </div>
	  <button name="create" id="compsub" value="create" class="btn btn-primary btn-block">Create Company</button>
	</form>
</div>