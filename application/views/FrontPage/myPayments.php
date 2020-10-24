<div id="fh5co-team-section">
	<div class="container">
		<div class="row about">
			<div class="col-md-12">
				<br><br>
				<a href="<?php echo site_url();?>/frontpage/myAccount" type="button" class="btn btn-primary">Back to my Account</a>
				<h2>Payments</h2>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>SY</th>
							<th>Amount</th>
							<th>Date of Payment</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($payment as $pay): ?>
							<tr>
								<td><?php echo $pay->sy ?></td>
								<td><?php echo $pay->amount ?></td>
								<td><?php echo $pay->date ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>