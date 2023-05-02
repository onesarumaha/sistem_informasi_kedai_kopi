<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keuangan extends CI_Model {

	public function idsatuan($id)
	{
		return $this->db->get_where('keuangan', ['id_keuangan' => $id])->row_array();
	}

	public function getKeuangan() 
	{
		$this->db->order_by('id_keuangan', 'DESC');

		return $this->db->get('keuangan')->result_array();
	}

	public function tambahUang()
	{

		$data = [
				'tgl' =>  date('Y-m-d'),
				'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
				'jenis_transaksi' => 'Pengeluaran',
				'kategori' => htmlspecialchars($this->input->post('kategori', true)),
				'ket' => htmlspecialchars($this->input->post('ket', true)),


		];
		$this->db->insert('keuangan', $data);

	
	}

	public function editUang()
	{

		$data = [
				'tgl' =>  date('Y-m-d'),
				'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
				'jenis_transaksi' => 'Pengeluaran',
				'kategori' => htmlspecialchars($this->input->post('kategori', true)),
				'ket' => htmlspecialchars($this->input->post('ket', true)),


			];
		$this->db->where('id_keuangan', $this->input->post('id_keuangan'));
		$this->db->update('keuangan', $data);
	}

	public function hapusKeuangan($id) 
	{

	    $this->db->delete('keuangan', ['id_keuangan' => $id]);
	}




}