<?php


function set_id_karyawan(){
    $CI =& get_instance();
    $reg = "";

    $CI->db->select('id');
    $CI->db->from('tbl_karyawan');
    $CI->db->order_by('id', 'desc');
    $CI->db->limit(1);
    $query_reg = $CI->db->get();

    if($query_reg->num_rows() > 0){
      $reg = $query_reg->row()->id;
      $reg = substr($reg, 2);
      $reg++;

      if(strlen($reg) == 1){
        $reg='0000'.$reg;
      }elseif(strlen($reg)==2){
        $reg='000'.$reg;
      }elseif(strlen($reg)==3){
        $reg='00'.$reg;
      }elseif(strlen($reg)==4){
        $reg='0'.$reg;
      }
      else{
        $reg = $reg;
      }

      $reg = 'KY'.$reg;
    }else{
      $reg = 'KY'.'00001';
    }
    return $reg;
}

function set_id_obat(){
    $CI =& get_instance();
    $reg = "";

    $CI->db->select('id');
    $CI->db->from('tbl_obat');
    $CI->db->order_by('id', 'desc');
    $CI->db->limit(1);
    $query_reg = $CI->db->get();

    if($query_reg->num_rows() > 0){
      $reg = $query_reg->row()->id;
      $reg = substr($reg, 2);
      $reg++;

      if(strlen($reg) == 1){
        $reg='0000'.$reg;
      }elseif(strlen($reg)==2){
        $reg='000'.$reg;
      }elseif(strlen($reg)==3){
        $reg='00'.$reg;
      }elseif(strlen($reg)==4){
        $reg='0'.$reg;
      }
      else{
        $reg = $reg;
      }

      $reg = 'OB'.$reg;
    }else{
      $reg = 'OB'.'00001';
    }
    return $reg;
}


function secondsToTime($seconds) {
    $dtF = new \DateTime('@0');
    $dtT = new \DateTime("@$seconds");
    $hasil = $dtF->diff($dtT);

    if($hasil->format('%y') > 0){
      return $hasil->format('%y Years %m Month');
    }else if($hasil->format('%m') > 0){
      return $hasil->format('%m Month %d Days');
    }else if($hasil->format('%a') > 0){
      return $hasil->format('%a Days %h Hours');
    }else if($hasil->format('%h') > 0){
      return $hasil->format('%h Hours %i Minutes');
    }else if($hasil->format('%i') > 0){
      return $hasil->format('%i Minutes');
    }else{
      return $hasil->format('%s Seconds');
    }
}

function selisih_waktu($waktu_akhir){
  $waktu_sekarang = date('Y-m-d H:i:s');
  $to_time = strtotime($waktu_akhir);
  $from_time = strtotime($waktu_sekarang);
  $hasil= abs($to_time - $from_time);
  return secondsToTime($hasil);
}

function strip_comma($text){
	return str_replace(',', '', $text);
}

function strip_titik($text){
	return str_replace('.', '', $text);
}
