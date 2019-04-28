<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/admin/dist')?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Pegawai Perpustakaan</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Tambah Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url('/Perpustakaan/listBuku'); ?>"><i class="fa fa-circle-o"></i>Buku</a></li>
            <li><a href="<?=base_url('Perpustakaan/listAnggota');?>"><i class="fa fa-circle-o"></i>Anggota</a></li>
            <li><a href="<?=base_url('Perpustakaan/listPetugas');?>"><i class="fa fa-circle-o"></i>Petugas</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Peminjaman Buku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url('');?>"><i class="fa fa-circle-o"></i>Peminjaman</a></li>
          </ul>
        </li>

        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
