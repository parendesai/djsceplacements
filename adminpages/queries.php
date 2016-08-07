<?php $comps = getAllCompanies(); ?>
<div class="row padded">
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<?php for ($i=0; $i < count($comps); $i++) { 
      		$id = $comps[$i]['id'];
      		$unanswered = getAllUnansweredQueries($id);
      		$adminQueries = getAllQueriesAdmin($id); ?>
      		<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading<?php echo $i; ?>">
				  <h4 class="panel-title">
				    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
				      <?php echo $comps[$i]['name']?>
				      <span class="badge pull-right"><?php echo count($unanswered);?></span>
				    </a>
				  </h4>
				</div>
				<div id="collapse<?php echo $i; ?>" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
      				
      				<?php if(count($unanswered)>0) { ?> 
      					<ul class="list-group">
      						<?php for($j=count($unanswered)-1; $j>-1;$j--) { 
      							$user = getUser($unanswered[$j]['sapid']);?>
						    	<li class="list-group-item">
						    		<p><?php echo $unanswered[$j]['querytext'];?></p>
    								<div class="btn-group" role="group" aria-label="..." data="<?php echo $unanswered[$j]['id'];?>" data-name="<?php echo $comps[$i]['name'];?>" data-querytext="<?php echo html_entity_decode($unanswered[$j]['querytext']);?>" data-by="<?php echo $user['sap']." ".$user['fname']." ".$user['lname']?>" data-mail="1">
									  <button type="button" class="btn btn-default mark" data-loading-text="Marking...">Mark As Solved</button>
									  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#queriesAnswerModal" data-type="Publically" data-status="1">Answer</button>
									  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#queriesAnswerModal" data-type="Privately" data-status="2">Answer Privately</button>
									  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirm"><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span></button>
									</div>
    							</li>
						    <?php } ?>
						</ul>
      				<?php } ?>
      				<?php if(count($adminQueries)>0) { ?> 
      					<div class="panel-footer">Answered</div>
      					<ul class="list-group">
      						<?php for($j=count($adminQueries)-1; $j>-1;$j--) { 
      							$user = getUser($adminQueries[$j]['sapid']);?>
						    	<li class="list-group-item">
						    		<p><?php echo $adminQueries[$j]['querytext'];?><span class="label label-primary"><?php echo $user['sap']." ".$user['fname']." ".$user['lname']?></span><?php if($adminQueries[$j]['answered']==2) {?><span class="label label-warning">Private</span><?php }?></p>
						    		<p><?php echo $adminQueries[$j]['answer'];?></p>
    								<div class="btn-group" role="group" aria-label="..." data="<?php echo $adminQueries[$j]['id'];?>" data-name="<?php echo $comps[$i]['name'];?>" data-querytext="<?php echo html_entity_decode($adminQueries[$j]['querytext']);?>" data-answer="<?php echo html_entity_decode($adminQueries[$j]['answer']);?>" data-by="<?php echo $user['sap']." ".$user['fname']." ".$user['lname']?>" data-mail="0">
									  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#queriesAnswerModal" data-type="<?php if($adminQueries[$j]['answered']==2) echo 'Privately'; else echo 'Publically';?>" data-status="<?php echo $adminQueries[$j]['answered']?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span></button>
									  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirm"><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span></button>
									</div>
    							</li>
						    <?php } ?>
						</ul>
      				<?php } ?>
      			</div>
      		</div>
  		<?php } ?>
	</div>
</div>
<?php include 'modals/answerquerymodal.php';?>
<?php include 'modals/deletequerymodal.php'; ?>