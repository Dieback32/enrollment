var save_method; //for save method string
var table;
$(document).ready(function() {
	table = $('#table').DataTable({
		"processing": true, //Feature control the processing indicator.
		"serverSide": true, //Feature control DataTables' server-side processing mode.
		// Load data for the table's content from an Ajax source
		"ajax": {
			"url": "<?php echo site_url('subject/ajax_list') ?>",
			"type": "POST"
		},
		//Set column definition initialisation properties.
		"columnDefs": [{
			"targets": [-1], //last column
			"orderable": false, //set not orderable
		}, ],
	});
});

function add_subject() {
	save_method = 'add';
	$('#form')[0].reset(); // reset form on modals
	$('#modal_form').modal('show'); // show bootstrap modal
	$('.modal-title').text('Add Subject'); // Set Title to Bootstrap modal title
}

function edit_subject(id) {
	save_method = 'update';
	$('#form')[0].reset(); // reset form on modals
	//Ajax Load data from ajax
	$.ajax({
		url: "<?php echo site_url('subject/ajax_edit/') ?>/" + id,
		type: "GET",
		dataType: "JSON",
		success: function(data) {
			$('[name="id"]').val(data.id);
			$('[name="grade_level"]').val(data.grade_level);
			$('[name="subject"]').val(data.subject);
			$('[name="instructorId"]').val(data.instructorId);
			$('[name="track"]').val(data.track);
			$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
			$('.modal-title').text('Edit Subject'); // Set title to Bootstrap modal title
		},
		errorz: function(jqXHR, textStatus, errorThrown) {
			alert('Error get data from ajax');
		}
	});
}

function reload_table() {
	table.ajax.reload(null, false); //reload datatable ajax
}

function save() {
	var url;
	if (save_method == 'add') {
		url = "<?php echo site_url('subject/ajax_add') ?>";
	} else {
		url = "<?php echo site_url('subject/ajax_update') ?>";
	}
	var written_work = $('input[name="written_work"]').val();
	var perforamnce_task = $('input[name="perforamnce_task"]').val();
	var quarterly_assessment = $('input[name="quarterly_assessment"]').val();
	var overall = Number(written_work) + Number(perforamnce_task) + Number(quarterly_assessment);
	if (overall !== 100) {
		alert('Overall Grading Criteria Should be Equal to 100');
	} else {
		// ajax adding data to database
		$.ajax({
			url: url,
			type: "POST",
			data: $('#form').serialize(),
			dataType: "JSON",
			success: function(data) {
				//if success close modal and reload ajax table
				$('#modal_form').modal('hide');
				reload_table();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data Subject exist');
			}
		});
	}
}

function delete_subject(id) {
	if (confirm('Are you sure delete this data?')) {
		// ajax delete data to database
		$.ajax({
			url: "<?php echo site_url('subject/ajax_delete') ?>/" + id,
			type: "POST",
			dataType: "JSON",
			success: function(data) {
				//if success reload ajax table
				$('#modal_form').modal('hide');
				reload_table();
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data Subject exist');
			}
		});
	}
}