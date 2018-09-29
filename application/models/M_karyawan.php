<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {

  public function insert_karyawan($data)
  {
    $this->db->insert('tbl_karyawan', $data);
  }

  public function update_obat($id, $data)
  {
    $this->db->where('id', $id)
             ->update('karyawan', $data);
  }

  public function delete_obat($id){
    $this->db->where('id', $id)
              ->delete('karyawan');
  }

  public function get_all_karyawan_by_jabatan($jabatan)
  {
    $data = $this->db->join('tbl_jabatan', 'tbl_karyawan.jabatan = tbl_jabatan.id')
                     ->where('tbl_jabatan.nama_jabatan', $jabatan)
                     ->order_by('tbl_karyawan.id', 'desc')
                     ->get('tbl_karyawan');
    if($data->num_rows() > 0){
       return $data->result();
    }else{
       return $this;
    }

  }

  public function get_karyawan_by_id($id)
  {
    $data = $this->db->where('id', $id)
                      ->get('tbl_karyawan');

    if($data->num_rows() > 0){
      return $data->row();
    }else{
      return $this;
    }
  }

}
