<div id="fh5co-team-section">
	<div class="container">
		<div class="row about">
			<div class="col-md-6 col-md-offset-3">
				<br><br>
    		<H2 class="text-center">Forgot Password?</H2>
    		<br>
			<form action="<?php echo site_url(); ?>/authentication/forgotPass" method="POST" data-toggle="validator" role="form">	
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" class="form-control" name="email" id="" placeholder="Username">
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<label for="">Mobile Number</label>
					<input type="text" class="form-control" pattern="\d+" name="contact" id="" placeholder="Password">
					<div class="help-block with-errors"></div>
				</div>
				<button type="submit" class="btn btn-lg btn-primary" style="width: 100%;">Submit</button>

			</form>
		</div>
		</div>
	</div>
</div>