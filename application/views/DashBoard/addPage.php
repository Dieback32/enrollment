<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa fa-bars"></i> Add Page</h3>
		</div>
	</div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    
                </header>
                <div class="panel-body">
                  <form action="<?php echo site_url(); ?>/DashBoard/addNewPage" method="POST" role="form">
	  					  
		                  <div class="form-group has-feedback">
		                    <label>Page Title</label>
		                      <input type="text" maxlength="20" class="form-control" name="title" placeholder="Title" value="" required >
		                      <div class="help-block with-errors"></div>
		                  </div>
		                  <div class="form-group has-feedback">
		                    <label>Content</label>
		                      <textarea style = "height: 200px; " id="text-editor" class = "form-control" name="content" ></textarea>
		                      <div class="help-block with-errors"></div>
		                  </div>
		                  <button type="submit" class="btn btn-primary">Publish</button>
		                </form>
                </div>
            </section>
        </div>
      </div>
      <!-- page end-->
  
	  					
	  