<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">
					<i class="fa fa fa-bars"></i> Dashboard

				</h3>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading"></header>
					<div class="panel-body">
						<p>Welcome <?php echo $this->session->userdata('role') ?></p>
						<?php if ($this->session->userdata('role') == 'registrar'): ?>
							<div class="row">
								<div class="col-md-4">
									<?php if (!isset($check->status) || $check->status == 0): ?>
										<?php if (isset($check->end) && $check->end == 1): ?>
											<h4 class="text-center">End of School Year? Just Click Yes</h4>
											<center>
												<a href="<?php echo site_url() ?>/dashboard/endSY"
												   class="btn btn-danger" onClick="return openEnrollment();">Yes</a>
											</center>
										<?php else: ?>
											<form action="<?php echo site_url(); ?>/DashBoard/openEnrollment"
											      method="POST" role="form" data-toggle="validator">
												<div class="form-group has-feedback">
													<?php
													$years = date('Y');
													$years2 = $years + 1;
													?>
													<label>School Year</label>
													<br>
													<h4>Input the correct format of your school year</h4>
													<input type="text" id="sy-input" value="" class="form-control"
													       name="sy" placeholder="School Year" required>
													<div class="help-block with-errors"></div>
												</div>
												<div class="col-xs-12">
													<div class="btn btn-primary btn-block btn-flat btn-openEnrollment">
														Open Enrollment
													</div>
												</div>
												<!-- /.col -->
											</form>
										<?php endif ?>
									<?php endif ?>
								</div>
								<div class="col-md-8">
									<?php if (isset($check->status)): ?>
										<?php if ($check->status == 1): ?>
											<h1>Enrollment is Now Open. <a
														href="<?php echo site_url() ?>/DashBoard/closeEnrollment"
														title="" onClick="return doconfirm();">Close it</a>
											</h1>
										<?php else: ?>
										<?php endif ?>
									<?php endif ?>
								</div>
								<div class="col-md-12">
									<br>
									<br>
								</div>
							</div>
						<?php endif ?>


						<?php if ($this->session->userdata('role') == 'registrar'): ?>
							<div class="col-md-12">
								<form action="<?php echo site_url(); ?>/DashBoard/studReport" method="POST" role="form"
								      data-toggle="validator">
									<div class="form-group">
										<div class="col-md-4">
											<select name="year" class="form-control">
												<?php
												$sy = $this->db->get('sy');
												$years = $sy->result();

												?>
												<?php foreach ($years as $year): ?>
													<option value="<?php echo $year->sy ?>">
														<?php echo $year->sy ?>
													</option>
												<?php endforeach ?>
											</select>
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-md-4">
										<select name="grade" class="form-control" required id="grade">
											<option value="">Grade Level</option>
											<?php foreach ($getGrade as $level): ?>
												<option value="
												
												<?php echo $level->grade; ?>">
													<?php echo $level->grade; ?>
												</option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="col-md-4">
										<button type="submit" id="penalty" class="btn btn-primary btn-block btn-flat">
											View Student Record per SY
										</button>
									</div>
									<!-- /.col -->
								</form>
							</div>
						<?php endif ?>
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="customModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Semesters</h4>
			</div>
			<form>
				<div class="modal-body">
					<label>Number of Semester</label>
					<input type="number" name="semester" min="1" max="2" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary btn-save-sy">Save changes</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

