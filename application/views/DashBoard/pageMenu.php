<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa fa-bars"></i> Page Menu</h3>
		</div>
	</div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    
                </header>
                <div class="panel-body">
                  <div class="row">
						<div class="col-md-6">
							<h3>Add Menu </h3>
							<form action="<?php echo site_url(); ?>/DashBoard/setMenu" method="POST" role="form" data-toggle="validator">
		  						<div class="form-group has-feedback">
			                        <label>Menu Title</label>
			                        <input type="text" step="0.01" class="form-control" maxlength="20" name="title" placeholder="Title" required>
			                        <div class="help-block with-errors"></div>
			                      </div>
			                      <div class="form-group has-feedback">
				                    <label>Link Page</label>
				                      <select name="page_id" class="form-control" required>
				                      	<option value="0">- None -</option>
				                      	<?php foreach ($pages as $page): ?>
				                      	<?php
				                      		$this->db->where('page_id', $page->id);
						                  	$query = $this->db->get('menu');
											$mid = $query->row();
						                  ?>
						                  <?php if ($mid->page_id != $page->id) : ?>
						                  	<option value="<?php echo $page->id ?>"><?php echo $page->title ?></option>
						                  <?php endif ?>
				                      	<?php endforeach ?>
				                      </select>
				                      <div class="help-block with-errors"></div>
				                  </div>
				                  <div class="form-group has-feedback">
				                    <label>Parent Menu</label>
				                      <select name="menu_id" class="form-control" required>
				                      	<option value="0">- None -</option>
				                      	<?php foreach ($menus as $menu): ?>
				                      		<?php if ($menu->parent_id <= 0 && $menu->page_id <= 0): ?>
				                      			<option value="<?php echo $menu->id ?>"><?php echo $menu->title ?></option>
				                      		<?php endif ?>
				                      		
				                      	<?php endforeach ?>
				                      </select>
				                      <div class="help-block with-errors"></div>
				                  </div>
			                      <div class="col-xs-12">
			                        <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
			                      </div><!-- /.col -->
		  					</form>
						</div>
						<div class="col-md-6">
                          <h3>Menu List</h3>
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Menu Title</th>
                                <th style="width:155px;">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($parent as $pmenu): ?>
                                          <tr>
                                  <td><h4><?php echo $pmenu->title ?></h4></td>
                                  <td><a class="btn btn-primary" data-toggle="modal" href='#modal-<?php echo $pmenu->id?>'><i class="glyphicon glyphicon-pencil"></i></a> <a href="<?php echo site_url()?>/DashBoard/deleteMenu/<?php echo $pmenu->id?>" title="" class="btn btn-danger" onClick="return doconfirm();"><i class="glyphicon glyphicon-trash"></i></a></td>
                                </tr>   

                                <div class="modal fade" id="modal-<?php echo $pmenu->id?>">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Edit Menu</h4>
                                      </div>
                                      <div class="modal-body">
                                        <form action="<?php echo site_url(); ?>/DashBoard/updateMenu" method="POST" role="form" data-toggle="validator">
                                          <div class="form-group has-feedback">
                                                      <label>Menu Title</label>
                                                      <input type="hidden" value="<?php echo $pmenu->id ?>" name="my_id">
                                                      <input type="text" value="<?php echo $pmenu->title ?>" class="form-control" maxlength="20" name="title" placeholder="Title" required>
                                                      <div class="help-block with-errors"></div>
                                                    </div>
                                                    <?php if ($pmenu->page_id != 0): ?>
                                                    <div class="form-group has-feedback">
                                                      <label>Link Page</label>
                                                      <select name="page_id" class="form-control" required >
                                                        <?php foreach ($pages as $page): ?>
                                                        <?php if ($pmenu->page_id == $page->id): ?>
                                                          <option value="<?php echo $page->id ?>"><?php echo $page->title ?></option>
                                                        <?php endif ?>
                                                        <?php endforeach ?>
                                                        <?php foreach ($pages as $page): ?>
				                      	<?php
				                      		$this->db->where('page_id', $page->id);
						                  	$query = $this->db->get('menu');
											$mid = $query->row();
						                  ?>
						                  <?php if ($mid->page_id != $page->id) : ?>
						                  	<option value="<?php echo $page->id ?>"><?php echo $page->title ?></option>
						                  <?php endif ?>
				                      	<?php endforeach ?>
                                                      </select>
                                                      <div class="help-block with-errors"></div>                                        
                                                   </div>
                                                   <div class="form-group has-feedback">
                                                      <label>Parent Menu</label>
                                                        <select name="menu_id" class="form-control" required>
                                                          <option value="0">- None -</option>
                                                          <?php foreach ($menus as $menu): ?>
                                                            <?php if ($menu->parent_id <= 0 && $menu->page_id <= 0): ?>
                                                              <option value="<?php echo $menu->id ?>"><?php echo $menu->title ?></option>
                                                            <?php endif ?>
                                                            
                                                          <?php endforeach ?>
                                                        </select>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <?php else: ?>
                                                     <input type="hidden" value="0" name="page_id">
                                                      <input type="hidden" value="0" name="menu_id">
                                                    <?php endif ?>
                                                    <div class="col-xs-12">
                                                      <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
                                                    </div><!-- /.col -->
                                        </form>
                                        
                                      </div>
                                      <div class="modal-footer">
                                       
                                      </div>
                                    </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

                                <?php foreach ($child as $cmenu): ?>
                                <?php if ($cmenu->parent_id == $pmenu->id): ?>
                                  <tr>
                                    <td><h4> --- <?php echo $cmenu->title ?></h4></td>
                                    <td><a class="btn btn-primary" data-toggle="modal" href='#modal-<?php echo $cmenu->id?>'><i class="glyphicon glyphicon-pencil"></i></a> <a href="<?php echo site_url()?>/DashBoard/deleteMenu/<?php echo $cmenu->id?>" title="" class="btn btn-danger"><i class="glyphicon glyphicon-trash" onClick="return doconfirm();"></i></a></td>
                                  </tr> 

                                  <div class="modal fade" id="modal-<?php echo $cmenu->id?>">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                          <h4 class="modal-title">Edit Child Menu</h4>
                                        </div>
                                        <div class="modal-body">
                                          <form action="<?php echo site_url(); ?>/DashBoard/updateMenu" method="POST" role="form" data-toggle="validator">
                                          <div class="form-group has-feedback">
                                                      <label>Menu Title</label>
                                                      <input type="hidden" value="<?php echo $cmenu->id ?>" name="my_id">
                                                      <input type="text" value="<?php echo $cmenu->title ?>" class="form-control" maxlength="20" name="title" placeholder="Title" required>
                                                      <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="form-group has-feedback">
                                                      <label>Link Page</label>
                                                      <select name="page_id" class="form-control" required >
                                                        <?php foreach ($pages as $page): ?>
                                                        <?php if ($cmenu->page_id == $page->id): ?>
                                                          <option value="<?php echo $page->id ?>"><?php echo $page->title ?></option>
                                                        <?php endif ?>
                                                        <?php endforeach ?>
                                                        <?php foreach ($pages as $page): ?>
								                      	<?php
								                      		$this->db->where('page_id', $page->id);
										                  	$query = $this->db->get('menu');
															$mid = $query->row();
										                  ?>
										                  <?php if ($mid->page_id != $page->id) : ?>
										                  	<option value="<?php echo $page->id ?>"><?php echo $page->title ?></option>
										                  <?php endif ?>
								                      	<?php endforeach ?>
                                                      </select>
                                                      <div class="help-block with-errors"></div>                                        
                                                   </div>
                                                   <div class="form-group has-feedback">
                                                      <label>Parent Menu</label>
                                                        <select name="menu_id" class="form-control" required>
                                                          <option value="<?php echo $pmenu->id ?>"><?php echo $pmenu->title ?></option>
                                                          <?php foreach ($menus as $menu): ?>
                                                            <?php if ($menu->parent_id <= 0 && $menu->page_id <= 0): ?>
                                                              <option value="<?php echo $menu->id ?>"><?php echo $menu->title ?></option>
                                                            <?php endif ?>
                                                            
                                                          <?php endforeach ?>
                                                        </select>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                    <div class="col-xs-12">
                                                      <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
                                                    </div><!-- /.col -->
                                        </form>
                                        </div>
                                        <div class="modal-footer">
                                         
                                        </div>
                                      </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                  </div><!-- /.modal -->

                                <?php endif ?>
                                
                                <?php endforeach ?>
                                        <?php endforeach ?>
                              
                            </tbody>
                          </table>
                        </div>
					   </div>
                </div>
            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>
<!--main content end-->