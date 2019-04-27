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
  public function hapusAnggota($id)
  {
  	//var_dump($id);
  	$this->db->where('KdAnggota',$anggota)
			 ->delete('anggot');
  	$this->session->set_flashdata('msg_alert', 'Data anggota berhasil dihapus');

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