<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa fa-bars"></i> Main Content</h3>
		</div>
	</div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    
                </header>
                <div class="panel-body">
                  	<div class="row home-page">
                  		 <section class="panel">
	                          <header class="panel-heading tab-bg-primary ">
	                              <ul class="nav nav-tabs">
	                                  <li class="active">
	                                      <a data-toggle="tab" href="#logo">Logo and Banner</a>
	                                  </li>
	                                  <li class="">
	                                      <a data-toggle="tab" href="#welcome">Welcome Message</a>
	                                  </li>
	                                  
	                                  <li class="">
	                                      <a data-toggle="tab" href="#contact">Contact and Address</a>
	                                  </li>
	                              </ul>
	                          </header>
	                          <div class="panel-body">
	                              <div class="tab-content">
	                                  <div id="logo" class="tab-pane active">
	                                      	<div class="col-md-6 logo-upload">
													<h3>Site Logo</h3>
													<?php echo form_open_multipart('uploadLogo/do_upload');?>
								                      <?php echo "<input type='file' name='userfile' size='20' />"; ?>
								                      <?php echo "<input type='submit' name='submit' value='upload' /> ";?>
							                      	<?php echo "</form>"?>
							                      	<br>
							                      	<?php if (isset($logo->file)): ?>
														<img src="<?php echo base_url(); ?>uploads/home/<?php echo $logo->file; ?>" class="img-responsive upload-logo">		
														<a href="<?php echo site_url(); ?>/dashboard/deleteLogo/<?php echo $logo->id; ?>"  onClick="return doconfirm();">Delete</a>
													<?php endif; ?>
							                 </div>
							                 <div class="col-md-6 logo-upload">
													<h3>Site Banner</h3>
													<?php echo form_open_multipart('uploadBanner/do_upload');?>
								                      <?php echo "<input type='file' name='userfile' size='20' />"; ?>
								                      <?php echo "<input type='submit' name='submit' value='upload' /> ";?>
							                      	<?php echo "</form>"?>
							                     	<br>
							                      	<?php if (isset($banner->file)): ?>
														<img src="<?php echo base_url(); ?>uploads/home/<?php echo $banner->file; ?>" class="img-responsive upload-banner">	
														<a href="<?php echo site_url(); ?>/dashboard/deleteLogo/<?php echo $banner->id; ?>"  onClick="return doconfirm();">Delete</a>
													<?php endif; ?>
											</div>
	                                  </div>
	                                  <div id="about" class="tab-pane">
	                                  	<h3>Maps</h3>
	                                  	<a href="https://www.google.com.ph/maps?source=tldsi&hl=en" target="_blank">Get Map</a>
											<form method="POST" action="<?php echo site_url(); ?>/DashBoard/setAbout" class="form-horizontal" role="form">
											 <input name="title" value="map" type="hidden">
											  <div class="form-group">
											    <label class="col-sm-2 control-label">Content</label>
											    <div class="col-sm-10">
											      <textarea name="content" class="form-control" placeholder="Content" rows="3"><?php if(isset($getAbout->content)){ echo $getAbout->content; } ?></textarea>
											    </div>
											  </div>
											  <div class="form-group">
											    <div class="col-sm-offset-2 col-sm-10">
											      <button type="submit" class="btn btn-primary">Save</button>
											    </div>
											  </div>
											</form>
	                                  </div>
	                                  <div id="welcome" class="tab-pane">
				                             <h3>Welcome Message</h3>
											<form method="POST" action="<?php echo site_url(); ?>/DashBoard/setCaption" class="form-horizontal" role="form">
											  <div class="form-group">
											    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
											    <div class="col-sm-10">
											      <input value="<?php if(isset($getCaption->title)){ echo $getCaption->title; } ?>" type="text" name="title" class="form-control" id="" placeholder="Title">
											    </div>
											  </div>
											  <div class="form-group">
											    <label class="col-sm-2 control-label">Content</label>
											    <div class="col-sm-10">
											      <textarea name="content" class="form-control" placeholder="Content" rows="3"><?php if(isset($getCaption->content)){ echo $getCaption->content; } ?></textarea>
											    </div>
											  </div>
											  <div class="form-group">
											    <div class="col-sm-offset-2 col-sm-10">
											      <button type="submit" class="btn btn-primary">Save</button>
											    </div>
											  </div>
											</form>
	                                  </div>
	                                  <div id="mission" class="tab-pane">
	                                  		<h3>Mission</h3>
											<form method="POST" action="<?php echo site_url(); ?>/DashBoard/setMission" class="form-horizontal" role="form">
											  <div class="form-group">
											    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
											    <div class="col-sm-10">
											      <input value="<?php if(isset($getMission->title)){ echo $getMission->title; } ?>" type="text" name="title" class="form-control" id="" placeholder="Title">
											    </div>
											  </div>
											  <div class="form-group">
											    <label class="col-sm-2 control-label">Content</label>
											    <div class="col-sm-10">
											      <textarea name="content" class="form-control" placeholder="Content" rows="3"><?php if(isset($getMission->content)){ echo $getMission->content; } ?></textarea>
											    </div>
											  </div>
											  <div class="form-group">
											    <div class="col-sm-offset-2 col-sm-10">
											      <button type="submit" class="btn btn-primary">Save</button>
											    </div>
											  </div>
											</form>
	                                  </div>
	                                  <div id="vision" class="tab-pane">
	                                  		<h3>Vision</h3>
											<form method="POST" action="<?php echo site_url(); ?>/DashBoard/setVision" class="form-horizontal" role="form">
											  <div class="form-group">
											    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
											    <div class="col-sm-10">
											      <input value="<?php if(isset($getVision->title)){ echo $getVision->title; } ?>" type="text" name="title" class="form-control" id="" placeholder="Title">
											    </div>
											  </div>
											  <div class="form-group">
											    <label class="col-sm-2 control-label">Content</label>
											    <div class="col-sm-10">
											      <textarea name="content" class="form-control" placeholder="Content" rows="3"><?php if(isset($getVision->content)){ echo $getVision->content; } ?></textarea>
											    </div>
											  </div>
											  <div class="form-group">
											    <div class="col-sm-offset-2 col-sm-10">
											      <button type="submit" class="btn btn-primary">Save</button>
											    </div>
											  </div>
											</form>
	                                  </div>
	                                   <div id="contact" class="tab-pane">
	                                  		<h3>Our Contacts and Address</h3>
											<form method="POST" action="<?php echo site_url(); ?>/DashBoard/setContact" class="form-horizontal" data-toggle="validator" role="form">
											  <div class="form-group">
											    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
											    <div class="col-sm-10">
											      <input value="<?php if(isset($getContact->address)){ echo $getContact->address; } ?>" type="text" name="address" class="form-control" id="" placeholder="Address">
											    </div>
											  </div>
											  <div class="form-group">
											    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
											    <div class="col-sm-10">
											      <input value="<?php if(isset($getContact->email)){ echo $getContact->email; } ?>" type="email" name="email" class="form-control" id="" placeholder="Email">
											    </div>
											  </div>
											  <div class="form-group">
											    <label for="inputEmail3" class="col-sm-2 control-label">Phone/Mobile Number</label>
											    <div class="col-sm-10">
											      <input value="<?php if(isset($getContact->contact)){ echo $getContact->contact; } ?>" type="text" pattern="\d+" name="contact" class="form-control" id="" placeholder="Contact">
											    </div>
											  </div>
											  <div class="form-group">
											    <div class="col-sm-offset-2 col-sm-10">
											      <button type="submit" class="btn btn-primary">Save</button>
											    </div>
											  </div>
											</form>
	                                  </div>
	                              </div>
	                          </div>
	                      </section>
                </div>
            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>
<!--main content end-->
	  					
	  				