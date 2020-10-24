<?php
$email = $account->email;
$id = $account->id;
$lname = $info->lastName;
$fname = $info->firstName;
$mi = $info->Mi;
$address = $info->address;
$contact = $info->contactNumber;
$gradelvl = $details->grade;
$bday = $details->birthdate;
$bplace = $details->place_birth;
$gender = $details->gender;
$mother = $details->mother;
$m_occu = $details->m_occupation;
$father = $details->father;
$f_occu = $details->f_occupation;
$status = $details->status;
$section = $details->section;
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa fa-bars"></i> Student Accounts</h3>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">

					</header>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-6">
								<h3>Student Information</h3>
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
										<td><?php echo $gradelvl ?></td>
									</tr>
									<tr>
										<td>Section</td>
										<td>:</td>
										<td><?php echo $section ?></td>
									</tr>
									<tr>
										<td>Enrollment Status</td>
										<td>:</td>
										<td><?php echo $status ?></td>
									</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-6">
								<h3>Account Information</h3>
								<?php
								$this->db->select('SUM(amount) as tuition');
								$q = $this->db->get('tuition');
								$row = $q->row();
								$tuition = $row->tuition;

								$this->db->select('SUM(amount) as book');
								$this->db->where('grade', $gradelvl);
								$q = $this->db->get('book_fee');
								$row = $q->row();
								$book = $row->book;

								$this->db->select('SUM(amount) as grade');
								$this->db->where('grade', $gradelvl);
								$q = $this->db->get('grade_fee');
								$row = $q->row();
								$grade = $row->grade;


								$total = $tuition + $book + $grade;
								// echo $total;

								$this->db->where('user_id', $id);
								$this->db->where('balance !=', 0);
								$bal = $this->db->get('student_account');
								$account = $bal->row();

								?>

								<br>

								<?php if (!isset($account->total_amount)): ?>

								<?php elseif ($account->balance == 0): ?>
									<p>SY : <?php echo $account->sy ?></p>

								<?php else: ?>
									<table class="table table-striped table-hover">
										<tbody>
										<tr>
											<td>Total Tuition</td>
											<td>:</td>
											<td><?php echo $account->total_amount ?></td>
										</tr>
										<tr>
											<td>Remaining Balance</td>
											<td>:</td>
											<td><?php echo $account->balance ?></td>
										</tr>
										<tr>
											<td>Expected Payment Per Month</td>
											<td>:</td>
											<td>
												<?php
													$downPayment = $this->db->get_where('payment_report', array(
															'sy' => $account->sy,
															'user_id' => $id
													))->result_array();

													if(count($downPayment) > 0){
														$remaining = $account->total_amount - @$downPayment[0]['amount'];
														echo $remaining / 10;
													}
												?>
											</td>
										</tr>
										</tbody>
									</table>
									<br>
									<?php if ($check->sy == $account->sy && $check->status == 1): ?>
										<form action="<?php echo site_url(); ?>/DashBoard/payTuition" method="POST"
										      id="pay" role="form" data-toggle="validator">
											<div class="form-group has-feedback">
												<input type="hidden" name="sy" value="<?php echo $check->sy; ?>">
												<input type="hidden" name="user_id" value="<?php echo $id; ?>">
												<input type="hidden" name="balance"
												       value="<?php echo $account->balance; ?>">
												<input type="hidden" name="id" value="<?php echo $account->id; ?>">
												<input type="hidden" name="grade" value="<?php echo $gradelvl; ?>">
												<label>Payment</label>
												<input type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01"
												       max="<?php echo $account->balance ?>" class="form-control"
												       name="amount" placeholder="Cash Amount" required min="1"
												        ">
												<div class="help-block with-errors"></div>
											</div>
											<div class="form-group has-feedback">
												<label>Cash Amount</label>
												<input type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01"
												       class="form-control" name="payment" placeholder="Cash Amount"
												       required min="1" >
												<div class="help-block with-errors"></div>
											</div>

											<div class="form-group has-feedback">
												<label>Description</label>
												<input type="text"
												       class="form-control" name="description" placeholder="Payment Description"
												       required min="1" >
												<div class="help-block with-errors"></div>
											</div>


											<div class="col-xs-6">
												<button type="submit" class="btn btn-primary btn-block btn-flat">
													Proceed
												</button>
											</div>


										</form>
									<?php else: ?>
										<form action="<?php echo site_url(); ?>/DashBoard/payBalance" method="POST"
										      id="pay2" role="form" data-toggle="validator">
											<div class="form-group has-feedback">
												<input type="hidden" name="sy" value="<?php echo $check->sy; ?>">
												<input type="hidden" name="user_id" value="<?php echo $id; ?>">
												<input type="hidden" name="balance"
												       value="<?php echo $account->balance; ?>">
												<input type="hidden" name="id" value="<?php echo $account->id; ?>">
												<input type="hidden" name="grade" value="<?php echo $gradelvl; ?>">
												<label>Cash Amount</label>
												<input type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01"
												       max="<?php echo $account->balance ?>" class="form-control"
												       name="amount" placeholder="Cash Amount" required min="1"
												       ">
												<div class="help-block with-errors"></div>
											</div>
											<div class="form-group has-feedback">
												<label>Cash Amount</label>
												<input type="number" pattern="[0-9]+([\.,][0-9]+)?" step="0.01"
												       class="form-control" name="payment" placeholder="Cash Amount"
												       required min="1" onkeypress="return isNumberKey(event)">
												<div class="help-block with-errors"></div>
											</div>

											<div class="col-xs-12">
												<button type="submit" class="btn btn-primary btn-block btn-flat">
													PayBalance
												</button>
											</div><!-- /.col -->


										</form>
									<?php endif ?>

								<?php endif ?>

								<br>

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