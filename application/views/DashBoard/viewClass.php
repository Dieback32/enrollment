<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">
					<i class="fa fa fa-bars"></i> Section's Students
				</h3>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading"></header>
					<div class="panel-body">
						<table class="table">
							<thead>
							<tr>
								<th width="100">Student ID</th>
								<th>Name</th>
								<th width="400">Set Quarter Behavior</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$sy = $this->db->get_where('enrollment', array(
								'status' => 1,
								'end' => 1
							))->result_array();
							?>
							<?php foreach ($students as $student): ?>
								<tr>
									<td><?php echo $student['user_id'] ?></td>
									<td><?php
										$user = $this->db->get_where('userinfo', array('userID' => $student['user_id']))->result_array();
										echo $user[0]['firstName'] . ' ' . $user[0]['lastName'];
										?></td>
									<td>
										<button class="btn btn-primary firstSem"
										        data-studentId="<?php echo $student['id'] ?>">1st Semester
										</button>
										<button class="btn btn-primary secondSem"
										        data-studentId="<?php echo $student['id'] ?>">2nd Semester
										</button>
										<a href="<?php echo base_url()?>index.php/Dashboard/setAttendance/<?php echo $student['id'] ?>?sy=<?php echo @$sy[0]['sy']?>" class="btn btn-primary attendance">
											Attendance
										</a>
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
<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title">
					Select Quarter
				</h3>
			</div>
			<div class="modal-body form">
				<a class="btn btn-sm btn-primary sem1" href="#">1st Quarter</a>
				<a class="btn btn-sm btn-primary sem2" href="#">2nd Quarter</a>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save();" class="btn btn-primary">
					Save
				</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					Cancel
				</button>
			</div>
		</div>
		<!-- /.modal-content  -->
	</div>
	<!-- /.modal-dialog  -->
</div>

<div class="modal fade" id="modal_form2" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title">
					Select Quarter
				</h3>
			</div>
			<div class="modal-body form">
				<div class="modal-body form">
					<a class="btn btn-sm btn-primary sem1" href="#">3st Quarter</a>
					<a class="btn btn-sm btn-primary sem2" href="#">4nd Quarter</a>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="btnSave" onclick="save();" class="btn btn-primary">
					Save
				</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					Cancel
				</button>
			</div>
		</div>
		<!-- /.modal-content  -->
	</div>
	<!-- /.modal-dialog  -->
</div>

<script>
	$(document).ready(function () {
		$('.firstSem').click(function () {
			$('#modal_form').modal('show');
			var studentID = $(this).attr('data-studentId');
			$('#modal_form').find('a.sem1').attr("href", "<?php echo base_url() ?>index.php/Dashboard/setBehavior/" + studentID + "?q=1");
			$('#modal_form').find('a.sem2').attr("href", "<?php echo base_url() ?>index.php/Dashboard/setBehavior/" + studentID + "?q=2");
		});

		$('.secondSem').click(function () {
			$('#modal_form2').modal('show');
			var studentID = $(this).attr('data-studentId');
			$('#modal_form2').find('a.sem1').attr("href", "<?php echo base_url() ?>index.php/Dashboard/setBehavior/" + studentID + "?q=3");
			$('#modal_form2').find('a.sem2').attr("href", "<?php echo base_url() ?>index.php/Dashboard/setBehavior/" + studentID + "?q=4");
		})

	})
</script>