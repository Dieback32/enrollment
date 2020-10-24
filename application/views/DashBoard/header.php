<?php if ($this->session->flashdata('error')) { ?>
	<div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('success')) { ?>
	<div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
<?php } ?>
<!--header start-->

<header class="header dark-bg">
	<div class="toggle-nav">
		<div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i
					class="icon_menu"></i></div>
	</div>

	<!--logo start-->
	<a href="#" class="logo">Dashboard <span class="lite"></span></a>
	<!--logo end-->
	<div class="nav search-row" id="top_menu">
		<!--  search form start -->
		<ul class="nav top-menu">
			<li>
				<a href="<?php echo site_url(); ?>" title=""><span class="lite">Visit Site</span></a>
			</li>
		</ul>
		<!--  search form end -->
	</div>

	<div class="top-nav notification-row">
		<!-- notificatoin dropdown start-->
		<ul class="nav pull-right top-menu">

			<!-- task notificatoin start -->
			<!-- alert notification end-->
			<!-- user login dropdown start-->
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="profile-ava">
                        <i class="icon_profile"> </i><?php echo $userInfo->firstName . ' ' . $userInfo->lastName; ?>
                    </span>
					<span class="username"></span>
					<b class="caret"></b>
				</a>
				<ul class="dropdown-menu extended logout">
					<div class="log-arrow-up"></div>
					<li class="eborder-top">
						<a href="<?php echo site_url() ?>/DashBoard/profile"><i class="icon_profile"></i> My Profile</a>
					</li>
					<li>
						<a href="<?php echo site_url(); ?>/Authentication/logout"><i class="icon_key_alt"></i> Log
							Out</a>
					</li>

				</ul>
			</li>
			<!-- user login dropdown end -->
		</ul>
		<!-- notificatoin dropdown end-->
	</div>
</header>
<!--header end-->

