<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-md-4">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Failed Student</h3>
				</div>
				<div class="col-md-4">

				</div>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">


					</header>
					<div class="panel-body">
						<table class="table">
							<thead>
							<tr>
								<th>ID</th>
								<th>Student</th>
								<th width="200">Enroll Summer</th>
								<th width="100">Action</th>
							</tr>
							</thead>
							<?php
								$syId = $this->db->get_where('enrollment', array('status' => 1))->row('sy');


								$students = $this->db->get('student_info')->result_array();
								$failedStudent = array();
								foreach($students as $student){
									$grades = $this->db->get_where('grades',array(
										'syId' => $syId,
										'studentId' => $student['id']

									))->result_array();

									foreach($grades as $grade){
										$semester = $this->db->get_where('subject', array('id' => $grade['subjectId']))->row('semester');

										if($semester == 1){
											$q1 = $grade['quarter'] == 1? $grade['qg']: 65;
											$q2 = $grade['quarter'] == 2? $grade['qg']: 65;
											$total = ($q1 + $q2 ) / 2;
											if( $total < 75){
												array_push($failedStudent, $student['user_id']);
												break;
											}
										}elseif($semester == 2){
											$q3 = $grade['quarter'] == 3? $grade['qg']: 65;
											$q4 = $grade['quarter'] == 4? $grade['qg']: 65;
											if( $total < 75){
												array_push($failedStudent, $student['user_id']);
												break;
											}
										}

									}
								}
							?>
							<tbody>
							<?php foreach($failedStudent as $fs):?>
								<tr>
									<td><?php echo $fs?></td>
									<td style="text-transform: capitalize"><?php

										$studentInfo = $this->db->get_where('userinfo', array('userID' => $fs))->result_array();
										echo $studentInfo[0]['lastName'].', '.$studentInfo[0]['lastName'].' '.$studentInfo[0]['Mi'];
										?></td>
									<td>
										<?php
										$studentId = $this->db->get_where('student_info', array('user_id' => $fs))->row('id');
										$isSummer = $this->db->get_where('summer_enrollee', array('id' => $studentId))->result_array();
										echo count($isSummer) > 0 ? 'Yes' : 'No';
										?>
									</td>
									<td>
										<a data-toggle="modal" href='#modalGrade-<?php echo $fs ?>'
										   class="btn btn-primary">View Grade</a>
										<div class="modal fade" id="modalGrade-<?php echo $fs ?>">
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
														   href="<?php echo site_url() ?>/Dashboard/gradeView/<?php echo $fs . "?sy=" . $syId . '&sem=1' ?>">First
															Semester</a>
														<a class="btn btn-primary" target="_blank"
														   href="<?php echo site_url() ?>/Dashboard/gradeView/<?php echo $fs . "?sy=" . $syId . '&sem=2' ?>">Second
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
									</td>
								</tr>
							<?php endforeach ?>
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