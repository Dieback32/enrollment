<?php 
require 'core/init.php';
// error_reporting(0);
if(!empty($_POST)){
    $user = new user();
    $qqpq = $_POST['qs-qa1'];
    $qps = ($qqpq /  $_POST['qs-qq']) * 100.0 ;
    $qws = $qps * 0.20;
    try {
        $user->update(array(
            'qq1'     => input::get('qs-qa1'),
            'qtotal_items' => input::get('qs-qq'),
            'qWS'     => $qws,
            'qPS'     => $qps,

            ),$_GET['view'],'userID','first');     
             redirect::to("firstq.php?view=" .  $_GET['view'] ); 
    }catch(Exception $e){
        die($e->getMessage());
    }

    
}
?>
<section id="main-content">
  <section class="wrapper">

      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    
                </header>
                <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <h3></h3>
                        <table class="table table-striped table-hover">
                          <thead>
                        <tr>
                            <th class="success">Learner's Name</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php 
                $user = new user();
                if (isset($_GET['searchStudent'])):
                    foreach ($user->searchStudent($_GET['searchStudent']) as $r):
                        ?>
                    <tr>
                        <td><?php echo $r->full_name ?></td>
                    </tr>
                    <?php
                    endforeach; 
                else:
                    foreach ($user->studentView() as $u):
                            ?>
                        <tr>
                            <td> <a href="firstq.php?view=<?php echo $u->student_id; ?>"><?php echo $u->full_name ?></a> 
                            </td>
                        </tr>

                        <?php 
                        endforeach;
                        endif;
                        ?> 
                  
                    </tbody>
                        </table>
                      </div>                                               
                      </div>
                    </div>                  
                </div>
            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>
<!--main content end