<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BahanBaku extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_satuan');
		$this->load->model('M_bahan');
		if($this->session->userdata('level')!= "Kasir" & $this->session->userdata('level')!="Pemilik" ) {
			redirect(base_url('auth'));
		}
		
	}

	public function index()
	{
		$data['title'] = "Data Bahan Baku";
		$data['satuan'] = $this->M_satuan->getSatuan();
		$data['bahan'] = $this->M_bahan->getBaku();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('bahan/index', $data);
		$this->load->view('layout/footer');
	}

	public function tambah()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Data Bahan Baku';
		$data['satuan'] = $this->M_satuan->getSatuan();
		$data['bahan'] = $this->M_bahan->getBaku();

		$this->form_validation->set_rules('nama_bahan_baku', 'Nama Bahan Baku', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('id_satuan', 'Satuan', 'trim|required');
		$this->form_validation->set_rules('ket', 'Ket', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('bahan/index', $data);
			$this->load->view('layout/footer');
		}else{
			$this->M_bahan->tambahBahan();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('BahanBaku'));
		}	
	}

	public function edit_bahan($id)
	{
		$data['title'] = "Data Bahan Baku";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['satuan'] = $this->M_satuan->getSatuan();
		$data['bahan'] = $this->M_bahan->getBaku();


		if( !$this->form_validation->run() == FALSE)
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('bahan/index', $data);
			$this->load->view('layout/footer');
		}else{
			$this->M_bahan->editBahan();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('BahanBaku'));
		}	
    }

	public function hapus_bahan($id)
	{
		$this->M_bahan->hapusBahan($id);
      	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('BahanBaku'));
	}












}
