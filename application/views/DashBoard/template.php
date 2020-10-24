<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <!-- datatables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
    <link href="<?php echo base_url();?>assets/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url();?>assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/style2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style-responsive.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/datepicker.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <style type="text/css" >
      .alert {
          padding: 15px;
          margin-bottom: 20px;
          border: 1px solid transparent;
          border-radius: 4px;
          position: absolute;
          right: 45%;
          top: 17px;
          z-index: 1003;
      }
    </style>  
  </head>
  <body id="<?php echo site_url();?>">
    <section id="container" class="">
  	<?php 
    $this->load->view($header);

    $this->load->view($content);
 
    ?>  
    </section>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>
    <!-- nice scroll -->
    <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
    <script src="<?php echo base_url();?>assets/js/scripts.js"></script>
    <!-- datatables -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- Ckeditor Plugin -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/tinymce/js/tinymce/tinyMCE.js"></script>
    <!-- validatior -->
    <script src="<?php echo base_url();?>assets/js/validator.min.js"></script>
     <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
     <script src="<?php echo base_url()?>/assets/plugins/mask/input-mask.js"></script>
    <script src="<?php echo base_url()?>/assets/plugins/mask/mask.js"></script>

    <script>
    $(document).ready(function(){
    $('#date').datepicker();
    $('#date').datepicker('setStartDate', '2000-01-01');
    });
  </script>
    <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode;
    return !(charCode > 31 && (charCode < 48 || charCode > 57));
}
</script>
  </body>
</html>