<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{


	public function all_produk()
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('kategori', 'kategori.id_kategori = tb_produk.id_kategori');
		$this->db->order_by('produk_id', 'DESC');
		return $this->db->get()->result_array();
	}

	public function all_produk_forhome()
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('kategori', 'kategori.id_kategori = tb_produk.id_kategori');
		$this->db->order_by('produk_id', 'DESC');
		$this->db->limit(8);
		return $this->db->get()->result_array();
	}

	public function cari_produk($key)
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('kategori', 'kategori.id_kategori = tb_produk.id_kategori');
		$this->db->order_by('produk_id', 'DESC');
		$this->db->like('nama_produk', $key);
		$this->db->or_like('harga', $key);
		return $this->db->get()->result_array();
	}


	public function detail_produk($id, $tag, $url)
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('kategori', 'kategori.id_kategori = tb_produk.id_kategori');
		$this->db->where('produk_url', $url);
		$this->db->where('url', $tag);
		$this->db->where('produk_id', $id);
		return $this->db->get()->row_array();
	}

	public function related_produk($tag)
	{
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->join('kategori', 'kategori.id_kategori = tb_produk.id_kategori');
		$this->db->where('url', $tag);
		$this->db->limit(4);
		return $this->db->get()->result_array();
	}

	public function cari_artikel($s) {
		$this->db->like('blog_judul', $s);
		$this->db->or_like('blog_isi', $s);
		return $this->db->get('tb_blog')->result_array();
	}

	public function detail_artikel($url) {
		return $this->db->get_where('tb_blog', ['blog_url' => $url])->row_array();
	}

	public function data_artikel_for_home() {
		$this->db->order_by('blog_tgl', 'DESC');
		$this->db->limit(3);
		return $this->db->get('tb_blog')->result_array();
	}

	public function data_artikel() {
		$this->db->order_by('blog_tgl', 'DESC');
		return $this->db->get('tb_blog')->result_array();
	}

	public function all_kategori()
	{
		return $this->db->get('kategori')->result_array();
	}

	public function register_user()
	{

		$data = array(

			'nama_lengkap'				=>	ucwords($this->input->post('nama')),

			'email'			=>	strtolower($this->input->post('email_reg')),

			'password'			=>	password_hash($this->input->post('password2'), PASSWORD_DEFAULT),


			'telepon'			=>	$this->input->post('telepon')

		);


		$this->db->insert('customer', $data);
	}
	public function sigin_user()
	{
		$mail = $this->input->post('email');
		$sandi = $this->input->post('password');

		$cek_blok = $this->db->get_where('customer', ['email' => $mail])->row_array();

		$cek_user = $this->db->get_where('customer', ['email' => $mail])->row_array();
		if ($cek_user) {
			if (password_verify($sandi, $cek_user['password'])) {
				$sess_create = array(
					'userid'			=>	$cek_user['user_id'],
					'username'			=>	$cek_user['nama_lengkap'],
					'usermail'			=>	$cek_user['email'],
					'userpass'			=>	$cek_user['password'],
					'usercreated'		=>	$cek_user['user_created'],
					'loginstatus'		=>	'6484bbvnvfdswuieywor3443993'
				);

				$this->session->set_userdata($sess_create);
				redirect('user');
			} else {
				$this->session->set_flashdata('error', 'Password anda salah');
				redirect('account');
			}
		} else {
			$this->session->set_flashdata('error', 'Email tidak ditemukan');
			redirect('account');
		}
	}

	public function data_cart()
	{
		$this->db->where('cart_userid', $this->session->userdata('userid'));
		return $this->db->get('keranjang')->result_array();
	}

	public function simpan_transaksi()
	{

		//$prov = explode(",", $this->input->post('prov', TRUE));
		$kota = $this->input->post('kota', TRUE);
		$alamat = $this->input->post('alamat', TRUE);
		$pos = $this->input->post('kd_pos', TRUE);
		//$kurir = $this->input->post('kurir', TRUE);
		//$layanan = explode(",", $this->input->post('layanan', TRUE));
		$ongkir = $this->input->post('ongkir', TRUE);
		$total = $this->input->post('total', TRUE);
		$tgl_pesan = date("Y-m-d");
		$bts = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y")));
		$note = $this->input->post('note');

		$data = array(
			'transaksi_userid'			=> $this->session->userdata('userid'),
			'transaksi_total'			=> $total,
			'transaksi_tujuan'			=> $alamat,
			'transaksi_pos'				=> $pos,
			//'transaksi_prov'			=> $prov[1],
			'transaksi_kota'			=> $kota,
			'ongkir'			=> $ongkir,
			//'transaksi_service'			=> $layanan[1],
			'transaksi_tgl_pesan'		=> $tgl_pesan,
			'transaksi_bts_bayar'		=> $bts,
			'transaksi_status'			=> 'belum',
			'transaksi_note'			=> $note,
		);

		if ($this->db->insert('tb_transaksi', $data)) {
			$id_order = $this->db->insert_id();
			foreach ($this->cart->contents() as $key) {
				$detail = array(
					'd_transaksi_id'		=> $id_order,
					'd_transaksi_item'		=> $key['id'],
					'd_transaksi_qty' 		=> $key['qty'],
					'd_transaksi_biaya' 	=> $key['subtotal']
				);

				$this->db->insert('tb_detail_transaksi', $detail);
			}
			// $this->Home_model->simpan_notif();
			$datanotif = array(
				'notif_id'			=>   $id_order,
				'notif_perihal'		=>   'Transaksi baru',
				'notif_dari'		=>   $this->session->userdata('username'),
				'notif_status'		=>   0,
			);

			$this->db->insert('tb_notifikasi', $datanotif);
			$this->cart->destroy();
			$this->session->set_flashdata('flash', 'Transaksi berhasil, silahkan pilih metode pembayaran anda');
			redirect('method');
		} else {
			$this->session->set_flashdata('error', 'Transaksi gagal, silahkan coba lagi');
			redirect('checkout');
		}
	}

	public function produkbytag($url)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->join('tb_produk', 'tb_produk.id_kategori = kategori.id_kategori');
		$this->db->where('url', $url);
		return $this->db->get()->result_array();
	}



	public function simpan_pesan()
	{
		$data = array(
			'pesan_id'			=>   md5(microtime()),
			'pesan_nama'		=>   ucwords($this->input->post('nama')),
			'pesan_email'		=>   strtolower($this->input->post('mail')),
			'pesan_tgl'			=>   date('Y-m-d H:i:s'),
			'pesan_subjek'		=>   ucwords($this->input->post('subject')),
			'nohp'		=>   $this->input->post('nohp'),
			'pesan_isi'			=>   $this->input->post('message'),
		);

		$this->db->insert('tb_pesan', $data);
		$this->simpan_notif_pesan();
	}

	public function simpan_notif_pesan()
	{
		$data = array(
			'notif_id'			=>   md5(microtime()),
			'notif_perihal'		=>   'Pesan baru',
			'notif_dari'		=>   $this->session->userdata('username'),
			'notif_status'		=>   0,
		);

		$this->db->insert('tb_notifikasi', $data);
	}

	public function simpan_notif()
	{
		$data = array(
			'notif_id'			=>   md5(microtime()),
			'notif_perihal'		=>   'Transaksi baru',
			'notif_dari'		=>   $this->session->userdata('username'),
			'notif_status'		=>   0,
		);

		$this->db->insert('tb_notifikasi', $data);
	}
}