<!--sidebar start-->
<aside>
	<div id="sidebar" class="nav-collapse ">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu">
			<li class="">
				<a class="" href="<?php echo site_url() ?>/DashBoard">
					<i class="icon_house_alt"></i>
					<span>Dashboard</span>
				</a>
			</li>
			<?php if ($this->session->userdata('role') == 'admin'): ?>
				<li class="sub-menu">
					<a href="javascript:;" class="">
						<i class="icon_document_alt"></i>
						<span>Page</span>
						<span class="menu-arrow arrow_carrot-right"></span>
					</a>
					<ul class="sub">

						<li><a href="<?php echo site_url() ?>/DashBoard/addPage">Add New Page</a></li>
						<li><a href="<?php echo site_url() ?>/DashBoard/pageMenu">Page Menu</a></li>
						<li><a href="<?php echo site_url() ?>/DashBoard/page">List of Page</a></li>
						<li><a href="<?php echo site_url() ?>/DashBoard/staticPage"> Main Content </a></li>

					</ul>
				</li>
			<?php endif ?>
			<?php if ($this->session->userdata('role') == 'registrar' || $this->session->userdata('role') == 'asstreg'): ?>
				<li class="sub-menu">
					<a href="javascript:;" class="">
						<i class="icon_document_alt"></i>
						<span>School</span>
						<span class="menu-arrow arrow_carrot-right"></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo site_url() ?>/DashBoard/summer">Summer</a></li>
						<li><a href="<?php echo site_url() ?>/DashBoard/gradeLevel">Grade Level</a></li>
						<li><a href="<?php echo site_url() ?>/DashBoard/section">Sections</a></li>
						<li><a href="<?php echo site_url() ?>/DashBoard/addTracks">Strand</a></li>
						<li><a href="<?php echo site_url() ?>/DashBoard/subject">Subject</a></li>
					</ul>
				</li>
			<?php endif ?>
			<?php if ($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'registrar' || $this->session->userdata('role') == 'asstreg'): ?>
				<li class="sub-menu">
					<a href="javascript:;" class="">
						<i class="icon_desktop"></i>
						<span>Accounts</span>
						<span class="menu-arrow arrow_carrot-right"></span>
					</a>
					<ul class="sub">

						<?php if ($this->session->userdata('role') == 'admin'): ?>
							<li><a href="<?php echo site_url() ?>/DashBoard/addAccount">Add Cashier</a></li>
							<li><a href="<?php echo site_url() ?>/DashBoard/addRegistrar">Add Registrar</a></li>
							<li><a href="<?php echo site_url() ?>/DashBoard/addTreasurer">Add Accounting</a></li>
							<li><a href="<?php echo site_url() ?>/DashBoard/addPrincipal">Add Principal</a></li>
							<li><a href="<?php echo site_url() ?>/DashBoard/addPresident">Add President</a></li>
						<?php endif ?>
						<?php if ($this->session->userdata('role') == 'registrar' || $this->session->userdata('role') == 'asstreg'): ?>
							<?php if ($this->session->userdata('role') != 'asstreg') : ?>
								<li><a href="<?php echo site_url() ?>/DashBoard/addAsstreg">Add Asst Registrar</a></li>
							<?php endif ?>
							<li><a href="<?php echo site_url() ?>/DashBoard/addFaculty">Add Faculty</a></li>
						<?php endif ?>
						<li><a href="<?php echo site_url() ?>/DashBoard/accountList"> Account List</a></li>
					</ul>
				</li>
			<?php endif ?>
			<?php if ($this->session->userdata('role') == 'registrar' || $this->session->userdata('role') == 'asstreg'): ?>
				<li class="sub-menu">
					<a href="javascript:;" class="">
						<i class="icon_desktop"></i>
						<span>Students</span>
						<span class="menu-arrow arrow_carrot-right"></span>
					</a>
					<ul class="sub">

						<li><a href="<?php echo site_url() ?>/DashBoard/studentList"> Student List</a></li>
						<?php
						$query = $this->db->get_where('enrollment', array('id' => 1));
						$check = $query->row();
						?>
						<?php if (isset($check->status) && $check->status == 1): ?>
							<li><a href="<?php echo site_url() ?>/DashBoard/addStudent">Add Student</a></li>
							<li><a href="<?php echo site_url() ?>/DashBoard/notEnrolled">Not Enrolled</a></li>
							<li><a href="<?php echo site_url() ?>/DashBoard/reservation">New Stud Reservation</a></li>
						<?php endif ?>

					</ul>
				</li>
			<?php endif; ?>

			<?php if ($this->session->userdata('role') == 'cashier' || $this->session->userdata('role') == 'treasurer'): ?>
				<li>
					<a href="<?php echo site_url() ?>/DashBoard/studentList">
						<i class="icon_profile"></i>
						<span>Student List</span>
					</a>
				</li>
				<li>
					<a href="<?php echo site_url() ?>/DashBoard/summerList">
						<i class="icon_profile"></i>
						<span>Summer Enrollee</span>
					</a>
				</li>
			<?php endif ?>

			<?php if ($this->session->userdata('role') == 'treasurer'): ?>
				<li class="sub-menu">
					<a href="javascript:;" class="">
						<i class="icon_desktop"></i>
						<span>Fees</span>
						<span class="menu-arrow arrow_carrot-right"></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo site_url() ?>/DashBoard/gradeFee">Grade Level Fees </a></li>
						<li><a href="<?php echo site_url() ?>/DashBoard/tuition"> Tution Fees</a></li>
						<li><a href="<?php echo site_url() ?>/DashBoard/bookFee">Book Fees </a></li>
					</ul>
				</li>
				<li>
					<a class="" href="<?php echo site_url() ?>/vouchers">
						<i class="icon_profile"></i>
						<span>Vouchers</span>
					</a>
				</li>
			<?php endif; ?>

			<li>
				<a class="" href="<?php echo site_url() ?>/DashBoard/profile">
					<i class="icon_profile"></i>
					<span>Profile</span>
				</a>
			</li>
			<?php if ($this->session->userdata('role') == 'treasurer' || $this->session->userdata('role') == 'cashier'): ?>
				<li>
					<a class="" href="<?php echo site_url() ?>/DashBoard/paymentReport">
						<i class="icon_profile"></i>
						<span>Payment Report</span>
					</a>
				</li>
			<?php endif ?>
			<?php if ($this->session->userdata('role') == 'registrar'): ?>
				<li>
					<a class="" href="<?php echo site_url() ?>/DashBoard/studentReport">
						<i class="icon_profile"></i>
						<span>Students Report</span>
					</a>

				</li>
			<?php endif ?>
			<?php if ($this->session->userdata('role') == 'faculty'): ?>
				<li>
					<a class="" href="<?php echo site_url() ?>/DashBoard/classAdviser">
						<i class="icon_profile"></i>
						<span>Class Adviser</span>
					</a>
				</li>
				<li>
					<a class="" href="<?php echo site_url() ?>/DashBoard/summerClass">
						<i class="icon_profile"></i>
						<span>Summer Class</span>
					</a>
				</li>
				<?php
				$sy = $this->db->get_where('enrollment', array('end' => 1))->row('sy');
				$semesters = $this->db->get_where('sy', array('sy' => $sy))->row('semesters');
				?>
				<li class="sub-menu">
					<a href="javascript:;" class="">
						<i class="icon_desktop"></i>
						<span>First Sem</span>
						<span class="menu-arrow arrow_carrot-right"></span>
					</a>
					<ul class="sub">
						<?php foreach (@$subjects1 as $sub1): ?>
							<li>
								<a href="<?php echo site_url() ?>/grading/index/<?php echo $sub1->id ?>/?sem=1"><?php echo $sub1->subject . ' - ' . $sy ?></a>
							</li>
						<?php endforeach ?>
					</ul>
				</li>
				<?php if ($semesters == '2'): ?>
					<li class="sub-menu">
						<a href="javascript:;" class="">
							<i class="icon_desktop"></i>
							<span>Second Sem</span>
							<span class="menu-arrow arrow_carrot-right"></span>
						</a>
						<ul class="sub">
							<?php foreach (@$subjects2 as $sub2): ?>
								<li>
									<a href="<?php echo site_url() ?>/grading/index/<?php echo $sub2->id ?>/?sem=2"><?php echo $sub2->subject . ' - ' . $sy ?></a>
								</li>
							<?php endforeach ?>
						</ul>
					</li>
				<?php endif ?>
			<?php endif ?>
			<?php if ($this->session->userdata('role') == 'admin'): ?>
				<li>
					<a class="" href="<?php echo site_url() ?>/DashBoard/logs">
						<i class="icon_desktop"></i>
						<span>Logs</span>
					</a>
				</li>
			<?php endif ?>
			<?php if ($this->session->userdata('role') == 'principal'): ?>

				<li class="sub-menu">
					<a href="javascript:;" class="">
						<i class="icon_desktop"></i>
						<span>Reports</span>
						<span class="menu-arrow arrow_carrot-right"></span>
					</a>
					<ul class="sub">
						<li><a class="" href="<?php echo site_url() ?>/DashBoard/viewStudentReport">Student Report</a>
						</li>
						<!--						<li><a class="" href="-->
						<?php //echo site_url() ?><!--/DashBoard/studentReport">Student Report</a></li>-->
						<!-- <li><a href="<?php echo site_url() ?>/DashBoard/studentList"> Student List</a></li> -->
						<li><a href="<?php echo site_url() ?>/DashBoard/paymentReport">Payment Report</a>
					</ul>
				</li>

			<?php endif ?>
			<?php if ($this->session->userdata('role') == 'president'): ?>
				<li class="sub-menu">
					<a href="javascript:;" class="">
						<i class="icon_desktop"></i>
						<span>Students</span>
						<span class="menu-arrow arrow_carrot-right"></span>
					</a>
					<ul class="sub">
						<li><a href="<?php echo site_url() ?>/DashBoard/studentWithBackAccount"> Back Account</a></li>
						<li><a href="<?php echo site_url() ?>/DashBoard/failedStudent"> Failures</a></li>
						<!--						<li><a href="-->
						<?php //echo site_url() ?><!--/DashBoard/studentList"> Student List</a></li>-->
						<!--						--><?php
						//						$query = $this->db->get_where('enrollment', array('id' => 1));
						//						$check = $query->row();
						//						?>
						<!--						-->
						<?php //if (isset($check->status) && $check->status == 1): ?><!--							-->
						<!--							<li><a href="-->
						<?php //echo site_url() ?><!--/DashBoard/notEnrolled">Not Enrolled</a></li>							-->
						<!--						--><?php //endif ?>

					</ul>
				</li>
			<?php endif; ?>


		</ul>
		<!-- sidebar menu end-->
	</div>
</aside>
<!--sidebar end-->