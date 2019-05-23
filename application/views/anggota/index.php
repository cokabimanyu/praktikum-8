<?php if($this->session->flashdata('message')): ?>
	<center><h4 style="color: green;"><?php echo $this->session->flashdata('message'); ?></h4></center>
<?php endif; ?>

<h1>List Anggota</h1>
<a href="anggota/create"><button class="btn btn-success">Tambah Anggota</button></a>
          
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="dataMakulKurikulum" class="table table-bordered table-hover">
                  	<thead>
                  		<tr>
				<td>Nama Anggota</td>
				<td>Prodi</td>
				<td>Jenjang</td>
				<td>Alamat</td>
				<td>Aksi</td>
			</tr>
		</thead>
		<tbody>
		<?php foreach($anggota as $val): ?>
			<tr>
				<td><?php echo $val['nama']; ?></td>
				<td><?php echo $val['prodi']; ?></td>
				<td><?php echo $val['jenjang']; ?></td>
				<td><?php echo $val['alamat']; ?></td>
				<td>
					<a href="anggota/edit/<?php echo $val['kd_anggota']; ?>"><button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</button></a>
					<button onclick="hapus(<?php echo $val['kd_anggota']; ?>)" class="btn btn-xs btn-danger"><i class="fa fa-thrash"></i> Hapus</button>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
                    <!-- <tfoot>
                      <tr>
                       <th>No</th>
                        <th>ID Kursi</th>
                        <th>Jenis Kursi</th>
                        <th>Lokasi Kursi</th>                        
                        <th>Kondisi</th>
                        <th>Aksi</th>         
                      </tr>
                    </tfoot> -->
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
    	$('#example').DataTable();
	});
</script>

<script type="text/javascript">
	function hapus(id){
		$.ajax({
        method : 'POST',
        url : 'anggota/destroy/'+id,        
        success : function(data){        	
            alert(data);         
            //$('#example').DataTable().ajax.reload();   
        }
    })
}
 </script>