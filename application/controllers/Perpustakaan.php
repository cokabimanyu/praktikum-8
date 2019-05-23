<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan extends CI_Controller {

	function __construct() {
		parent::__construct();
		if($this->session->set_userdata('logged_in') == FALSE){
			redirect(base_url('login'))
		}
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('DataMaster_Buku');
		$this->load->model('DataMaster_Anggota');
		$this->load->model('DataMaster_Petugas');
		$this->md_buku = $this->DataMaster_Buku;
		$this->md_anggota = $this->DataMaster_Anggota;
		$this->md_petugas = $this->DataMaster_Petugas;
	}

	public function index()
	{
		$this->load->view('admin/dashboard/index');
	}
	public function listBuku()
	{
		$data['inven'] = $this->md_buku->list_all();
		//var_dump($data);
		$this->load->view('admin/dashboard/Perpustakaan/Buku',$data);
	}
	public function listAnggota()
	{
		$data['inven'] = $this->md_anggota->list_all();
		//var_dump($data);
		$this->load->view('admin/dashboard/Perpustakaan/Anggota',$data);
	}
	public function listPetugas()
	{
		$data['inven'] = $this->md_petugas->list_all();
		//var_dump($data);
		$this->load->view('admin/dashboard/Perpustakaan/Petugas',$data);
	}

	public function addNew()
	{
		if( empty($this->uri->segment('3'))) {
			redirect( base_url() );
		}

		$cek=$this->uri->segment('3');
		//var_dump($cek);

		switch ($cek) {
			case 'buku':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$register= $this->security->xss_clean( $this->input->post('KdRegister'));
					$judul_buku= $this->security->xss_clean( $this->input->post('Judul_Buku'));
					$pengarang= $this->security->xss_clean( $this->input->post('Pengarang'));
					$penerbit= $this->security->xss_clean( $this->input->post('Penerbit'));
					$tahun_terbit= $this->security->xss_clean( $this->input->post('Tahun_Terbit'));
					if ($this->input->post('loop') == null) {
						$loop = 0;
					}
					else
					{
						$loop= $this->security->xss_clean( $this->input->post('loop'));
					}

					for ($j=0; $j <= $loop ; $j++) {
			            $data['KdRegister'] = $register;
						$data['Judul_Buku'] = $judul_buku;
						$data['Pengarang'] = $pengarang;
						$data['Penerbit'] = $penerbit;
						$data['Tahun_Terbit'] = $tahun_terbit;
						$this->md_buku->tambahBuku($data);
			        }

					redirect(base_url('Perpustakaan/listBuku'));
				}
				break;

				case 'anggota':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$anggota= $this->security->xss_clean( $this->input->post('KdAnggota'));
					$nama= $this->security->xss_clean( $this->input->post('Nama'));
					$prodi= $this->security->xss_clean( $this->input->post('Prodi'));
					$jenjang= $this->security->xss_clean( $this->input->post('Jenjang'));
					$alamat= $this->security->xss_clean( $this->input->post('Alamat'));
					if ($this->input->post('loop') == null) {
						$loop = 0;
					}
					else
					{
						$loop= $this->security->xss_clean( $this->input->post('loop'));
					}

					for ($j=0; $j <= $loop ; $j++) {
			            $data['KdAnggota'] = $anggota;
						$data['Nama'] = $nama;
						$data['Prodi'] = $prodi;
						$data['Jenjang'] = $jenjang;
						$data['Alamat'] = $alamat;
						$this->md_anggota->tambahAnggota($data);
			        }

					redirect(base_url('Perpustakaan/listAnggota'));
				}
				break;
				case 'petugas':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$petugas= $this->security->xss_clean( $this->input->post('KdPetugas'));
					$nama= $this->security->xss_clean( $this->input->post('Nama'));
					$alamat= $this->security->xss_clean( $this->input->post('Alamat'));
					if ($this->input->post('loop') == null) {
						$loop = 0;
					}
					else
					{
						$loop= $this->security->xss_clean( $this->input->post('loop'));
					}

					for ($j=0; $j <= $loop ; $j++) {
			            $data['KdPetugas'] = $petugas;
						$data['Nama'] = $nama;
						$data['Alamat'] = $alamat;
						$this->md_petugas->tambahPetugas($data);
			        }

					redirect(base_url('Perpustakaan/listPetugas'));
				}
				break;
			default:
				redirect( base_url() );
				break;
		}
	}
	public function hapus()
	{
		if( empty($this->uri->segment('3'))) {
			redirect( base_url() );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url() );
		}

		$cek = $this->uri->segment('3');
		$id = $this->uri->segment('4');
		//var_dump($id);

		switch ($cek) {
			case 'Buku':
				$this->md_buku->hapusBuku($id);
			    redirect(base_url('Perpustakaan/listBuku'));
				break;
			case 'Anggota':
				$this->md_anggota->hapusAnggota($id);
			    redirect(base_url('Perpustakaan/listAnggota'));
				break;
			case 'Petugas':
				$this->md_petugas->hapusPetugas($id);
					redirect(base_url('Perpustakaan/listPetugas'));
			break;
			default:
				redirect( base_url() );
				break;
		}
	}
}
