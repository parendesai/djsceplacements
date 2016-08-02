<div class="modal fade" id="generateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="deleteConfirmLabel">Enter Minimum Criteria</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-info" role="alert">
          Excel will be Generated based on the below values. If you change them, the excel shall reflect the updated values but they will now be saved in the company database. To update the values in company database use the edit button.
        </div>
        <form >
          <div class="form-group">
            <label for="mincgpa">Minumum CGPA</label>
            <input type="text" class="form-control" id="mincgpa" name="mincgpa" value=0>
          </div>
          <div class="form-group">
            <label for="minssc">Minimum 10th Standard</label>
            <input type="text" class="form-control" id="minssc" name="minssc" value="0">
          </div>
          <div class="form-group">
            <label for="minhsc">Minimum 12th Standard/Diploma</label>
            <input type="text" class="form-control" id="minhsc" name="minhsc" value="0">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="generate" data-loading-text="Generating...">Generate</button>
      </div>
    </div>
  </div>
</div>