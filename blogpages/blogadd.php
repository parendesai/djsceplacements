<?php $comps = getAllCompanies();?>
<div>
	<div class="form-group">
		<label for="title" >Title</label>
		<input type="text" class="form-control" name="title" id="title">
	</div>
	<label for="email-select" style="width: 100%">
		For what Company
		<select class="email-select select2" id="select" style="width:100%">
			<?php for ($i=0; $i < count($comps); $i++) { ?>
				<option value="<?php echo $comps[$i]['id'];?>"><?php echo $comps[$i]['name'];?></option>
			<?php } ?>
		</select>
	</label>
	<input type="hidden" name="sap" id="sap" value="<?php echo $_SESSION['sap'];?>">
	<div class="form-group">
		<label>Article</label>
		<div class="descr"></div>
	</div>
	<div class="btn btn-primary btn-block" id="addBlog">Submit</div>
</div>