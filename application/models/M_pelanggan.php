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
		// $this->db->order_by('id_pembayaran', 'DESC');
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('order_menu', 'order_menu.id_order = pembayaran.id_order');


		return $query = $this->db->get()->result_array();
	}

	public function getHistory() 
	{
		$this->db->order_by('id_pembayaran', 'DESC');
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('order_menu', 'order_menu.id_order = pembayaran.id_order');
		
		$username = $this->session->userdata['id_user'];
		$this->db->where('id_user', $username);

		return $query = $this->db->get()->result_array();
	}

	public function getBuktibayar() 
	{
		$this->db->order_by('id_pembayaran', 'DESC');
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('order_menu', 'order_menu.id_order = pembayaran.id_order');

		$username = $this->session->userdata['id_user'];
		$this->db->where('id_user', $username);

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
				'tgl_bayar' =>  date('Y-m-d H:i:s'),
				'upload_bayar' => $gambar,

			];
		$this->db->where('id_pembayaran', $this->input->post('id_pembayaran'));
		$this->db->update('pembayaran', $data);

		$data2 = [
				'no_meja' => htmlspecialchars($this->input->post('no_meja', true)),
				'status' => htmlspecialchars($this->input->post('status', true)),

			];
		$this->db->where('id_order', $this->input->post('id_order'));
		$this->db->update('order_menu', $data2);

		$data = [
				'tgl' =>  date('Y-m-d'),
				'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
				'jenis_transaksi' => 'Pendapatan',
				'kategori' => 'Pendapatan Usaha',
				'ket' => '-',


		];
		$this->db->insert('keuangan', $data);

		$message = '
			<h3 align="center">Kedai Kopi Samudera</h3>
			<label>
					"Teruntuk konsumen yang kami hormati. Terima banyak atas pembelian yang telah kamu lakukan. Sungguh pesanan Anda, berarti banyak bagi perkembangan bisnis kami. Selamat menikmati."
			</label>
				<table border="1" width="100%" cellpadding="5">
					<tr>
						<td width="30%">Tanggal</td>
						<td width="70%">'.date('Y-m-d').'</td>
					</tr>
					<tr>
						<td width="30%">Metode Pembayaran </td>
						<td width="70%">'.$this->input->post("status").'</td>
					</tr>
					<tr>
						<td width="30%">Total </td>
						<td width="70%">Rp. '.number_format($this->input->post("jumlah")).'</td>
					</tr>
					
				</table>
			';

		 $config = Array(
		      	'protocol' => 'smtp',
	            'smtp_host' => 'ssl://smtp.googlemail.com',
	            'smtp_port' => 465,
	            'smtp_user' => 'wantri1998@gmail.com',
	            'smtp_pass' => 'fjjkmqvztrcfcoyf',
	            'mailtype' => 'html',
	            'charset' => 'iso-8859-1'
		    );

          $this->load->library('email', $config);
          $this->email->initialize($config);

          	$this->email->set_newline("\r\n");
		    $this->email->from('wantri1998@gmail.com', 'Kedai Kopi Samudera');
		    $this->email->to($this->input->post("email"));
		    $this->email->subject('Pembayaran ');
	        $this->email->message($message);
	        // $this->email->attach('./assets/template/images/download.png');

          if($this->email->send()) {
              	// $this->session->set_flashdata('notif', ' Dikirim');
        		// redirect	(base_url('pelanggan/bukti_pembayaran/'));
          }
          else {
               show_error($this->email->print_debugger());
          }
	}

	public function buktiBayarTransfer()
	{
		$gambar = $this->upload->data();
        $gambar = $gambar['file_name'];

		$data = [
				'tgl_bayar' =>  date('Y-m-d H:i:s'),
				'upload_bayar' => '-',

			];
		$this->db->where('id_pembayaran', $this->input->post('id_pembayaran'));
		$this->db->update('pembayaran', $data);

		$data2 = [
				'no_meja' => htmlspecialchars($this->input->post('no_meja', true)),
				'status' => htmlspecialchars($this->input->post('status', true)),

			];
		$this->db->where('id_order', $this->input->post('id_order'));
		$this->db->update('order_menu', $data2);

		$data = [
				'tgl' =>  date('Y-m-d'),
				'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
				'jenis_transaksi' => 'Pendapatan',
				'kategori' => 'Pendapatan Usaha',
				'ket' => '-',


		];
		$this->db->insert('keuangan', $data);

		$message = '
			<h3 align="center">Kedai Kopi Samudera</h3>
			<label>
					"Teruntuk konsumen yang kami hormati. Terima banyak atas pembelian yang telah kamu lakukan. Sungguh pesanan Anda, berarti banyak bagi perkembangan bisnis kami. Selamat menikmati.""
			</label>
				<table border="1" width="100%" cellpadding="5">
					<tr>
						<td width="30%">Tanggal</td>
						<td width="70%">'.date('Y-m-d').'</td>
					</tr>
					<tr>
						<td width="30%">Metode Pembayaran </td>
						<td width="70%">'.$this->input->post("status").'</td>
					</tr>
					<tr>
						<td width="30%">Total </td>
						<td width="70%">Rp. '.number_format($this->input->post("jumlah")).'</td>
					</tr>
					
				</table>
			';

		 $config = Array(
		      	'protocol' => 'smtp',
	            'smtp_host' => 'ssl://smtp.googlemail.com',
	            'smtp_port' => 465,
	            'smtp_user' => 'wantri1998@gmail.com',
	            'smtp_pass' => 'fjjkmqvztrcfcoyf',
	            'mailtype' => 'html',
	            'charset' => 'iso-8859-1'
		    );

          $this->load->library('email', $config);
          $this->email->initialize($config);

          	$this->email->set_newline("\r\n");
		    $this->email->from('wantri1998@gmail.com', 'Dwi');
		    $this->email->to($this->input->post("email"));
		    $this->email->subject('Pembayaran ');
	        $this->email->message($message);
	        // $this->email->attach('./assets/template/images/download.png');

          if($this->email->send()) {
              	// $this->session->set_flashdata('notif', ' Dikirim');
        		// redirect	(base_url('pelanggan/bukti_pembayaran/'));
          }
          else {
               show_error($this->email->print_debugger());
          }
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