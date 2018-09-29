<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model('M_login');
	}

	public function index()
	{
    $this->form_validation->set_rules('_id', 'Id Karyawan', 'required');
    $this->form_validation->set_rules('_password', 'Password', 'required');
		if(!$this->form_validation->run()){
      $this->load->view('v_login');
    }else{
      if($this->M_login->check_credential()){
        $id_karyawan = set_value('_id');
        $data = $this->M_login->get_akun($id_karyawan);
        $this->session->set_userdata($data);
        redirect('dashboard');

      }else{
        $this->session->set_flashdata('status_login','gagal');
        redirect('login');
      }
    }
  }

}
