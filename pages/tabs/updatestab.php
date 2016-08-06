<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingUpdates">
    <h4 class="panel-title">
      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseUpdates" aria-expanded="true" aria-controls="collapseUpdates">
        Updates
      </a>
    </h4>
  </div>
  <div id="collapseUpdates" class="panel-collapse collapse <?php if ($isReg != 0) { echo 'in';}?>" role="tabpanel" aria-labelledby="headingUpdates">
    <ul class="list-group">
      <?php for($j=count($updates)-1; $j>-1;$j--) { ?>
        <li class="list-group-item">
          <h4 class="list-group-item-heading"><?php echo $updates[$j]['date'];?></h4>
          <p class="list-group-item-text"><?php echo html_entity_decode($updates[$j]['updts']);?></p>
        </li>
      <?php } ?>
    </ul>
  </div>
</div>