<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">
					<i class="fa fa fa-bars"></i> Summer Special Class
				</h3>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading"></header>
					<div class="panel-body">
						<form action="<?php echo base_url()?>index.php/Dashboard/addSummerClass" method="POST">
							<?php
							$activeSy = $this->db->get_where('enrollment', array('status' => 1 , 'end' => 1))->row('sy');
							$sy = $this->db->get_where('sy', array('sy' => $activeSy))->row('sy');
							?>
							<div class="col-md-4">
								<input type="hidden" name="sy" value="<?php echo $sy?>" >
								<div class="field">
									<label for="">Summer Class Name</label>
									<input type="text" name="summer" class="form-control" required>
								</div>
								<div class="field">
									<label for="">This will apply to</label>
									<input type="text" class="form-control" required readonly value="SY: <?php echo $activeSy?>">
								</div>
								<br>
								<button type="submit" class="btn btn-primary">Create</button>
							</div>
							<div class="col-md-8">
								<h4>List of Summer Class</h4>
								<table class="table">
									<thead>
										<tr>
											<th>Summer Class Name</th>
											<th width="100">SY</th>
											<th width="100">Action</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($summerclasses as $summerClass):?>
									<tr>
										<td><?php echo $summerClass['name']?></td>
										<td><?php echo $summerClass['sy']?></td>
										<td>
											<a href="<?php echo base_url()?>index.php/Dashboard/viewSummer/<?php echo $summerClass['id']?>">View</a>
										</td>
									</tr>
									<?php endforeach?>
									</tbody>
								</table>
								<hr>
								<h4>Failed Student Per Subject <?php echo @$this->db->get_where('sy',array('id' => $summerClass['sy']))->row('sy')?></h4>
								<table class="table">
									<thead>
										<th>Subject</th>
										<th width="100"># of Student</th>
										<th width="100">Action</th>
									</thead>
									<tbody>
									<?php
										$ss = $this->db->get('subject')->result_array();
									?>
									<?php foreach($ss as $s):?>
									<tr>
										<td><?php echo $s['subject']?></td>
										<td>
											<?php
											$this->db->where('subjectId', $s['id']);
											$this->db->where('qg >=', '74');
												echo $this->db->get('grades')->num_rows()
											?>
										</td>
										<td><a href="<?php base_url()?>index.php/Dashboard/summerPerStudent">View</a></td>
									</tr>
									<?php endforeach?>
									</tbody>
								</table>
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
