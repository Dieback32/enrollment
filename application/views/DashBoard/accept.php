<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
		<div class="col-lg-12">
			<h3 class="page-header"><i class="fa fa fa-bars"></i> Add Student</h3>
		</div>
	</div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    
                </header>
                <div class="panel-body">
                	<?php
                	$str =  '000001';
                    $this->db->select('id');
                    $this->db->where('role', 'student');
                    $this->db->order_by('id',"desc")->limit(1);
                    $query = $this->db->get('accounts');
                    $result = $query->row();
                    if (isset($result->id)) {
                    	$str =  $result->id;
	                    $numbers = preg_replace('/[^0-9]/', '', $str);
	                    $letters = preg_replace('/[^a-zA-Z]/', '', $str);
	                    $numbers;
	                    $my_id = (int) $numbers + 1;
	                    if ($my_id < 10) {
	                    	$new_id = 'E0000'.$my_id;
	                    }else if($my_id < 100){
	                    	$new_id = 'E000'.$my_id;
	                    }else if($my_id < 100){
	                    	$new_id = 'E00'.$my_id;
	                    }else{
	                    	$new_id = 'E0'.$my_id;
	                    }
                    	
                    }else{
                    	$new_id = 'E00001';
                    }
                    ?>
                  <form method="POST" id="addAccount" action="<?php echo site_url(); ?>/DashBoard/setStudent" data-toggle="validator" class="form-horizontal" role="form">
			              <div class="col-md-6">
			              	<input type="hidden" value="<?php echo $info->id ?>" name="del_id">
			              	<div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">ID Number</label>
                              <div class="col-sm-10">
                                <input value="<?php echo $new_id ?>" type="text" name="id" data-minlength="2" pattern="^[_A-z0-9]{1,}$" class="form-control" id="" placeholder="ID" readonly>
                                <div class="help-block with-errors"></div>
                              </div>
                            </div>
			                <div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo set_value('email') ?>" type="email" name="email" class="form-control" id="" placeholder="Email" required>
			                  	<div class="help-block with-errors"></div>
			                  </div>
			                </div>
			                <div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
			                  <div class="col-sm-10">
			                    <input value="" type="password" name="password" class="form-control" data-minlength="6" id="inputPassword" placeholder="Password" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			                </div>
			                <div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
			                  <div class="col-sm-10">
			                    <input value="" type="password" name="cpassword" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" placeholder="Confirm Password">
			                    <div class="help-block with-errors"></div>
			                  </div>
			                </div>
			                  <input name="role" type="hidden" value="student">			              
			              <div class="form-group">
			                <label for="inputEmail3" class="col-sm-2 control-label">Lastname</label>
			                <div class="col-sm-10">
			                  <input value="<?php echo $info->last_name ?>" type="text" name="lname" class="form-control" id="" pattern="[A-Za-z]+" placeholder="Lastname" required>
			                  <div class="help-block with-errors"></div>
			                </div>
			              </div>
			              <div class="form-group">
			                <label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>
			                <div class="col-sm-10">
			                  <input value="<?php echo $info->first_name ?>" type="text"  name="fname" class="form-control" id="" placeholder="First name" required>
			                  <div class="help-block with-errors"></div>
			                </div>
			              </div>
			              <div class="form-group">
			                <label for="inputEmail3" class="col-sm-2 control-label">MI</label>
			                <div class="col-sm-10">
			                  <input value="<?php echo $info->mi ?>" pattern="[A-Za-z]+" maxlength="2" type="text" name="mi" class="form-control" id="" placeholder="MI" required>
			                  <div class="help-block with-errors"></div>
			                </div>
			              </div>
			              <div class="form-group">
			                <label class="col-sm-2 control-label">Address</label>
			                <div class="col-sm-10">
			                  <textarea name="address" class="form-control" placeholder="Address" rows="3" required><?php echo $info->address ?></textarea>
			                  <div class="help-block with-errors"></div>
			                </div>
			              </div>
			              <div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo $info->contact ?>" pattern="^\d{11}$" maxlength="11" name="contact" class="form-control" id="" placeholder="Contact Number" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			            	</div>  
				          
				         </div>
				         <div class="col-md-6">
				         	<input value="0" name="grade" type="hidden">
			            	<input value="0" name="grade_section" type="hidden">
				         	<div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Birthdate</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo $info->birthdate ?>" type="text" name="birthdate" class="form-control" id="date" data-date-format="yyyy-mm-dd" placeholder="Birthdate" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			            	</div>
			            	<div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Place of Birth</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo $info->place_birth ?>" type="text" name="place_birth" class="form-control" id="" placeholder="Place of Birth" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			            	</div>
			            	<div class="form-group">
			                  <label class="control-label col-md-2">Gender</label>
			                  <div class="col-md-10">
			                    <select name="gender" class="form-control" required>
			                      <option value="<?php echo $info->gender ?>"><?php echo $info->gender ?></option>
			                      <option value="male">Male</option>
			                      <option value="female">Female</option>
			                    </select>
			                    <div class="help-block with-errors"></div>
			                  </div>
			                </div>
			            	<div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Mother</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo $info->mother ?>" type="text" name="mother" class="form-control" id="" placeholder="Mother" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			            	</div>
			            	<div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Occupation</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo $info->m_occu ?>" type="text" name="m_occupation" class="form-control" id="" placeholder="Occupation" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			            	</div>
			            	<div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Father</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo $info->father ?>" type="text" name="father" class="form-control" id="" placeholder="Father" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			            	</div>
			            	<div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Occupation</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo $info->f_occu ?>" type="text" name="f_occupation" class="form-control" id="" placeholder="Occupation" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			            	</div>
			            	<!-- <div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Tracks</label>
			                  <div class="col-sm-10">
			                    <input value="<?php //echo $info->tracks ?>" type="text" name="tracks" class="form-control" id="" placeholder="Occupation" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			            	</div> -->
			            	<input value="accepted" name="status" type="hidden">
				         </div>
				            <div class="col-md-12">
				              <div class="form-group">
				                <div class="col-md-offset-3 col-md-6">
				                  <button type="submit" class="btn btn-primary" style="width:100%" >Save</button>
				                </div>
				              </div>
				            </div>
				        </form>	 
				        </div>
                </div>
            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>
<!--main content end-->
						 				
