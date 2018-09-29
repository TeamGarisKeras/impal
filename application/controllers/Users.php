<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		$this->load->model('M_jabatan');
		$css = array(); // Alamat CSS Dinamis
		$js = array(); // Alamat JS Dinamis
		$data = array('title' => "Dashboard",
									'css' => $css,
									'list_jabatan' => $this->M_jabatan->get_all_jabatan(),
									'js' => $js); // Data yang mau di passing
		$this->load->view('template/v_header', $data); // Passing data dari controller Admin ke View nya
		$this->load->view('v_dashboard');
		$this->load->view('template/v_footer');
	}

	public function setting_akun()
	{
		if($this->session->has_userdata('username') && $this->session->has_userdata('level') == 72){
			$this->load->model('M_users');
			$data = array('title' => 'Account Setting',
										'data_akun' => $this->M_users->get_akun($this->session->userdata('username')));
			$this->load->view('admin/v_admin_header', $data);
			$this->load->view('admin/v_setting');
			$this->load->view('admin/v_admin_footer');
		}else{
			$this->load->view('errors/html/error_404');
		}
	}

	public function changepassword()
	{
		$this->form_validation->set_rules('_old_password', 'Old Password', 'required|min_length[4]|max_length[30]');
		$this->form_validation->set_rules('_new_password', 'New Password', 'required|min_length[4]|max_length[30]');
		$this->form_validation->set_rules('_confirmpassword', 'Re Type New Password','required|matches[_new_password]');
		if(!$this->form_validation->run()){
			$this->load->view('errors/html/error_404');
		}else{
			$this->load->model('M_users');
			$username = $this->session->userdata('username');
			$password = set_value('_old_password');
			$salt = "adaba_ikes";
			$password = hash('sha512', $salt.$password);
			if (!$this->M_users->match_password($username, $password)) {
				$this->session->set_flashdata('status_oldpassword', 'gagal');
				redirect('setting');
			}else{
				$username = $this->session->userdata('username');
				$new_password = set_value('_new_password');
				$salt = "adaba_ikes";
				$password = hash('sha512', $salt.$new_password);
				$this->M_users->change_password($username, $password);
				$this->session->set_flashdata('status_change_password', 'sukses');
				redirect('setting');
			}
		}
	}

	public function changeprofil()
	{
		$this->form_validation->set_rules('_nama', 'nama', 'required|max_length[30]');
		if(!$this->form_validation->run()){
			$this->load->view('errors/html/error_404');
		}else{
				$this->load->model('M_users');
				$username = $this->session->userdata('username');
				$new_name = set_value('_nama');
				$data = array('nama' => $new_name);
				$this->M_users->change_profil($username, $data);
				$this->session->set_flashdata('status_change_profil', 'sukses');
				redirect('setting');
			}
	}

}
