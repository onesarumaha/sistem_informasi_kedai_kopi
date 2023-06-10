<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

	public function idproduk($id)
	{
		return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
	}

	public function getProduk() 
	{
		$this->db->order_by('id_menu', 'ASC');

		$this->db->select('*');
		$this->db->from('daftar_menu');
		$this->db->join('satuan', 'satuan.id_satuan = daftar_menu.id_satuan');
		$this->db->join('kategori', 'kategori.id_kategori = daftar_menu.id_kategori');

		return $query = $this->db->get()->result_array();
	}

	public function editProduk()
	{
		$gambar = $this->upload->data();
        $gambar = $gambar['file_name'];

		$data = [
				'nama_menu' => htmlspecialchars($this->input->post('nama_menu', true)),
				'id_kategori' => htmlspecialchars($this->input->post('kategori', true)),
				'id_satuan' => htmlspecialchars($this->input->post('satuan', true)),
				'harga' => htmlspecialchars($this->input->post('harga', true)),
				'diskon' => htmlspecialchars($this->input->post('diskon', true)),
				'deskripsi' => htmlspecialchars($this->input->post('desk', true)),
				'gambar' => $gambar,

			];
		$this->db->where('id_menu', $this->input->post('id_menu'));
		$this->db->update('daftar_menu', $data);
	}

	public function hapusProduk($id) 
	{
		$this->db->where('id_produk',$id);
	    $query = $this->db->get('produk');
	    $row = $query->row();

	    unlink("./assets/gambar/$row->gambar");

	    $this->db->delete('produk', ['id_produk' => $id]);
	}




}