<?php $comps = getAllCompanies(); ?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php for ($i=0; $i < count($comps); $i++) { 
      $id = $comps[$i]['id'];
      $count = count(getRegistered($id));
      $userdetails = getRequiredFields($id);
  ?>
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading<?php echo $i; ?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
          <?php echo $comps[$i]['name']?>
        </a>
        <span class="label label-<?php if($comps[$i]['open'] == 'open') echo 'success'; else echo "danger" ?>"><?php echo $comps[$i]['open']?></span>
        <span class="badge pull-right"><?php echo $count;?></span>
      </h4>
    </div>
    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
      <div class="panel-body">
        <?php echo html_entity_decode($comps[$i]['descr']); ?>
        <p>Detials asked for:</p>
        <?php $a = array();?>
        <ul class="list-inline">
          <?php for($j =0; $j < count($userdetails); $j++) { ?>
            <li><?php echo $deets[$userdetails[$j]['userdetail']]; $a[] = $userdetails[$j]['userdetail'];?></li>
          <?php } ?>
        </ul>
        <div class="btn-group" role="group" data-name="<?php echo $comps[$i]['name'];?>" data="<?php echo $comps[$i]['id'];?>" status="<?php echo $comps[$i]['open'];?>" data-slug="<?php echo $comps[$i]['slug'];?>" data-desc='<?php echo html_entity_decode($comps[$i]['descr']);?>' data-det='<?php echo json_encode($a); ?>' data-mincgpa="<?php echo $comps[$i]['mincgpa'];?>" data-minssc="<?php echo $comps[$i]['minssc'];?>" data-minhsc="<?php echo $comps[$i]['minhsc'];?>">
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirm">Delete</button>
          <button type="button" class="btn-cl btn btn-<?php if($comps[$i]['open'] == 'open') echo 'warning'; else echo "info" ?>" data-loading-text="Loading..."><?php if($comps[$i]['open'] == 'open') echo 'Close'; else echo "Open" ?></button>
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editModal">Edit</button>
          <a href="/admin/view/company/<?php echo $comps[$i]['id']?>" type="button" class="btn btn-default">View Registered</a>
          <button type="button" data-toggle="modal" data-target="#generateModal" class="btn btn-default excel" data-loading-text="Generating...">Generate XLS</button>
          <button type="button" class="btn btn-default email" data-loading-text="Sending...">Send Reminder</button>
          <button type="button" data-toggle="modal" data-target="#mailModal" class="btn btn-default">Send Updates to Registered</button>
        </div>

      </div>
      <div class="panel-footer">
        <a href="<?php echo '/register/'.$comps[$i]['slug']?>"><?php echo $_SERVER['SERVER_NAME'].'/register/'.$comps[$i]['slug']?></a>
      </div>
    </div>
  </div>
  <?php } ?>
</div>


<!-- Modal -->
<div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="deleteConfirmLabel">Warning</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this Company? This cannot be undone!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delete">Confrim</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="generateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="deleteConfirmLabel">Enter Minimum Criteria</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info" role="alert">
          Excel will be Generated based on the below values. If you change them, the excel shall reflect the updated values but they will now be saved in the company database. To update the values in company database use the edit button.
        </div>
        <form >
          <div class="form-group">
            <label for="mincgpa">Minumum CGPA</label>
            <input type="text" class="form-control" id="mincgpa" name="mincgpa" value=0>
          </div>
          <div class="form-group">
            <label for="minssc">Minimum 10th Standard</label>
            <input type="text" class="form-control" id="minssc" name="minssc" value="0">
          </div>
          <div class="form-group">
            <label for="minhsc">Minimum 12th Standard/Diploma</label>
            <input type="text" class="form-control" id="minhsc" name="minhsc" value="0">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="generate" data-loading-text="Generating...">Generate</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="mailLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="mailLabel"></h4>
      </div>
      <div class="modal-body">
        <form >
          <div class="form-group">
            <label for="mail-subject">Subject</label>
            <input type="text" class="form-control" id="mail-subject" name="mincgpa">
          </div>
          <div class="form-group">
            <label for="mail-editor">Mail</label>
            <div id="mail-editor"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="notify-mail" data-loading-text="Notifying...">Notify</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editLabel">Edit</h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="compsform">
          <div class="form-group">
            <label for="sapInput">Company Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="sapInput">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" disabled>
          </div>
          <div class="form-group">
            <label for="sapInput">Description</label>
            <input type="hidden" name="descr" id="suminp">
            <div id="descr"></div>
          </div>
          <div class="form-group">
            <label for="sapInput">Fields Required</label>
            <p>Hold down control for Windows/Linux and Command for Macs</p>
            <select multiple class="form-control" size="9" name="details[]" id="det">
              <option value="fname">First Name</option>
              <option value="lname">Last Name</option>
              <option value="phone">Phone</option>
              <option value="email">Email</option>
              <option value="ssc">10th Standard Marks</option>
              <option value="hsc">12th Standard/Diploma Marks</option>
              <option value="cgpa">CGPA</option>
              <option value="gender">Gender</option>
              <option value="preflang">Prefered Language</option>
              <option value="address">Address</option>
              <option value="internships">Internships</option>
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
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
      </div>
    </div>
  </div>
</div>