<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bahan extends CI_Model {

	public function idsatuan($id)
	{
		return $this->db->get_where('bahan_baku', ['id_bb' => $id])->row_array();
	}

	public function getBaku() 
	{
		$this->db->select('*');
		$this->db->from('bahan_baku');
		$this->db->join('satuan', 'satuan.id_satuan = bahan_baku.id_satuan');

		return $query = $this->db->get()->result_array();

	}

	public function tambahBahan()
	{

		$data = [
				'nama_bahan_baku' => htmlspecialchars($this->input->post('nama_bahan_baku', true)),
				'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
				'id_satuan' => htmlspecialchars($this->input->post('id_satuan', true)),
				'ket' => htmlspecialchars($this->input->post('ket', true)),


		];
		$this->db->insert('bahan_baku', $data);

	
	}

	public function editBahan()
	{

		$data = [
				'nama_bahan_baku' => htmlspecialchars($this->input->post('nama_bahan_baku', true)),
				'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
				'id_satuan' => htmlspecialchars($this->input->post('id_satuan', true)),
				'ket' => htmlspecialchars($this->input->post('ket', true)),


			];
		$this->db->where('id_bb', $this->input->post('id_bb'));
		$this->db->update('bahan_baku', $data);
	}

	public function hapusBahan($id) 
	{

	    $this->db->delete('bahan_baku', ['id_bb' => $id]);
	}




}