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
						Student List
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
								<th>Back Account</th>
								<th>SY</th>
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
									<td><?php echo $s['back_account']?></td>
									<td><?php echo $s['sy']?></td>
								</tr>

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

