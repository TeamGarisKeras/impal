<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	private $list_jabatan;

	function __construct()
	{
			parent::__construct();
			$this->load->model('M_karyawan');
			$this->load->model('M_jabatan');
			$this->list_jabatan =  $this->M_jabatan->get_all_jabatan();
	}

	public function show_karyawan() // Nampilin karyawan sesuai dengna jabatannya
	{
    $jabatan = $this->uri->segment(2);
    if(!$this->M_jabatan->check_jabatan($jabatan)){ // cek adanya jabatan atau tidak
      $this->load->view('errors/html/error404');
    }else{
			$data = $this->M_karyawan->get_all_karyawan_by_jabatan($jabatan);
      $css = array(); // Alamat CSS Dinamis
      $js = array('karyawan.js'); // Alamat JS Dinamis
      $data = array('title' => "Kelola ".$jabatan,
			'list_jabatan' =>$this->list_jabatan,
              'css' => $css,
              'js' => $js,
              'jabatan' => $jabatan,
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
									'list_jabatan' => $this->list_jabatan,
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
		$this->form_validation->set_rules('_namakaryawan', 'Nama Karyawan', 'required|min_length[4]|max_length[30]|alpha_numeric_spaces');
		$this->form_validation->set_rules('_jabatan', 'jabatan', 'required');
		if(!$this->form_validation->run()){
			echo validation_errors();
		}else{
			$this->load->model('M_jabatan');
			$salt = 'impal';
			$password_default = hash('sha512', $salt.set_value('_id'));

			$data = array('id' => set_value('_id'),
										'password' => $password_default,
										'nama' => set_value('_namakaryawan'),
										'jabatan' => set_value('_jabatan'));
			$this->M_karyawan->insert_karyawan($data);
			$link_jabatan = $this->M_jabatan->get_jabatan_by_id(set_value('_jabatan'))->nama_jabatan;
			$this->session->set_flashdata('insert_karyawan', 'sukses');
			redirect('karyawan/'.$link_jabatan);
		}

	}

	public function update(){
		$this->form_validation->set_rules('_id', 'id Karyawan', 'required');
		$this->form_validation->set_rules('_namakaryawan', 'Nama Karyawan', 'required|min_length[4]|max_length[30]|alpha_numeric_spaces');
		$this->form_validation->set_rules('_jabatan', 'jabatan', 'required');
		if(!$this->form_validation->run()){
			echo validation_errors();
		}else{
			$this->load->model('M_jabatan');

			$data = array('nama' => set_value('_namakaryawan'),
										'jabatan' => set_value('_jabatan'));

			$id = set_value('_id'); // id karyawan
			$id_jabatan = set_value('_jabatan');
			$link_jabatan = $this->M_jabatan->get_jabatan_by_id($id_jabatan)->nama_jabatan; //link menuju karyawan yang baru ditambahkan sesuai jabatan
			$this->M_karyawan->update_karyawan($id, $data);
			$this->session->set_flashdata('insert_karyawan','sukses');
			redirect('karyawan/'.$link_jabatan); //redirect ke link sesuai dengna jabatannya
		}
	}

	public function delete(){
		$id = set_value('_id'); // Diambil dari Post Delete, diibaratkan $_POST['_id'];
		$link_jabatan = $this->M_jabatan->get_jabatan_by_id(set_value('_jabatan')); //Untuk mengambil jabatan dari orang yang didelete. kalo data udah di delete nanti bakal di lepar kehalaman karyawan sesuai jabatannya
		$this->M_karyawan->delete_karyawan($id);
		$this->session->set_flashdata('delete_karyawan', 'sukses');
		redirect('karyawan/'.$link_jabatan->nama_jabatan); //redirect ke link sesuai dengan jabtannya
	}
}
