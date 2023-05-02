<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_keuangan');
		if($this->session->userdata('level')!= "Kasir" & $this->session->userdata('level')!="Pemilik" ) {
			redirect(base_url('auth'));
		}
		
	}

	public function index()
	{
		$data['title'] = "Data Keuangan";
		$data['keuangan'] = $this->M_keuangan->getKeuangan();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('keuangan/index', $data);
		$this->load->view('layout/footer');
	}

	public function tambah()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = "Data Keuangan";
		$data['keuangan'] = $this->M_keuangan->getKeuangan();


		$this->form_validation->set_rules('ket', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('keuangan/index', $data);
			$this->load->view('layout/footer');
		}else{
			$this->M_keuangan->tambahUang();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('Keuangan'));
		}	
	}

	public function edit_transaksi($id)
	{
		$data['title'] = "Data Bahan Baku";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['keuangan'] = $this->M_keuangan->getKeuangan();



		if( !$this->form_validation->run() == FALSE)
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('bahan/index', $data);
			$this->load->view('keuangan/index', $data);
			$this->load->view('layout/footer');
		}else{
			$this->M_keuangan->editUang();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('keuangan'));
		}	
    }

	public function hapus_transaksi($id)
	{
		$this->M_keuangan->hapusKeuangan($id);
      	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('keuangan'));
	}












}
