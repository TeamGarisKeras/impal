<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public function index()
	{
    $css = array(); // Alamat CSS Dinamis
    $js = array(); // Alamat JS Dinamis
    $data = array('title' => "Kelola Obat",
                  'css' => $css,
                  'js' => $js); // Data yang mau di passing
    $this->load->view('template/v_header', $data);
		$this->load->view('v_obat_index');
    $this->load->view('template/v_footer');

	}

}
