<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">
					<i class="fa fa fa-bars"></i> <?php echo $this->db->get_where('summer', array('id' => $id))->row('name') ?>
				</h3>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading"></header>
					<div class="panel-body">
						<div class="col-md-3">
							<?php if (count($studentInfo) > 0): ?>
								<h5>Student Information</h5>
								<table class="table">
									<tbody>
									<tr>
										<td>Name</td>
										<td><?php
											$user = $this->db->get_where('userinfo', array('userID' => $studentInfo[0]['user_id']))->result_array();
											echo $user[0]['lastName'] . ' ' . $user[0]['firstName'];
											?></td>
									</tr>
									<tr>
										<td>Tracks</td>
										<td><?php echo $this->db->get_where('tracks', array('id' => $studentInfo[0]['track']))->row('track_name') ?></td>
									</tr>
<!--									<tr>-->
<!--										<td>Section</td>-->
<!--										<td></td>-->
<!--									</tr>-->
									<tr>
										<td>Grade</td>
										<td><?php echo $studentInfo[0]['grade'] ?></td>
									</tr>
									</tbody>
								</table>
								<a href="<?php echo base_url() ?>index.php/Dashboard/viewSummer/<?php echo $id ?>"
								   class="btn btn-primary">Search Again</a>
								<button class="btn btn-primary enrollStudent <?php if (COUNT($this->db->get_where('summer_enrollee', array('summerId' => $id, 'studentId' => $studentInfo[0]['id']))->result_array()) > 0) echo 'disabled' ?>"
								        data-id="<?php echo $studentInfo[0]['id'] ?>">Add Student
								</button>
							<?php else: ?>
								<h5>Add Student</h5>
								<form action="<?php echo base_url() ?>index.php/Dashboard/viewSummer/<?php echo $id ?>"
								      method="POST">
									<div class="field">
										<label for="">Student ID</label>
										<input type="text" name="studentId" class="form-control">
									</div>
									<br>
									<button class="btn btn-primary">Search</button>
								</form>
							<?php endif ?>
							<hr>

						</div>
						<div class="col-md-9">

							<h5>First Semester</h5>
							<table class="table">
								<thead>
								<tr>
									<th>Subject</th>
									<th>1st</th>
									<th>2nd</th>
									<th>Final</th>
									<th>Remarks</th>
								</tr>
								</thead>
								<?php if (COUNT($subjects) > 0): ?>
									<tbody>
									<?php foreach ($subjects as $sub): ?>
										<?php if ($sub['semester'] == '1'): ?>
											<tr>
												<td><?php echo $sub['subject'] ?></td>
												<td><?php
													$q1 = $this->db->get_where('grades', array('subjectId' => $sub['id'], 'studentId' => $studentInfo[0]['id'], 'quarter' => 1))->row('qg');
													$q2 = $this->db->get_where('grades', array('subjectId' => $sub['id'], 'studentId' => $studentInfo[0]['id'], 'quarter' => 2))->row('qg');

													$q2 = $q1 > 0 ? 65 : $q1;
													$q2 = $q2 > 0 ? 65 : $q2;

													$initGrid = ($q1  + $q2) / 2;
													echo $q1 ;
													?></td>
												<td><?php echo $q2; ?></td>
												<td><?php echo $initGrid ?></td>
												<td><?php echo $initGrid > 73 ? 'Passed' : 'Failed'; ?></td>
											</tr>
										<?php endif ?>
									<?php endforeach ?>
									</tbody>
								<?php endif ?>
							</table>

							<h5>Second Semester</h5>
							<table class="table">
								<thead>
								<tr>
									<th>Subject</th>
									<th>1st</th>
									<th>2nd</th>
									<th>Final</th>
									<th>Remarks</th>
								</tr>
								</thead>
								<?php if (COUNT($subjects) > 0): ?>
									<tbody>
									<?php foreach ($subjects as $sub): ?>
										<?php if ($sub['semester'] == '2'): ?>
											<tr>
												<td><?php echo $sub['subject'] ?></td>
												<td><?php
													$q3 = $this->db->get_where('grades', array('subjectId' => $sub['id'], 'studentId' => $studentInfo[0]['id'], 'quarter' => 3))->row('qg');
													$q4 = $this->db->get_where('grades', array('subjectId' => $sub['id'], 'studentId' => $studentInfo[0]['id'], 'quarter' => 4))->row('qg');


													$q3 = $q3 > 0 ? 65 : $q3;
													$q4 = $q4 > 0 ? 65 : $q4;

													$initGrid2 = ($q3 + $q4) / 2;
													echo $q3;
													?></td>
												<td><?php echo $q4 ; ?></td>
												<td><?php echo $initGrid2 ?></td>
												<td><?php echo $initGrid2 > 73 ? 'Passed' : 'Failed'; ?></td>
											</tr>
										<?php endif ?>
									<?php endforeach ?>
									</tbody>
								<?php endif ?>
							</table>
						</div>
						<div class="col-md-12">
							<hr>
							<h5>List of Enrolled Student</h5>
							<table class="table" id="enrollTable">
								<thead>
								<tr>
									<th width="100">Student ID</th>
									<th>Name</th>
									<th>Status</th>
									<th width="200">Action</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($summerEnrollee as $sum): ?>
									<tr>
										<td><?php


											$this->db->where('id', $sum['studentId']);
											$studentInfo = $this->db->get('student_info')->result_array()[0];

											echo $studentInfo['user_id'];
											?></td>
										<td><?php

											$this->db->where('userID', $studentInfo['user_id']);
											$student = $this->db->get('userinfo')->result_array()[0];
											echo $student['firstName'] . ' ' . $student['lastName'];
											?></td>
										<td>
											<?php echo $sum['status'] == 0 ? 'Not Paid' : 'Paid'?>
										</td>
										<td>
											<a class="btn btn-primary"
											   href="<?php echo base_url() ?>index.php/Dashboard/ViewFailedSubject/<?php echo $studentInfo['id'] ?>">View
												Subjects
											</a>
											<button class="btn btn-danger removeSUmmerEnrollee"
											        data-id="<?php echo $studentInfo['id'] ?>">Delete
											</button>
										</td>
									</tr>
								<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<script>
	$(document).ready(function () {
		$('.enrollStudent').click(function () {
			var self = this;
			var summerId = <?php echo $id?>;
			if (confirm('Are you Sure?')) {
				$.ajax({
					url: '<?php echo base_url()?>' + 'index.php/Dashboard/summerEnroll',
					type: 'POST',
					data: {
						id: $(self).attr('data-id'),
						summerId: summerId,
					}
				}).done(function (response) {
					window.location.reload();
				});
			}
		});

		$('.removeSUmmerEnrollee').click(function () {
			var self = this;
			var summerId = <?php echo $id?>;
			// alert(summerId);
			if (confirm('Are you Sure?')) {
				$.ajax({
					url: '<?php echo base_url()?>' + 'index.php/Dashboard/removeSummerEnroll',
					type: 'POST',
					data: {
						id: $(self).attr('data-id'),
						summerId: summerId,
					}
				}).done(function (response) {
					window.location.reload();
				});
			}
		});

		$('#enrollTable').DataTable();

	});
</script>