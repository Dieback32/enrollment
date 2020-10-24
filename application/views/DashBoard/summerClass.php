<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-md-4">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Summer Class</h3>
				</div>
				<div class="col-md-4">
					<?php
					$syId = $this->db->get_where('enrollment', array('status' => 1))->row('sy');
					$summer = $this->db->get_where('summer', array('sy' => $syId))->result_array();
					?>
				</div>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
						Active Summer: <?php echo @$summer[0]['name'];?>
					</header>
					<div class="panel-body">
						<?php
							$subjects = $this->db->get_where('subject', array('instructorId' => $_SESSION['id']))->result_array();
						?>

						<table class="table">
							<thead>
							<tr>
								<th>Subject Name</th>
								<th width="100"># of Student</th>
								<th width="100">Action</th>
							</tr>
							</thead>
							<?php foreach($subjects as $subj):?>
							<tbody>
							<tr>
								<td><?php echo $subj['subject']?></td>
								<td>
									<?php
									$failed = 0;
									$semester = $this->db->get_where('subject', array('id' => $subj['id']))->row('semester');
									$grades = $this->db->get_where('grades',array(
										'syId' => $syId,
										'subjectId' => $subj['id']
									))->result_array();
									foreach($grades as $grade) {
										if ($semester == 1) {
											$q1 = $grade['quarter'] == 1 ? $grade['qg'] : 65;
											$q2 = $grade['quarter'] == 2 ? $grade['qg'] : 65;
											$total = ($q1 + $q2) / 2;
											if ($total < 75) {
												$failed++;
											}
										} elseif ($semester == 2) {
											$q3 = $grade['quarter'] == 3 ? $grade['qg'] : 65;
											$q4 = $grade['quarter'] == 4 ? $grade['qg'] : 65;
											$total = ($q3 + $q4) / 2;
											if ($total < 75) {
												$failed++;
											}
										}
									}
									echo $failed;
									?>
								</td>
								<td>
									<a href="<?php echo site_url()?>/Dashboard/viewStudentInSubject/<?php echo $subj['id']?>">View</a>
								</td>
							</tr>
							</tbody>
							<?php endforeach?>
						</table>
					</div>

				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->