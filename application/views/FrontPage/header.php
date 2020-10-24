<div id="fh5co-header">
	<header id="fh5co-header-section" style="background-color: black;" ">
		<div class="container">
			<div class="nav-header">
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
				<!-- <h1 id="fh5co-logo"><a href="<?php echo site_url(); ?>"><i class="icon-home2"></i>LOGO</a></h1> -->
				<?php if (isset($logo->file)): ?>
					<a href="<?php echo site_url(); ?>"><img src="<?php echo base_url(); ?>uploads/home/<?php echo $logo->file; ?>" class=" img-responsive main-logo"></a>		
				<?php endif; ?>
				<!-- START #fh5co-menu-wrap -->
				<nav id="fh5co-menu-wrap" role="navigation">
					<ul class="sf-menu" id="fh5co-primary-menu">
					<!-- <li><a href="<?php echo site_url(); ?>" style="color:#ffffff;"> HOME</a></li> -->
						<?php foreach ($page as $parent): ?>
					 	<?php if ($parent->page_id > 0): ?>
					 		<?php foreach ($links as $link): ?>
					 			<?php if ($parent->page_id == $link->id): ?>
					 				<li><a href="<?php echo site_url().'/FrontPage/page/'.$link->slug ?>" style="color:#ffffff;"><?php echo $parent->title?></a></li>
					 			<?php endif ?>
					 			
					 		<?php endforeach ?>
				 			
				 		<?php else: ?>
				 			<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#ffffff;"><?php echo $parent->title?> <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<?php foreach ($childPage as $child): ?>
									<?php if ($child->parent_id == $parent->id): ?>
										<?php foreach ($links as $link): ?>
								 			<?php if ($child->page_id == $link->id): ?>
								 				<li><a href="<?php echo site_url().'/FrontPage/page/'.$link->slug ?>"><?php echo $child->title?></a></li>
								 			<?php endif ?>
								 			
								 		<?php endforeach ?>
									<?php endif ?>
										
									<?php endforeach ?>
								</ul>
							</li>
					 	<?php endif ?>
					 		
					 	<?php endforeach ?>
						<li>
							<a href="#" class="fh5co-sub-ddown"><i class="icon-user" style="color:#ffffff;"></i></a>
							 <ul class="fh5co-sub-menu">
								<?php if ($this->session->userdata('id') != NULL  ): ?>
								<?php if ($this->session->userdata('role') == 'student'): ?>
									<li><a href="<?php echo site_url('')?>/frontPage/myAccount">My Account</a></li>
								<?php else: ?>
									<li><a href="<?php echo site_url('Dashboard')?>">Dashboard</a></li>
								<?php endif ?>
									
									<li><a href="<?php echo site_url('Authentication/logout')?>">Logout</a></li>
								<?php else: ?>
									<li><a href="<?php echo site_url(); ?>/frontPage/loginPage">Login Here</a></li>
									<li><a href="<?php echo site_url(); ?>/frontPage/regStudent">Register Here</a></li>
									<li><a href="<?php echo site_url('Authentication/forgot')?>">Forgot Password?</a></li>
								<?php endif ?>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>		
</div>