<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa fa-bars"></i>View Student Reports</h3>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Section <?php echo $section?>
					</header>
					<div class="panel-body">
						<table class="table">
							<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Grade Level</th>
								<th>Total Tuition</th>
								<th>Remaining Balance</th>
								<th>Action</th>
							</tr>
							</thead>
							<?php foreach($students as $s):?>
							<tr>
								<td><?php echo $s['user_id']?></td>
								<td style="text-transform: capitalize"><?php
									$name = $this->db->get_where('userinfo', array(
									'userID' => $s['user_id'],
									))->result_array();
									echo $name[0]['lastName'].', '.$name[0]['firstName'].' '.$name[0]['Mi'];
								?></td>
								<td><?php echo $s['grade']?></td>
								<td><?php echo $s['total_amount']?></td>
								<td><?php echo $s['balance']?></td>
								<td>
									<a data-toggle="modal" href='#modalGrade-<?php echo $s['user_id'] ?>'
									   class="btn btn-primary">View Grade</a>
									<a data-toggle="modal" href='#modal-<?php echo $s['user_id'] ?>'
									   class="btn btn-primary">View</a>
								</td>
							</tr>
								<div class="modal fade" id="modalGrade-<?php echo $s['user_id'] ?>">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
												        aria-hidden="true">&times;
												</button>
												<h4 class="modal-title">Select Semester</h4>
											</div>
											<div class="modal-body">

												<a class="btn btn-primary" target="_blank"
												   href="<?php echo site_url() ?>/Dashboard/gradeView/<?php echo $s['user_id'] . "?sy=" . $s['sy'] . '&sem=1' ?>">First
													Semester</a>
												<a class="btn btn-primary" target="_blank"
												   href="<?php echo site_url() ?>/Dashboard/gradeView/<?php echo $s['user_id'] . "?sy=" . $s['sy'] . '&sem=2' ?>">Second
													Semester</a>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">
													Close
												</button>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div>
								<div class="modal fade" id="modal-<?php echo $s['user_id'] ?>">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
												        aria-hidden="true">&times;
												</button>
												<h4 class="modal-title">Student Information</h4>
											</div>
											<div class="modal-body">

												<div class="row">
													<div class="col-md-4">Name :</div>
													<div class="col-md-8" style="text-transform: capitalize"><?php echo $name[0]['lastName'].', '.$name[0]['firstName'].' '.$name[0]['Mi']; ?></div>
													<div class="col-md-4">Contact Number :</div>
													<?php $studentInfo = $this->db->get_where('userinfo', array(
														'userID' => $s['user_id']
													))->result()[0];
													$studentInfo2 = $this->db->get_where('student_info', array(
														'user_id' => $s['user_id']
													))->result()[0];
													?>
													<div class="col-md-8"><?php echo $studentInfo->contactNumber ?> </div>
													<div class="col-md-4">Birth Date :</div>
													<div class="col-md-8"><?php echo $studentInfo2->birthdate ?> </div>
													<div class="col-md-4">Birth Place :</div>
													<div class="col-md-8"><?php echo $studentInfo2->place_birth ?> </div>
													<div class="col-md-4">Mother :</div>
													<div class="col-md-8"><?php echo $studentInfo2->mother ?> </div>
													<div class="col-md-4">Father :</div>
													<div class="col-md-8"><?php echo $studentInfo2->father ?> </div>
												</div>


											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">
													Close
												</button>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->
							<?php endforeach?>
							</tbody>
						</table>
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->

