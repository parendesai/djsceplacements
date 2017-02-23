<?php
	$id = $params[3];
	$arr = getRequiredFields($params[3]);
	$ar = array(0=>'`sap`');
	for($i=0; $i < count($arr); $i++){
		$ar[] = '`'.$arr[$i]['userdetail'].'`';
	}
	$users = getRegistered($id);
	$comp = getCompany($id, null);
?>
<h2 class="sub-header"><?php echo $comp['name']; ?></h2>
<table class="table table-striped">
  <tr>
  	<th>#</th> 
  	<th>SAP</th>
  	<?php for ($i=0; $i < count($arr); $i++) { ?>
  		<th><?php echo $deets[$arr[$i]['userdetail']]; ?></th>
  	<?php } ?>
  </tr>
  <?php for ($i=0; $i < count($users); $i++) { ?>
  	<tr <?php if($users[$i]['cgpa']<$comp['mincgpa'] || $users[$i]['ssc']<$comp['minssc'] || $users[$i]['hsc']<$comp['minhsc']) echo 'class="danger"';?>>
  		<td><?php echo ($i+1); ?></td>
  		<td><?php echo $users[$i]['sap']; ?></td>
  		<?php for ($j=0; $j < count($arr); $j++) { ?>
  			<td><?php echo $users[$i][$arr[$j]['userdetail']]; ?></td>
  		<? } ?>
  	</tr>
  <?php } ?>
</table>