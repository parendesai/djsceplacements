<?php $comps = getAllCompanies(); ?>
<div class="col-md-4 col-md-offset-4">
	<ul class="list-group">
		<?php for ($i=0; $i < count($comps); $i++) { ?>
			<a href="/register/<?php echo $comps[$i]['slug']?>" class="list-group-item"><?php echo $comps[$i]['name']?><span class="label label-<?php if($comps[$i]['open']=='open')echo 'success'; else echo 'danger'; ?> pull-right"><?php echo $comps[$i]['open']?></span></a>
		<?php } ?>
	</ul>
</div>