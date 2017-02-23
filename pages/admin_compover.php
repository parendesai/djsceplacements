<?php 
 $companies=getAllCompanies();
?>
<ul class="list-group">
<?php for ($i=0; $i < count($companies); $i++) { ?>
	<li class="list-group-item"><?php echo $companies[$i]['name']?><a class="pull-right" href="/register/<?php echo $companies[$i]['slug']?>"><?php echo $_SERVER['SERVER_NAME'].'/register/'.$companies[$i]['slug']?></a></li>
<?php } ?>
</ul>
