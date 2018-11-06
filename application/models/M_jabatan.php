<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model {

  public function insert_jabatan($data){
    $this->db->insert('tbl_jabatan', $data);
  }

  public function check_jabatan($jabatan){
    $data = $this->db->where('nama_jabatan', $jabatan)
                     ->get('tbl_jabatan');
    if($data->num_rows() > 0){
      return true;
    }else{
      return false;
    }
  }

  public function get_jabatan_by_id($id){
    $data = $this->db->where('id', $id)
                      ->get('tbl_jabatan');
    if($data->num_rows() > 0){
      return $data->row();
    }else{
      return false;
    }
  }

  public function get_all_jabatan(){
    $data = $this->db->order_by('id', 'desc')
                    ->get('tbl_jabatan');
    if($data->num_rows() > 0){
          return $data->result();
    }else{
          return $this;
    }
  }

  public function get_nama_jabatan($id){
    $data = $this->db->where('id', $id)
                     ->get('tbl_jabatan');
    if($data->num_rows() > 0){
       return $data->row()->nama_jabatan;
    }else{
       return $this;
    }
  }

  public function update_jabatan($id, $data){
    $this->db->where('id', $id)
              ->update('tbl_jabatan', $data);
  }

  public function delete_jabatan($id){
    $this->db->where('id', $id)
              ->delete('tbl_jabatan');
  }



}
