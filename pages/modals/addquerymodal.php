<div class="modal fade" id="queriesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="queryAddForm">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="updateLabel">Ask a Question for <?php echo $comp['name']; ?></h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label class="control-label" for="updateEditor">Question</label>
              <textarea class="form-control" id="updateEditor" name="querytext"></textarea> 
              <input type="hidden" name="company" value="<?php echo $comp['id'];?>">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="queryAdd" data-loading-text="Saving...">Ask Question</button>
        </div>
      </form>
    </div>
  </div>
</div>