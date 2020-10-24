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
						Grade Level <?php echo $grade?>
					</header>
					<div class="panel-body">
						<table class="table">
							<thead>
							<tr>
								<th>Section Name  </th>
								<th width="100">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach (@$sections as $s): ?>
								<tr>
									<td><?php echo $s['section']?></td>
									<td><a href="<?php echo site_url()?>/Dashboard/viewStudentReportBySection/<?php echo $s['section']?>">View</a></td>
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

