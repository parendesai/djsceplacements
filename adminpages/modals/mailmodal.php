<div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="mailLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="mailLabel"></h4>
      </div>
      <div class="modal-body">
        <form >
          <div class="form-group">
            <label for="mail-subject">Subject</label>
            <input type="text" class="form-control" id="mail-subject" name="mincgpa">
          </div>
          <div class="form-group">
            <label for="mail-editor">Mail</label>
            <div id="mail-editor"></div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="notify-mail" data-loading-text="Notifying...">Notify</button>
      </div>
    </div>
  </div>
</div>