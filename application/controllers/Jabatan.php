<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	private $list_jabatan;

	function __construct()
	{
			parent::__construct();
			$this->load->model('M_jabatan');
			$this->list_jabatan = $this->M_jabatan->get_all_jabatan();
	}

	public function show_jabatan(){
      $css = array(); // Alamat CSS Dinamis
      $js = array('jabatan.js'); // Alamat JS Dinamis
      $data = array('title' => "Kelola Jabatan",
              'css' => $css,
              'js' => $js,
							'list_jabatan' =>$this->list_jabatan
							); // Data yang mau di passing

			$this->load->view('template/v_header', $data);
      $this->load->view('v_jabatan_index');
      $this->load->view('template/v_footer');
	}

	private function form($title ='Add Jabatan', $action ='insert', $id =''){
		$css = array(); // Alamat CSS Dinamis
		$js = array(); // Alamat JS Dinamis
		$data = array('title' => $title,
									'css' => $css,
									'js' => $js,
									'list_jabatan' =>$this->list_jabatan,
									'data_jabatan' => $this->M_jabatan->get_jabatan_by_id($id),
									'action' => 'jabatan/'.$action); // Data yang mau di passing
		$this->load->view('template/v_header', $data);
		$this->load->view('v_jabatan_form');
		$this->load->view('template/v_footer');

	}

	public function add(){
		$this->form(); // manggill method form yang satu class
	}

	public function edit($id){
		$this->form('Edit Jabatan','update', $id); // manggill method form yang satu class
	}

	public function insert(){
		$this->form_validation->set_rules('_namajabatan', 'Nama Jabatan', 'required|min_length[4]|max_length[30]|alpha');
		if(!$this->form_validation->run()){
			$this->load->view('errors/html/error_404');
		}else{
			$data = array('nama_jabatan' => set_value('_namajabatan'));

			$this->M_jabatan->insert_jabatan($data);
			$this->session->set_flashdata('insert_jabatan','sukses');
			redirect('jabatan'); //redirect ke link domain/obat
		}
	}

	public function update(){
		$this->form_validation->set_rules('_id', 'id Obat', 'required');
		$this->form_validation->set_rules('_namajabatan', 'Nama Obat', 'required|min_length[4]|max_length[30]|alpha');

		if(!$this->form_validation->run()){
			$this->load->view('errors/html/error_404');
		}else{
			$data = array('id' => set_value('_id'),
										'nama_jabatan' => set_value('_namajabatan'));

			$id = set_value('_id');
			$this->M_jabatan->update_jabatan($id, $data);
			$this->session->set_flashdata('insert_jabatan','sukses');
			redirect('jabatan'); //redirect ke link domain/obat
		}
	}

	public function delete(){
		$id = set_value('_id');
		$this->M_jabatan->delete_jabatan($id);
		$this->session->set_flashdata('delete_jabatan','sukses');
		redirect('jabatan'); //redirect ke link domain/obat
	}



}
