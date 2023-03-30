<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_produk');
		$this->load->model('M_satuan');
		$this->load->model('M_kategori');
		if($this->session->userdata('level')!= "Pelanggan" ) {
			redirect(base_url('auth'));
		}
		
	}

	public function index()
	{
		$data['title'] = "Kedai Kopi Samudera";
		$data['produks'] = $this->M_produk->getProduk();

		$this->load->view('layout2/header', $data);
		$this->load->view('layout2/atas');
		$this->load->view('layout2/navbar');
		$this->load->view('layout2/sidebar');
		$this->load->view('customer/index');
		$this->load->view('layout2/footer');


	}












}
