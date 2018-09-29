<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model('M_karyawan');
	}

	public function show_karyawan() // Nampilin karyawan sesuai dengna jabatannya
	{
		$this->load->model('M_jabatan');
    $jabatan = $this->uri->segment(3);
    if(!$this->M_jabatan->check_jabatan($jabatan)){ // cek adanya jabatan atau tidak
      $this->load->view('errors/html/error404');
    }else{
			$data = $this->M_karyawan->get_all_karyawan_by_jabatan($jabatan);
      $css = array(); // Alamat CSS Dinamis
      $js = array(); // Alamat JS Dinamis
      $data = array('title' => "Kelola ".$jabatan,
              'css' => $css,
              'js' => $js,
              'jabatan' => $jabatan,
							'list_jabatan' => $this->M_jabatan->get_all_jabatan(),
              'data_karyawan' => $data); // Data yang mau di passing
      $this->load->view('template/v_header', $data);
      $this->load->view('v_karyawan_index');
      $this->load->view('template/v_footer');
    }
  }

  private function form($title ='Add Karyawan', $action ='insert', $id =''){
		$this->load->model('M_jabatan');
    $css = array(); // Alamat CSS Dinamis
    $js = array(); // Alamat JS Dinamis
    $data = array('title' => $title,
                  'css' => $css,
                  'js' => $js,
									'options_jabatan' => $this->M_jabatan->get_all_jabatan(),
                  'data_karyawan' => $this->M_karyawan->get_karyawan_by_id($id),
                  'action' => 'karyawan/'.$action); // Data yang mau di passing
    $this->load->view('template/v_header', $data);
    $this->load->view('v_karyawan_form');
    $this->load->view('template/v_footer');
  }

  public function add(){
    $this->form(); // manggill method form yang satu class
  }

  public function edit($id){
    $this->form('Edit Karyawan','update', $id); // manggill method form yang satu class
  }

	public function insert(){
		$this->form_validation->set_rules('_id', 'id Karyawan', 'required');
		$this->form_validation->set_rules('_namakaryawan', 'Nama Karyawan', 'required|min_length[4]|max_length[30]|alpha');
		$this->form_validation->set_rules('_jabatan', 'jabatan', 'required');
		if(!$this->form_validation->run()){
			redirect('google.com');
		}else{
			$this->load->model('M_jabatan');
			$salt = 'impal';
	    // $password = hash('sha512', $salt.set_value('_password'));
			$password_default = hash('sha512', $salt.set_value('_id'));

			$data = array('id' => set_value('_id'),
										'nama' => set_value('_namakaryawan'),
										'password' => $password_default,
										'list_jabatan' => $this->M_jabatan->get_all_jabatan(),
										'jabatan' => set_value('_jabatan'));

			$id_jabatan = set_value('_jabatan');
			$link_jabatan = $this->M_jabatan->get_nama_jabatan($id_jabatan); //link menuju karyawan yang baru ditambahkan sesuai jabatan
			$this->M_karyawan->insert_karyawan($data);
			$this->session->set_flashdata('insert_karyawan','sukses');
			redirect('karyawan/c/'.$link_jabatan); //redirect ke link domain/obat
		}
	}

	public function update(){
		$this->form_validation->set_rules('_id', 'id Karyawan', 'required');
		$this->form_validation->set_rules('_namakaryawan', 'Nama Karyawan', 'required|min_length[4]|max_length[30]|alpha');
		$this->form_validation->set_rules('_jabatan', 'jabatan', 'required');
		if(!$this->form_validation->run()){
			redirect('google.com');
		}else{
			$this->load->model('M_jabatan');

			$data = array('nama' => set_value('_namakaryawan'),
										'jabatan' => set_value('_jabatan'));

			$id_jabatan = set_value('_jabatan');
			$link_jabatan = $this->M_jabatan->get_nama_jabatan($id_jabatan); //link menuju karyawan yang baru ditambahkan sesuai jabatan
			$this->M_karyawan->insert_karyawan($data);
			$this->session->set_flashdata('update_karyawan','sukses');
			redirect('karyawan/c/'.$link_jabatan); //redirect ke link domain/obat
		}
	}



}
