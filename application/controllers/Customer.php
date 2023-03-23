<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		// if($this->session->userdata('level')!= "Admin" & $this->session->userdata('level')!="Customer" ) {
		// 	redirect(base_url('auth'));
		// }
		
	}

	public function index()
	{
		$data['title'] = "Kedai Kopi Samudera";
		$this->load->view('layout2/header', $data);
		$this->load->view('layout2/atas');
		$this->load->view('layout2/navbar');
		$this->load->view('layout2/sidebar');
		$this->load->view('customer/index');
		$this->load->view('layout2/footer');


	}












}
