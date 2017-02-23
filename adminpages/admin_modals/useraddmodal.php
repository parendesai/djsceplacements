<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="editLabel">
  <form method="POST" id="addUserForm">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="editLabel">Add User</h4>
        </div>
        <div class="modal-body">        
          <div class="form-group">
            <label for="sapInput">SAP ID</label>
            <input type="text" class="form-control" id="name" name="sap">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="addButton" data-loading-text="Adding...">Add</button>
        </div>
      </div>
    </div>
  </form>
</div>