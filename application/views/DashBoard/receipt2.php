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
    <style type="text/css" >
      .main-logo{
      	max-height: 60px;
      	text-align: center;
      }
      }
    </style> 
<script type="text/JavaScript">
function timeRefresh(timeoutPeriod) 
{
	setTimeout("location.reload(true);",timeoutPeriod);
}
</script>
    <style type="text/css">

    #printable { display: none; }
    .text-center{
        	text-align: center;
        }

    @media print
    {
        .text-center{
        	text-align: center;
        }
    }
    </style>
</head>

<body onload="JavaScript:timeRefresh(5000);">

	<?php if ($this->session->userdata('pay_id') != NULL): ?>
	<?php 
		$this->db->where('id',$this->session->userdata('pay_id'));
		$query = $this->db->get('payment_report');
		$ids = $query->row();

		$this->db->where('userID', $ids->user_id );
		$infos = $this->db->get('userinfo');
		$info = $infos->row();

		$this->db->where('user_id', $ids->user_id);
		$this->db->where('sy', $check->sy);
		$accounts = $this->db->get('student_account');
		$account = $accounts->row();

		
		$this->db->where('userID', $this->session->userdata('id') );
		$infoss = $this->db->get('userinfo');
		$cash = $infoss->row();

		 $cash = $infoss->row();
	    if ($this->session->userdata('payBal') > 0) {
	      $change = $this->session->userdata('payBal') - $ids->amount;
	    }else{
	      $change = 0;
	    }


	?>
	
	
	<div id="printableArea">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 text-center">
				<?php if (isset($logo->file)): ?>
					<a href="#" class="text-center">
						<center>
							<img src="<?php echo base_url(); ?>uploads/home/<?php echo $logo->file; ?>" class=" img-responsive main-logo"></a>		
						</center>
				<?php endif; ?>
			</div>

		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<h3>COMPUTER ARTS AND TECHNOLOGICAL COLLEGE, INC.</h3>
				<br>
			</div>
		</div>
		
		
		<p class="text-center">- Official Receipt -</p>	
		<p class="text-center"><?php echo $info->lastName.' '. $info->firstName.' '. $info->Mi ?></p>
		<p class="text-center">Grade Level: <?php echo $ids->grade ?></p>
		<p class="text-center">Ramaining Balance Payment</p>
		<br>
		<table class="table table-hover">
			<tbody>
				
				<tr>
					<td>Payment: </td>
					<td><?php echo $ids->amount ?></td>
				</tr>
		        <tr>
		          <td>Paid Amount: </td>
		          <td><?php echo $this->session->userdata('payBal') ?></td>
		        </tr>
		        <tr>
		          <td>Change: </td>
		          <td><?php echo $change  ?></td>
		        </tr>
			</tbody>
		</table>
	</div>
	<?php endif ?>
	<br><br>
	<div class="text-center">
		<div class="text-center">
			<p><u><strong><?php if(@$cash->lastName){ echo $cash->lastName.' '.$cash->firstName; }else{ echo 'Loading...'; } ?></strong></u></p>
			<p>Cashier</p>
		</div>
	</div>
	
	<br><br>
<center><input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="Print Receipt" /></center>

	

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
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