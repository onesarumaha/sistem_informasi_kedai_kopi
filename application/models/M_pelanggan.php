<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {
	public function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		parent::__construct();
		$this->load->database();
	}

	public function orderPesanan()
	{
    	$kode_order = 'KOP' . random_int(1, 9) . date('im');

		$data_order = [
				'id_user' => htmlspecialchars($this->input->post('id_user', true)),
				'kode_order' => $kode_order,
				'tgl_order' => date('Y-m-d H:i:s'),
				'status' => 'Belum Lunas',
		];
		$this->db->insert('order_menu', $data_order);

		$id_order = $this->db->insert_id();
		$data_pesanan = [
				'id_order' => $id_order,
				'kode' => $kode_order,
				'id_menu' => htmlspecialchars($this->input->post('id_menu', true)),
				'qty' => htmlspecialchars($this->input->post('qty', true)),
				'desk' => htmlspecialchars($this->input->post('desk', true)),
			];
		$this->db->insert('pesanan', $data_pesanan);

	
	}

	public function getOrder() 
	{
		$this->db->order_by('id_order', 'DESC');

		$this->db->select('*');
		$this->db->from('order_menu');
		$this->db->join('users', 'users.id_user = order_menu.id_user');

		$username = $this->session->userdata['username'];
		$this->db->where('username', $username);

		return $query = $this->db->get()->result_array();
	}

	public function getPesanan($id) 
	{
		$this->db->order_by('id_pesanan', 'DESC');

		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('order_menu', 'order_menu.id_order = pesanan.id_order');
		$this->db->join('daftar_menu', 'daftar_menu.id_menu = pesanan.id_menu');
		
		$this->db->where('kode', $id);

		return $query = $this->db->get()->result_array();
	}

	public function hapus($id)
	{
		$this->db->delete('pesanan', ['id_pesanan' => $id] );

	}

	public function orderCheckout()
	{

		$data = [
				'id_order' => htmlspecialchars($this->input->post('id_order', true)),
				'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
				'upload_bayar' => '-',


		];
		$this->db->insert('pembayaran', $data);

	
	}

	public function getCheckout() 
	{

		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('order_menu', 'order_menu.id_order = pembayaran.id_order');


		return $query = $this->db->get()->result_array();
	}

	public function hapusCekout($id) 
	{

	    $this->db->delete('pembayaran', ['id_bayar' => $id]);
	}

	public function idBayar($id)
	{

		return $this->db->get_where('pembayaran', ['id_pembayaran' => $id])->row_array();
			

	}

	public function buktiBayar()
	{
		$gambar = $this->upload->data();
        $gambar = $gambar['file_name'];

		$data = [
				
				'bukti_bayar' => $gambar,

			];
		$this->db->where('id_bayar', $this->input->post('id_bayar'));
		$this->db->update('pembayaran', $data);

		$data2 = [
				
				'status' => 'Lunas',

			];
		$this->db->where('id_order', $this->input->post('id_order'));
		$this->db->update('order_menu', $data2);
	}

	public function tambahPesanan()
	{

		$data_pesanan = [
				'id_order' =>  htmlspecialchars($this->input->post('id_order', true)),
				'id_menu' => htmlspecialchars($this->input->post('id_menu', true)),
				'kode' => htmlspecialchars($this->input->post('kode', true)),
				'qty' => htmlspecialchars($this->input->post('qty', true)),
			];
		$this->db->insert('pesanan', $data_pesanan);

	
	}















}