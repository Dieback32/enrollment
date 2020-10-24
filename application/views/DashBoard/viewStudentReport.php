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
						Grade Level
					</header>
					<div class="panel-body">
						<?php
						$grade = $this->db->get('grade_level')->result_array();
						?>
						<table class="table">
							<thead>
							<tr>
								<th>Grade Level</th>
								<th width="100">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach (@$grade as $g): ?>
								<tr>
									<td><?php echo $g['grade']?></td>
									<td><a href="<?php echo site_url()?>/Dashboard/viewStudentReportByGrade/<?php echo $g['grade']?>">View</a></td>
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

