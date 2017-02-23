<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="editLabel">Edit</h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="compsform">
          <div class="form-group">
            <label for="sapInput">Company Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="form-group">
            <label for="sapInput">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" disabled>
          </div>
          <div class="form-group">
            <label for="sapInput">Description</label>
            <input type="hidden" name="descr" id="suminp">
            <div id="descr"></div>
          </div>
          <div class="form-group">
            <label for="sapInput">Fields Required</label>
            <p class="text-muted">Hold down control for Windows/Linux and Command for Macs</p>
			      <?php $x = getAllFields(); ?>
            <select multiple class="form-control" size="9" name="details[]" id="det">
              <?php foreach ($x as $key => $value) { ?>
                <option value="<?php echo $value['key']; ?>"><?php echo $value['title']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="mincgpaInput">Minumum CGPA</label>
            <input type="text" class="form-control" id="mincgpaInput" name="mincgpa" value=0>
          </div>
          <div class="form-group">
            <label for="minsscInput">Minimum 10th Standard</label>
            <input type="text" class="form-control" id="minsscInput" name="minssc" value="0">
          </div>
          <div class="form-group">
            <label for="minhscInput">Minimum 12th Standard/Diploma</label>
            <input type="text" class="form-control" id="minhscInput" name="minhsc" value="0">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
      </div>
    </div>
  </div>
</div>