<div class="panel panel-default">
	<div class="panel-heading" role="tab" id="headingQueries">
	  <h4 class="panel-title">
	    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseQueries" aria-expanded="false" aria-controls="collapseQueries">
	      FAQs
	    </a>
	  </h4>
	</div>
	<div id="collapseQueries" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingQueries">
	  <div class="panel-body">
	    <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#queriesModal">Ask a Question</button>
	  </div>
	  <?php if(count($unanswered)>0) { ?>
	  	<div class="panel-footer">My Unanswered Questions</div>
  		<ul class="list-group">
  			<?php for ($i=0; $i < count($unanswered); $i++) { ?>
  				<li class="list-group-item"><?php echo $unanswered[$i]['querytext'];?></li>
  			<?php } ?>
	  	</ul>
	  <?php }
	  if(count($answered)+count($private)>0) { ?>
		  <div class="panel-footer">All Questions</div>
		  <ul class="list-group">
		  	<?php for ($i=count($private)-1; $i > -1 ; $i--) { ?>
			  <li class="list-group-item list-group-item-info">
			  	<p><b><?php echo $private[$i]['querytext'];?></b></p>
			  	<p><?php echo $private[$i]['answer'];?></p>
			  </li>
			<?php } ?>
			<?php for ($i=count($answered)-1; $i > -1 ; $i--) { ?>
			  <li class="list-group-item <?php if($answered[$i]['sapid']==$_SESSION['sap']) { ?>list-group-item-success <?php } ?>">
			  	<p><b><?php echo $answered[$i]['querytext'];?></b></p>
			  	<p><?php echo $answered[$i]['answer'];?></p>
			  </li>
			<?php } ?>
		  </ul>
	  <?php } ?>
	</div>
</div>