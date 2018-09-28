<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_obat extends CI_Model {

  public function insert_obat($data)
  {
    $this->db->insert('tbl_obat', $data);
  }

  public function update_obat($id, $data)
  {
    $this->db->where('id', $id)
             ->update('tbl_obat', $data);
  }

  public function delete_obat($id){
    $this->db->where('id', $id)
              ->delete('tbl_obat');
  }

  public function get_all_obat()
  {
    $data = $this->db->order_by('id', 'desc')
                     ->get('tbl_obat');
    if($data->num_rows() > 0){
       return $data->result();
    }else{
       return false;
    }

  }

  public function get_obat_by_id($id)
  {
    $data = $this->db->where('id', $id)
                      ->get('tbl_obat');

    if($data->num_rows() > 0){
      return $data->row();
    }else{
      return false;
    }
  }

}
