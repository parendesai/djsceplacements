<div class="modal fade" id="queriesAnswerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="queryAnswerForm">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="updateLabel">Answer Query</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label class="control-label" for="company">Company</label>
              <input type="text" class="form-control" disabled id="company">
            </div>
            <div class="form-group">
              <label class="control-label" for="by">Question By</label>
              <input type="text" class="form-control" disabled id="by">
            </div>
            <div class="form-group">
              <label class="control-label" for="updateEditor">Question</label>
              <textarea class="form-control" id="updateEditor" name="querytext"></textarea> 
              <input type="hidden" name="id" id='id'>
            </div>
            <div class="form-group">
              <label class="control-label" for="answer">Answer</label>
              <textarea class="form-control" id="answer" name="answer"></textarea> 
            </div>
            <div class="form-group">
              <label class="control-label" for="type">Answer Type</label>
              <input class="form-control" type="text" disabled id="type" >
              <input type="hidden" name="status" id='status'>
              <input type="hidden" name="mail" id='mail'>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="queryAnswer" data-loading-text="Saving...">Answer</button>
        </div>
      </form>
    </div>
  </div>
</div>