<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent:: __construct();
		if($this->session->userdata('level')!= "Admin" & $this->session->userdata('level')!="Customer" ) {
			redirect(base_url('auth'));
		}
		
	}

	public function index()
	{
		$data['title'] = "Dashboard";
		$this->load->view('layout/header', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('dashboard/index');
		$this->load->view('layout/footer');
	}












}
