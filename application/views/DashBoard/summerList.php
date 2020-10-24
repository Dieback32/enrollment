<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">
					<i class="fa fa fa-bars"></i>
					Summer Enrollee
				</h3>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading"></header>
					<div class="panel-body">
						<form action="<?php echo base_url() ?>index.php/Dashboard/summerSearch" method="POST">
							<div class="col-md-4">
								<div class="form-group">
									<label for="inputEmail3" class="control-label">STUDENT ID</label>
									<input value="<?php echo set_value('lname') ?>" type="text"
									       name="studentId" class="form-control" id="" placeholder="Lastname" required>

								</div>
								<button class="btn btn-primary">Search</button>
							</div>
						</form>
						<div class="col-md-8">
							<?php if (@$student): ?>
							<h4 style="text-transform: capitalize">Student
								Name: <?php echo $student['lastName'] . ', ' . $student['firstName'] . ' ' . $student['Mi'] ?></h4>
							<hr>
							<h5>First Sem</h5>
							<table class="table">
								<thead>
								<tr>
									<th>Subject</th>
									<th width="200">Type</th>
									<th width="200">Q1</th>
									<th width="200">Q2</th>
									<th width="200">Final Grade</th>
									<th width="100">Amount</th>
								</tr>
								</thead>
								<tbody>
								<?php $total = 0; ?>
								<?php foreach ($subjects as $g): ?>
									<?php if ($g['quarter'] <= 2 && @$foo != $g['subjectId']): ?>
										<?php
										$foo = $g['subjectId'];
										$qg1 = 65;
										$qg2 = 65;
										?>
										<tr>
											<td><?php echo $this->db->get_where('subject', array('id' => $g['subjectId']))->row('subject') ?></td>
											<td><?php
												$type = $this->db->get_where('subject', array('id' => $g['subjectId']))->row('type');
												echo  $type == 0 ? 'General' : 'Laboratory'; ?>
											</td>
											<td>
												<?php

												$semester = $this->db->get_where('subject', array('id' => $g['subjectId']))->row('semester');

												if ($semester == 1) {
													$q1 = $g['quarter'] == 1 ? $g['qg'] : 65;
													$q2 = $g['quarter'] == 2 ? $g['qg'] : 65;
													$ga = ($q1 + $q2) / 2;
													echo $q1;

												}

												?>
											</td>
											<td>
												<?php echo $q2 ?>
											</td>
											<td>
												<?php echo $ga ?>
											</td>
											<td>
												<?php
												if ($ga > 74) {
													echo '0.00';
												}else{
													echo $type == 0 ? '1500.00' : '2000.00';
													$total += $type == 0 ? 1500 : 2000;
												}
												?>
											</td>
										</tr>
									<?php endif ?>
								<?php endforeach ?>
							</table>

							<h5>Second Sem</h5>
							<table class="table">
								<thead>
								<tr>
									<th>Subject</th>
									<th width="200">Type</th>
									<th width="200">Q3</th>
									<th width="200">Q4</th>
									<th width="200">Final Grade</th>
									<th width="100">Amount</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($subjects as $g): ?>
									<?php if ($g['quarter'] > 2 && @$baz != $g['subjectId']): ?>
										<?php
										$baz = $g['subjectId'];
										$qg3 = 65;
										$qg4 = 65;
										?>
										<tr>
											<td><?php echo $this->db->get_where('subject', array('id' => $g['subjectId']))->row('subject') ?></td>
											<td><?php
												$type = $this->db->get_where('subject', array('id' => $g['subjectId']))->row('type');
												echo  $type == 0 ? 'General' : 'Laboratory'; ?>
											</td>
											<td>
												<?php

												$semester = $this->db->get_where('subject', array('id' => $g['subjectId']))->row('semester');

												if ($semester == 2) {
													$q3= $g['quarter'] == 3 ? $g['qg'] : 65;
													$q4 = $g['quarter'] == 4 ? $g['qg'] : 65;
													$ga = ($q3 + $q4) / 2;
													echo $q3;

												}

												?>
											</td>
											<td>
												<?php echo $q4 ?>
											</td>
											<td>
												<?php echo $ga ?>
											</td>
											<td>
												<?php
												if ($ga > 74) {
													echo '0.00';
												}else{
													echo $type == 0 ? '1500.00' : '2000.00';
													$total += $type == 0 ? 1500 : 2000;
												}
												?>
											</td>
										</tr>
									<?php endif ?>
								<?php endforeach ?>
							</table>
							<hr>
							<h2>Total: <?php
								function stringToFloat($integer)
								{
									return number_format((float)$integer, 2, '.', '');
								}

								$paid = $this->db->get_where('summer_enrollee', array(
									'studentId' => $studentInfo[0]['id'],
									'status' => 1,
								))->result_array();


								echo stringToFloat($total)
								?></h2><br>
							<form action="<?php echo base_url() ?>index.php/Dashboard/enrollSummerStudent/<?php echo $studentInfo[0]['id'] ?>"
							      method="POST">
								<button class="btn btn-primary <?php if ($total <= 0) {
									echo 'disabled';
								} elseif (count($paid) > 0) {
									echo 'disabled';
								} ?> ">Enroll Student
								</button>
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