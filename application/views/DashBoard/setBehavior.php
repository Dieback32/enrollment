<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h3 class="page-header">
					<i class="fa fa fa-bars"></i> Set Behavior
				</h3>
			</div>
		</div>
		<!-- page start-->
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading"></header>
					<div class="panel-body">
						<form action="<?php echo base_url()?>index.php/Dashboard/saveBehavior" method="post">
							<input type="hidden" name="studentId" value="<?php echo $studentId?>">
							<input type="hidden" name="q" value="<?php echo $q?>">
								<div class="col-md-12">
								<h1 style="text-transform: capitalize"><?php echo $student[0]['lastName'].', '.$student[0]['firstName'].' '.$student[0]['Mi'];?></h1>
								<hr>
							</div>
							<div class="col-md-4">
								<h4><b>1. Maka Diyos</b> </h4>
								<div class="field">
									<label for="">Expresses ones spiritual belief while repsecting the
										spiritual belief of others.</label>
									<select name="d1" class="form-control" required>
										<option value="">Select</option>
										<option <?php if(@$behavior[0]['d1'] == 'AO') echo 'selected'?> value="AO">AO - Always Observed</option>
										<option <?php if(@$behavior[0]['d1'] == 'SO') echo 'selected'?> value="SO">SO - Sometimes Observed</option>
										<option <?php if(@$behavior[0]['d1'] == 'RO') echo 'selected'?> value="RO">RO - Rarely Observed</option>
										<option <?php if(@$behavior[0]['d1'] == 'NO') echo 'selected'?> value="NO">NO - Not Observed</option>
									</select>
<!--									<input type="text" class="form-control" name="d1" required value="--><?php //echo @$behavior[0]['d1']?><!--">-->
								</div>
								<br>
								<div class="field">
									<label for="">Shows adherence to ethical principles by upholding the
										truth in all undertaking.</label>
									<select name="d2" class="form-control" required>
										<option value="">Select</option>
										<option <?php if(@$behavior[0]['d2'] == 'AO') echo 'selected'?> value="AO">AO - Always Observed</option>
										<option <?php if(@$behavior[0]['d2'] == 'SO') echo 'selected'?> value="SO">SO - Sometimes Observed</option>
										<option <?php if(@$behavior[0]['d2'] == 'RO') echo 'selected'?> value="RO">RO - Rarely Observed</option>
										<option <?php if(@$behavior[0]['d2'] == 'NO') echo 'selected'?> value="NO">NO - Not Observed</option>
									</select>
<!--									<input type="text" class="form-control" name="d2"  required value="--><?php //echo @$behavior[0]['d2']?><!--">-->
								</div>
								<br>
								<h4><b>2. Maka Tao </b></h4>
								<div class="field">
									<label for="">Is sensitive to individual to individual, social and
										cultural differences: resists stereotyping people.</label>
									<select name="t1" class="form-control" required>
										<option value="">Select</option>
										<option <?php if(@$behavior[0]['t1'] == 'AO') echo 'selected'?> value="AO">AO - Always Observed</option>
										<option <?php if(@$behavior[0]['t1'] == 'SO') echo 'selected'?> value="SO">SO - Sometimes Observed</option>
										<option <?php if(@$behavior[0]['t1'] == 'RO') echo 'selected'?> value="RO">RO - Rarely Observed</option>
										<option <?php if(@$behavior[0]['t1'] == 'NO') echo 'selected'?> value="NO">NO - Not Observed</option>
									</select>
<!--									<input type="text" class="form-control" name="t1" required value="--><?php //echo @$behavior[0]['t1']?><!--">-->
								</div>
								<br>
								<div class="field">
									<label for="">Demonstrate contributions towards solidarity.</label>
									<select name="t2" class="form-control" required>
										<option value="">Select</option>
										<option <?php if(@$behavior[0]['t2'] == 'AO') echo 'selected'?> value="AO">AO - Always Observed</option>
										<option <?php if(@$behavior[0]['t2'] == 'SO') echo 'selected'?> value="SO">SO - Sometimes Observed</option>
										<option <?php if(@$behavior[0]['t2'] == 'RO') echo 'selected'?> value="RO">RO - Rarely Observed</option>
										<option <?php if(@$behavior[0]['t2'] == 'NO') echo 'selected'?> value="NO">NO - Not Observed</option>
									</select>
