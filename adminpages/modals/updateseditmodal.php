<div class="modal fade" id="updateEditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="updateEditLabel">Edit Update</h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-success hidden" role="alert" id="updateAddedAlert">Update Successfully Added, Check it in the Updates Tab</div>
          <div class="form-group">
            <label for="compEditInput">Company</label>
            <input type="text" class="form-control" disabled id="compEditInput" name="update">
          </div>
          <div class="form-group">
            <label for="updateEditEditor">Update</label>
            <div id="updateEditEditor" class="updateEditor"></div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="updateEdit" data-loading-text="Saving...">Save</button>
      </div>
    </div>
  </div>
</div>