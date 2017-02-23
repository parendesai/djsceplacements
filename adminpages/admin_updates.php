<?php $comps = getAllCompanies(); ?>
<div class="row padded">
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<?php for ($i=0; $i < count($comps); $i++) { 
      		$id = $comps[$i]['id'];
      		$updates = getUpdates($id); ?>
      		<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="heading<?php echo $i; ?>">
				  <h4 class="panel-title">
				    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse<?php echo $i; ?>">
				      <?php echo $comps[$i]['name']?>
				    </a>
				  </h4>
				</div>
				<div id="collapse<?php echo $i; ?>" class="panel-collapse collapse out" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
      				<div class="panel-body" data-name='<?php echo $comps[$i]["name"];?>' data='<?php echo $comps[$i]["id"];?>' status='<?php echo $comps[$i]["open"];?>' data-slug='<?php echo $comps[$i]["slug"];?>' data-desc='<?php echo html_entity_decode($comps[$i]["descr"]);?>' data-det='<?php echo json_encode($a); ?>' data-mincgpa='<?php echo $comps[$i]["mincgpa"];?>' data-minssc='<?php echo $comps[$i]["minssc"];?>' data-minhsc='<?php echo $comps[$i]["minhsc"];?>'>
      					For new information add a new update. Use the edit update feature only to fix typos or formatting errors.
      					<button data-toggle="modal" data-target="#updateModal" class="btn btn-default pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
      				</div>
      				<?php if(count($updates)>0) { ?> 
      					<ul class="list-group">
      						<?php for($j=count($updates)-1; $j>-1;$j--) { ?>
						    	<li class="list-group-item">
						    		<div class="row">
							    		<div class="col-md-10">
								    		<h4 class="list-group-item-heading"><?php echo $updates[$j]['date'];?></h4>
		    								<p class="list-group-item-text"><?php echo html_entity_decode($updates[$j]['updts']);?></p>
		    							</div>
		    							<div class="col-md-2">
		    								<div class="btn-group pull-right" role="group" aria-label="..." data='<?php echo $updates[$j]["id"];?>' data-name='<?php echo $comps[$i]["name"];?>' data-updts='<?php echo html_entity_decode($updates[$j]["updts"]);?>'>
											  <button type='button' class="btn btn-default" data-toggle="modal" data-target="#updateEditModal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
											  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirm"><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span></button>
											</div>
		    							</div>
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
<?php include 'admin_modals/addupdatemodal.php';?>
<?php include 'admin_modals/updateseditmodal.php';?>
<?php include 'admin_modals/deleteupdatemodal.php'; ?>