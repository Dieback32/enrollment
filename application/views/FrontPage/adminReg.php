<div id="fh5co-team-section">
	<div class="container">
		<div class="row ">
			<div class="col-md-6">
				<BR><BR><BR>
				<h1 class="text-center">SYSTEM ADMIN <br><br> ACCCOUNT SETUP</h1>
			</div>
			<div class="col-md-6">
				<br><br>
				<form method="POST" action="<?php echo site_url(); ?>/frontPage/setAccount" data-toggle="validator" class="form-horizontal" role="form">
	              <div class="col-md-12">
	              	<input type="hidden"  name="id" value="admin">
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
	                  <div class="col-sm-10">
	                    <input value="" type="email" name="email" class="form-control" id="" placeholder="Email" required>
	                    <div class="help-block with-errors"></div>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
	                  <div class="col-sm-10">
	                    <input value="" type="password" data-minlength="6" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
	                    <div class="help-block with-errors"></div>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
	                  <div class="col-sm-10">
	                    <input value="" type="password" name="cpassword" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" placeholder="Confirm Password" required>
	                    <div class="help-block with-errors"></div>
	                  </div>
	                </div>
	                  <input value="admin" type="hidden" name="role" class="form-control" id="" readonly="readonly">
	              </div>
	              
		            <div class="col-md-12">
		              <div class="form-group">
		                <div class="col-md-offset-2 col-md-8">
		                  <button type="submit" class="btn btn-primary" style="width:100%">Save</button>
		                </div>
		              </div>
		            </div>
		        </form>
			</div>
		</div>
	</div>
</div>