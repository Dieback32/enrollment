<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa fa-bars"></i>Tuition Fee</h3>
    </div>
  </div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    
                </header>
                <div class="panel-body">
              <hr>
              <button class="btn btn-success" onclick="add_tuition()"><i class="glyphicon glyphicon-plus"></i> Add Tuition</button>
              <br>
              <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Tuition For</th>
                    <th>Amount</th>
                    <th style="width:125px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>

             <!--   <tfoot>
                  <tr>
                    <th>Tuition For</th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </tfoot>-->
              </table>        
              <!-- Bootstrap modal -->
              <div class="modal fade" id="modal_form" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">Tuition</h3>
                  </div>
                  <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal">
                      <input type="hidden" value="" name="id"/> 
                      <div class="form-body">
                        <div class="form-group">
                          <label class="control-label col-md-3">Tuition For</label>
                          <div class="col-md-9">
                            <input name="for" placeholder="Tuition For" pattern="\d+" class="form-control" type="text" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Amount</label>
                          <div class="col-md-9">
                            <input name="amount" placeholder="Amount" pattern="[0-9]+([\.,][0-9]+)?" class="form-control" type="number" min="1" onkeypress="return isNumberKey(event)" required>
                          </div>
                        </div>
                      </div>
                    </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
              <!-- End Bootstrap modal -->
	  				</div>
            </section>
        </div>
      </div>
      <!-- page end-->
  </section>
</section>
<!--main content end-->
<script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/dataTables.bootstrap.js')?>"></script>
<script type="text/javascript">

  var save_method; //for save method string
  var table;
  $(document).ready(function() {
    table = $('#table').DataTable({ 
      
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      
      // Load data for the table's content from an Ajax source
      "ajax": {
          "url": "<?php echo site_url('tuition/ajax_list')?>",
          "type": "POST"
      },

      //Set column definition initialisation properties.
      "columnDefs": [
      { 
        "targets": [ -1 ], //last column
        "orderable": false, //set not orderable
      },
      ],

    });
  });

  function add_tuition()
  {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add tuition'); // Set Title to Bootstrap modal title
  }

  function edit_tuition(id)
  {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo site_url('tuition/ajax_edit/')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
         
          $('[name="id"]').val(data.id);
          $('[name="for"]').val(data.for);
          $('[name="amount"]').val(data.amount);   
          
          $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Edit tuition'); // Set title to Bootstrap modal title
          
      },
      errorz: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
  });
  }

  function reload_table()
  {
    table.ajax.reload(null,false); //reload datatable ajax 
  }

  function save()
  {
    var url;
    if(save_method == 'add') 
    {
        url = "<?php echo site_url('tuition/ajax_add')?>";
    }
    else
    {
      url = "<?php echo site_url('tuition/ajax_update')?>";
    }

     // ajax adding data to database
        $.ajax({
          url : url,
          type: "POST",
          data: $('#form').serialize(),
          dataType: "JSON",
          success: function(data)
          {
             //if success close modal and reload ajax table
             $('#modal_form').modal('hide');
             reload_table();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error adding / update data already Have value or no value');
          }
      });
  }

  function delete_tuition(id)
  {
    if(confirm('Are you sure delete this data?'))
    {
      // ajax delete data to database
        $.ajax({
          url : "<?php echo site_url('tuition/ajax_delete')?>/"+id,
          type: "POST",
          dataType: "JSON",
          success: function(data)
          {
             //if success reload ajax table
             $('#modal_form').modal('hide');
             reload_table();
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error adding / update data ');
          }
      });
       
    }
  }

</script>

