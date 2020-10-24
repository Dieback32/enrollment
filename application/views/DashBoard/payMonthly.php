<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
		<div class="col-lg-12">
      <div class="col-md-8">
        <h3 class="page-header"><i class="fa fa fa-bars"></i> Monthly Report (<?php echo $this->session->userdata('pmonth').' '.$this->session->userdata('pyear');?>)</h3>
      </div>
      <div class="col-md-4">
        <a href="<?php echo site_url()?>/dashBoard/paymentDaily" type="button" class="btn btn-primary">Daily Report</a>
        <a href="<?php echo site_url()?>/dashBoard/paymentMonthly" type="button" class="btn btn-primary">Monthly Report</a>
      </div>
			
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
                        <form action="<?php echo site_url(); ?>/DashBoard/getPayMonthly" method="POST" role="form" data-toggle="validator">
                          <div class="form-group">
                                    <div class="col-md-3">
                                      <select name="pmonth" class="form-control" required>
                                        <option value="01">Jan</option>
                                        <option value="02">Feb</option>
                                        <option value="03">Mar</option>
                                        <option value="04">Apl</option>
                                        <option value="05">May</option>
                                        <option value="06">Jun</option>
                                        <option value="07">Jul</option>
                                        <option value="08">Aug</option>
                                        <option value="09">Sep</option>
                                        <option value="10">Oct</option>
                                        <option value="11">Nov</option>
                                        <option value="12">Dec</option>
                                      </select>

                                      <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="col-md-3">
                                      <select name="pyear" class="form-control" required>
                                        <?php
                                          $years = range(2000, date('Y'));
                              $cur_year = date('Y');

                              
                              foreach($years as $year)
                                  if($year == $cur_year)
                                      echo "<option selected value='$year'>$year</option>"; 
                                  else
                                      echo "<option value='$year'>$year</option>";
                              

                                        ?>
                                      </select>

                                      <div class="help-block with-errors"></div>
                                    </div>

                                  </div>
                                    <div class="col-md-4">
                                      <button type="submit" class="btn btn-primary btn-block btn-flat">View Record Monthly</button>
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
                            <th>Full Name</th>
                            <th>Amount</th>
                            <th>Grade Level</th>
                            <th>Date of Payment</th>
                            <th>SY</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $total = 0?>
                          <?php foreach ($report as $row): ?>
                              <tr>
                                <td><?php echo $row->user_id ?></td>
                                <td><?php echo $row->lastName.', '. $row->firstName.' '.$row->Mi.'.' ?></td>
                                <td><?php echo $row->amount ?></td>
                                <td><?php echo $row->grade ?></td>
                                <td><?php echo $row->date ?></td>
                                <td><?php echo $row->sy ?></td>
                              </tr>
                              <?php $total = $row->amount + $total ?>
                            
                          <?php endforeach ?>
                          
                        </tbody>
                      </table>
                      <h4>Total Amount : <?php echo $total;?></h4>
                  </div>
                      <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="Print" />
                </div>

            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>
<!--main content end-->