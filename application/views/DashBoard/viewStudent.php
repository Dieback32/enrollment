<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa fa-bars"></i>Student Details</h3>
			</div>
		</div>
		<?php
		$email = $account->email;
		$id = $account->id;
		$lname = $info->lastName;
		$fname = $info->firstName;
		$mi = $info->Mi;
		$address = $info->address;
		$contact = $info->contactNumber;
		$grade = $details->grade;
		$bday = $details->birthdate;
		$bplace = $details->place_birth;
		$gender = $details->gender;
		$mother = $details->mother;
		$m_occu = $details->m_occupation;
		$father = $details->father;
		$f_occu = $details->f_occupation;
		$staus = $details->status;
		$section = $details->section;
		// $tracks = $details->tracks;
		$schoolType = $details->schoolType;

		?>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						<?php if ($details->status == "reserved" || $details->status == "not-enrolled"): ?>
							<a href="<?php echo site_url(); ?>/DashBoard/acceptStudent/<?php echo $account->id ?>"
							   class="btn btn-success">Accept Student</a>
						<?php endif ?>

					</header>
					<div class="panel-body">
						<form method="POST" id="addAccount" action="<?php echo site_url(); ?>/DashBoard/updateStudent"
						      data-toggle="validator" class="form-horizontal" role="form">
							<div class="col-md-6">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">ID Number</label>
									<div class="col-sm-10">
										<input value="<?php echo $id ?>" type="text" name="id" data-minlength="2"
										       pattern="^[_A-z0-9]{1,}$" class="form-control" id="" placeholder="ID"
										       readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										<input value="<?php echo $email ?>" type="email" name="email"
										       class="form-control" id="" placeholder="Email" readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<input name="role" type="hidden" value="student">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Lastname</label>
									<div class="col-sm-10">
										<input value="<?php echo $lname; ?>" type="text" name="lname"
										       class="form-control" id="" pattern="[A-Za-z]+" placeholder="Lastname"
										       required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>
									<div class="col-sm-10">
										<input value="<?php echo $fname ?>" type="text" name="fname"
										       class="form-control" id="" placeholder="First name" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Middle name</label>
									<div class="col-sm-10">
										<input value="<?php echo $mi ?>" type="text"
										       name="mi" class="form-control" id="" placeholder="MI" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Address</label>
									<div class="col-sm-10">
										<textarea name="address" class="form-control" placeholder="Address" rows="3"
										          required><?php echo $address ?></textarea>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
									<div class="col-sm-10">
										<input value="<?php echo $contact ?>" pattern="^\d{11}$" maxlength="11"
										       type="text" name="contact" class="form-control" id=""
										       placeholder="Contact Number" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Birthdate</label>
									<div class="col-sm-10">
										<input value="<?php echo $bday ?>" type="text" name="birthdate"
										       class="form-control" id="date" placeholder="Birthdate" readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2">LRN</label>
									<div class="col-md-10">
										<input type="number" value="<?php echo $details->lrn ?>"
										       name="lrn" class="form-control" id="" placeholder="Student LRN"
										       required>
									</div>
								</div>
								<br>

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-2">Grade Level</label>
									<div class="col-md-6">
										<input value="<?php echo $grade ?>" type="text" name="grade"
										       class="form-control" readonly>

										<div class="help-block with-errors"></div>
									</div>
									<div class="col-md-4">
										<a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Set Grade</a>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">Section</label>
									<div class="col-md-10">
										<select name="grade_section" class="form-control" required>
											<option value="0">None</option>
											<?php foreach ($getSection as $section): ?>
												<?php if ($section->grade_level == $grade): ?>
													<?php
													$this->db->from('student_info');
													$this->db->where('section', $section->section);
													$query = $this->db->get();
													$rowcount = $query->num_rows();
													?>

													<?php if ($section->max > $rowcount): ?>
														<option value="<?php echo $section->section; ?>" <?php if ($section->section == $details->section) {
															echo 'selected';
														} ?>><?php echo $section->section ?></option>
													<?php endif ?>

												<?php endif ?>

											<?php endforeach ?>
										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Place of Birth</label>
									<div class="col-sm-10">
										<input value="<?php echo $bplace ?>" type="text" name="place_birth"
										       class="form-control" id="" placeholder="Place of Birth" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Age</label>
									<div class="col-sm-10">
										<input value="<?php echo $details->age ?>" type="text"
										       name="age" class="form-control" id="" placeholder="Age"
										       required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">Gender</label>
									<div class="col-md-10">
										<select name="gender" class="form-control" required>
											<option value="<?php echo $gender ?>"><?php echo $gender ?></option>
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Parent/ Guardian</label>
									<div class="col-sm-10">
										<input value="<?php echo $mother ?>" type="text" name="mother"
										       class="form-control" id="" placeholder="" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Occupation</label>
									<div class="col-sm-10">
										<input value="<?php echo $m_occu ?>" type="text" name="m_occupation"
										       class="form-control" id="" placeholder="Occupation" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2">Tracks</label>
									<div class="col-md-10">
										<select name="tracks" class="form-control" readonly="readonly">
											<?php foreach ($tracks as $track): ?>

												<option value="<?php echo $track->id; ?>" <?php if ($track->id == $details->track) {
													echo 'selected';
												} ?>><?php echo $track->track_name ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2">School</label>
									<div class="col-md-10">
										<select name="schoolType" class="form-control" readonly="readonly">
											<option value="1" <?php if ($schoolType == '1') echo 'selected'; ?>>
												Private
											</option>
											<option value="2" <?php if ($schoolType == '2') echo 'selected'; ?>>Public
											</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-2">Voucher</label>
									<div class="col-md-10">
										<select name="voucher" class="form-control" readonly="readonly">
											<option value="0">None</option>
											<?php foreach ($vouchers as $voucher): ?>

												<option value="<?php echo $voucher->id; ?>" <?php if ($voucher->id == $details->voucherId) {
													echo 'selected';
												} ?>><?php echo $voucher->label ?></option>
											<?php endforeach ?>
										</select>
									</div>
								</div>

								<input type="hidden" name="userID" value="<?php echo $id ?>">
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="col-md-offset-3 col-md-6">
										<button type="submit" class="btn btn-primary" style="width:100%">Update</button>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal fade" id="modal-id">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="modal-title">Grade Level</h4>
								</div>
								<form method="POST" id="addAccount"
								      action="<?php echo site_url(); ?>/DashBoard/setGrade" data-toggle="validator"
								      class="form-horizontal" role="form">
									<div class="modal-body">
										<input value="<?php echo $id ?>" type="hidden" name="my_id" required>
										<select name="grade" class="form-control" required id="grade">
											<option value="<?php echo $grade ?>"><?php echo $grade ?></option>
											<?php foreach ($getGrade as $level): ?>
												<option value="<?php echo $level->grade; ?>"><?php echo $level->grade; ?></option>
											<?php endforeach ?>
										</select>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close
										</button>
										<button type="submit" class="btn btn-primary">Save changes</button>
									</div>
								</form>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
			</div>
	</section>
	</div>
	</div>
	<!-- page end-->
</section>
</section>
<!--main content end-->
						 				
