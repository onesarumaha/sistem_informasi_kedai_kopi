<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {

	public function idsatuan($id)
	{
		return $this->db->get_where('satuan', ['id_satuan' => $id])->row_array();
	}

	public function getPembayaran() 
	{

		$this->db->select('*');
		$this->db->from('order_menu');
		$this->db->join('users', 'users.id_user = order_menu.id_user');
		$this->db->where('status_order', 'Menunggu');

		$this->db->where('status', 'Lunas');

		return $query = $this->db->get()->result_array();
	}

	public function getDetailPesanan() 
	{
		// $this->db->order_by('id_order', 'DESC');

		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->join('order_menu', 'order_menu.id_order = pesanan.id_order');
		$this->db->join('daftar_menu', 'daftar_menu.id_menu = pesanan.id_menu');

		// $this->db->where('status', 'Lunas');

		return $query = $this->db->get()->result_array();
	}

	public function getPembayaran2() 
	{
		$this->db->order_by('id_pembayaran', 'DESC');

		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('order_menu', 'order_menu.id_order = pembayaran.id_pembayaran');

		$this->db->where('status', 'Tunai');

		return $query = $this->db->get()->result_array();
	}

	public function tambahSat()
	{

		$data = [
				'nama_satuan' => htmlspecialchars($this->input->post('nama_satuan', true)),


		];
		$this->db->insert('satuan', $data);

	
	}

	public function Updatelunas()
	{

		$data = [
				'status' => htmlspecialchars($this->input->post('status', true)),


			];
		$this->db->where('id_order', $this->input->post('id_order'));
		$this->db->update('order_menu', $data);
	}
	public function Updateantar()
	{

		$data = [
				'status_order' => htmlspecialchars($this->input->post('status_order', true)),


			];
		$this->db->where('id_order', $this->input->post('id_order'));
		$this->db->update('order_menu', $data);
	}

	public function hapusSat($id) 
	{

	    $this->db->delete('satuan', ['id_satuan' => $id]);
	}




}