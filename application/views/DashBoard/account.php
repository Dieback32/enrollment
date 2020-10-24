<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa fa-bars"></i> Edit Account</h3>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">

					</header>
					<div class="panel-body">

						<form method="POST" id="addAccount" action="<?php echo site_url(); ?>/DashBoard/updateAccount"
						      data-toggle="validator" class="form-horizontal" role="form">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">ID Number</label>
									<div class="col-sm-10">
										<input value="<?php echo $account->id ?>" type="text" name="id"
										       data-minlength="2" pattern="^[_A-z0-9]{1,}$" class="form-control" id=""
										       placeholder="ID" readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										<input value="<?php echo $account->email ?>" type="email" name="email"
										       class="form-control" id="" placeholder="Email" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Lastname</label>
									<div class="col-sm-10">
										<input value="<?php echo $info->lastName ?>" type="text" pattern="[A-Za-z]+"
										       name="lname" class="form-control" id="" placeholder="Lastname" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>
									<div class="col-sm-10">
										<input value="<?php echo $info->firstName ?>" type="text" 
										       name="fname" class="form-control" id="" placeholder="First name"
										       required>
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<div class="form-group">
									<input name="role" type="hidden" value="cashier">
								</div>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">MI</label>
									<div class="col-sm-10">
										<input value="<?php echo $info->Mi ?>" pattern="[A-Za-z]+" maxlength="2"
										       type="text" name="mi" class="form-control" id="" placeholder="MI"
										       required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Address</label>
									<div class="col-sm-10">
										<textarea name="address" class="form-control" placeholder="Address" rows="3"
										          required><?php echo $info->address ?></textarea>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
									<div class="col-sm-10">
										<input value="<?php echo $info->contactNumber ?>" pattern="^\d{11}$"
										       maxlength="11" type="text" name="contact" class="form-control" id=""
										       placeholder="Contact Number" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<div class="col-md-offset-3 col-md-6">
										<button type="submit" class="btn btn-primary" style="width:100%">Save</button>
									</div>
								</div>
							</div>
						</form>
					</div>
			</div>
	</section>
	</div>
	</div>
	<!-- page end-->
</section>
</section>
<!--main content end-->
						 				
