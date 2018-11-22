<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

	private $list_jabatan = null;

	function __construct(){
			parent::__construct();
			$this->load->model('M_jabatan');
			$this->list_jabatan = $this->M_jabatan->get_all_jabatan();
	}


	public function index(){

		$css = array(); // Alamat CSS Dinamis
		$js = array(); // Alamat JS Dinamis
		$data = array('title' => "Dashboard",
									'css' => $css,
									'list_jabatan' => $this->list_jabatan,
									'js' => $js); // Data yang mau di passing
		$this->load->view('template/v_header', $data); // Passing data dari controller Admin ke View nya
		$this->load->view('v_dashboard');
		$this->load->view('template/v_footer');
	}

	public function setting_akun()
	{
		if($this->session->has_userdata('id_karyawan')){
			$this->load->model('M_login');
			$data = array('title' => 'Account Setting',
									'list_jabatan' =>$this->list_jabatan,
										'data_akun' => $this->M_login->get_akun_by_id($this->session->userdata('id_karyawan')));


			$this->load->view('template/v_header', $data);
			$this->load->view('v_setting');
			$this->load->view('template/v_footer');
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
		$this->form_validation->set_rules('_nama', 'nama', 'required|max_length[30]|alpha_dash');
		$this->form_validation->set_rules('_no_telp', 'no telp', 'required|max_length[30]|numeric');
		$this->form_validation->set_rules('_alamat', 'alamat', 'required|max_length[100]alpha_dash');
		$this->form_validation->set_rules('_kecamatan', 'kecamatan', 'required|max_length[30]alpha_dash');
		$this->form_validation->set_rules('_kelurahan', 'kelurahan', 'required|max_length[30]alpha_dash');

		if(!$this->form_validation->run()){
			echo validation_errors();
		}else{
				$this->load->model('M_users');
				$id_karyawan = $this->session->userdata('id_karyawan');
				$data = array('nama' => set_value('_nama'),
											'no_telp' => set_value('_no_telp'),
										  'alamat' => set_value('_alamat'),
										   'kecamatan' => set_value('_kecamatan'),
										   'kelurahan' => set_value('_kelurahan'));

				$this->M_login->change_profil($id_karyawan, $data);
				$this->session->set_flashdata('status_change_profil', 'sukses');
				redirect('setting');
			}
	}

}
