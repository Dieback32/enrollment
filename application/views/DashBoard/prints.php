<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa fa-bars"></i> White Form</h3>
		</div>
	</div>
  <?php
    $email = $account->email;
    $id = $account->id;
    $lname = $info->lastName;
    $fname = $info->firstName;
    $mi = $info->Mi;
    $address = $info->address;
    $contact = $info->contactNumber;
    $grade = $details->grade;
    $bday = $details->birthdate;
    $bplace = $details->place_birth;
    $gender = $details->gender;
    $mother = $details->mother;
    $m_occu = $details->m_occupation;
    $father = $details->father;
    $f_occu = $details->f_occupation;
    $staus = $details->status;
    $section = $details->section;

    $s_last = $this->uri->total_segments();
    $myid = $this->uri->segment($s_last);
    $this->db->where('sy', $check->sy);
    $this->db->where('user_id', $myid);
    $bal = $this->db->get('student_account');
    $total = $bal->row();

  ?>
  <style type="text/css" media="screen">
    table{
      border: none !important;
    }
    .table thead > tr > th, .table tbody > tr > th, .table tfoot > tr > th, .table thead > tr > td, .table tbody > tr > td, .table tfoot > tr > td{
      border: none;
    }
  </style>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    
                </header>
                <div class="panel-body" id="printableArea">
                  <?php if (isset($total->total_amount)): ?>
                  <div class="white-form">
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
                        <h3>COMPUTER ARTS AND TECHNOLOGICAL COLLEGE, INC.L</h3>
                        <p>SY : <?php echo $check->sy ?></p>
                        <br>
                      </div>
                    </div>
                  </div>
                  <div class="row pay-data">
                    <table class="table" border="0">
                      
                      <tbody>
                        <tr colspan="2">
                          <td>
                            <table >
                              <tbody>
                                <tr>
                                  <td>Name </td>
                                  <td> : </td>
                                  <td><strong class="text-uppercase"> <?php echo $lname .', '.$fname.' '.$mi.'.' ?></strong></td>
                                </tr>
                                <tr>
                                  <td>Grade </td>
                                  <td> : </td>
                                  <td><strong class="text-uppercase"> <?php echo $grade ?></strong></td>
                                </tr>
                                <tr>
                                  <td>Section </td>
                                  <td> : </td>
                                  <td><strong class="text-uppercase"> <?php echo $section ?></strong></td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <?php
                              $this->db->where('grade_level', $grade);
                              $sub = $this->db->get('subject');
                              $subject = $sub->result();

                              ?>
                              <h4>Subjects</h4>
                              <table class="table  ">
                                <tbody>
                                  <?php foreach ($subject as $row): ?>
                                    <tr>
                                      <td><?php echo $row->subject ?></td>
                                    </tr>
                                  <?php endforeach ?>
                                </tbody>
                              </table>

                          </td>
                          <td>
                             <?php
                              $tui = $this->db->get('tuition');
                              $tuition = $tui->result();

                              $this->db->where('grade', $grade);
                              $book = $this->db->get('book_fee');
                              $books = $book->result();

                              $this->db->where('grade', $grade);
                              $fee = $this->db->get('grade_fee');
                              $fees = $fee->result();

                              $s_last = $this->uri->total_segments();
                              $myid = $this->uri->segment($s_last);
                              
                              $this->db->where('sy', $check->sy);
                              $this->db->where('user_id', $myid);
                              $bal = $this->db->get('student_account');
                              $total = $bal->row();
                              ?>
                              <h4> &nbsp;</h4>
                              <table class="table">
                                <tbody>
                                  <?php foreach ($tuition as $row): ?>
                                  <?php $t = 0 ?>
                                    <tr>
                                      <td><?php echo $row->for ?></td>
                                      <td><?php echo $row->amount ?></td>
                                    </tr>
                                    <?php $totalT = $t + $row->amount ?>
                                  <?php endforeach ?>
                                  <?php foreach ($books as $row): ?>
                                  <?php $b = 0 ?>
                                    <tr>
                                      <td>Books</td>
                                      <td><?php echo $row->amount ?></td>
                                    </tr>
                                    <?php $totalb = $b + $row->amount ?>
                                  <?php endforeach ?>
                                  <?php foreach ($fees as $row): ?>
                                    <tr>
                                      <td>Tuition for Grade <?php echo $grade?></td>
                                      <td><?php echo $row->amount ?></td>
                                    </tr>
                                  <?php endforeach ?>

                                  <?php if (isset($total->total_amount)): ?>
                                    <tr>
                                      <td>Back Account</td>
                                      <td><?php echo $total->back_account ?></td>
                                    </tr>
                                    <tr>
                                      <td>Total</td>
                                      <td><?php echo $total->total_amount ?></td>
                                    </tr>
                                  <?php endif ?>
                                    
                                </tbody>
                              </table>
                          </td>
                        </tr>
                        <tr class=" text-center signing">
                          <td>
                            <br><br>
                            <h4><u><?php echo $userInfo->firstName.' '.$userInfo->lastName; ?></u></h4>
                            <p>Registrar</p>
                          </td>
                          <td>
                            <br><br>
                             <?php 
                              $this->db->from('accounts');
                              $this->db->join('userinfo','userinfo.userID = accounts.id');
                              $this->db->where('role','treasurer');
                              $tre = $this->db->get();
                              $tres = $tre->row();
                              ?>
                              <h4><u><?php echo $tres->firstName.' '.$tres->lastName; ?></u></h4>
                              <p>Treasurer</p>

                          </td>
                        </tr>
                      </tbody>
                    </table>
                    
                  <div class="row text-center signing">
                      <div class="col-md-6">
                        
                      </div>
                      <div class="col-md-6">
                       
                      </div>
                    </div>

                  <?php else: ?>
                    <h3 class="text-center">Check your account to the Treasurer</h3>
                  <?php endif ?>
                  

                  
                </div>
                



            </section>
        </div>
      </div>
      <center><input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="Print" /></center>
      <!-- page end-->
  </section>
</section>
<!--main content end-->