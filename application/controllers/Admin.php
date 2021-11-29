<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		if ($this->session->userdata('status_login_') != 'jgeiwi4893jbbnmBYT*&(ueow98734fbndbls') {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['title'] = 'Halaman Administrator';
		$data['totalproduk'] = $this->db->get('tb_produk')->num_rows();
		$data['totaluser'] = $this->db->get('customer')->num_rows();
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['transaksi'] = $this->Admin_model->data_transaksi();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('tema/admin/footer');
	}


	public function produk()
	{
		$data['title'] = 'Data Produk';
		$data['produk'] = $this->Admin_model->data_produk();
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/produk', $data);
		$this->load->view('tema/admin/footer');
	}

	public function add_produk()
	{
		$data['title'] = 'Tambah Produk Baru';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['kat'] = $this->Admin_model->data_kategori();
		$data['rk'] = '';
		$this->form_validation->set_rules('nama-produk', 'nama-produk', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('harga-produk', 'harga-produk', 'required|numeric', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'numeric'	=>	'Harga harus berupa angka'
		]);
		$this->form_validation->set_rules('stok-produk', 'stok-produk', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('berat-produk', 'berat-produk', 'required|numeric', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'numeric'	=>	'Harus berupa angka'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/add_produk', $data);
			$this->load->view('tema/admin/footer');
		} else {

			$this->Admin_model->simpan_produk();
			$this->session->set_flashdata('flash', 'Produk baru berhasil ditambahkan');
			redirect('admin/produk');
		}
	}

	public function edit_produk($id)
	{
		$data['title'] = 'Edit Produk';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['produkid'] = $this->Admin_model->produkbyid($id);
		$data['kat'] = $this->Admin_model->data_kategori();
		$this->form_validation->set_rules('nama-produk', 'nama-produk', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('harga-produk', 'harga-produk', 'required|numeric', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'numeric'	=>	'Harga harus berupa angka'
		]);
		$this->form_validation->set_rules('stok-produk', 'stok-produk', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('berat-produk', 'berat-produk', 'required|numeric', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'numeric'	=>	'Harus berupa angka'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_produk', $data);
			$this->load->view('tema/admin/footer');
		} else {

			$this->Admin_model->ubah_produk();
			$this->session->set_flashdata('flash', 'Produk berhasil diperbaharui');
			redirect('admin/produk');
		}
	}

	public function add_kategori()
	{
		$data['title'] = 'Tambah Kategori';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['kat'] = $this->Admin_model->data_kategori();
		$data['rk'] = '';
		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('url', 'url', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/add_kategori', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$data = array(
				'kategori'				=>	$this->input->post('kategori'),
				'url'				=>	$this->input->post('url'),
			);

			$this->db->insert('kategori', $data);
			$this->session->set_flashdata('flash', 'Kategori berhasil ditambahkan');
			redirect('admin/kategori');
		}
	}

	public function edit_kategori($id)
	{
		$data['title'] = 'Edit Kategori';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['kat'] = $this->Admin_model->data_kategori();
		$data['kategori'] = $this->Admin_model->kategoribyid($id);
		$data['rk'] = '';
		$this->form_validation->set_rules('kategori', 'kategori', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('url', 'url', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_kategori', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$data = array(
				'kategori'				=>	$this->input->post('kategori'),
				'url'				=>	$this->input->post('url'),
			);

			$this->db->where('id_kategori', $this->input->post('id'));
			$this->db->update('kategori', $data);
			$this->session->set_flashdata('flash', 'Kategori berhasil diperbaharui');
			redirect('admin/kategori');
		}
	}

	public function tambahstok($id)
	{
		$data['title'] = 'Tambah Stok';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['produkid'] = $this->Admin_model->produkbyid($id);
		$this->form_validation->set_rules('nama-produk', 'nama-produk', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/tambahstok', $data);
			$this->load->view('tema/admin/footer');
		} else {

			$this->Admin_model->tambahstok();
			$this->session->set_flashdata('flash', 'Stok Produk Berhasil Di Tambah');
			redirect('admin/produk');
		}
	}

	public function hapus_produk($id)
	{

		$this->Admin_model->del_produk($id);
		$this->session->set_flashdata('flash', 'Produk berhasil dihapus');
		redirect('admin/produk');
	}

	public function kategori()
	{
		$data['title'] = 'Data Kategori';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['kategori'] = $this->Admin_model->data_kategori();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/kategori', $data);
		$this->load->view('tema/admin/footer');
	}

	public function hapus_kategori($id)
	{

		$this->Admin_model->del_kategori($id);
		$this->session->set_flashdata('flash', 'Kategori berhasil dihapus');
		redirect('admin/kategori');
	}

	public function baca_notif()
	{
		$this->db->set('notif_status', 1);
		$this->db->where('notif_id', $this->uri->segment(3));
		$this->db->update('tb_notifikasi');
		redirect('admin/transaksi');
	}

	public function baca_pesan()
	{
		$this->db->set('notif_status', 1);
		$this->db->where('notif_id', $this->uri->segment(3));
		$this->db->update('tb_notifikasi');
		redirect('admin/pesan');
	}

	public function transaksi()
	{
		$data['title'] = 'Data Transaksi';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['transaksi'] = $this->Admin_model->data_transaksi();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/transaksi', $data);
		$this->load->view('tema/admin/footer');
	}


	public function konfirmasi_transaksi()
	{
		$id = $this->uri->segment(3);
		$this->db->where('transaksi_id', $id);
		$ambil_nominal = $this->db->get('tb_transaksi')->row()->transaksi_total;
		// print_r($ambil_data);exit;
		$this->db->set('transaksi_status', 'diproses');
		$this->db->where('transaksi_id', $this->uri->segment(3));
		$this->db->update('tb_transaksi');

		
		$this->session->set_flashdata('flash', 'Transaksi berhasil dikonfirmasi');

		redirect('admin/transaksi');
	}

	public function tolak_transaksi()
	{
		$id = $this->uri->segment(3);
		$this->db->where('transaksi_id', $id);
		$ambil_nominal = $this->db->get('tb_transaksi')->row()->transaksi_total;
		// print_r($ambil_data);exit;
		$this->db->set('transaksi_status', 'Di Tolak');
		$this->db->where('transaksi_id', $this->uri->segment(3));
		$this->db->update('tb_transaksi');
		$this->session->set_flashdata('flash', 'Transaksi berhasil Di Tolak');

		redirect('admin/transaksi');
	}

	public function detail_transaksi($id)
	{
		$data['title'] = 'Detail Transaksi';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['dtransaksi'] = $this->Admin_model->transaksibyid($id);
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/detail_transaksi', $data);
		$this->load->view('tema/admin/footer');
	}

	public function cetak_invoice($id)
	{
		$data['title'] = 'Invoice';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['dtransaksi'] = $this->Admin_model->transaksibyid($id);
		$this->load->view('admin/cetak_invoice', $data);
	}

	public function member()
	{
		$data['title'] = 'Data Member/Pelanggan';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['member'] = $this->Admin_model->data_member();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/member', $data);
		$this->load->view('tema/admin/footer');
	}
	public function admin()
	{
		$data['title'] = 'Data Member/Pelanggan';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['admin'] = $this->Admin_model->data_admin();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/admin', $data);
		$this->load->view('tema/admin/footer');
	}
	public function pesan()
	{
		$data['title'] = 'Data Pesan Masuk';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['pesan'] = $this->Admin_model->data_pesan();
		$this->load->view('tema/admin/header', $data);
		$this->load->view('admin/pesan', $data);
		$this->load->view('tema/admin/footer');
	}

	public function edit_profil()
	{
		$data['title'] = 'Perbaharui Profil Saya';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['profilsaya'] = $this->Admin_model->profilku();
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'regex_match' =>	'Nama harus berupa huruf'
		]);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'valid_email' =>	'Email tidak valid'
		]);
		$this->form_validation->set_rules('username', 'username', 'required|min_length[5]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'min_length' =>	'Minimal 5 karakter'
		]);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_profil', $data);
			$this->load->view('tema/admin/footer');
		} else {

			$this->Admin_model->cek_ganti_profil();
		}
	}

	public function edit_sandi()
	{
		$data['title'] = 'Perbaharui Kata Sandi Saya';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$this->form_validation->set_rules('sandi2', 'sandi2', 'required|min_length[5]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'min_length' =>	'Minimal 5 karakter'
		]);
		$this->form_validation->set_rules('sandi1', 'sandi1', 'required|matches[sandi2]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'matches'	=>	'Konfirmasi sandi baru harus sama'
		]);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_sandi', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$this->Admin_model->cek_ganti_password();
		}
	}

	public function add_pelanggan()
	{
		$data['title'] = 'Tambah Pelanggan';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['rk'] = '';
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'regex_match' =>	'Nama harus berupa huruf'
		]);
		$this->form_validation->set_rules('telepon', 'telepon', 'required');
		$this->form_validation->set_rules('email_reg', 'email_reg', 'required|valid_email|is_unique[customer.email]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'valid_email' =>	'Email tidal valid',
			'is_unique'	=>	'Email ini telah terdaftar'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/add_pelanggan', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$data = array(
				'nama_lengkap'				=>	ucwords($this->input->post('nama')),
				'email'			=>	strtolower($this->input->post('email_reg')),
				'password'			=>	password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'telepon'			=>	$this->input->post('telepon')
			);
			$this->db->insert('customer', $data);
			$this->session->set_flashdata('flash', 'Pelanggan berhasil ditambahkan');
			redirect('admin/member');
		}
	}

	public function edit_pelanggan($id)
	{
		$data['title'] = 'Edit Pelanggan';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['kat'] = $this->Admin_model->data_kategori();
		$data['pelanggan'] = $this->Admin_model->pelangganbyid($id);
		$data['rk'] = '';
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'regex_match' =>	'Nama harus berupa huruf'
		]);
		$this->form_validation->set_rules('telepon', 'telepon', 'required');
		$this->form_validation->set_rules('email_reg', 'email_reg', 'required|valid_email|is_unique[customer.email]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'valid_email' =>	'Email tidal valid',
			'is_unique'	=>	'Email ini telah terdaftar'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_pelanggan', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$data = array(
				'nama_lengkap'				=>	ucwords($this->input->post('nama')),
				'email'			=>	strtolower($this->input->post('email_reg')),
				'telepon'			=>	$this->input->post('telepon')
			);
			$this->db->where('user_id', $this->input->post('id'));
			$this->db->update('customer', $data);
			$this->session->set_flashdata('flash', 'Data Pelanggan berhasil diperbaharui');
			redirect('admin/member');
		}
	}

	public function add_admin()
	{
		$data['title'] = 'Tambah admin';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['rk'] = '';
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'regex_match' =>	'Nama harus berupa huruf'
		]);
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('email_reg', 'email_reg', 'required|valid_email|is_unique[customer.email]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'valid_email' =>	'Email tidal valid',
			'is_unique'	=>	'Email ini telah terdaftar'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/add_admin', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$data = array(
				'username'				=>	$this->input->post('username'),
				'nama'				=>	ucwords($this->input->post('nama')),
				'email'			=>	strtolower($this->input->post('email_reg')),
				'password'			=>	password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			);
			$this->db->insert('admin', $data);
			$this->session->set_flashdata('flash', 'admin berhasil ditambahkan');
			redirect('admin/admin');
		}
	}

	public function edit_admin($id)
	{
		$data['title'] = 'Edit admin';
		$data['notifikasi'] = $this->Admin_model->data_notifikasi();
		$data['pesanmasuk'] = $this->Admin_model->data_notifikasi_pesan();
		$data['kat'] = $this->Admin_model->data_kategori();
		$data['admin'] = $this->Admin_model->adminbyid($id);
		$data['rk'] = '';
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'regex_match' =>	'Nama harus berupa huruf'
		]);
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('email_reg', 'email_reg', 'required|valid_email|is_unique[customer.email]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'valid_email' =>	'Email tidal valid',
			'is_unique'	=>	'Email ini telah terdaftar'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/admin/header', $data);
			$this->load->view('admin/edit_admin', $data);
			$this->load->view('tema/admin/footer');
		} else {
			$data = array(
				'nama'				=>	ucwords($this->input->post('nama')),
				'email'			=>	strtolower($this->input->post('email_reg')),
				'username'			=>	$this->input->post('username')
			);
			$this->db->where('admin_id', $this->input->post('id'));
			$this->db->update('admin', $data);
			$this->session->set_flashdata('flash', 'Data admin berhasil diperbaharui');
			redirect('admin/admin');
		}
	}

	public function hapus_pelanggan($id)
	{

		$this->Admin_model->del_pelanggan($id);
		$this->session->set_flashdata('flash', 'Pelanggan berhasil dihapus');
		redirect('admin/member');
	}

	public function hapus_admin($id)
	{

		$this->Admin_model->del_admin($id);
		$this->session->set_flashdata('flash', 'Admin berhasil dihapus');
		redirect('admin/admin');
	}
}
