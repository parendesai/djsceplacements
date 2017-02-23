<div class="form-group">
	    <label class="control-label" for="sscNameInput">10th Standard Institute Name</label>
	    <input type="text" class="form-control" id="sscNameInput" name="sscName" value="<?php echo $qry['sscName'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="sscBoardInput">10th Standard Institute Board</label>
	    <select class="form-control" id="sscBoardInput" name="sscBoard">
	    	<option value="S.S.C" <?php if($qry['sscBoard'] == "S.S.C") echo 'selected';?>>S.S.C</option>
	    	<option value="C.B.S.E" <?php if($qry['sscBoard'] == "C.B.S.E") echo 'selected';?>>C.B.S.E</option>
	    	<option value="I.S.C.E" <?php if($qry['sscBoard'] == "I.C.S.E") echo 'selected';?>>I.S.C.E</option>
	    	<option value="I.G.C.S.E" <?php if($qry['sscBoard'] == "I.G.C.S.E") echo 'selected';?>>I.G.C.S.E</option>
	    </select>
	  </div>
      <div class="form-group">
	    <label class="control-label" for="sscInput">10th Standard Percentage</label>
	    <input type="text" class="form-control" id="sscInput" name="ssc" value="<?php echo $qry['ssc'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="sscYearInput">Year of Passing</label>
	    <input type="text" class="form-control" id="sscYearInput" name="sscYear" value="<?php echo $qry['sscYear'];?>">
	  </div>
	  <hr>
	  <div class="form-group">
	    <label class="control-label" for="hscNameInput">12th Standard/Diploma Institute Name</label>
	    <input type="text" class="form-control" id="hscNameInput" name="hscName" value="<?php echo $qry['hscName'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="hscBoardInput">12th Standard/Diploma Institute Board</label>
	    <select class="form-control" id="hscBoardInput" name="hscBoard">
	    	<option value="H.S.C" <?php if($qry['hscBoard'] == "H.S.C") echo 'selected';?>>H.S.C</option>
	    	<option value="C.B.S.E" <?php if($qry['hscBoard'] == "C.B.S.E") echo 'selected';?>>C.B.S.E</option>
	    	<option value="I.S.C" <?php if($qry['hscBoard'] == "I.C.S") echo 'selected';?>>I.S.C</option>
	    	<option value="M.U" <?php if($qry['hscBoard'] == "M.U") echo 'selected';?>>M.U (Diploma)</option>
	    </select>
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="hscInput">12th Standard/Diploma Percentage</label>
	    <input type="text" class="form-control" id="hscInput" name="hsc" value="<?php echo $qry['hsc'];?>">
	  </div>
	  <div class="form-group">
	    <label class="control-label" for="hscYearInput">Year of Passing</label>
	    <input type="text" class="form-control" id="hscYearInput" name="hscYear" value="<?php echo $qry['hscYear'];?>">
	  </div>
	   <div class="form-group">
	  	<span ><a class="btn editPrevTab">&larr;Previous</a></span>
	  	<span ><a class="btn pull-right editNextTab" data-validate="validateSchool">Next&rarr;</a></span>
	  </div>