<!--									<input type="text" class="form-control" name="t2" required value="--><?php //echo @$behavior[0]['t2']?><!--">-->
								</div>
							</div>
							<div class="col-md-4">
								<h4><b>3. Maka Kalikasan</b> </h4>
								<div class="field">
									<label for=""> Cares for the Environment and utilized resources
										wisely. judisciousely, and economically.</label>
									<select name="k1" class="form-control" required>
										<option value="">Select</option>
										<option <?php if(@$behavior[0]['k1'] == 'AO') echo 'selected'?> value="AO">AO - Always Observed</option>
										<option <?php if(@$behavior[0]['k1'] == 'SO') echo 'selected'?> value="SO">SO - Sometimes Observed</option>
										<option <?php if(@$behavior[0]['k1'] == 'RO') echo 'selected'?> value="RO">RO - Rarely Observed</option>
										<option <?php if(@$behavior[0]['k1'] == 'NO') echo 'selected'?> value="NO">NO - Not Observed</option>
									</select>
<!--									<input type="text" class="form-control" name="k1" required value="--><?php //echo @$behavior[0]['k1']?><!--">-->
								</div>
								<br>
								<div class="field">
									<label for="">Demonstrate pride in being filipino, exercise the rights
										and responsibility of a filipino citizen
										.</label>
									<select name="k2" class="form-control" required>
										<option value="">Select</option>
										<option <?php if(@$behavior[0]['k2'] == 'AO') echo 'selected'?> value="AO">AO - Always Observed</option>
										<option <?php if(@$behavior[0]['k2'] == 'SO') echo 'selected'?> value="SO">SO - Sometimes Observed</option>
										<option <?php if(@$behavior[0]['k2'] == 'RO') echo 'selected'?> value="RO">RO - Rarely Observed</option>
										<option <?php if(@$behavior[0]['k2'] == 'NO') echo 'selected'?> value="NO">NO - Not Observed</option>
									</select>
<!--									<input type="text" class="form-control" name="k2" required value="--><?php //echo @$behavior[0]['k2']?><!--">-->
								</div>
								<br>
								<h4><b>4. Maka Bansa  </b></h4>
								<div class="field">
									<label for="">Demonstrate pride in being filipino, exercise the rights
										and responsibility of a filipino citizen.</label>
									<select name="b1" class="form-control" required>
										<option value="">Select</option>
										<option <?php if(@$behavior[0]['b1'] == 'AO') echo 'selected'?> value="AO">AO - Always Observed</option>
										<option <?php if(@$behavior[0]['b1'] == 'SO') echo 'selected'?> value="SO">SO - Sometimes Observed</option>
										<option <?php if(@$behavior[0]['b1'] == 'RO') echo 'selected'?> value="RO">RO - Rarely Observed</option>
										<option <?php if(@$behavior[0]['b1'] == 'NO') echo 'selected'?> value="NO">NO - Not Observed</option>
									</select>
<!--									<input type="text" class="form-control" name="b1" required value="--><?php //echo @$behavior[0]['b1']?><!--">-->
								</div>
								<br>
								<div class="field">
									<label for="">Demonstrate appropriate Behaviourin carryingout
										activities in the school, community & country.
									</label>
									<select name="b2" class="form-control" required>
										<option value="">Select</option>
										<option <?php if(@$behavior[0]['b2'] == 'AO') echo 'selected'?> value="AO">AO - Always Observed</option>
										<option <?php if(@$behavior[0]['b2'] == 'SO') echo 'selected'?> value="SO">SO - Sometimes Observed</option>
										<option <?php if(@$behavior[0]['b2'] == 'RO') echo 'selected'?> value="RO">RO - Rarely Observed</option>
										<option <?php if(@$behavior[0]['b2'] == 'NO') echo 'selected'?> value="NO">NO - Not Observed</option>
									</select>
<!--									<input type="text" class="form-control" name="b2" required value="--><?php //echo @$behavior[0]['b2']?><!--">-->
								</div>
							</div>
							<div class="col-md-4">
								<h4><b>Marking Non-Numerical Rating</b></h4>
								<ul>
									<li>AO - Always Observed</li>
									<li>SO - Sometimes Observed</li>
									<li>RO - Rarely Observed</li>
									<li>NO - Not Observed</li>
								</ul>


							</div>
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary">Save Behavior</button>
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
