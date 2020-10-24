<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa fa-bars"></i> Update Page</h3>
		</div>
	</div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    
                </header>
                <div class="panel-body">
	  					<form action="<?php echo site_url(); ?>/DashBoard/updateSavePage" method="POST" role="form">
	  						<input type="hidden" name="id" value="<?php echo $page->id; ?>">
	  						
			                 <div class="form-group has-feedback">
			                    <label>Page Title</label>
			                      <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $page->title; ?>" required >
			                      <div class="help-block with-errors"></div>
			                 </div>
			                 <div class="form-group has-feedback">
			                    <label>Content</label>
			                      <textarea style = "height: 200px; " id="text-editor" class = "form-control" name="content" ><?php echo $page->content; ?></textarea>
			                      <div class="help-block with-errors"></div>
			                 </div>
			                  <button type="submit" class="btn btn-primary">Update</button>
		                </form>
	  				</div>
            </section>
        </div>
      </div>
      <!-- page end-->