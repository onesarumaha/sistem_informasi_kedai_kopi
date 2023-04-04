<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_produk');
		$this->load->model('M_satuan');
		$this->load->model('M_kategori');
		$this->load->model('M_pelanggan');
		if($this->session->userdata('level')!= "Pelanggan" ) {
			redirect(base_url('auth'));
		}
		
	}

	public function index()
	{
		$data['title'] = "Kedai Kopi Samudera";
		$data['grid'] = "Daftar Menu  ";
		$data['produks'] = $this->M_produk->getProduk();
		$data['order'] = $this->M_pelanggan->getOrder();


		$this->load->view('layout2/header', $data);
		$this->load->view('layout2/atas');
		$this->load->view('layout2/navbar', $data);
		$this->load->view('layout2/sidebar');
		$this->load->view('customer/index',$data);
		$this->load->view('layout2/footer');
	}

	public function order()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = "Kedai Kopi Samudera";
		$data['produks'] = $this->M_produk->getProduk();
		$data['order'] = $this->M_pelanggan->getOrder();


		if(!$this->form_validation->run() == FALSE) 
		{
			$this->load->view('layout2/header', $data);
			$this->load->view('layout2/atas');
			$this->load->view('layout2/navbar', $data);
			$this->load->view('layout2/sidebar');
			$this->load->view('customer/index', $data);
			$this->load->view('layout2/footer');
		}else{
			$this->M_pelanggan->orderPesanan();
			$this->session->set_flashdata('notif', ' Ditambahkan dikeranjang');
            redirect(base_url('pelanggan'));
		}	
	}

	public function pemesanan()
	{
		$data['title'] = "Orderan | Kedai Kopi Samudera";
		$data['grid'] = "Orderan ";
		$data['produks'] = $this->M_produk->getProduk();
		$data['order'] = $this->M_pelanggan->getOrder();


		$this->load->view('layout2/header', $data);
		$this->load->view('layout2/atas');
		$this->load->view('layout2/navbar', $data);
		$this->load->view('layout2/sidebar');
		$this->load->view('customer/pemesanan', $data);
		$this->load->view('layout2/footer');
	}

	public function hapus($id)
	{
		$this->M_pelanggan->hapus($id);
      	$this->session->set_flashdata('notif', ' Berhasil Dihapus');
        redirect(base_url('Pelanggan/pemesanan'));
	}

	public function submit_pesanan()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = "Kedai Kopi Samudera";
		$data['produks'] = $this->M_produk->getProduk();
		$data['order'] = $this->M_pelanggan->getOrder();
		// $data['chekout'] = $this->M_pelanggan->getChekout();


		if(!$this->form_validation->run() == FALSE) 
		{
			$this->load->view('layout2/header', $data);
			$this->load->view('layout2/atas');
			$this->load->view('layout2/navbar', $data);
			$this->load->view('layout2/sidebar');
			$this->load->view('customer/index', $data);
			$this->load->view('layout2/footer');
		}else{
			$this->M_pelanggan->orderCheckout();
			$this->session->set_flashdata('notif', ' Segera Bayar');
            redirect(base_url('pelanggan/checkout'));
		}	
	}

	public function checkout()
	{
		$data['title'] = "Kedai Kopi Samudera";
		$data['grid'] = "Daftar Menu  ";
		$data['produks'] = $this->M_produk->getProduk();
		$data['order'] = $this->M_pelanggan->getOrder();
		$data['checkout'] = $this->M_pelanggan->getCheckout();


		$this->load->view('layout2/header', $data);
		$this->load->view('layout2/atas');
		$this->load->view('layout2/navbar', $data);
		$this->load->view('layout2/sidebar');
		$this->load->view('customer/pembayaran',$data);
		$this->load->view('layout2/footer');
	}

	public function hapus_checkout($id)
	{
		$this->M_pelanggan->hapusCekout($id);
      	$this->session->set_flashdata('notif', ' Berhasil Dihapus');
        redirect(base_url('Pelanggan/checkout'));
	}

	public function pembayaran()
	{
		$data['title'] = "Kedai Kopi Samudera";
		$data['grid'] = "Daftar Menu  ";
		$data['produks'] = $this->M_produk->getProduk();
		$data['order'] = $this->M_pelanggan->getOrder();
		$data['checkout'] = $this->M_pelanggan->getCheckout();


		$this->load->view('layout2/header', $data);
		$this->load->view('layout2/atas');
		$this->load->view('layout2/navbar', $data);
		$this->load->view('layout2/sidebar');
		$this->load->view('customer/pembayaran',$data);
		$this->load->view('layout2/footer');
	}












}
