<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('M_produk');
		$this->load->model('M_satuan');
		$this->load->model('M_kategori');
		if($this->session->userdata('level')!= "Kasir" & $this->session->userdata('level')!="Pemilik" ) {
			redirect(base_url('auth'));
		}
		
	}

	public function index()
	{
		$data['title'] = "Data Produk";
		$data['produks'] = $this->M_produk->getProduk();
		$data['satuan'] = $this->M_satuan->getSatuan();
		$data['kategori'] = $this->M_kategori->getKategori();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('produk/index', $data);
		$this->load->view('layout/footer');
	}

	public function submit_produk()
	{
		$data['title'] = "Data Produk";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['produks'] = $this->M_produk->getProduk();
		$data['satuan'] = $this->M_satuan->getSatuan();
		$data['kategori'] = $this->M_kategori->getKategori();

		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
		$this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Jumlah', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required');
		// $this->form_validation->set_rules('diskon', 'Diskon', 'trim|required');
		
		$config['upload_path']          = './assets/gambar/';
        $config['allowed_types']        = 'gif|jpg|png|JPEG';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar'))
        {
            $this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('produk/index',$data);
			$this->load->view('layout/footer');
        }
        else
        {
        	$kode_produk = 'AIA' . random_int(1, 9) . date('imy');
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];
            $nama_produk = $this->input->post('nama_produk', TRUE);
            $satuan = $this->input->post('satuan', TRUE);
            $kategori = $this->input->post('kategori', TRUE);
            $harga = $this->input->post('harga', TRUE);
            $diskon = $this->input->post('diskon', TRUE);
            $ket = $this->input->post('ket', TRUE);

			$data = array(
				'nama_produk' => $nama_produk,
				'id_satuan' => $satuan,
				'id_kategori' => $kategori,
				'harga' => $harga,
				'diskon' => $diskon,
				'kode_produk' => $kode_produk,
				'gambar' => $gambar,
				'ket' => $ket
			);

			$this->db->insert('produk', $data);
			$this->session->set_flashdata('notif', ' Ditambahkan');
            redirect(base_url('Produk'));
        }


	
	}


	public function edit_produk($id)
	{
		$data['title'] = "Data Produk";
		$data['query'] = $this->db->get_where('users',['level' => $this->session->userdata('level')])->row_array();
		$data['produks'] = $this->M_produk->getProduk();
		$data['satuan'] = $this->M_satuan->getSatuan();
		$data['kategori'] = $this->M_kategori->getKategori();

		$config['upload_path']          = './assets/gambar/';
        $config['allowed_types']        = 'gif|jpg|png|JPEG';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);
        

		if(! $this->upload->do_upload('gambar'))
		{
			$this->load->view('layout/header', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('produk/index',$data);
			$this->load->view('layout/footer');
		}else{
			
			$this->M_produk->editProduk();
			$this->session->set_flashdata('notif', ' Diedit');
            redirect(base_url('produk'));
		}	
    }



	public function hapus_produk($id)
	{
		$this->M_produk->hapusProduk($id);
      	$this->session->set_flashdata('notif', ' Dihapus');
        redirect(base_url('Produk'));
	}












}
