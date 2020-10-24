<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Enrollment</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
    <!--     -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/icomoon.css">
    <!-- Superfish -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/superfish.css">
    <!-- Flexslider -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/flexslider.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link href="<?php echo base_url();?>assets/css/datepicker.css" rel="stylesheet">
    

   
         <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <style type="text/css" >
      .alert {
          padding: 15px;
          margin-bottom: 20px;
          border: 1px solid transparent;
          border-radius: 4px;
          position: absolute;
          right: 45%;
          top: 150px;
          z-index: 1003;
      }
    </style>
    
</head>

<body>
    <div class="body-class">
    <div id="fh5co-wrapper">
    <div id="fh5co-page">
        <?php if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
        <?php } ?>
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
        <?php } ?>
    <?php 
    $this->load->view($header);

	$this->load->view($content);

    $this->load->view($footer); 
    ?>
    </div>
    <!-- END fh5co-page -->

    </div>
    <!-- END fh5co-wrapper -->
    </div>

	
    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/mask/input-mask.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/mask/mask.js"></script>
    <!-- jQuery Easing -->
    <script src="<?php echo base_url();?>assets/js/jquery.easing.1.3.js"></script>
    <!-- Waypoints -->
    <script src="<?php echo base_url();?>assets/js/jquery.waypoints.min.js"></script>
    <!-- Superfish -->
    <script src="<?php echo base_url();?>assets/js/hoverIntent.js"></script>
    <script src="<?php echo base_url();?>assets/js/superfish.js"></script>
    <!-- Flexslider -->
    <script src="<?php echo base_url();?>assets/js/jquery.flexslider-min.js"></script>

    <!-- Main JS (Do not remove) -->
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
     <script src="<?php echo base_url();?>assets/js/validator.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/custom.js"></script>
     <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
      <script>
    $(document).ready(function(){
    $('#date').datepicker();
    $('#date').datepicker('setStartDate', '2000-01-01');
    });
  </script>
    
   
</body>

</html>