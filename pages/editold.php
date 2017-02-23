<?php if($params[0] != "edit") { ?>
		<div class='alert alert-dismissible alert-info' role='alert'>
			You need to fill all details to continue
		</div>
	<?php	} ?>
	<div class='alert alert-dismissible alert-success hidden' role='alert' id="alertComplete">
		Update Complete
	</div>
	<div class='alert alert-dismissible alert-danger hidden' role='alert' id="alertError">
		Fix The errors before continuing
	</div>
	<form id="editForm">
	  <div class="form-group">
	    <label class="control-label" for="sapInput">SAP ID</label>
	    <input type="text" class="form-control" disabled id="sapInput" name="sap" value="<?php echo $qry['sap'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="emailInput">Email</label>
	    <input type="text" class="form-control" id="emailInput" name="email" autofocus value="<?php echo $qry['email'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="phoneInput">Phone</label>
	    <input type="text" class="form-control" id="phoneInput" name="phone" value="<?php echo $qry['phone'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="fnameInput">First Name</label>
	    <input type="text" class="form-control" id="fnameInput" name="fname" value="<?php echo $qry['fname'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="lnameInput">Last Name</label>
	    <input type="text" class="form-control" id="lnameInput" name="lname" value="<?php echo $qry['lname'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="sscInput">10th Standard Marks</label>
	    <input type="text" class="form-control" id="sscInput" name="ssc" value="<?php echo $qry['ssc'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="sscYearInput">Year of Passing</label>
	    <input type="text" class="form-control" id="sscYearInput" name="sscYear" value="<?php echo $qry['sscYear'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="hscInput">12th Standard/Diploma Marks</label>
	    <input type="text" class="form-control" id="hscInput" name="hsc" value="<?php echo $qry['hsc'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="hscYearInput">Year of Passing</label>
	    <input type="text" class="form-control" id="hscYearInput" name="hscYear" value="<?php echo $qry['hscYear'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="cgpaInput">CGPA</label>
	    <input type="text" class="form-control" id="cgpaInput" name="cgpa" value="<?php echo $qry['cgpa'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="curBacklogInput">Current Backlog</label>
	    <select class="form-control" id="curBacklogInput" name="curBacklog">
	    	<?php for($i = 0;$i <= 10; $i++) { ?>
	    		<option value="<?php echo $i;?>" <?php if($qry['curBacklog'] == $i) echo 'selected';?>><?php echo $i;?></option>
	    	<?php } ?>
	    </select>
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="pastBacklogInput">History of Backlog</label>
	    <select class="form-control" id="pastBacklogInput" name="pastBacklog">
	    	<?php for($i = 0;$i <= 10; $i++) { ?>
	    		<option value="<?php echo $i;?>" <?php if($qry['pastBacklog'] == $i) echo 'selected';?>><?php echo $i;?></option>
	    	<?php } ?>
	    </select>
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="genderInput">Gender</label>
	    <select class="form-control" id="genderInput" name="gender">
	    	<option value="Male" <?php if($qry['gender'] == "Male") echo 'selected';?>>Male</option>
	    	<option value="Female" <?php if($qry['gender'] == "Female") echo 'selected';?>>Female</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="dobInput">Date of Birth</label>
	    <input type="text" class="form-control" id="dobInput" name="dob" value="<?php echo $qry['dob'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="langInput">Preferred Language</label>
	    <select class="form-control" id="langInput" name="lang">
	    	<option value="C/C++" <?php if($qry['preflang'] == "C/C++") echo 'selected';?>>C/C++</option>
	    	<option value="Java" <?php if($qry['preflang'] == "Java") echo 'selected';?>>Java</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="addrInput">Address</label>
	    <textarea class="form-control" id="addrInput" name="address"><?php echo $qry['address'];?></textarea>
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="intInput">Internships</label>
	    <textarea class="form-control" id="intInput" name="internships"><?php echo $qry['internships'];?></textarea>
	  </div>
	  <button type="submit" name="edit" value="edit" id="editButton" data-loading-text="Saving..." class="btn btn-primary btn-block">Save Details</button>
	</form>