<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

  public function check_credential(){
    $id = set_value('_id');
    $salt = 'impal';
    // $password = hash('sha512', $salt.set_value('_password'));
    $password = hash('sha512', $salt.set_value('_password'));

    $query = $this->db->where(array('id' => $id, 'password' => $password))
              ->limit(1)
              ->get('tbl_karyawan');

    if($query->num_rows() > 0){
      return true;
    }else{
      return false;
    }
  }

  public function get_akun($id){
    $query = $this->db->select('nama', 'jabatan', 'image')
                      ->where('id', $id)
                      ->get('tbl_karyawan');

    if($query->num_rows() > 0){
      return $query->row();
    }else{
      return false;
    }
  }

}
