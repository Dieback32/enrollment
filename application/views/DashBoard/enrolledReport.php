<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa fa-bars"></i> Payment Report</h3>
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
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th>User ID</th>
                            <th>Amount</th>
                            <th>Grade Level</th>
                            <th>Date of Payment</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($report as $row): ?>
                              <tr>
                                <td><?php echo $row->user_id ?></td>
                                <td><?php echo $row->amount ?></td>
                                <td><?php echo $row->grade ?></td>
                                <td><?php echo $row->date ?></td>
                              </tr>
                            
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