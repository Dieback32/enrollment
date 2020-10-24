<!--main content start-->
<section id="main-content">
  	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header"><i class="fa fa fa-bars"></i> Add Voucher</h3>
			</div>
		</div>
		<div class="row">
	        <div class="col-lg-12">
	            <section class="panel">
	                <header class="panel-heading">
	                    
	                </header>

                	<div class="panel-body">
                		<button class="addVoucher">Add Voucher</button>
                		<br>
                		<table class="table">
                			<thead>
                				<tr>
                					<th>Name</th>
                					<th width="200">Discount</th>
                					<th width="200">Action</th>
                				</tr>
                			</thead>
                			<tbody>
                			<?php foreach($vouchers as $voucher): ?>
                				<tr>
                					<td><?php echo $voucher->label?></td>
                					<td><?php echo $voucher->amount?></td>
                					<td>
                						<button data-id="<?php echo $voucher->id?>" class="edit-voucher">Edit</button>
                						<button data-id="<?php echo $voucher->id?>" class="del-voucher">Delete</button>
                					</td>
                				</tr>
                			<?php endforeach?>
                			</tbody>
                		</table>
                	</div>
	            </section>
	        </div>
	    </div>
	</section>
</section>
<!--main content end-->
<div class="modal fade" tabindex="-1" role="dialog" id="customModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Semesters</h4>
			</div>
			<form>
				<div class="modal-body">
					<div class="form">
						<label>Label</label>
						<input type="text" name="label" class="form-control" required="">
					</div>
					<div class="form">
						<label>Discount</label>
						<input type="number" name="amount" min="1" max="2" class="form-control" required="" value="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary btn-save-voucher">Save changes</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="customEditModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Semesters</h4>
			</div>
			<form>
				<div class="modal-body">
					<div class="form">
						<label>Label</label>
						<input type="text" name="label" class="form-control" required="">
					</div>
					<div class="form">
						<label>Discount</label>
						<input type="number" name="amount" min="1" max="2" class="form-control" required="" value="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary btn-save-voucher">Save changes</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">

	function sendAjaxRequest(url, data, callback){
		var baseUrl = $('body').attr('id');
		$.ajax({
			url : baseUrl + url,
			data : data,
			dataType : 'json',
			type : 'POST',
		}).done(function(response){
			if(response.results === 'success'){
				callback();
			}
		});
	}
	$('.addVoucher').click(function(){
		$('#customModal').modal('show');

		$('#customModal').find('input[name="label"]').val('');
		$('#customModal').find('input[name="amount"]').val('');
		$('.btn-save-voucher').click(function(){
			if($('#customModal').find('input[name="label"]').val() != ''){
				var callback = function(){
					alert('Add Success');
					window.location.reload();
				}
				var data = {
					label : $('#customModal').find('input[name="label"]').val(),
					amount : $('#customModal').find('input[name="amount"]').val()
				};
				sendAjaxRequest('/vouchers/add', data, callback)
			}else{
				alert('Label cannot be empty');
			}
		});
	});

	$('.del-voucher').click(function(){
		self = this;
		if(confirm('Are you sure?')){
			var callback = function(){
					alert('Remove Success');
					window.location.reload();
				}
			var data = {
				id : $(self).attr('data-id')
			};
			sendAjaxRequest('/vouchers/remove', data, callback)
		}
	});

	$('.edit-voucher').click(function(){
		self = this;
		$('#customEditModal').modal('show');
		var label = $(self).parents('tr').children('td')[0].outerText;
		var amount = $(self).parents('tr').children('td')[1].outerText;
		$('#customEditModal').find('input[name="label"]').val(label);
		$('#customEditModal').find('input[name="amount"]').val(amount);

		$('.btn-save-voucher').click(function(){
			if($('#customEditModal').find('input[name="label"]').val() != ''){
				var callback = function(){
					alert('Update Success');
					window.location.reload();
				}
				var data = {
					id : $(self).attr('data-id'),
					label : $('#customEditModal').find('input[name="label"]').val(),
					amount : $('#customEditModal').find('input[name="amount"]').val()
				};
				sendAjaxRequest('/vouchers/edit', data, callback)
			}else{
				alert('Label cannot be empty');
			}
		});
	});
</script>
