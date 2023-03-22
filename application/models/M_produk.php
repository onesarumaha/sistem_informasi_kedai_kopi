<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {

	public function getProduk() 
	{
		$this->db->order_by('id_produk', 'DESC');

		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('satuan', 'satuan.id_satuan = produk.id_satuan');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_satuan');

		return $query = $this->db->get()->result_array();
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