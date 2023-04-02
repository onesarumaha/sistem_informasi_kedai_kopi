<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

	public function idproduk($id)
	{
		return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
	}

	public function getProduk() 
	{
		$this->db->order_by('id_produk', 'DESC');

		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('satuan', 'satuan.id_satuan = produk.id_satuan');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');

		return $query = $this->db->get()->result_array();
	}

	public function editProduk()
	{
		$gambar = $this->upload->data();
        $gambar = $gambar['file_name'];

		$data = [
				'nama_produk' => htmlspecialchars($this->input->post('nama_produk', true)),
				'id_kategori' => htmlspecialchars($this->input->post('kategori', true)),
				'id_satuan' => htmlspecialchars($this->input->post('satuan', true)),
				'harga' => htmlspecialchars($this->input->post('harga', true)),
				'diskon' => htmlspecialchars($this->input->post('diskon', true)),
				'ket' => htmlspecialchars($this->input->post('ket', true)),
				'gambar' => $gambar,

			];
		$this->db->where('id_produk', $this->input->post('id_produk'));
		$this->db->update('produk', $data);
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