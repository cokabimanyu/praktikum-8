<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataMaster_AC extends CI_Model {

	public function list_all() {
		$q=$this->db->select('k.*,r.nama as ruangan, gd.nama as gedung')
					->from('tb_ac as k')
					->join('tb_ruangan as r','k.id_ruangan = r.id_ruangan')
					->join('tb_gedung as gd','r.id_gedung = gd.id_gedung')
					->get();
		return $q->result();
	}
	public function gedung()
	{
		$data = $this->db->select('*')
						 ->from('tb_gedung')
						 ->get();
		//var_dump($data);
		return $data->result();
	}
	public function type()
	{
		$d = $this->db->select('*')
						 ->from('tb_jenis_inventaris')
						 ->where('kode_barang','3.07.01.01.127')
						 ->get();
		return $d->result();
	}

	public function ruangan($postData){
    $response = array();

    // Select record
    $this->db->select('*');
    $this->db->where('id_gedung', $postData['gedung']);
    $q = $this->db->get('tb_ruangan');
    $response = $q->result_array();

    return $response;
  }
  public function tambahKursi($data)
  {
	$this->db->insert('tb_kursi', $data);
	$this->session->set_flashdata('msg_alert', 'Data Kursi berhasil ditambahkan');
  }
  public function hapusAc($id)
  {
  	//var_dump($id);
  	$this->db->where('id_ac',$id)
			 ->delete('tb_ac');
  	$this->session->set_flashdata('msg_alert', 'Data AC berhasil dihapus');

  }
  public function editKursi($id)
  {
  	$data = $this->db->select('k.*, jk.nama as jenisKursi,jk.id_jenis_kursi, r.nama as ruangan, gd.nama as gedung, gd.id_gedung as id_gedung')
  			 ->from('tb_kursi as k')
			 ->join('tb_jenis_kursi as jk','k.id_jenis_kursi = jk.id_jenis_kursi')
			 ->join('tb_ruangan as r','k.id_ruangan = r.id_ruangan')
			 ->join('tb_gedung as gd','r.id_gedung = gd.id_gedung')
  			 ->where('id_kursi',$id)
  			 ->get();
  	//var_dump($data);
  	return $data->row();
  }
  public function updateKursi($id,$data)
  {
	$this->db->where('id_kursi',$id)
			 ->update('tb_kursi', $data);
	$this->session->set_flashdata('msg_alert', 'Data Kursi berhasil diupdate');
  }

}
