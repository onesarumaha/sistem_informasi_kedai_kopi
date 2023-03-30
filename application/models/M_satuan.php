<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_satuan extends CI_Model {

	public function idsatuan($id)
	{
		return $this->db->get_where('satuan', ['id_satuan' => $id])->row_array();
	}

	public function getSatuan() 
	{
		$this->db->order_by('id_satuan', 'DESC');

		return $this->db->get('satuan')->result_array();
	}

	public function tambahSat()
	{

		$data = [
				'nama_satuan' => htmlspecialchars($this->input->post('nama_satuan', true)),


		];
		$this->db->insert('satuan', $data);

	
	}

	public function editSat()
	{

		$data = [
				'nama_satuan' => htmlspecialchars($this->input->post('nama_satuan', true)),


			];
		$this->db->where('id_satuan', $this->input->post('id_satuan'));
		$this->db->update('satuan', $data);
	}

	public function hapusSat($id) 
	{

	    $this->db->delete('satuan', ['id_satuan' => $id]);
	}




}