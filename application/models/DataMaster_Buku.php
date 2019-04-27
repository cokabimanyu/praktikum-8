<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster_Buku extends CI_Model {

	public function list_all() {
		$q=$this->db->select('k.*')
					->from('buku as k')
					->get();
		return $q->result();
	}
	
  public function tambahBuku($data)
  {
	$this->db->insert('buku', $data);
	$this->session->set_flashdata('msg_alert', 'Data buku berhasil ditambahkan');
  }
  public function hapusBuku($register)
  {
  	//var_dump($id);
  	$this->db->where('KdRegister',$register)
			 ->delete('buku');
  	$this->session->set_flashdata('msg_alert', 'Data Buku berhasil dihapus');

  }
  public function editKursi($id)
  {
  	$data = $this->db->select('k.*, jk.nama as jenisMeja,jk.id_jenis_meja, r.nama as ruangan, gd.nama as gedung, gd.id_gedung as id_gedung')
  			 ->from('tb_meja as k')
			 ->join('tb_jenis_meja as jk','k.id_jenis_meja = jk.id_jenis_meja')
			 ->join('tb_ruangan as r','k.id_ruangan = r.id_ruangan')
			 ->join('tb_gedung as gd','r.id_gedung = gd.id_gedung')
  			 ->where('id_meja',$id)
  			 ->get();
  	//var_dump($data);
  	return $data->row();
  }
  public function updateKursi($id,$data)
  {
	$this->db->where('id_kursi',$id)
			 ->update('tb_kursi', $data);
	$this->session->set_flashdata('msg_alert', 'Data Meja berhasil diupdate');
  }

}