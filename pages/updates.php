<?php 
	$queries = getAllMyQueries($_SESSION['sap']);
	$status = array(0=>'Unanswered', 1=>'Answered', 2=>"Private Answer", 3=>"Marked As Solved");
?>
<div class="col-md-4 col-md-offset-4">
	<ul class="list-group">
		<?php for($i = 0; $i<count($queries); $i++) { ?>
			<li class="list-group-item">
				<p>For Company <?php echo $queries[$i]['name']?><span class="label label-default"><?php echo $status[$queries[$i]['answered']];?></span></p>
				<p><?php echo $queries[$i]['querytext'];?></p>
				<?php if($queries[$i]['answered']==1 || $queries[$i]['answered']==2) { ?><p><?php echo $queries[$i]['answer'];?></p><?php }?>
			</li>
		<?php }?>
	</ul>
</div>