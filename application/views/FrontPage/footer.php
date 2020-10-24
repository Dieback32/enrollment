<footer>
	<div id="footer" style="background-color: black";>
		<div class="container" >
			<div class="row">
				<div class="col-md-4">
					<?php if (isset($logo->file)): ?>
						<a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>uploads/home/<?php echo $logo->file; ?>" class=" img-responsive main-logo"></a>		
					<?php endif; ?>
				</div>
				<div class="col-md-4">
					<h3 class="section-title">Our Address</h3>
					<p><?php if(isset($getContact->address)){ echo $getContact->address; } ?></p>
				</div>
				<div class="col-md-4">
					<h3 class="section-title">Contact Us</h3>
					<p>Email: <?php if(isset($getContact->email)){ echo $getContact->email; } ?></p>
					<p>Phone/Mobile #: <?php if(isset($getContact->contact)){ echo $getContact->contact; } ?></p>
				</div>
			</div>
		</div>
	</div>
</footer>