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
            <li class="active">Inventaris Kursi</li>
          </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Edit Tenant</h3>
              </div><!-- /.box-header -->
              
              <div class="box-body">
                <?php if($this->session->flashdata('msg_alert')) { ?>
                    <div class="alert alert-success">
                        <?=$this->session->flashdata('msg_alert');?>
                    </div>
                <?php } ?>
                <form method="POST" action="<?php echo base_url('Inventaris/update/kursi');?>" enctype="multipart/form-data">
                  <div class="box-body">
                    <!-- <div class="form-group">
                      <label for="file_gambar">Logo Tenant</label>
                      <div id="imagePreview"></div>
                      <div id="myDIV">
                        @if ($tenant->logo_produk != null)
                        <img style="width:20%;height:30%;align:center;"src="{{ url('LogoTenant') }}/{{ $tenant->logo_produk }}" class="img-responsive">
                        @else
                        <img style="width:20%;height:30%;align:center;"src="{{URL::asset('admin/dist/img/logo.png')}}" class="img-responsive">
                        @endif
                      </div>
                      <input type="file" name="file_gambar" id="file" onchange="return fileValidation()" >
                    </div> -->
                   <input type="hidden" name="id" value="<?=$item->id_kursi;?>">
                    <div class="form-group">
                      <label>ID Kursi</label>
                      <input type="text" name="temp" class="form-control" value="<?=$item->id_kursi?>" disabled>
                    </div>
                    <div class="form-group">
                      <label>Jenis Kursi</label>
                      <select class="form-control" name="id_jenis_kursi">
                        <option value="<?=$item->id_jenis_kursi?>" ><?=$item->jenisKursi;?></option>
                        <?php foreach ($jenis as $data) { ?>
                          <option value="<?=$data->id_jenis_kursi;?>"><?=$data->nama;?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Gedung</label>
                        <select class="form-control" name="gedung" id="id_gedung" >
                          <option value="<?=$item->id_gedung?>" disable="true" selected="true"><?=$item->gedung?></option>
                            <?php foreach ($gedung as $data) {?>
                            <option value="<?=$data->id_gedung?>"><?=$data->nama?></option>
                            <?php } ?>
                        </select>    
                    </div>
                    <div class="form-group">
                      <label>Ruangan</label>
                        <select class="form-control" name="ruangan" id="ruangan">
                           <option value="<?=$item->id_ruangan?>" disable="true" selected="true"><?=$item->ruangan ?></option>
                        </select>                                    
                    </div>
                    <div class="form-group">
                      <label>Type</label>
                        <select class="form-control" name="type" >
                          <option value="<?=$item->id_gedung?>" disable="true" selected="true"><?=$item->type?></option>
                            <?php foreach ($type as $data) {?>
                            <option value="<?=$data->type?>"><?=$data->type?></option>
                            <?php } ?>
                        </select>    
                    </div> 
                    <div class="form-group">
                      <label>Tahun Perolehan</label>
                      <input type="text" name="tahun" placeholder="Nama Kegiatan" class="form-control" value="<?=$item->tahun;?>">
                    </div>
                    <div class="form-group">
                      <label>Kondisi</label>
                        <select class="form-control" name="kondisi">
                            
                            <option value="1">Layak Pakai</option>
                            <option value="0">Tidak Layak Pakai</option>
                         
                        </select>                                      
                    </div> 
                    <!-- Btn -->
                    <div class="form-group">
                     <input type="submit" name="submit" value="Update" class="btn btn-success">
                    </div>
                  </div>
                 </form> 
                
              </div><!-- /.box-body -->
            </div><!-- /.box -->

          </div><!-- /.col -->
        </div><!-- /.row -->
      </section>
    </div>

          

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
      var x = document.getElementById("myDIV");
      if (x.style.display === "none") {
        x.style.display = "none";
      } else {
        x.style.display = "none";
      }
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('imagePreview').innerHTML = '<img style="height: 30%; width:20%;" src="'+e.target.result+'"/>';
      };
      reader.readAsDataURL(fileInput.files[0]);
   }
  }
}
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#id_gedung').change(function(){
      var gedung = $(this).val();

      //alert(gedung);

      $.ajax({
        url:'<?=base_url()?>Inventaris/ruangan',
        method: 'post',
        data: {gedung: gedung},
        dataType: 'json',
        success: function(response){


          // Remove options 
          $('#ruangan').find('option').not(':first').remove();

          // Add options
          $.each(response,function(index,data){
             $('#ruangan').append('<option value="'+data['id_ruangan']+'">'+data['nama']+'</option>');
          });
        }
      });
    });
  });

</script>

