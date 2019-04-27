@extends('admin.layout.master')
@section('breadcrump')
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
            <li class="active">Tambah Kategori Kursi</li>
          </ol>
@stop
@section('content')
          
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                @if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif
                <div class="box-header">
                  <h3 class="box-title">Tambah Kategori Kursi
                    <a class="btn btn-flat btn-success btn-sm" id="tambahKelas"><i class="fa fa-plus" ></i></a>
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataMakulKurikulum" class="table table-bordered table-hover">
                    
                    <thead>
                      <tr>                        
                        <th>No</th>
                        <th>Jenis Kursi</th>
                        <th>Bahan Kursi</th>                        
                        <th>Foto</th>
                        <th>Aksi</th>                                                                     
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $i = 1;
                      @endphp
                     <?php foreach ($jenis as $item):  ?>
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->bahan_kursi}}</td>
                        <td><img style="width:20%;height:20%;align:center;"src="{{ url('FotoKursi') }}/{{ $item->foto_kursi }}" class="img-responsive"></td>
                        <td>
                            <a href="" class="btn btn-danger btn-xs" alt="Hapus Kelas"><i class="fa fa-trash"></i> Hapus</a>
                            <a 
                              data-id_jenis_kursi="{{$item->id_jenis_kursi}}"
                              data-bahan_kursi = "{{$item->bahan_kursi}}"
                              data-nama = "{{$item->nama}}"
                              data-file_gambar = "{{$item->foto_kursi}}"
                            class="btn  btn-warning btn-xs editKelas"><i class="fa fa-pencil" > Edit</i></a>
                        </td>
                      </tr>
                      <?php endforeach  ?> 
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
                          <h4 class="modal-title" id="myModalLabel">Tambah Kategori Kursi</h4>
                      </div>
                      <div class="modal-body">
           
                          <form class="form-horizontal" method="POST" action="{{route('ketegori.kursi.tambah')}}" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
           
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Nama</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="nama">
                                      <small class="help-block"></small>
                                  </div>
                              </div>                              
                               <div class="form-group">
                                  <label class="col-md-4 control-label">Bahan</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="bahan">
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
                          <h4 class="modal-title" id="myModalLabel">Edit Kategori Kursi</h4>
                      </div>
                      <div class="modal-body">
           
                          <form class="form-horizontal" role="form" method="POST" action="{{route('/')}}">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
           
                              <div class="form-group">
                                  <label class="col-md-4 control-label">Nama</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="nama">
                                      <small class="help-block"></small>
                                  </div>
                              </div>                              
                               <div class="form-group">
                                  <label class="col-md-4 control-label">Bahan</label>
                                  <div class="col-md-6">
                                      <input type="text" class="form-control" name="bahan">
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
                              </div>     
                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                    <input type="hidden" name="id_jenis_kursi" value="">
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

@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
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
            var reader = new FileReader();
            reader.onload = function(e) {
              document.getElementById('imagePreview').innerHTML = '<img style="height: 50%; width:40%;" src="'+e.target.result+'"/>';
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

          $('.editKelas').click(function(){
            $('input+small').text('');
            $('input').parent().removeClass('has-error');
            $('select').parent().removeClass('has-error');

            $('#myModal2').modal('show');

            var form = "#myModal2";
            $(form).find('select option').removeAttr('selected');

            $(form).find('input[name="id_jenis_kursi"]').val($(this).attr('data-id_jenis_kursi'));
            $(form).find('input[name="bahan_kursi"]').val($(this).attr('data-bahan_kursi'));
            $(form).find('input[name="nama"]').val($(this).attr('data-nama'));
            $(form).find('input[name="file_gambar"]').val($(this).attr('data-file_gambar'));

            insert = $(form).find('#formEditKelas').attr('action')+"/"+$(this).attr('data-id_jenis_kusri');
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

