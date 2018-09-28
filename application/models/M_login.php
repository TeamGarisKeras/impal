<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

  public function check_credential(){
    $username = set_value('_username');
    $salt = 'impal';
    // $password = hash('sha512', $salt.set_value('_password'));
    $password = hash('sha512', $salt.set_value('_password'));

    $query = $this->db->where(array('username' => $username, 'password' => $password))
              ->limit(1)
              ->get('tbl_karyawan');

    if($query->num_rows() > 0){
      return true;
    }else{
      return false;
    }
  }

  public function get_akun($username){
    $query = $this->db->select('username', 'nama', 'level', 'jabatan', 'image')
                      ->where('username', $username)
                      ->get('tbl_karyawan');

    if($query->num_rows() > 0){
      return $query->row();
    }else{
      return false;
    }
  }

}
