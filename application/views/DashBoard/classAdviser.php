<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">
					<i class="fa fa fa-bars"></i> Class Advising Page
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
								<th>Section Name</th>
								<th width="100">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
//							print_r($_SESSION);
							$this->db->where('adviser_id', $_SESSION['id']);
							$sections = $this->db->get('grade_section')->result_array();
							?>
							<?php foreach($sections as $section):?>
							<tr>
								<td><?php echo $section['section']?></td>
								<td><a href="<?php echo base_url()?>index.php/Dashboard/viewClass/<?php echo $section['id']?>">view</a></td>
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
