<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_pembayaran');
		if($this->session->userdata('level')!= "Kasir" & $this->session->userdata('level')!="Pemilik" ) {
			redirect(base_url('auth'));
		}
		
	}

	public function index()
	{
		$data['title'] = "Daftar Pembayaran";
		$data['pembayaran'] = $this->M_pembayaran->getPembayaran();
		$data['detail'] = $this->M_pembayaran->getDetailPesanan();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('pembayaran/pemesanan', $data);
		$this->load->view('layout/footer');
	}

	public function submit_satuan()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Data Satuan';
		$data['satuan'] = $this->M_satuan->getSatuan();

		$this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('komponen/satuan', $data);
			$this->load->view('layout/footer');
		}else{
			$this->M_satuan->tambahSat();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('satuan'));
		}	
	}

	public function antar($id)
	{
		$data['title'] = "Data Satuan";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();

		$data['pembayaran'] = $this->M_pembayaran->getPembayaran();
		$data['pemba'] = $this->M_pembayaran->getPembayaran2();

		if( !$this->form_validation->run() == FALSE)
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('pembayaran/pemesanan', $data);
			$this->load->view('layout/footer');
		}else{
			$this->M_pembayaran->Updateantar();
			$this->session->set_flashdata('notif', ' Diantar');
            redirect(base_url('Pemesanan'));
		}	
    }

	public function hapus_satuan($id)
	{
		$this->M_satuan->hapusSat($id);
      	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('satuan'));
	}












}
