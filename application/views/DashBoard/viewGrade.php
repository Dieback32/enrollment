<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<div class="col-md-4">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Student Grade</h3>
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
						SY: <?php echo $this->db->get_where('sy', array('id' => $this->input->get('sy')))->row('sy'); ?>
					</header>
					<div class="panel-body">
						<p>Student Report Card</p>
						<hr>
						<p>First Semester</p>
						<table class="table">
							<thead>
							<tr>
								<th>Subject</th>
								<th  width="100">1st Quarter</th>
								<th  width="100">2nd Quarter</th>
								<th width="100">Final Grade</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$grade = $this->db->get_where('grades', array(
								'syId' => $this->input->get('sy'),
								'studentId' => $this->db->get_where('student_info', array('user_id' => $this->input->get('id')))->row('id')
							))->result_array();
							?>
							<?php foreach ($grade as $g): ?>
								<?php if($g['quarter'] <= 2 && @$foo != $g['subjectId']):?>
									<?php $foo = $g['subjectId'];?>
									<tr>
										<td><?php echo $this->db->get_where('subject', array('id' =>  $g['subjectId']))->row('subject')?></td>
										<td>
											<?php
												$quarter = $this->db->get_where('grades', array(
													'syId' =>  $this->input->get('sy'),
													'studentId' => $this->db->get_where('student_info', array('user_id' => $this->input->get('id')))->row('id'),
													'subjectId' => $g['subjectId'],
													'quarter' => 1
												))->row('qg');

											$qg1 = @$quarter ? $quarter : 65;
											echo $qg1;

											?>
										</td>
										<td>
											<?php
											$quarter2 = $this->db->get_where('grades', array(
												'syId' =>  $this->input->get('sy'),
												'studentId' => $this->db->get_where('student_info', array('user_id' => $this->input->get('id')))->row('id'),
												'subjectId' => $g['subjectId'],
												'quarter' => 2
											))->row('qg');

											$qg2 = @$quarter2 ? $quarter2: 65;
											echo $qg2;

											?>

										</td>
										<td>
											<?php
											echo ($qg1+ $qg2) / 2;
											?>
										</td>
									</tr>
								<?php endif?>
							<?php endforeach ?>
							</tbody>
						</table>
						<p>Second Semester</p>
						<table class="table">
							<thead>
							<tr>
								<th>Subject</th>
								<th width="100">3rd Quarter</th>
								<th width="100">4th Quarter</th>
								<th width="100">Final Grade</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($grade as $g): ?>
								<?php if($g['quarter'] > 2 && @$foo1 != $g['subjectId']):?>
									<?php $foo1 = $g['subjectId'];?>
									<tr>
										<td><?php echo $this->db->get_where('subject', array('id' =>  $g['subjectId']))->row('subject')?></td>
										<td>
											<?php
											$quarte3 = $this->db->get_where('grades', array(
												'syId' =>  $this->input->get('sy'),
												'studentId' => $this->db->get_where('student_info', array('user_id' => $this->input->get('id')))->row('id'),
												'subjectId' => $g['subjectId'],
												'quarter' => 3
											))->row('qg');

											$qg3 = @$quarte3 ? $quarter3 : 65;
											echo $qg1;

											?>
										</td>
										<td>
											<?php
											$quarter4 = $this->db->get_where('grades', array(
												'syId' =>  $this->input->get('sy'),
												'studentId' => $this->db->get_where('student_info', array('user_id' => $this->input->get('id')))->row('id'),
												'subjectId' => $g['subjectId'],
												'quarter' => 4
											))->row('qg');

											$qg4 = @$quarter4 ? $quarter4: 65;
											echo $qg4;

											?>

										</td>
										<td>
											<?php
											echo ($qg3 + $qg4) / 2;
											?>
										</td>
									</tr>
								<?php endif?>
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