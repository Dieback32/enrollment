<!--main content start-->
<style>



#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}


input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finished {
  background-color: #4CAF50;
}
</style>

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
						<br>
						<b style="text-align: center"><h1> Enrollment Form</h1></b>
						<br>
					</header>
					<div class="panel-body">
						<?php
						$str = '000001';
						$this->db->select('id');
						$this->db->where('role', 'student');
						$this->db->order_by('id', "desc")->limit(1);
						$query = $this->db->get('accounts');
						$result = $query->row();
						if (isset($result->id)) {
							$str = $result->id;
							$numbers = preg_replace('/[^0-9]/', '', $str);
							$letters = preg_replace('/[^a-zA-Z]/', '', $str);
							$numbers;
							$my_id = (int)$numbers + 1;
							if ($my_id < 10) {
								$new_id = 'E0000' . $my_id;
							} else if ($my_id < 100) {
								$new_id = 'E000' . $my_id;
							} else if ($my_id < 100) {
								$new_id = 'E00' . $my_id;
							} else {
								$new_id = 'E0' . $my_id;
							}

						} else {
							$new_id = 'E00001';
						}
						?>

						<form method="POST" id="regForm" action="<?php echo site_url(); ?>/DashBoard/setStudent"
						      data-toggle="validator" class="form-horizontal" role="form">
							<!-- <div class="col-md-6"> -->
								<div class="tab">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">ID Number</label>
									<div class="col-sm-10">
										<input value="<?php echo $new_id ?>" type="text" name="id" data-minlength="2"
										       pattern="^[_A-z0-9]{1,}$" class="form-control" id="" placeholder="ID"
										       readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('email') ?>" type="email" name="email"
										       class="form-control" id="" placeholder="Email" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
									<div class="col-sm-10">
										<input value="" type="password" name="password" class="form-control"
										       data-minlength="6" id="inputPassword" placeholder="Password" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
									<div class="col-sm-10">
										<input value="" type="password" name="cpassword" class="form-control"
										       id="inputPasswordConfirm" data-match="#inputPassword"
										       placeholder="Confirm Password">
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<input name="role" type="hidden" value="student">

							</div>
							<div class="tab">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Lastname</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('lname') ?>" type="text" name="lname"
										       pattern="[A-Za-z]+" class="form-control" id="" placeholder="Lastname"
										       required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('fname') ?>" type="text"
										       name="fname" class="form-control" id="" placeholder="First name"
										       required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Middle Name</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('mi') ?>"
										       type="text" name="mi" class="form-control" id="" placeholder="MI"
										       required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Address</label>
									<div class="col-sm-10">
										<textarea name="address" class="form-control" placeholder="Address" rows="3"
										          required><?php echo set_value('address') ?></textarea>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('contact') ?>" pattern="^\d{11}$"
										       maxlength="11" name="contact" class="form-control" id=""
										       placeholder="Contact Number" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
							</div>
							<!-- </div> -->
							<!-- <div class="col-md-6"> -->
								<div class="tab">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Birthdate</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('birthdate') ?>" type="text" name="birthdate"
										       class="form-control" id="date" data-date-format="yyyy-mm-dd"
										       placeholder="Birthdate" readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Age</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('age') ?>" type="text"
										       name="age" class="form-control" id="" placeholder="Age"
										       required>
										<div class="help-block with-errors"></div>
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">Place of Birth</label>
									<div class="col-sm-10">
										<input value="<?php echo set_value('place_birth') ?>" type="text"
										       name="place_birth" class="form-control" id=""
										       placeholder="Place of Birth" required>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-2">Gender</label>
									<div class="col-md-10">
										<select name="gender" class="form-control" required>
											<option value="<?php echo set_value('gender') ?>"><?php echo set_value('gender') ?></option>
											<option value="male">Male</option>
											<option value="female">Female</option>
										</select>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								</div>
								<div class="tab">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Parents/ Guardian</label>
                                        <div class="col-sm-10">
                                            <input value="<?php echo set_value('mother') ?>" type="text" name="mother"
                                                   class="form-control" id="" placeholder="Guadian" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Occupation</label>
                                        <div class="col-sm-10">
                                            <input value="<?php echo set_value('m_occupation') ?>" type="text"
                                                   name="m_occupation" class="form-control" id="" placeholder="Occupation"
                                                   required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Tracks</label>
                                        <div class="col-md-10">
                                            <select name="tracks" class="form-control" readonly="readonly">
                                                <?php foreach ($tracks as $track): ?>
                                                    <option value="<?php echo $track->id; ?>"><?php echo $track->track_name ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">School last attended</label>
                                        <div class="col-md-10">
                                            <select name="schoolType" class="form-control" readonly="readonly">
                                                <option value="1">Private</option>
                                                <option value="2">Public</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-2">LRN</label>
                                        <div class="col-md-10">
                                            <input name="lrn" value="<?php echo set_value('lrn') ?>" type="number"
                                                    class="form-control" id="" placeholder="Student LRN"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Grade Level</label>
                                        <select name="gradelvl" id="">
<!--                                            --><?php //foreach ($gradelvl as $level): ?>
                                            <option><?php echo $gradelvl[0]->grade;?></option>
<!--                                            --><?php //endforeach;?>
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2">Section</label>
                                        <div class="col-md-10">
                                            <select name="grade_section" class="form-control" required>
                                                <option value="0">None</option>
                                                <?php $grade = $gradelvl[0]->grade; ?>
                                                <?php foreach ($getSection as $section): ?>
                                                    <?php if ($section->grade_level == $grade): ?>
                                                        <?php
                                                        $this->db->from('student_info');
                                                        $this->db->where('section', $section->section);
                                                        $query = $this->db->get();
                                                        $rowcount = $query->num_rows();
                                                        ?>

                                                        <?php if ($section->max > $rowcount): ?>
                                                            <option value="<?php echo $section->section; ?>" <?php if ($section->section == $details->section) {
                                                                echo 'selected';
                                                            } ?>><?php echo $section->section ?></option>
                                                        <?php endif ?>

                                                    <?php endif ?>

                                                <?php endforeach ?>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
<!--                                    <div class="col-md-6">-->
<!--

                                    <input value="accepted" name="status" type="hidden">
                                    <input value="0" name="grade" type="hidden">
                                    <input value="0" name="grade_section" type="hidden">
<!--								</div>-->
							<!-- </div> -->
						<!-- 	<div class="col-md-6 col-md-offset-6">
								<div class="form-group">
									<div class="col-md-6 col-md-offset-6">
										<button type="submit" class="btn btn-primary" style="width:100%">Save</button>
									</div>
								</div>
							</div> -->


							  <div style="overflow:auto;">
							    <div style="float:right;">
							      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
							      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
							    </div>
							  </div>
							  <div class="row"></div>
							  <!-- Circles which indicates the steps of the form: -->
							  <div style="text-align:center;margin-top:40px;">
							    <span class="step"></span>
							    <span class="step"></span>
							    <span class="step"></span>
							    <span class="step"></span>	
							  </div>

						</form>
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<!--main content end-->

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finished";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>