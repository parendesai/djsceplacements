<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingRegister">
	  <h4 class="panel-title">
	    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseRegister" aria-expanded="false" aria-controls="collapseRegister">
	      Register 
	    </a>
	    <?php if ($isReg != 0) { ?><span class="label label-success pull-right"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span><?php }?>
	  </h4>
	</div>
	<div id="collapseRegister" class="panel-collapse collapse <?php if ($isReg == 0 || count($updates)==0) { echo 'in';}?>" role="tabpanel" aria-labelledby="headingRegister">
	  <div class="panel-body">
		Following Details <?php if($isReg == 0){ ?>will be<?php } else {?>have been<?php } ?> submitted to <?php echo $comp['name'];?>
	     <table class="table">
			 <?php for ($i=0; $i < count($userdetails); $i++) { ?>
			  	<tr>
			  		<td><?php echo $deets[$userdetails[$i]['userdetail']];?></td>
			  		<td><?php echo $user[$userdetails[$i]['userdetail']];?></td>
			  	</tr>
			 <?php } ?>
	     </table> 
		 <form id="registerForm">
			<?php if($comp['open']=='open') { ?>
				<input type="hidden" name="cid" value="<?php echo $comp['id']; ?>">
				<input type="hidden" name="status" value="<?php if($isReg == 0) echo "insert"; else echo "delete";?>">
				<button id="register" type="submit" name="register" value="<?php echo $sap;?>" class="btn btn-primary btn-block"><?php if($isReg==0) echo "Register"; else echo "Cancel Registeration";?> for <?php echo $comp['name'];?></button>
			<?php  } else { ?>
				<div class='alert alert-dismissible alert-warning' role='alert'>
					Registeration for <?php echo $comp['name'];?> has closed
				</div>
			<?php } ?>
		</form>
	  </div> 
	</div>
</div>