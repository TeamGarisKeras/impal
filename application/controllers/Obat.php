<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller {

	public $list_jabatan = null;

	function __construct()
	{
			parent::__construct();
			$this->load->model('M_obat');
			$this->load->model('M_jabatan');
			$this->list_jabatan = $this->M_jabatan->get_all_jabatan();
	}

	public function index()
	{
    $css = array(); // Alamat CSS Dinamis
    $js = array('obat.js'); // Alamat JS Dinamis
    $data = array('title' => "Kelola Obat",
									'list_jabatan' => $this->list_jabatan,
                  'css' => $css,
                  'js' => $js,
									'data_obat' => $this->M_obat->get_all_obat()); // Data yang mau di passing
    $this->load->view('template/v_header', $data);
		$this->load->view('v_obat_index');
    $this->load->view('template/v_footer');

	}

	private function form($title ='Add Obat', $action ='insert', $id =''){
		$css = []; // Alamat CSS Dinamis
		$js = []; // Alamat JS Dinamis
		$data = ['title' => $title,
									'list_jabatan' => $this->list_jabatan,
									'css' => $css,
									'js' => $js,
									'data_obat' => $this->M_obat->get_obat_by_id($id),
									'action' => 'obat/'.$action]; // Data yang mau di passing
		$this->load->view('template/v_header', $data);
		$this->load->view('v_obat_form');
		$this->load->view('template/v_footer');
	}

	public function add(){
		$this->form();
	}

	public function edit($id){
		$this->form('Edit Obat','update', $id);
	}

	public function insert(){
		$this->form_validation->set_rules('_id', 'id Obat', 'required');
		$this->form_validation->set_rules('_namaobat', 'Nama Obat', 'required|min_length[4]|max_length[30]|alpha');
		$this->form_validation->set_rules('_kandungan', 'Kandungan', 'required');

		if(!$this->form_validation->run()){
			$this->load->view('errors/html/error_404');
		}else{
			$data = array('id' => set_value('_id'),
										'nama' => set_value('_namaobat'),
										'kandungan' => set_value('_kandungan'));

			$this->M_obat->insert_obat($data);
			$this->session->set_flashdata('insert_obat','sukses');
			redirect('obat'); //redirect ke link domain/obat
		}
	}

	public function update(){
		$this->form_validation->set_rules('_id', 'id Obat', 'required');
		$this->form_validation->set_rules('_namaobat', 'Nama Obat', 'required|min_length[4]|max_length[30]|alpha');
		$this->form_validation->set_rules('_kandungan', 'Kandungan', 'required');

		if(!$this->form_validation->run()){
			$this->load->view('errors/html/error_404');
		}else{
			$data = array('nama' => set_value('_namaobat'),
										'kandungan' => set_value('_kandungan'));

			$id = set_value('_id');
			$this->M_obat->update_obat($id, $data);
			$this->session->set_flashdata('insert_obat','sukses');
			redirect('obat'); //redirect ke link domain/obat
		}
	}

	public function delete(){
		$id = set_value('_id');
		$this->M_obat->delete_obat($id);
		$this->session->set_flashdata('delete_obat','sukses');
		redirect('obat'); //redirect ke link domain/obat

	}

}
