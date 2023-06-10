<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		$this->load->model('M_keuangan');
		if($this->session->userdata('level')!= "Kasir" & $this->session->userdata('level')!="Pemilik" ) {
			redirect(base_url('auth'));
		}
		
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$data['pen'] = $this->M_keuangan->sumPendapatan();
		$data['peng'] = $this->M_keuangan->sumPengeluaran();

		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('dashboard/index', $data);
		$this->load->view('layout/footer');
	}












}
