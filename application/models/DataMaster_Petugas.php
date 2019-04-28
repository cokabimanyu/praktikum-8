<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster_Petugas extends CI_Model {

	public function list_all() {
		$q=$this->db->select('j.*')
					->from('petugas as j')
					->get();
		return $q->result();
	}
	
  public function tambahPetugas($data)
  {
	$this->db->insert('petugas', $data);
	$this->session->set_flashdata('msg_alert', 'Data petugas berhasil ditambahkan');
  }
  public function hapusPetugas($petugas)
  {
  	//var_dump($id);
  	$this->db->where('KdPetugas',$petugas)
			 ->delete('petugas');
  	$this->session->set_flashdata('msg_alert', 'Data petugas berhasil dihapus');

  }


}