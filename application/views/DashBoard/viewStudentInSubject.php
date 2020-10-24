<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-md-4">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> List of Student</h3>
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
								<th width="100">ID</th>
								<th>Student Name</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$failedStudent = array();
							$grades = $this->db->get_where('grades', array('subjectId' => $subjectId))->result_array();
							$semester = $this->db->get_where('subject', array('id' => $subjectId))->row('semester');
							foreach ($grades as $grade) {
								if ($semester == 1) {
									$q1 = $grade['quarter'] == 1 ? $grade['qg'] : 65;
									$q2 = $grade['quarter'] == 2 ? $grade['qg'] : 65;
									$total = ($q1 + $q2) / 2;
									if ($total < 75) {
										array_push($failedStudent, $grade['studentId']);
									}
								} elseif ($semester == 2) {
									$q3 = $grade['quarter'] == 3 ? $grade['qg'] : 65;
									$q4 = $grade['quarter'] == 4 ? $grade['qg'] : 65;
									$total = ($q3 + $q4) / 2;
									if ($total < 75) {
										array_push($failedStudent, $grade['studentId']);
									}
								}
							}
							?>

							<?php foreach ($failedStudent as $fs): ?>
								<tr>
									<td>
										<?php
										$stdnt_id = $this->db->get_where('student_info', array('id' => $fs))->result_array();
										echo @$stdnt_id[0]['user_id'];
										?>
									</td>
									<td style="text-transform:capitalize">
										<?php
										$stdnt = $this->db->get_where('userinfo', array('userID' => @$stdnt_id[0]['user_id']))->result_array();
										echo @$stdnt[0]['lastName'].', '.@$stdnt[0]['firstName'].' '.@$stdnt[0]['Mi'];
										?>
									</td>
								</tr>
							<?php endforeach; ?>
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