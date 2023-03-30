<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_kategori');
		if($this->session->userdata('level')!= "Kasir" & $this->session->userdata('level')!="Pemilik" ) {
			redirect(base_url('auth'));
		}
		
	}

	public function index()
	{
		$data['title'] = "Data Kategori";
		$data['kategori'] = $this->M_kategori->getKategori();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('komponen/kategori', $data);
		$this->load->view('layout/footer');
	}

	public function submit_kategori()
	{
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['title'] = 'Kategori';
		$data['kategori'] = $this->M_kategori->getKategori();

		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');

		if($this->form_validation->run() == FALSE) 
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('komponen/kategori', $data);
			$this->load->view('layout/footer');
		}else{
			$this->M_kategori->tambahKat();
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('kategori'));
		}	
	}

	public function edit_kategori($id)
	{
		$data['title'] = "Kategori";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['kategori'] = $this->M_kategori->getKategori();

		if( !$this->form_validation->run() == FALSE)
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('komponen/kategori', $data);
			$this->load->view('layout/footer');
		}else{
			$this->M_kategori->editKat();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('kategori'));
		}	
    }


	public function hapus_kategori($id)
	{
		$this->M_kategori->hapusKat($id);
      	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('kategori'));
	}












}
