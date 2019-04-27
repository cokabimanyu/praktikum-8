<!DOCTYPE html>
<html>
<?php $this->load->view('admin/layout/head') ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php $this->load->view('admin/layout/header') ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view('admin/layout/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Kategori Meja</li>
          </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <?php if($this->session->flashdata('msg_alert')) { ?>
                      <div class="alert alert-success">
                          <?=$this->session->flashdata('msg_alert');?>
                      </div>
                <?php } ?>
                <div class="box-header">
                  <h3 class="box-title">Tambah Kategori
                    <a class="btn btn-flat btn-success btn-sm" id="tambahKelas"><i class="fa fa-plus" ></i></a>
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataMakulKurikulum" class="table table-bordered table-hover">
                    
                    <thead>
                      <tr>                        
                        <th>No</th>
                        <th>Jenis Meja</th>
                        <th>Ukuran Meja</th>                        
                        <th>Foto</th>
                        <th>Aksi</th>                                                                     
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                     <?php foreach ($jenis as $item){  ?>
                      <tr>
                        <td><?=$i++?></td>
                        <td><?=$item->nama?></td>
                        <td><?=$item->ukuran?></td>
                        <td><img style="width:40px;height:40px;align:center;"src="<?php echo base_url('assets/photoMeja')?>/<?=$item->foto_meja?>" class="img-responsive"></td>
                        <td>
                            <a href="" class="btn btn-danger btn-xs" alt="Hapus Kelas"><i class="fa fa-trash"></i> Hapus</a>
                            <a 
                              data-id_jenis_meja="<?=$item->id_jenis_meja?>"
                              data-ukuran = "<?=$item->ukuran?>"
                              data-nama = "<?=$item->nama?>"
                              data-file_gambar = "<?php echo base_url('assets/photoMeja')?>/<?=$item->foto_meja?>"
                            class="btn  btn-warning btn-xs" id="editMeja"><i class="fa fa-pencil" > Edit</i></a>
                        </td>
                      </tr>
                      <?php }  ?> 
                    </tbody>
                    <tfoot>
                      <tr>
                       <th>No</th>
                        <th>Jenis Meja</th>
                        <th>Ukuran Meja</th>                        
                        <th>Foto</th>
                        <th>Aksi</th>     
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title" id="myModalLabel">Tambah Kategori Meja</h4>
                      </div>
                      <div class="modal-body">
           
                          <form class="form-horizontal" method="POST" action="<?= base_url('Inventaris/addNew/jenisMeja');?>" enctype="multipart/form-data">
                              <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
           
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Nama</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="nama">
                                      <small class="help-block"></small>
                                  </div>
                              </div>                              
                               <div class="form-group">
                                  <label class="col-md-4 control-label">Ukuran</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="ukuran">
                                      <small class="help-block"></small>
                                  </div>
                              </div>  
                              <div class="form-group">
                                  <label for="file_gambar"class="col-md-4 control-label">Foto</label>
                                  <div class="col-md-6">
                                    <div id="imagePreview"></div>
                                    <input type="file" name="file_gambar" id="file" onchange="return fileValidation()" >
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      <button type="submit" class="btn btn-primary" id="button-reg">
                                          Simpan
                                      </button>
                                  </div>
                              </div>
                          </form>                       
           
                      </div>
                  </div>
              </div>
          </div>
          <!--end of Modal --> 
          <!-- Modal 2 -->
          <!-- Modal -->
          <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <h4 class="modal-title" id="myModalLabel">Edit Kategori Meja</h4>
                      </div>
                      <div class="modal-body">
           
                          <form class="form-horizontal" method="POST" action="{{route('ketegori.meja.tambah')}}" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
           
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Nama</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="nama">
                                      <small class="help-block"></small>
                                  </div>
                              </div>                              
                               <div class="form-group">
                                  <label class="col-md-4 control-label">Ukuran</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="ukuran">
                                      <small class="help-block"></small>
                                  </div>
                              </div>  
                              <div class="form-group">
                                  <label for="file_gambar"class="col-md-4 control-label">Foto</label>
                                  <div class="col-md-6">
                                    <input type="file" name="file_gambar" id="editfile"  onchange="return validation()" >
                                    <div id="Preview" class="event"><img style="height: 50%; width:40%;" src=""/></div>
                                  </div>
                              </div>   
                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      <button type="submit" class="btn btn-primary" id="button-reg">
                                          Simpan
                                      </button>
                                  </div>
                              </div>
                          </form>                       
           
                      </div>
                  </div>
              </div>
          </div>
          <!-- End Modal 2 -->    
        </section>
    </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('admin/layout/footer') ?>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view('admin/layout/scrip') ?>      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/admin/plugins')?>/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/admin/plugins')?>/datatables/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript">
      function fileValidation(){

        var fileInput = document.getElementById('file');
        var filePath = fileInput.value;
        //alert(filePath);
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if(!allowedExtensions.exec(filePath))
        {
          alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
          fileInput.value = '';
          return false;
        }
        else
        {
         //Image preview
          if (fileInput.files && fileInput.files[0])
          {
            var reader = new FileReader();
            reader.onload = function(e) {
              document.getElementById('imagePreview').innerHTML = '<img style="height: 50px; width:40px;" src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
         }
        }
      }
    </script>

    <script type="text/javascript">
      function validation(){

        var fileInput = document.getElementById('editfile');
        var filePath = fileInput.value;
        //alert(filePath);
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if(!allowedExtensions.exec(filePath))
        {
          alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
          fileInput.value = '';
          return false;
        }
        else
        {
         //Image preview
          if (fileInput.files && fileInput.files[0])
          {
            $('#Preview').find('img').remove();
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#Preview').append('<img style="height: 50px; width:40px;" src="'+e.target.result+'"/>');
            };
            reader.readAsDataURL(fileInput.files[0]);
         }
        }
      }
    </script>

    <script>
      $(function () {

        $('#dataMakulKurikulum').DataTable({"pageLength": 10});

         $('#tambahKelas').click(function(){
            $('input+small').text('');
            $('input').parent().removeClass('has-error');
            $('select').parent().removeClass('has-error');

            $('#myModal').modal('show');
            //console.log('test');
            return false;
        });

          $('#editMeja').click(function(){
            $('input+small').text('');
            $('input').parent().removeClass('has-error');
            $('select').parent().removeClass('has-error');

            $('#myModal2').modal('show');
            
            var form = "#myModal2";
            //$(form).find('select option').removeAttr('selected');
            

            $(form).find('input[name="id_jenis_meja"]').val($(this).attr('data-id_jenis_meja'));
            $(form).find('input[name="ukuran"]').val($(this).attr('data-ukuran'));
            $(form).find('input[name="nama"]').val($(this).attr('data-nama'));
            $(form).find('.event').children('img').attr('src',$(this).attr('data-file_gambar'))

            insert = $(form).find('#formEditKelas').attr('action')+"/"+$(this).attr('data-id_jenis_meja');
            $(form).find('#formEditKelas').attr('action',insert);
            //console.log('test');

            return false;
        });

       
        $(document).on('submit', '#formPaketKRS', function(e) {  
            e.preventDefault();
             
            $('input+small').text('');
            $('input').parent().removeClass('has-error');    

             
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json"
            })
            .done(function(data) {
                console.log(data);
      
                $('.alert-success').removeClass('hidden');
                $('#myModal').modal('hide');
                window.location.href=window.location.href; 
            })
            .fail(function(data) {
                console.log(data.responeJSON);
                $.each(data.responseJSON, function (key, value) {
                    var input = '#formPaketKRS input[name=' + key + ']';
                    
                    $(input + '+small').text(value);
                    $(input).parent().addClass('has-error');
                });
            });
        });

        $(document).on('submit', '#formEditKelas', function(e) {  
            e.preventDefault();
             
            $('input+small').text('');
            $('input').parent().removeClass('has-error');  

             
            $.ajax({
                method: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json"
            })
            .done(function(data) {
                console.log(data);
      
                $('.alert-success').removeClass('hidden');
                $('#myModal2').modal('hide');
                window.location.href=window.location.href; 
            })
            .fail(function(data) {
                console.log(data.responeJSON);
                $.each(data.responseJSON, function (key, value) {
                    var input = '#formEditKelas input[name=' + key + ']';
                    
                    $(input + '+small').text(value);
                    $(input).parent().addClass('has-error');
                });
            });
        });

      });

    </script>
