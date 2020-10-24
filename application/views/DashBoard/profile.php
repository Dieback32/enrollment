<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa fa-bars"></i> Profile</h3>
		</div>
	</div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    
                </header>
                <div class="panel-body">
                  	<div class="col-md-8">
                  		<form method="POST" action="<?php echo site_url(); ?>/DashBoard/myprofile" class="form-horizontal" data-toggle="validator" role="form">
		  						<input type="hidden" name="userID"  value="<?php echo $this->session->userdata('id'); ?>">
							  <div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">Lastname</label>
							    <div class="col-sm-10">
							      <input value="<?php echo $userInfo->lastName; ?>" pattern="[A-Za-z]+" type="text" name="lname" class="form-control" id="" placeholder="Lastname" required>
							      <div class="help-block with-errors"></div>
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>
							    <div class="col-sm-10">
							      <input value="<?php echo $userInfo->firstName; ?>" pattern="[A-Za-z]+" type="text" name="fname" class="form-control" id="" placeholder="First	name" required>
							      <div class="help-block with-errors"></div>
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">MI</label>
							    <div class="col-sm-10">
							      <input value="<?php echo $userInfo->Mi; ?>" pattern="[A-Za-z]+" maxlength="2" type="text" name="mi" class="form-control" id="" placeholder="MI"  required>
							      <div class="help-block with-errors"></div>
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="col-sm-2 control-label">Address</label>
							    <div class="col-sm-10">
							      <textarea name="address" class="form-control" placeholder="Addres" rows="3" required><?php echo $userInfo->address; ?></textarea>
							      <div class="help-block with-errors"></div>
							    </div>
							  </div>	
							  <div class="form-group">
							    <label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
							    <div class="col-sm-10">
							      <input value="<?php echo $userInfo->contactNumber; ?>" required maxlength="11" name="contact" pattern="^\d{11}$" class="form-control" id="" placeholder="Contact Number">
							      <div class="help-block with-errors"></div>
							    </div>
							  </div>						  
							  <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-10">
							      <button type="submit" class="btn btn-primary">Save</button>
							    </div>
							  </div>
							</form>
                  	</div>
                  	<div class="col-md-4">
		  			
		  					<header class="panel-heading">
                    			<h3>Change Password</h3>
                			</header>
		  					<form action="<?php echo site_url(); ?>/DashBoard/changePassword" method="POST" role="form" data-toggle="validator">
		  						<div class="form-group has-feedback">
			                        <label>Old Password</label>
			                        <input type="password" class="form-control" name="password" placeholder="Old Password" required>
			                        <span class="form-control-feedback"></span>
			                      </div>
			                      <div class="form-group has-feedback">
			                        <label>New Password</label>
			                        <input type="password" class="form-control" data-minlength="6" name="newpwd" id="inputPassword" placeholder="New Password" required>
			                        <div class="help-block with-errors"></div>
			                      </div>
			                      <div class="form-group has-feedback">
			                        <label>Confirm New Password</label>
			                        <input type="password" class="form-control" name="newpwd2" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Password don't match"  placeholder="Confirm Password" required>
			                        <div class="help-block with-errors"></div>
			                      </div>
			                      <div class="col-xs-4">
			                        <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
			                      </div><!-- /.col -->
		  					</form>
		  			</div>
	  			</div>
                </div>
            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>
<!--main content end-->