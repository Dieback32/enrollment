<?php if ($this->session->flashdata('error')) { ?>
    <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
<?php } ?>
<?php if ($this->session->flashdata('success')) { ?>
    <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
<?php } ?>
<div class="header">
	     <div class="container-fluid">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="#">Enrollment</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="profile.html">Profile</a></li>
	                          <li><a href="<?php echo site_url();?>/Authentication/logout">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="<?php echo site_url()?>/DashBoard"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Page
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            
                            <li><a href="<?php echo site_url()?>/DashBoard/addPage">Add New Page</a></li>
                            <li><a href="<?php echo site_url()?>/DashBoard/staticPage">Static Page</a></li>
                            <li><a href="<?php echo site_url()?>/DashBoard/page">List of Page</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Accounts
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="<?php echo site_url()?>/DashBoard/accountList"></i> Account List</a></li>
                            <li><a href="<?php echo site_url()?>/DashBoard/addAccount">Add Account</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url()?>/DashBoard/profile"><i class="glyphicon glyphicon-user"></i> Profie</a></li>
                </ul>
             </div>
		  </div>
