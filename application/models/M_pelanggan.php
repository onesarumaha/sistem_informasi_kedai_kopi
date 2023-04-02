<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelanggan extends CI_Model {


	public function orderPesanan()
	{
    	$kode_order = '999' . random_int(1, 9) . date('im');

		$data = [
				'qty' => htmlspecialchars($this->input->post('qty', true)),
				'id_user' => htmlspecialchars($this->input->post('id_user', true)),
				'id_produk' => htmlspecialchars($this->input->post('id_produk', true)),
				'kode_order' => $kode_order,
				// 'tgl' => date('Y-m-d'),
				'status' => 'Belum Bayar',


		];
		$this->db->insert('order_menu', $data);

	
	}

	public function getOrder() 
	{
		$this->db->order_by('id_order', 'DESC');

		$this->db->select('*');
		$this->db->from('order_menu');
		$this->db->join('users', 'users.id_user = order_menu.id_user');
		$this->db->join('produk', 'produk.id_produk = order_menu.id_produk');

		$username = $this->session->userdata['username'];
		$this->db->where('username', $username);

		return $query = $this->db->get()->result_array();
	}

	public function hapus($id)
	{
		$this->db->delete('order_menu', ['id_order' => $id] );

	}
















}