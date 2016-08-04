<?php $comps = getAllCompanies(); ?>
<div class="row padded">
  <a class="btn btn-default pull-right" style="margin-bottom: 10px;" href="/admin/company/create/" role="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
</div>
<div class="row padded">
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
</div>


<!-- Modal -->
<?php include 'modals/mailmodal.php'; ?>
<?php include 'modals/xlsmodal.php'; ?>
<?php include 'modals/deletemodal.php'; ?>
<?php include 'modals/editmodal.php'; ?>