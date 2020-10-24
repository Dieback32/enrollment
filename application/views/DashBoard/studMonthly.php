<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa fa-bars"></i> Student Report  (<?php echo $this->session->userdata('years') ?>)</h3>
		</div>
	</div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                  <div class="row">
                   <div class="col-md-6">
                       <div class="form-group">
                        <div class="col-md-6">
                          <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for ID Number" title="Type in a name" class="form-control"/>
                        </div>
                      
                      </div>
                    </div> 
                    <div class="col-md-6">
                        <form action="<?php echo site_url(); ?>/DashBoard/studSort" method="POST" role="form" data-toggle="validator">
                          <div class="form-group">
                            
                                    <div class="col-md-6">
                                      <select name="year" class="form-control" >
                                        <?php
                                         $sy = $this->db->get('sy');
                                         $years = $sy->result();

                                        ?>
                                        <?php foreach ($years as $year): ?>
                                          
                                            <option value="<?php echo $year->sy ?>"><?php echo $year->sy ?></option>
                                        <?php endforeach ?>
                                      </select>
                                      <div class="help-block with-errors"></div>
                                    </div>
                                  </div>
                                    <div class="col-md-4">
                                      <button type="submit" id="penalty" class="btn btn-primary btn-block btn-flat">View Record SY</button>
                                    </div><!-- /.col -->
                        </form>
                    </div>     
                  </div>
                    
                </header>
                <div class="panel-body">
                 
                    
                  <div class="row" id="printableArea">
                    <div class="hide-div">
                        <div class="row">
                          <div class="col-md-4 col-md-offset-4 text-center">
                            <?php if (isset($logo->file)): ?>
                              <a href="#" class="text-center">
                                <center>
                                  <img src="<?php echo base_url(); ?>uploads/home/<?php echo $logo->file; ?>" class=" img-responsive main-logo s-logo"></a>    
                                </center>
                            <?php endif; ?>
                          </div>

                        </div>
                        <div class="row">
                          <div class="col-md-6 col-md-offset-3 text-center">
                            <h3>COMPUTER ARTS AND TECHNOLOGICAL COLLEGE, INC.</h3>
                            <br>
                          </div>
                        </div>
                    </div>
                      <table class="table table-striped table-hover" id="myTable">
                        <thead>
                          <tr>
                            <th>User ID</th>
                            <th>Section</th>
                            <th>Grade Level</th>
                            <th>Total Tuition</th>
                            <th>Remaining Balance</th>
                            <th>SY</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($report as $row): ?>
                              <tr>
                                <td><?php echo $row->user_id ?></td>
                                <td><?php echo $row->section ?></td>
                                <td><?php echo $row->grade ?></td>
                                <td><?php echo $row->total_amount ?></td>
                                <td><?php echo $row->balance ?></td>
                                <td><?php echo $row->sy ?></td>
                                <td><a data-toggle="modal" href='#modal-<?php echo $row->user_id ?>' class="btn btn-primary">View</a></td>
                              </tr>
                            <div class="modal fade" id="modal-<?php echo $row->user_id ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Student Information</h4>
                                  </div>
                                  <div class="modal-body">
                                    
                                     <div class="row">
                                      <div class="col-md-4">Name : </div>
                                      <div class="col-md-8"><?php echo $row->lastName.', '.$row->firstName.' '. $row->Mi ?></div>
                                      <div class="col-md-4">Contact Number : </div>
                                      <div class="col-md-8"><?php echo $row->contactNumber ?> </div>
                                      <div class="col-md-4">Birth Date : </div>
                                      <div class="col-md-8"><?php echo $row->birthdate ?> </div>
                                      <div class="col-md-4">Birth Place : </div>
                                      <div class="col-md-8"><?php echo $row->place_birth ?> </div>
                                      <div class="col-md-4">Mother : </div>
                                      <div class="col-md-8"><?php echo $row->mother ?> </div>
                                      <div class="col-md-4">Father : </div>
                                      <div class="col-md-8"><?php echo $row->father ?> </div>
                                     </div>
                                    
                                    
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                          <?php endforeach ?>
                          
                        </tbody>
                      </table>
                  </div>
                     
                </div>

            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>
<!--main content end--> 