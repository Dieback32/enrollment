<div class="container">

</div>
<div id="fh5co-team-section">
  <div class="container">
    <div class="row about">
      <div class="col-md-6">
        <br><br><br>
        <h1 class="text-center">USER <br><br> INFORMATION</h1>
      </div>
      <div class="col-md-6">
        <br><br>
        <form method="POST" action="<?php echo site_url(); ?>/DashBoard/myprofile" data-toggle="validator" class="form-horizontal" role="form">
            <input type="hidden" name="userID" value="<?php echo $this->session->userdata('id'); ?>">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Lastname</label>
            <div class="col-sm-10">
              <input value="" type="text" name="lname" pattern="[A-Za-z]+" class="form-control" id="" placeholder="Lastname" required>
              <div class="help-block with-errors"></div>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>
            <div class="col-sm-10">
              <input value="" type="text" name="fname" pattern="[A-Za-z]+" class="form-control" id="" placeholder="Firstname" required>
              <div class="help-block with-errors"></div>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">MI</label>
            <div class="col-sm-10">
              <input value="" type="text" name="mi" pattern="[A-Za-z]+" maxlength="2" class="form-control" id="" placeholder="MI" required>
              <div class="help-block with-errors"></div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
              <textarea name="address" class="form-control" placeholder="Addres" rows="3" required> </textarea>
              <div class="help-block with-errors"></div>
            </div>
          </div>  
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
            <div class="col-sm-10">
              <input value="" name="contact" pattern="^\d{11}$" maxlength="11" class="form-control" id="" placeholder="Contact Number" required>
              <div class="help-block with-errors"></div>
            </div>
          </div>              
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary" style="width:100%; ">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>