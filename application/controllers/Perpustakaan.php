<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('DataMaster_Buku');
		$this->load->model('DataMaster_Anggota');
		$this->md_buku = $this->DataMaster_Buku;
		$this->md_anggota = $this->DataMaster_Anggota;
	}

	public function index()
	{
		redirect( base_url() );
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

				$this->md_kursi->haspuKursi($id);
			    redirect(base_url('Inventaris/listKursi'));
				break;
			case 'AC':
				$this->md_ac->hapusAc($id);
					redirect(base_url('Inventaris/listAc'));
			break;
			default:
				redirect( base_url() );
				break;
		}
	}

	public function edit()
	{
		if( empty($this->uri->segment('3'))) {
			redirect( base_url() );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url() );
		}
		$cek = $this->uri->segment('3');
		$id = $this->uri->segment('4');

		switch ($cek) {
			case 'Buku':
				$data['item']=$this->md_buku->editBuku($register);
				//var_dump($data);
			    $this->load->view('admin/dashboard/inventory/inventarisKursiEdit',$data);
				break;
			default:
				redirect( base_url() );
				break;
		}
	}
	public function update()
	{
		if( empty($this->uri->segment('3'))) {
			redirect( base_url() );
		}
		$cek = $this->uri->segment('3');
		//var_dump($cek);

		switch ($cek) {
			case 'kursi':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id_kursi= $this->security->xss_clean( $this->input->post('id'));
					$id_jenis_kursi= $this->security->xss_clean( $this->input->post('id_jenis_kursi'));
					$ruangan= $this->security->xss_clean( $this->input->post('ruangan'));
					$kondisi= $this->security->xss_clean( $this->input->post('kondisi'));
					$type= $this->security->xss_clean( $this->input->post('type'));
					$tahun= $this->security->xss_clean( $this->input->post('tahun'));

					// validasi
					$this->form_validation->set_rules('id', 'ID Kursi', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', 'Gagal Menambah data Kursi');
						redirect( base_url('Inventaris/listKursi') );
					}

					$id = $id_kursi;
					$data['id_jenis_kursi'] = $id_jenis_kursi;
					$data['id_ruangan'] = $ruangan;
					$data['status'] = $kondisi;
					$data['tahun'] = $tahun;
					$data['type'] = $type;
					$data['kb_jenis_inventaris'] = '3.07.01.01.127';

					// var_dump($data);
					$this->md_kursi->updateKursi($id,$data);
					redirect(base_url('Inventaris/listKursi'));
				}
				break;
			default:
				redirect( base_url() );
				break;
		}
	}
}
