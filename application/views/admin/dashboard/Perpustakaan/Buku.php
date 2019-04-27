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
            <li class="active">Data Buku</li>
          </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="card-body">
                <?php if($this->session->flashdata('msg_alert')) { ?>
                      <div class="alert alert-success">
                          <?=$this->session->flashdata('msg_alert');?>
                      </div>
                <?php } ?>
                <div class="box-header">
                  <h3 class="box-title">Tambah Buku
                    <a class="btn btn-flat btn-success btn-sm" id="tambahKelas"><i class="fa fa-plus" ></i></a>
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataMakulKurikulum" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Register</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                     $i = 1;
                     foreach ($inven as $item){  ?>
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$item->KdRegister;?></td>
                        <td><?=$item->Judul_Buku;?></td>
                        <td><?=$item->Pengarang;?></td>
                        <td><?=$item->Penerbit;?></td>
                        <td><?=$item->Tahun_Terbit;?></td>
                        <td>
                            <a href="<?=base_url("/Perpustakaan/hapus/Buku/{$item->KdRegister}");?>" class="btn btn-danger btn-xs" alt="Hapus Buku"><i class="fa fa-trash"></i> Hapus</a>
                            <a href="<?=base_url("/Perpustakaan/edit/Buku/{$item->KdRegister}");?>" class="btn  btn-warning btn-xs" alt="Edit Buku"><i class="fa fa-pencil"> Edit</i></a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Kode Register</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
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
                          <h4 class="modal-title" id="myModalLabel">Tambah Buku</h4>
                      </div>
                      <div class="modal-body">

                          <form class="form-horizontal" method="POST" action="<?php echo base_url('Perpustakaan/addNew/buku');?>" enctype="multipart/form-data">
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Kode Register</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" name="KdRegister">
                                      <small class="help-block"></small>
                                  </div>
                                </div>
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Judul Buku</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" name="Judul_Buku">
                                      <small class="help-block"></small>
                                  </div>
                                </div>
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Pengarang</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" name="Pengarang">
                                      <small class="help-block"></small>
                                  </div>
                                </div>
                               <div class="form-group">
                                  <label class="col-md-4 control-label">Penerbit</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" name="Penerbit">
                                      <small class="help-block"></small>
                                  </div>
                                </div>
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Tahun Terbit</label>
                                  <div class="col-md-6 has-error">
                                      <input type="text" class="form-control" name="Tahun_Terbit">
                                      <small class="help-block"></small>
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

          $('.editKelas').click(function(){
            $('input+small').text('');
            $('input').parent().removeClass('has-error');
            $('select').parent().removeClass('has-error');

            $('#myModal2').modal('show');

            var form = "#myModal2";
            $(form).find('select option').removeAttr('selected');

            $(form).find('input[name="id_kursi"]').val($(this).attr('data-id_kursi'));
            // $(form).find('input[name="jenisKursi"]').val($(this).attr('data-jenisKursi'));
            // $(form).find('input[name="gedung"]').val($(this).attr('data-gedung'));

            insert = $(form).find('#formEditKelas').attr('action')+"/"+$(this).attr('data-id_kursi');
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

@endsection
