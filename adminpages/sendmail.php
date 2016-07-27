<?php 
	$users = getActivatedUsers();
?>
<h3>Send Email</h3>
<label for="email-select" style="width: 100%">
	To
	<select class="email-select" id="email-select" multiple style="width:100%">
		<?php for ($i=0; $i < count($users); $i++) { ?>
			<option value="<?php echo $users[$i]['sap'];?>"><?php echo $users[$i]['fname']." ".$users[$i]['lname'];?></option>
		<?php } ?>
	</select>
</label>
<div class="form-group">
	<label for="subject">Subject</label>
	<input class="form-control" type="text" name="subject" id="subject">
</div>
<label for="descr">Mail</label>
<div id="descr"></div>
<button type="button" class="btn btn-primary btn-block" id="send-mail" data-loading-text="Sending...">Send Mail</button>
