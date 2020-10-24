<div id="fh5co-team-section">
	<div class="container">
		<div class="row about">
			<div class="col-md-6 col-md-offset-3">
				<br><br>
    		<H2 class="text-center">Change Password?</H2>
    		<br>
			<form action="<?php echo site_url(); ?>/authentication/changePassword" method="POST" role="form" data-toggle="validator">
	              <div class="form-group">
	                <label>New Password</label>
	                <input type="password" class="form-control" data-minlength="6" name="newpwd" id="inputPassword" placeholder="New Password" required>
	                <div class="help-block with-errors"></div>
	              </div>
	              <div class="form-group">
	                <label>Confirm New Password</label>
	                <input type="password" class="form-control" name="newpwd2" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Password don't match"  placeholder="Confirm Password" required>
	                <div class="help-block with-errors"></div>
	              </div>
	              <div class="col-xs-12">
	                <button type="submit" class="btn btn-primary btn-block btn-flat" style="width: 100%;">Save</button>
	              </div><!-- /.col -->
			</form>
		</div>
		</div>
		</div>
	</div>
</div>