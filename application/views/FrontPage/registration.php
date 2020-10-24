<div id="fh5co-team-section">
	<div class="container">
		<div class="row about">
			<div class="col-md-12">
				<?php if (!isset($check->status) || $check->status == 0): ?>
				<br><br><br><br>
                       <center> <h1>Sorry, Enrollment is Now Close. </h1></center>
                 <?php else: ?>
				<br><br>
				<h2 class="text-center">Online Registration</h2>
				<br>
				<div class="row">
					<form method="POST" id="addAccount" action="<?php echo site_url(); ?>/FrontPage/setStudent" data-toggle="validator" class="form-horizontal" role="form">
			              <div class="col-md-6">
			                  <input name="role" type="hidden" value="student">			              
			              <div class="form-group">
			                <label for="inputEmail3" class="col-sm-2 control-label">Lastname</label>
			                <div class="col-sm-10">
			                  <input value="<?php echo set_value('lname') ?>" pattern="[A-Za-z]+" type="text" name="lname" class="form-control" id="" placeholder="Lastname" required>
			                  <div class="help-block with-errors"></div>
			                </div>
			              </div>
			              <div class="form-group">
			                <label for="inputEmail3" class="col-sm-2 control-label">Firstname</label>
			                <div class="col-sm-10">
			                  <input value="<?php echo set_value('fname') ?>" pattern="[A-Za-z]+" type="text" name="fname" class="form-control" id="" placeholder="First name" required>
			                  <div class="help-block with-errors"></div>
			                </div>
			              </div>
			              <div class="form-group">
			                <label for="inputEmail3" class="col-sm-2 control-label">MI</label>
			                <div class="col-sm-10">
			                  <input value="<?php echo set_value('mi') ?>" pattern="[A-Za-z]+" maxlength="2" type="text" name="mi" class="form-control" id="" placeholder="MI" required>
			                  <div class="help-block with-errors"></div>
			                </div>
			              </div>
			              <div class="form-group">
			                <label class="col-sm-2 control-label">Address</label>
			                <div class="col-sm-10">
			                  <textarea name="address" class="form-control" placeholder="Address" rows="3" required><?php echo set_value('address') ?></textarea>
			                  <div class="help-block with-errors"></div>
			                </div>
			              </div>
			              <div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Contact Number</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo set_value('contact') ?>" pattern="^\d{11}$" maxlength="11" type="text" name="contact" class="form-control" id="" placeholder="Contact Number" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			            	</div>  
				          	<div class="form-group">
	                          <label class="control-label col-md-2">Grade Level</label>
	                          <div class="col-md-10">
	                            <select name="grade" class="form-control" required>
	                            	<option value="<?php echo set_value('grade') ?>"><?php echo set_value('grade') ?></option>
	                              <?php foreach ($getGrade as $level): ?>
	                                  <option value="<?php echo $level->grade; ?>"><?php echo $level->grade; ?></option>
	                              <?php endforeach ?>
	                            </select>
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
				         <div class="col-md-6">
				         	
				         	<div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Birthdate</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo set_value('birthdate') ?>" type="text" name="birthdate" class="form-control" id="date" data-date-format="yyyy-mm-dd" placeholder="Birthdate" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			            	</div>
			            	<div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Place of Birth</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo set_value('place_birth') ?>" type="text" name="place_birth" class="form-control" id="" placeholder="Place of Birth" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			            	</div>
			            	
			            	<div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Parent/ Guardian</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo set_value('mother') ?>" type="text" name="mother" class="form-control" id="" placeholder="Parent/ Guardian" required>
			                    <div class="help-block with-errors"></div>
			                  </div>
			            	</div>
			            	<div class="form-group">
			                  <label for="inputEmail3" class="col-sm-2 control-label">Occupation</label>
			                  <div class="col-sm-10">
			                    <input value="<?php echo set_value('m_occupation') ?>" type="text" name="m_occupation" class="form-control" id="" placeholder="Occupation" required>
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
			            	<input value="reserved" name="status" type="hidden">
				         </div>
				            <div class="col-md-12">
				              <div class="form-group">
				                <div class="col-md-offset-3 col-md-6">
				                  <button type="submit" class="btn btn-primary" style="width:100%" >Register</button>
				                </div>
				              </div>
				            </div>
				        </form>	
				</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>