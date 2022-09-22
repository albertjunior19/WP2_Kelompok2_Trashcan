<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

	public function getJurnal($start, $end)
	{
		$sql = "SELECT a.*, nm_akun
        FROM jurnal a
        INNER JOIN akun b ON a.no_coa = b.no_akun
		WHERE tgl_jurnal BETWEEN '$start' AND '$end'
        ORDER BY id ASC";
		return $this->db->query($sql);
	}

	public function data_produk()
	{
		$this->db->order_by('produk_id', 'DESC');
		return $this->db->get('tb_produk')->result_array();
	}

	public function data_kategori()
	{
		return $this->db->get('kategori')->result_array();
	}

	public function get_where($table = null, $where = null)
	{
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get();
	}

	public function insert_last($table = '', $data = '')
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function insert($table = '', $data = '')
	{
		$this->db->insert($table, $data);
	}

	public function simpan_produk()
	{
		$judul = ucwords($this->input->post('nama-produk'));
		$url = url_title(strtolower($judul), 'dash', TRUE) . '-' . time() . '.html';
		$stok = $this->input->post('stok-produk');
		$berat = $this->input->post('berat-produk');
		$status = $this->input->post('status-produk');
		$harga = $this->input->post('harga-produk');
		// get foto
		$config['upload_path'] = './assets_home/img/product/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if (!empty($_FILES['gambar']['name'])) {
			if ($this->upload->do_upload('gambar')) {
				$gambar = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets_home/img/product/' . $gambar['file_name'];
				$config['width'] = 624;
				$config['height'] = 800;
				$config['new_image'] = './assets_home/img/product/' . $gambar['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data = array(
					// 'produk_id'					=>	$id,
					'produk_url'				=>	$url,
					'nama_produk'				=>	$judul,
					'stok'						=>	$stok,
					'produk_weight'				=>	$berat,
					'produk_status'				=>	$status,
					'harga'				=>	$harga,
					'id_kategori'				=>	$this->input->post('kategori'),
					'namamitra'		=>	$this->input->post('namamitra'),
					'gambar'				=>	$gambar['file_name']
				);
			}
		} else {
			$this->session->set_flashdata('error', 'Anda belum memilih gambar');
			redirect('admin/add_produk');
		}

		$this->db->insert('tb_produk', $data);
	}

	public function trashpick()
	{
		$this->db->order_by('idtrashpick', 'DESC');
		return $this->db->get('trashpick')->result_array();
	}

	public function ubah_produk()
	{
		$judul = ucwords($this->input->post('nama-produk'));
		$this->db->select('*, sum(d_transaksi_qty) as jumlah');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.d_transaksi_id = tb_transaksi.transaksi_id');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_detail_transaksi.d_transaksi_item');
		$this->db->where('transaksi_status', 'diproses');
		$this->db->where('d_transaksi_item', $this->input->post('id'));
		$stokterjual = $this->db->get()->row_array();
		$stok = $this->input->post('stok-produk') + $stokterjual['jumlah'];
		$berat = $this->input->post('berat-produk');
		$status = $this->input->post('status-produk');
		$harga = $this->input->post('harga-produk');
		$deskripsi = $this->input->post('deskripsi-produk');

		// get foto
		$config['upload_path'] = './assets_home/img/product/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if (!empty($_FILES['gambar']['name'])) {
			if ($this->upload->do_upload('gambar')) {
				$gambar = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets_home/img/product/' . $gambar['file_name'];
				$config['width'] = 624;
				$config['height'] = 800;
				$config['new_image'] = './assets_home/img/product/' . $gambar['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data = array(
					'nama_produk'				=>	$judul,
					'stok'				=>	$stok,
					'produk_weight'				=>	$berat,
					'produk_status'				=>	$status,
					'harga'				=>	$harga,
					'id_kategori'				=>	$this->input->post('kategori'),
					'namamitra'		=>	$this->input->post('namamitra'),
					'gambar'				=>	$gambar['file_name']
				);
			}
		} else {
			$data = array(
				'nama_produk'				=>	$judul,
				'stok'				=>	$stok,
				'produk_weight'				=>	$berat,
				'produk_status'				=>	$status,
				'harga'				=>	$harga,
				'id_kategori'				=>	$this->input->post('kategori'),
				'namamitra'		=>	$this->input->post('namamitra'),
				'gambar'				=>	$this->input->post('gambar_old')
			);
		}

		$this->db->where('produk_id', $this->input->post('id'));
		$this->db->update('tb_produk', $data);
	}

	public function tambahstok()
	{
		$stok = $this->input->post('stoklama');
		$stokbaru = $this->input->post('stokbaru');


		$data = array(
			'stok'				=>	$stok + $stokbaru,
		);

		$this->db->where('produk_id', $this->input->post('id'));
		$this->db->update('tb_produk', $data);
	}

	public function produkbyid($id)
	{
		return $this->db->get_where('tb_produk', ['produk_id' => $id])->row_array();
	}

	public function kategoribyid($id)
	{
		return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
	}

	public function pelangganbyid($id)
	{
		return $this->db->get_where('customer', ['user_id' => $id])->row_array();
	}

	public function adminbyid($id)
	{
		return $this->db->get_where('admin', ['admin_id' => $id])->row_array();
	}

	public function del_produk($id)
	{
		$this->db->where('produk_id', $id);
		$this->db->delete('tb_produk');
	}

	public function del_kategori($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori');
	}

	public function del_pelanggan($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('customer');
	}

	public function del_admin($id)
	{
		$this->db->where('admin_id', $id);
		$this->db->delete('admin');
	}

	public function data_transaksi()
	{
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('customer', 'customer.user_id = tb_transaksi.transaksi_userid');
		$this->db->order_by('transaksi_time', 'DESC');
		return $this->db->get()->result_array();
	}


	public function transaksibyid($id)
	{
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.d_transaksi_id = tb_transaksi.transaksi_id');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_detail_transaksi.d_transaksi_item');
		$this->db->join('customer', 'customer.user_id = tb_transaksi.transaksi_userid');
		$this->db->where('transaksi_id', $id);
		return $this->db->get();
	}


	public function data_member()
	{
		$this->db->order_by('user_created', 'DESC');
		return $this->db->get('customer')->result_array();
	}

	public function data_admin()
	{
		return $this->db->get('admin')->result_array();
	}

	public function data_pesan()
	{
		$this->db->order_by('pesan_tgl', 'DESC');
		return $this->db->get('tb_pesan')->result_array();
	}

	public function data_notifikasi()
	{
		$this->db->order_by('notif_time', 'DESC');
		$this->db->where('notif_status', 0);
		$this->db->where('notif_perihal', 'Transaksi baru');
		return $this->db->get('tb_notifikasi')->result_array();
	}

	public function data_notifikasi_pesan()
	{
		$this->db->order_by('notif_time', 'DESC');
		$this->db->where('notif_status', 0);
		$this->db->where('notif_perihal', 'Pesan baru');
		return $this->db->get('tb_notifikasi')->result_array();
	}

	public function cek_ganti_password()
	{
		$sandi = $this->input->post('sandi');
		$sandi1 = password_hash($this->input->post('sandi1'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('admin', ['admin_id' => $this->session->userdata('adminid')])->row_array();

		if (password_verify($sandi, $cek['password'])) {
			$this->db->set('password', $sandi1);
			$this->db->where('admin_id', $this->session->userdata('adminid'));
			$this->db->update('admin');
			$this->session->set_flashdata('flash', 'Sandi anda berhasil diperbaharui');
			redirect('admin/edit_sandi');
		} else {
			$this->session->set_flashdata('error', 'Konfirmasi kata sandi salah');
			redirect('admin/edit_sandi');
		}
	}

	public function cek_ganti_profil()
	{
		$nama = ucwords($this->input->post('nama'));
		$username = strtolower($this->input->post('username'));
		$email = strtolower($this->input->post('email'));
		$sandi = $this->input->post('sandi');
		$cek = $this->db->get_where('admin', ['admin_id' => $this->session->userdata('adminid')])->row_array();

		if (password_verify($sandi, $cek['password'])) {

			// get foto
			$config['upload_path'] = './assets_admin/images/resources/';
			$config['allowed_types'] = 'jpg|png|jpeg|gif';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);
			if (!empty($_FILES['gambar']['name'])) {
				if ($this->upload->do_upload('gambar')) {
					$gambar = $this->upload->data();

					$data = array(
						'nama'				=>	$nama,
						'email'				=>	$email,
						'username'			=>	$username,
						'foto'				=>	$gambar['file_name']
					);
				}
			} else {
				$data = array(
					'nama'				=>	$nama,
					'email'				=>	$email,
					'username'			=>	$username,
					'foto'				=>	$this->input->post('gambar_old')
				);
			}

			$this->db->where('admin_id', $this->session->userdata('adminid'));
			$this->db->update('admin', $data);
			$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
			redirect('admin/edit_profil');
		} else {
			$this->session->set_flashdata('error', 'Konfirmasi kata sandi salah');
			redirect('admin/edit_profil');
		}
	}

	public function profilku()
	{
		return $this->db->get_where('admin', ['admin_id' => $this->session->userdata('adminid')])->row_array();
	}

	public function data_artikel()
	{
		$this->db->order_by('blog_tgl', 'DESC');
		return $this->db->get('tb_blog')->result_array();
	}

	public function simpan_artikel()
	{
		$id = rand();
		$judul = ucwords($this->input->post('judul'));
		$penulis = $this->input->post('penulis');
		$url = url_title(strtolower($judul), 'dash', TRUE) . '-' . time() . '.html';
		$tgl = date('Y-m-d H:i:s');
		$isi = $this->input->post('isi');

		// get foto
		$config['upload_path'] = './assets_home/img/blog/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if (!empty($_FILES['gambar']['name'])) {
			if ($this->upload->do_upload('gambar')) {
				$gambar = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets_home/img/blog/' . $gambar['file_name'];
				$config['width'] = 800;
				$config['height'] = 500;
				$config['new_image'] = './assets_home/img/blog/' . $gambar['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data = array(
					'blog_id'					=>	$id,
					'blog_url'					=>	$url,
					'blog_judul'				=>	$judul,
					'blog_tgl'					=>	$tgl,
					'blog_isi'					=>	$isi,
					'blog_penulis'				=>  $penulis,
					'blog_gambar'				=>	$gambar['file_name']
				);
			}
		} else {
			$this->session->set_flashdata('error', 'Anda belum memilih gambar');
			redirect('admin/add_post');
		}

		$this->db->insert('tb_blog', $data);
	}

	public function ubah_artikel()
	{
		$id = $this->input->post('id');
		$judul = ucwords($this->input->post('judul'));
		$penulis = $this->input->post('penulis');
		$url = url_title(strtolower($judul), 'dash', TRUE) . '-' . time() . '.html';
		$tgl = date('Y-m-d H:i:s');
		$isi = $this->input->post('isi');

		$config['upload_path'] = './assets_home/img/blog/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if (!empty($_FILES['gambar']['name'])) {
			if ($this->upload->do_upload('gambar')) {
				$gambar = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets_home/img/blog/' . $gambar['file_name'];
				$config['width'] = 800;
				$config['height'] = 500;
				$config['new_image'] = './assets_home/img/blog/' . $gambar['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data = array(
					'blog_id'					=>	$id,
					'blog_url'					=>	$url,
					'blog_judul'				=>	$judul,
					'blog_tgl'					=>	$tgl,
					'blog_isi'					=>	$isi,
					'blog_penulis'				=>  $penulis,
					'blog_gambar'				=>	$gambar['file_name']
				);
			}
		} else {
			$data = array(
				'blog_id'					=>	$id,
				'blog_url'					=>	$url,
				'blog_judul'				=>	$judul,
				'blog_tgl'					=>	$tgl,
				'blog_isi'					=>	$isi,
				'blog_penulis'				=>  $penulis,
				'blog_gambar'				=>	$this->input->post('gambar_old')
			);
		}

		$this->db->where('blog_id', $this->input->post('id'));
		$this->db->update('tb_blog', $data);
	}

	public function artikelbyid($id)
	{
		return $this->db->get_where('tb_blog', ['blog_id' => $id])->row_array();
	}

	public function del_artikel($id)
	{
		$this->db->where('blog_id', $id);
		$this->db->delete('tb_blog');
	}
}
