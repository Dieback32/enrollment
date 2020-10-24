<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa fa-bars"></i>Add Strand </h3>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">
					</header>
					<div class="panel-body">
						<button class="btn btn-success" onclick="add_tracks()"><i class="glyphicon glyphicon-plus"></i>
							Add Strand
						</button>
						<br>

						<table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th>Strand ID</th>
								<th>Strand Name</th>
								<th>Category</th>
								<th style="width:125px;">Action</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($tracks as $track): ?>
								<tr>
									<td><?php if (!empty($track->id)) {
											echo $track->id;
										} ?></td>
									<td><?php if (!empty($track->track_name)) {
											echo $track->track_name;
										} ?></td>
									<td><?php echo $track->category;?></td>
									<td>
										<button data-id="<?php echo $track->id ?>" class="editTracks">Edit</button>
										<?php if ($this->session->userdata('role') != 'asstreg'): ?>
											<button data-id="<?php echo $track->id ?>" class="deleteTracks">Delete
											</button>
										<?php endif ?>
									</td>
								</tr>
							<?php endforeach ?>


							</tbody>
						</table>
						<!-- Bootstrap modal -->
						<div class="modal fade" id="modal_form" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<form action="<?php echo site_url(); ?>/tracks/add" method="POST" id="form"
									      class="form-horizontal">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
											<h3 class="modal-title">Add Strand</h3>
										</div>
										<div class="modal-body form">
											<input type="hidden" value="" name="id"/>
											<div class="form-body">

												<div class="form-group">
													<label class="control-label col-md-3">Strand Name</label>
													<div class="col-md-9">
														<input type="text" name="track_name" class="form-control"
														       placeholder="Strand Name" required="required">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Tracks</label>
													<div class="col-md-9">
														<select name="category" class="form-control">
															<option value="Tech-Voch">Tech-Voch</option>
															<option value="Academic">Academic</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="submit" id="btnSave" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel
											</button>
										</div>
									</form>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
						<!-- End Bootstrap modal -->
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_edit" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title">Add Strand</h3>
			</div>
			<div class="modal-body form">
				<form id="form" class="form-horizontal">
					<input type="hidden" value="" name="id"/>
					<div class="form-body">

						<div class="form-group">
							<label class="control-label col-md-3">Strand Name</label>
							<div class="col-md-9">
								<input type="text" name="track_name" class="form-control" placeholder="Strand Name">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Tracks</label>
							<div class="col-md-9">
								<select name="category" class="form-control">
									<option value="Tech-Voch">Tech-Voch</option>
									<option value="Academic">Academic</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" id="btnSave" class="btn btn-primary">Save</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!--main content end-->
	<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/dataTables.bootstrap.js') ?>"></script>
	<script type="text/javascript">


		$('#table1').DataTable();

		function add_tracks() {
			save_method = 'add';
			$('#form')[0].reset(); // reset form on modals
			$('#modal_form').modal('show'); // show bootstrap modal
			$('.modal-title').text('Add Strand'); // Set Title to Bootstrap modal title
		}


		$('.deleteTracks').click(function () {
			var id = $(this).attr('data-id');
			if (confirm('Are you sure?')) {
				$.ajax({
					url: '<?php echo site_url('tracks/delete')?>/' + id,
					type: 'POST',
					dataType: 'JSON',
				}).done(function (response) {
					if (response.results === 'success') {
						window.location.href = "<?php echo site_url('Dashboard/addTracks')?>"
					}
				})
			}
		});

		$('.editTracks').click(function () {
			var id = $(this).attr('data-id');
			var value = $(this).parents('tr').children().eq(1).html();
			var value2 = $(this).parents('tr').children().eq(2).html();
			console.log(value2);
			$('#modal_form_edit').modal('show');
			$('#modal_form_edit').find('.modal-title').html('Edit Strand');
			$('#modal_form_edit').find('input[name="track_name"]').val(value);
			$('#modal_form_edit').find('select[name="category"]').val(value2);
			$('#modal_form_edit').find('#btnSave').click(function (e) {
				$.ajax({
					url: '<?php echo site_url('tracks/edit')?>/' + id,
					type: 'POST',
					dataType: 'JSON',
					data: {
						track_name: $('#modal_form_edit').find('input[name="track_name"]').val(),
						category: $('#modal_form_edit').find('select[name="category"]').val(),
					}
				}).done(function (response) {
					if (response.results === 'success') {
						window.location.href = "<?php echo site_url('Dashboard/addTracks')?>"
					}
				})
			})
		});


	</script>

