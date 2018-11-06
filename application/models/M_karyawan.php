<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {

  public function insert_karyawan($data)
  {
    $this->db->insert('tbl_karyawan', $data);
  }

  public function update_karyawan($id, $data)
  {
    $this->db->where('id', $id)
             ->update('tbl_karyawan', $data);
  }

  public function delete_karyawan($id){
    $this->db->where('id', $id)
              ->delete('tbl_karyawan');
  }

  public function get_all_karyawan_by_jabatan($jabatan)
  {
    $data = $this->db->select('tbl_karyawan.id, tbl_karyawan.nama, tbl_karyawan.no_telp, tbl_karyawan.alamat, tbl_karyawan.kelurahan, tbl_karyawan.kecamatan, tbl_karyawan.jabatan')
                    ->join('tbl_jabatan', 'tbl_jabatan.id = tbl_karyawan.jabatan')
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
