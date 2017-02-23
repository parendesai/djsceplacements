  <div class="form-group">
    <label class="control-label" for="sapInput">SAP ID</label>
    <input type="text" class="form-control" disabled id="sapInput" name="sap" value="<?php echo $qry['sap'];?>">
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
    <label class="control-label" for="mnameInput">Father's Name</label>
    <input type="text" class="form-control" id="mnameInput" name="mname" value="<?php echo $qry['mname'];?>">
  </div>
  <div class="form-group">
    <label class="control-label" for="qnameInput">Mother's Name</label>
    <input type="text" class="form-control" id="qnameInput" name="qname" value="<?php echo $qry['qname'];?>">
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
    <label class="control-label" for="addrInput">Address</label>
    <textarea class="form-control" id="addrInput" name="address"><?php echo $qry['address'];?></textarea>
  </div>
  <div class="form-group">
    <label class="control-label" for="addrAInput">Address (Area)</label>
    <input type="text" class="form-control" id="addrAInput" name="addressa" value="<?php echo $qry['addressa'];?>">
  </div>
  <div class="form-group">
    <label class="control-label" for="addrCInput">Address (City)</label>
    <input type="text" class="form-control" id="addrCInput" name="addressc" value="<?php echo $qry['addressc'];?>">
  </div>
  <div class="form-group">
    <label class="control-label" for="addrPInput">Address (Pin Code)</label>
    <input type="text" class="form-control" id="addrPInput" name="addressp" value="<?php echo $qry['addressp'];?>">
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
  	<span ><a class="btn editPrevTab"></a></span>
  	<span ><a class="btn pull-right editNextTab" data-validate="validatePersonal">Next&rarr;</a></span>
  </div>
