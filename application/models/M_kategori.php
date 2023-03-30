<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function idkategori($id)
	{
		return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
	}

	public function getKategori() 
	{
		$this->db->order_by('id_kategori', 'DESC');

		return $this->db->get('kategori')->result_array();
	}

	public function tambahKat()
	{


		$data = [
				'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),


		];
		$this->db->insert('kategori', $data);

	
	}

	public function editKat()
	{

		$data = [
				'nama_kategori' => htmlspecialchars($this->input->post('nama_kategori', true)),


			];
		$this->db->where('id_kategori', $this->input->post('id_kategori'));
		$this->db->update('kategori', $data);
	}

	public function hapusKat($id) 
	{
		$this->db->delete('kategori', ['id_kategori' => $id] );

	}




}