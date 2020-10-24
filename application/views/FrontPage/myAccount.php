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
$status = $details->status;
$section = $details->section;

// $this->db->where('grade_level', $grade);
// $sub = $this->db->get('subject');
// $subject = $sub->result();

$this->db->where('grade_level', $grade);
$this->db->where('track', $details->track);
$sub = $this->db->get('subject');
$subject = $sub->result();

$tui = $this->db->get('tuition');
$tuition = $tui->result();

$this->db->where('grade', $grade);
$book = $this->db->get('book_fee');
$books = $book->result();

$this->db->where('grade', $grade);
$fee = $this->db->get('grade_fee');
$fees = $fee->result();

$this->db->where('sy', $check->sy);
$this->db->where('user_id', $this->session->userdata('id'));
$bal = $this->db->get('student_account');
$total = $bal->row();
?>
<div id="fh5co-team-section">
	<div class="container">
		<div class="row about">
			<br><br><br>
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#menu1">My Information</a></li>
				<li><a data-toggle="tab" href="#menu2">My Payment Records</a></li>
				<li><a data-toggle="tab" href="#menu4">My Grades</a></li>
				<li><a data-toggle="tab" href="#menu3">Change Password</a></li>
				<?php if ($status == 'not-enrolled' && $check->status == 1): ?>
					<li><a data-toggle="tab" href="#menu4">Reservation</a></li>
				<?php endif; ?>
			</ul>

			<div class="tab-content">
				<div id="menu1" class="tab-pane fade in active">
					<br><br>
					<div class="col-md-6">
						<h2>My Information</h2>
						<table class="table table-striped table-hover">
							<tbody>
							<tr>
								<td>Name</td>
								<td>:</td>
								<td><?php echo $fname . ' ' . $mi . ' ' . $lname ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td><?php echo $email ?></td>
							</tr>
							<tr>
								<td>Address</td>
								<td>:</td>
								<td><?php echo $address ?></td>
							</tr>
							<tr>
								<td>Contact Number</td>
								<td>:</td>
								<td><?php echo $contact ?></td>
							</tr>
							<tr>
								<td>Gender</td>
								<td>:</td>
								<td><?php echo $gender ?></td>
							</tr>
							<tr>
								<td>Grade Level</td>
								<td>:</td>
								<td><?php echo $grade ?></td>
							</tr>
							<tr>
								<td>Section</td>
								<td>:</td>
								<td><?php echo $section ?></td>
							</tr>
							<tr>
								<td>Birthdate</td>
								<td>:</td>
								<td><?php echo $bday ?></td>
							</tr>
							<tr>
								<td>BIrth Place</td>
								<td>:</td>
								<td><?php echo $bplace ?></td>
							</tr>
							<tr>
								<td>Mother</td>
								<td>:</td>
								<td><?php echo $mother ?></td>
							</tr>
							<tr>
								<td>Father</td>
								<td>:</td>
								<td><?php echo $father ?></td>
							</tr>
							<tr>
								<td>Enrollment Status</td>
								<td>:</td>
								<td><?php echo $status ?></td>
							</tr>
							</tbody>
						</table>

						<br><br>
						<h2>My Subjects</h2>
						<table class="table table-striped table-hover">
							<?php foreach ($subject as $row): ?>

								<tbody>
								<tr>
									<td><?php echo $row->subject ?></td>
								</tr>
								</tbody>

							<?php endforeach ?>
						</table>
					</div>
					<div class="col-md-6">

						<h3>Fees Break Down <br>(SY <?php echo $check->sy ?>)</h3>

						<table class="table table-striped table-hover">
							<tbody>
							<?php foreach ($tuition as $row): ?>
								<tr>
									<td><?php echo $row->for ?></td>
									<td><?php echo $row->amount ?></td>
								</tr>
							<?php endforeach ?>
							<?php foreach ($books as $row): ?>
								<tr>
									<td>Books</td>
									<td><?php echo $row->amount ?></td>
								</tr>
							<?php endforeach ?>
							<?php foreach ($fees as $row): ?>
								<tr>
									<td>Tuition for Grade <?php echo $grade ?></td>
									<td><?php echo $row->amount ?></td>
								</tr>
							<?php endforeach ?>

							<tr>
								<td>Voucher Discount</td>
								<td><?php echo $this->db->get_where('vouchers', array('id' => $details->voucherId))->row('amount') ?></td>
							</tr>
							<?php if (isset($total->total_amount)): ?>
								<tr>
									<td>Back Account</td>
									<td><?php echo $total->back_account ?></td>
								</tr>
								<tr>
									<td>Total</td>
									<td><?php echo $total->total_amount ?></td>
								</tr>
							<?php endif ?>

							</tbody>
						</table>
						<?php if (isset($total->total_amount)): ?>
							<h4>Remaining Balance : PHP <?php echo $total->balance ?></h4>
							<!--<h4>Payment/Month: PHP <?php echo $total->months_pay ?></h4>-->
						<?php endif ?>

						<hr>
						<h3>School Requirements</h3>

						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo base_url().'uploads/requirements/'.@$requirements[0]['req1']?>" alt="" class="img-responsive">
							</div>
							<div class="col-md-7">
								<?php echo form_open_multipart('uploadLogo/uploadReq1')?>
								<!--									<form action="--><?php //echo site_url()?><!--/Dashboard/uploadReq1" method="POST" accept-charset="utf-8" >-->
								<input type="hidden" name="studentId" value="<?php echo $_SESSION['id']?>">
								<h5>Requirement 1</h5>
								<input type="file" name="req1" accept="image/*">
								<hr>
								<br>
								<button type="submit" class="btn btn-primary">Upload</button>
								</form>

							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo base_url().'uploads/requirements/'.@$requirements[0]['req2']?>" alt="" class="img-responsive">
							</div>
							<div class="col-md-7">
								<?php echo form_open_multipart('uploadLogo/uploadReq2')?>
								<!--									<form action="--><?php //echo site_url()?><!--/Dashboard/uploadReq1" method="POST" accept-charset="utf-8" >-->
								<input type="hidden" name="studentId" value="<?php echo $_SESSION['id']?>">
								<h5>Requirement 1</h5>
								<input type="file" name="req2" accept="image/*">
								<hr>
								<br>
								<button type="submit" class="btn btn-primary">Upload</button>
								</form>

							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo base_url().'uploads/requirements/'.@$requirements[0]['req3']?>" alt="" class="img-responsive">
							</div>
							<div class="col-md-7">
								<?php echo form_open_multipart('uploadLogo/uploadReq3')?>
								<!--									<form action="--><?php //echo site_url()?><!--/Dashboard/uploadReq1" method="POST" accept-charset="utf-8" >-->
								<h5>Requirement 1</h5>
								<input type="hidden" name="studentId" value="<?php echo $_SESSION['id']?>">
								<input type="file" name="req3" accept="image/*">
								<hr>
								<br>
								<button type="submit" class="btn btn-primary">Upload</button>
								</form>

							</div>
						</div>

						<hr>
						<div class="row">
							<div class="col-md-4">
								<img src="<?php echo base_url().'uploads/requirements/'.@$requirements[0]['req4']?>" alt="" class="img-responsive">
							</div>
							<div class="col-md-7">
								<?php echo form_open_multipart('uploadLogo/uploadReq4')?>
								<!--									<form action="--><?php //echo site_url()?><!--/Dashboard/uploadReq1" method="POST" accept-charset="utf-8" >-->
								<input type="hidden" name="studentId" value="<?php echo $_SESSION['id']?>">
								<h5>Requirement 1</h5>
								<input type="file" name="req4" accept="image/*">
								<hr>
								<br>
								<button type="submit" class="btn btn-primary">Upload</button>
								</form>

							</div>
						</div>


					</div>


				</div>
				<div id="menu2" class="tab-pane fade">
					<br><br>
					<table class="table table-striped table-hover">
						<thead>
						<tr>
							<th>SY</th>
							<th>Grade</th>
							<th>Section</th>
							<th>Total Tuition</th>
							<th>Balance</th>
							<th>View</th>
						</tr>
						</thead>
						<tbody>
						<?php foreach ($myrecord as $record): ?>
							<tr>
								<td><?php echo $record->sy ?></td>
								<td><?php echo $record->grade ?></td>
								<td><?php echo $record->section ?></td>
								<td><?php echo $record->total_amount ?></td>
								<td><?php echo $record->balance ?></td>
								<td><a href="<?php echo site_url() ?>/frontpage/myPayments/<?php echo $record->sy ?>"
								       class="btn btn-primary">Payments</a></td>
							</tr>
						<?php endforeach ?>

						</tbody>
					</table>
				</div>
				<div id="menu4" class="tab-pane fade">
					<br>
					<h5>First Semester</h5>
					<table class="table small table-bordered table-responsive grading">
						<thead>
						<tr>
							<td rowspan="2">Subjects</td>
							<td colspan="2">1st Semester</td>
							<td rowspan="2">Final Grade</td>
							<td rowspan="2">Remarks</td>
						</tr>
						<tr>
							<td>1st Quarter</td>
							<td>2nd Quarter</td>
						</tr>
						</thead>
						<tbody>
						<?php

						$activeSy = $this->db->get_where('enrollment', array('status' => 1, 'end' => 1))->row('sy');
						$studentId = $this->db->get_where('student_info', array('user_id' => $_SESSION['id']))->row('id');
						?>
						<?php foreach ($subject as $sub): ?>

							<?php
							$semester = $this->db->get_where('subject', array('id' => $sub->id))->row('semester');
							$total = 0; ?>
							<?php if ($semester == 1): ?>
								<tr>
									<td><?php echo $sub->subject ?></td>
									<td>
										<?php
										$g = $this->db->get_where('grades', array(
											'syId' => $activeSy,
											'studentId' => $studentId,
											'subjectId' => $sub->id,
										))->result_array();

										$q1 = @$g[0]['quarter'] == 1 ? $g[0]['qg'] : 65;
										echo $q1;
										?>
									</td>
									<td>
										<?php
										$q2 = @$g[0]['quarter'] == 2 ? $g[0]['qg'] : 65;
										echo $q2;
										?>
									</td>

									<td>
										<?php
										$total = ($q1 + $q2) / 2;
										echo $total;
										?>
									</td>
									<td>
										<?php echo $total > 74 ? 'Passed' : 'Failed'; ?>
									</td>
								</tr>
							<?php endif ?>
						<?php endforeach ?>
						</tbody>
					</table>
					<hr>
					<h5>Second Semester</h5>
					<table class="table small table-bordered table-responsive grading">
						<thead>
						<tr>
							<td rowspan="2">Subjects</td>
							<td colspan="2">1st Semester</td>
							<td rowspan="2">Final Grade</td>
							<td rowspan="2">Remarks</td>
						</tr>
						<tr>
							<td>1st Quarter</td>
							<td>2nd Quarter</td>
						</tr>
						</thead>
						<tbody>
						<?php

						$activeSy = $this->db->get_where('enrollment', array('status' => 1, 'end' => 1))->row('sy');
						$studentId = $this->db->get_where('student_info', array('user_id' => $_SESSION['id']))->row('id');
						?>
						<?php foreach ($subject as $sub): ?>

							<?php
							$semester = $this->db->get_where('subject', array('id' => $sub->id))->row('semester');
							$total = 0; ?>
							<?php if ($semester == 2): ?>
								<tr>
									<td><?php echo $sub->subject ?></td>
									<td>
										<?php
										$g = $this->db->get_where('grades', array(
											'syId' => $activeSy,
											'studentId' => $studentId,
											'subjectId' => $sub->id,
										))->result_array();

										$q3 = @$g[0]['quarter'] == 3 ? $g[0]['qg'] : 65;
										echo $q3;
										?>
									</td>
									<td>
										<?php
										$q4 = @$g[0]['quarter'] == 4 ? $g[0]['qg'] : 65;
										echo $q4;
										?>
									</td>

									<td>
										<?php
										$total2 = ($q3 + $q4) / 2;
										echo $total2;
										?>
									</td>
									<td>
										<?php echo $total2 > 74 ? 'Passed' : 'Failed'; ?>
									</td>
								</tr>
							<?php endif ?>
						<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div id="menu3" class="tab-pane fade">
					<div class="col-md-6 col-md-offset-3">
						<br><br>
						<h4>Change Password</h4>

						<form action="<?php echo site_url(); ?>/FrontPage/changePassword" method="POST" role="form"
						      data-toggle="validator">
							<div class="form-group has-feedback">
								<label>Old Password</label>
								<input type="password" class="form-control" name="password" placeholder="Old Password"
								       required>
								<span class="form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<label>New Password</label>
								<input type="password" class="form-control" data-minlength="6" name="newpwd"
								       id="inputPassword" placeholder="New Password" required>
								<div class="help-block with-errors"></div>
							</div>
							<div class="form-group has-feedback">
								<label>Confirm New Password</label>
								<input type="password" class="form-control" name="newpwd2" id="inputPasswordConfirm"
								       data-match="#inputPassword" data-match-error="Password don't match"
								       placeholder="Confirm Password" required>
								<div class="help-block with-errors"></div>
							</div>
							<div class="col-xs-12">
								<button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
							</div><!-- /.col -->
						</form>

						<br><br>
						<!--<?php if ($status == 'not-enrolled' && $check->status == 1): ?>
						<br>
						<h3 class="text-center"> Click the button "Reserve" if you want to reserve your for Enrollment</h3>
						<center><a href="<?php echo site_url() ?>/frontPage/reservation/<?php echo $id ?>" class="btn btn-primary btn-lg">Reserve</a></center>
						
					<?php endif ?> -->
					</div>
				</div>
				<div id="menu4" class="tab-pane fade">
					<div class="col-md-6 col-md-offset-3">

						<!--<br><br>
					<?php if ($status == 'not-enrolled' && $check->status == 1): ?>
						<br>
						<h3 class="text-center"> Click the button "Reserve" if you want to reserve your for Enrollment</h3>
						<center><a href="<?php echo site_url() ?>/frontPage/reservation/<?php echo $id ?>" class="btn btn-primary btn-lg">Reserve</a></center>
						
					<?php endif ?> -->
					</div>
				</div>
			</div>


		</div>
	</div>
</div>