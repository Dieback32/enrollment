<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa fa-bars"></i> Add Cashier</h3>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">

					</header>
					<div class="panel-body">
						<?php
						$str = '000001';
						$this->db->select('id');
						$this->db->where('role !=', 'student');
						$this->db->where('role !=', 'admin');
						$this->db->order_by('id', "desc")->limit(1);
						$query = $this->db->get('accounts');
						$result = $query->row();
						if (isset($result->id)) {
							$str = $result->id;
							$numbers = preg_replace('/[^0-9]/', '', $str);
							$letters = preg_replace('/[^a-zA-Z]/', '', $str);
							$numbers;
							$my_id = (int)$numbers + 1;
							if ($my_id < 10) {
								$new_id = 'S0000' . $my_id;
							} else if ($my_id < 100) {
								$new_id = 'S000' . $my_id;
							} else if ($my_id < 100) {
								$new_id = 'S00' . $my_id;
							} else {
								$new_id = 'S0' . $my_id;
							}

						} else {
							$new_id = 'S00001';
						}
						?>
						<form method="POST" id="addAccount" action="<?php echo site_url(); ?>/DashBoard/setAccount"
						      data-toggle="validator" class="form-horizontal" role="form">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">ID Number</label>
									<div class="col-sm-10">
										<input value="<?php echo $new_id ?>" type="text" name="id" data-minlength="2"
										       pattern="^[_A-z0-9]{1,}$" class="form-control" id="" placeholder="ID"
										       readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('email') ?>" type="email" name="email"
										       class="form-control" id="" placeholder="Email" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
										<input value="" type="password" name="password" class="form-control"
										       data-minlength="6" id="inputPassword" placeholder="Password" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
									<div class="col-sm-10">
										<input value="" type="password" name="cpassword" class="form-control"
										       id="inputPasswordConfirm" data-match="#inputPassword"
										       placeholder="Confirm Password">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<input name="role" type="hidden" value="cashier">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Lastname</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('lname') ?>" type="text" pattern="[A-Za-z]+"
										       name="lname" class="form-control" id="" placeholder="Lastname" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('fname') ?>" type="text" pattern="[A-Za-z]+"
										       name="fname" class="form-control" id="" placeholder="First name"
										       required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">MI</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('mi') ?>" pattern="[A-Za-z]+" maxlength="2"
										       type="text" name="mi" class="form-control" id="" placeholder="MI"
										       required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Address</label>
									<div class="col-sm-10">
										<textarea name="address" class="form-control" placeholder="Address" rows="3"
										          required><?php echo set_value('address') ?></textarea>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('contact') ?>" pattern="^\d{11}$"
										       maxlength="11" minlength="7" type="text" name="contact"
										       class="form-control" id="" placeholder="Contact Number" required>
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
				</section>
			</div>
		</div>
	</section>
	<!-- page end-->
</section>
<!--main content end-->
						 				
