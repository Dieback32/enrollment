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
$section = $details->section

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
							<div class="col-md-4">
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
										<td>Section Level</td>
										<td>:</td>
										<td><?php echo $section ?></td>
									</tr>
									<tr>
										<td>Enrollment Status</td>
										<td>:</td>
										<td><?php echo $status ?></td>
									</tr>
									<tr>
										<td>Voucher</td>
										<td>:</td>
										<td><?php echo $this->db->get_where('vouchers', array('id' => $details->voucherId))->row('label');
											?></td>
									</tr>
									<tr>
										<td>Voucher Discount</td>
										<td>:</td>
										<td><?php echo $this->db->get_where('vouchers', array('id' => $details->voucherId))->row('amount');
											?></td>
									</tr>

									</tbody>
								</table>
							</div>
							<div class="col-md-8">
								<h3>Account Information</h3>
								<table class="table table-striped table-hover">
									<thead>
									<tr>
										<th>SY</th>										
										<th>Description</th>
										<th>Credit</th>
										<th>Debit</th>
										<th>Balance</th>
										<!--										<th>Total Tuition</th>-->
										<!--										<th>Balance</th>-->
										<!--										<th>BA</th>-->
									</tr>
									</thead>
									<tbody>
									<?php
									$voucher = true;
									$totalAmount = 0;
									$voucherDiscount = 0;
									//										echo $details->voucherId;
									?>
									<?php foreach ($accounts as $account): ?>
										<?php if ($details->voucherId > 0 && $voucher): ?>
											<?php $voucher = false; ?>
											<?php $misc_bill = $this->db->get('tuition')->result_array()?>

											<?php foreach($misc_bill as $mb): ?>
											<tr>
												<td><?php echo $account->sy?></td>												
												<td><?php echo $mb['for']?></td>
												<td><?php echo '0.00' ?></td>
												<td><?php echo $mb['amount']?></td>
												<td><?php echo $mb['amount'] ?></td>
													
											</tr>
										
											<?php endforeach?>

											<tr>
												<td><?php echo $account->sy ?></td>
												<td>
													<?php
													$vouch = $this->db->get_where('vouchers', array('id' => $details->voucherId))->result_array();
													$voucherDiscount = $vouch[0]['amount'];
													echo $vouch[0]['label'];
													?>
												</td>
												<td>
													<?php echo $vouch[0]['amount']; ?>
													
													<?php //echo //$account->total_amount ?>
												</td>
												<td>
													0.00
												</td>
												<td>
													<?php echo $account->total_amount - $vouch[0]['amount'];
													 $totalAmount = $account->total_amount - $vouch[0]['amount'];?>
												</td>
											</tr>
										<?php endif ?>


									<?php endforeach ?>

									<?php
									$payments = $this->db->get_where('payment_report', array('user_id' => $id))->result();

									function stringToFloat($integer)
									{
										return number_format((float)$integer, 2, '.', '');
									}


									$amount = 0;
									?>
									<?php foreach ($payments as $p): ?>
										<?php
										$amount += $p->amount;
										?>
										<tr>
											<td><?php echo $p->sy ?></td>
											<td><?php echo $p->description ?></td>
											<td><?php echo $p->amount ?></td>
											<td><?php echo round(stringToFloat(0.4418723091283)) ?></td>
											<td><?php echo $totalAmount - $amount ?></td>

										</tr>

									<?php endforeach ?>
									</tbody>
								</table>
								<?php
								$this->db->select('SUM(amount) as tuition');
								$q = $this->db->get('tuition');
								$row = $q->row();
								$tuition = $row->tuition;
								// echo $details
								$discount = $this->db->get_where('vouchers', array('id' => $details->voucherId))->row('amount');

								$tuition = $tuition - $discount;

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
								$bal = $this->db->get('student_account');
								$account = $bal->row();

								$syc = 1;
								$this->db->where('sy', $check->sy);
								$this->db->where('user_id', $id);
								$checksy = $this->db->get('student_account');
								if ($checksy->num_rows() > 0) {
									$syc = 0;
								}
								$latest = $checksy->row();

								?>
								<?php if (isset($latest->balance)): ?>
									<?php $back = $latest->balance - $total; ?>
									<h4>Back Account : <?php echo $latest->balance - $voucherDiscount ?></h4>
								<?php endif ?>

								<?php if (!isset($account->id) || $syc == 1): ?>

									<form action="<?php echo site_url(); ?>/DashBoard/setTuition" method="POST"
									      role="form" data-toggle="validator">
										<div class="form-group has-feedback">
											<input type="hidden" name="user_id" value="<?php echo $id; ?>">
											<input type="hidden" name="grade" value="<?php echo $gradelvl; ?>">
											<input type="hidden" name="section" value="<?php echo $section; ?>">
											<input type="hidden" name="total" value="<?php echo $total; ?>">
											<input type="hidden" name="sy" value="<?php echo $check->sy; ?>">
											<input value="0>" name="back_account" type="hidden">
											<input value="<?php echo ($total) / (8) ?>" name="months_pay" type="hidden">
										</div>
										<?php if (!isset($check_zero) || $check_zero == 0): ?>

											<div class="col-xs-12">
												<button type="submit"
												        class="btn btn-primary btn-block btn-flat" <?php if ($total == 0) {
													echo 'disabled';
												} ?> >Check Account
												</button>
											</div><!-- /.col -->
										<?php endif ?>


									</form>
								<?php endif; ?>
								<?php if ($details->back_account > 0 && isset($latest->balance)): ?>

									<form action="<?php echo site_url(); ?>/DashBoard/addBackAccount" method="POST"
									      role="form" data-toggle="validator">
										<input value="<?php echo $details->back_account + $latest->balance; ?>"
										       name="balance" type="hidden">
										<input value="<?php echo $details->back_account ?>" name="back_account"
										       type="hidden">
										<input value="<?php echo ($details->back_account + $latest->balance) / (8) ?>"
										       name="months_pay" type="hidden">
										<input value="<?php echo $latest->id; ?>" name="id" type="hidden">
										<input value="<?php echo $account->user_id; ?>" name="user_id" type="hidden">
										<div class="col-xs-12 ">
											<button type="submit" class="btn btn-primary btn-block btn-flat">Add Back
												Account (<?php echo $details->back_account ?>)
											</button>
										</div>
									</form>
								<?php endif; ?>

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