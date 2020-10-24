<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa fa-bars"></i> Account List</h3>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading">

					</header>
					<div class="panel-body">

						<table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
							<tr>
								<th>Last Name</th>
								<th>First Name</th>
								<th>Email</th>
								<th>Role</th>
								<th style="width:70px;">Action</th>
							</tr>
							</thead>
							<tbody>
							</tbody>

							<!-- <tfoot>
							   <tr>
								 <th>Email</th>
								 <th>Role</th>
								 <th>Action</th>
							   </tr>
							 </tfoot>-->
						</table>

					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->
<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">

	var save_method; //for save method string
	var table;
	$(document).ready(function () {
		table = $('#table').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.

			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": "<?php echo site_url('accounts/ajax_list')?>",
				"type": "POST"
			},

			//Set column definition initialisation properties.
			"columnDefs": [
				{
					"targets": [-1], //last column
					"orderable": false, //set not orderable
				},
			],

		});
	});

	function reload_table() {
		table.ajax.reload(null, false); //reload datatable ajax
	}

	function save() {
		var url;
		if (save_method == 'add') {
			url = "<?php echo site_url('accounts/ajax_add')?>";
		}
		else {
			url = "<?php echo site_url('accounts/ajax_update')?>";
		}

		// ajax adding data to database
		$.ajax({
			url: url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function (data) {
				//if success close modal and reload ajax table
				$('#modal_form').modal('hide');
				reload_table();
			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
			}
		});
	}

	function delete_accounts(id) {
		if (confirm('Are you sure to delete this account?')) { // ajax delete data to database
			$.ajax({
				url: "<?php echo site_url('accounts/ajax_delete')?>/" + id,
				type: "POST",
				dataType: "JSON",
				success: function (data) {
					alert('Successfully deleted!');
					//if success reload ajax table
					$('#modal_form').modal('hide');
					reload_table();
				},
				error: function (jqXHR, textStatus, errorThrown) {
					alert('Error adding / update database');
				}
			});
		}
	}
</script>

