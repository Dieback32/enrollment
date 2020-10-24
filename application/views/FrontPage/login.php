<div id="fh5co-team-section">
	<div class="container">
		<div class="row about">
			<div class="col-md-6 col-md-offset-3">
				<br><br>
				<h3 class="text-center">LOGIN PAGE</h3>
				
				<form action="<?php echo site_url(); ?>/authentication/login" data-toggle="validator" method="POST" role="form">	
					<div class="modal-body">
						<div class="form-group-lg">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email">
							 <div class="help-block with-errors"></div>
						</div>
						<div class="form-group-lg">
							<label for="">Password</label>
							<input type="password" class="form-control" name="password" id="" placeholder="Password">
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success btn-lg" style="width:100%; ">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>