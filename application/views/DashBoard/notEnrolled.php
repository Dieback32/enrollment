<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa fa-bars"></i> notEnrolled List</h3>
      
    </div>
  </div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   <form action="<?php echo site_url(); ?>/DashBoard/viewNE" method="POST" role="form" data-toggle="validator">
                          
                      <div class="col-md-4">
                        <select name="grade" class="form-control" required id="grade">
                            <option value="">Grade Level</option>}
                            <?php foreach ($getGrade as $level): ?>
                                <option value="<?php echo $level->grade; ?>"><?php echo $level->grade; ?></option>
                            <?php endforeach ?>
                          </select>
                      </div>
                        <div class="col-md-4">
                          <button type="submit" id="penalty" class="btn btn-primary btn-block btn-flat">View Per Student Grade</button>
                        </div><!-- /.col -->
                        <div class="col-md-4">
                          <a href="<?php echo site_url()?>/dashboard/notEnrolled" type="button" class="btn btn-primary">View All</a>
                        </div><!-- /.col -->
                    </form>
                </header>
                <div class="panel-body">
              <hr>
              <br>
              <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>ID Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Grade</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th style="width:125px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>

              <!--  <tfoot>
                  <tr>
                    <th>ID Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Grade</th>
                    <th>Section</th>
                    <th>Status</th>
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
                    <h3 class="modal-title">CATC notEnrolled Form</h3>
                  </div>
                  <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal">
                      <input type="hidden" value="" name="id"/> 
                      <div class="form-body">
                        <div class="form-group">
                          <label class="control-label col-md-3">Email</label>
                          <div class="col-md-9">
                            <input name="email" placeholder="Email" class="form-control" type="text" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Role</label>
                          <div class="col-md-9">
                            <select name="role" class="form-control" readonly="readonly">
                              <option>notEnrolled</option>
                              <option>staff</option>
                            </select>
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
          "url": "<?php echo site_url('notEnrolled/ajax_list')?>",
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

  function add_notEnrolled()
  {
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Account'); // Set Title to Bootstrap modal title
  }

  function edit_notEnrolled(id)
  {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals

    //Ajax Load data from ajax
    $.ajax({
      url : "<?php echo site_url('notEnrolled/ajax_edit/')?>/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
         
          $('[name="id"]').val(data.id);
          $('[name="email"]').val(data.email);
          $('[name="role"]').val(data.role);
          
          $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
          $('.modal-title').text('Edit notEnrolled'); // Set title to Bootstrap modal title
          
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
        url = "<?php echo site_url('notEnrolled/ajax_add')?>";
    }
    else
    {
      url = "<?php echo site_url('notEnrolled/ajax_update')?>";
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
              alert('Error adding / update data');
          }
      });
  }

  function delete_notEnrolled(id)
  {
    if(confirm('Are you sure delete this data?'))
    {
      // ajax delete data to database
        $.ajax({
          url : "<?php echo site_url('notEnrolled/ajax_delete')?>/"+id,
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
              alert('Error adding / update data');
          }
      });
       
    }
  }

</script>

