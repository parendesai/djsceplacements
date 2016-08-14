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
            <p>Hold down control for Windows/Linux and Command for Macs</p>
            <select multiple class="form-control" size="9" name="details[]" id="det">
              <option value="fname">First Name</option>
              <option value="lname">Last Name</option>
              <option value="phone">Phone</option>
              <option value="email">Email</option>
              <option value="ssc">10th Standard Marks</option>
              <option value="sscYear">Year of Passing 10th Standard Marks</option>
              <option value="hsc">12th Standard/Diploma Marks</option>
              <option value="hscYear">Year of Passing 12th Standard/Diploma Marks</option>
              <option value="cgpa">CGPA</option>
              <option value="beper">BE Percentage</option>
              <option value="curBacklog">Current Backlog</option>
              <option value="pastBacklog">History of Backlog</option>
              <option value="gender">Gender</option>
              <option value="preflang">Prefered Language</option>
              <option value="address">Address</option>
              <option value="internships">Internships</option>
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