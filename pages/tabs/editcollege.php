 <div class="form-group">
        <label class="control-label" for="cgpaInput">CGPA</label>
        <input type="text" class="form-control" id="cgpaInput" name="cgpa" value="<?php echo $qry['cgpa'];?>">
      </div>
      <div class="form-group">
        <label class="control-label" for="beperInput">Percentage</label>
        <input type="text" class="form-control" id="beperInput" name="beper" value="<?php echo $qry['beper'];?>" disabled>
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
          <?php for($i = 0;$i <= 10; $i++) { ?>s
            <option value="<?php echo $i;?>" <?php if($qry['pastBacklog'] == $i) echo 'selected';?>><?php echo $i;?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label class="control-label" for="yeardropInput">Year Drop</label>
        <select class="form-control" id="yeardropInput" name="yeardrop">
          <?php for($i = 0;$i <= 4; $i++) { ?>s
            <option value="<?php echo $i;?>" <?php if($qry['yeardrop'] == $i) echo 'selected';?>><?php echo $i;?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label class="control-label" for="beStartYearInput">Year of Joining</label>
        <input type="text" class="form-control" id="beStartYearInput" name="beStartYear" value="<?php echo $qry['beStartYear'];?>">
      </div>
      <div class="form-group">
        <label class="control-label" for="beYearInput">Year of Passing</label>
        <input type="text" class="form-control" id="beYearInput" name="beYear" value="<?php echo $qry['beYear'];?>">
      </div>
      <div class="form-group">
        <span ><a class="btn editPrevTab">&larr;Previous</a></span>
        <span ><a class="btn pull-right editNextTab" data-validate="validateCollege">Next&rarr;</a></span>
      </div>