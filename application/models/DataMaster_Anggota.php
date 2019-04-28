<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster_Anggota extends CI_Model {

	public function list_all() {
		$q=$this->db->select('j.*')
					->from('anggota as j')
					->get();
		return $q->result();
	}
	
  public function tambahAnggota($data)
  {
	$this->db->insert('anggota', $data);
	$this->session->set_flashdata('msg_alert', 'Data anggota berhasil ditambahkan');
  }
  public function hapusAnggota($anggota)
  {
  	//var_dump($id);
  	$this->db->where('KdAnggota',$anggota)
			 ->delete('anggota');
  	$this->session->set_flashdata('msg_alert', 'Data anggota berhasil dihapus');

  }


}