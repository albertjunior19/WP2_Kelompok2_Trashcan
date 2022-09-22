<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Home_model');
		if ($this->session->userdata('loginstatus') != '6484bbvnvfdswuieywor3443993') {
			redirect('account');
		}
	}

	public function buktipembayaran()
	{

		$config['upload_path'] = './assets_home/img/buktipembayaran/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if (!empty($_FILES['gambar']['name'])) {
			if ($this->upload->do_upload('gambar')) {
				$gambar = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets_home/img/buktipembayaran/' . $gambar['file_name'];
				$config['width'] = 624;
				$config['height'] = 800;
				$config['new_image'] = './assets_home/img/buktipembayaran/' . $gambar['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			}
			$post_data = array(
				'transaksi_status'         => 'Menunggu Konfirmasi Admin',
				'buktipembayaran' => $gambar['file_name']
			);
			$this->db->set($post_data);
			$this->db->where('transaksi_id', $this->input->post('id'));
			$this->db->update('tb_transaksi');
			$datanotif = array(
				'notif_id'			=>   $this->input->post('id'),
				'notif_perihal'		=>   'Bukti Pembayaran Masuk',
				'notif_dari'		=>   $this->session->userdata('username'),
				'notif_status'		=>   0,
			);

			$this->db->insert('tb_notifikasi', $datanotif);
			$this->session->set_flashdata('Flash', 'Berhasil Upload Bukti Pembayaran');
			redirect(base_url('user/detail/' . $this->input->post('id')));
		} else {
			$this->session->set_flashdata('error', 'Anda belum memilih gambar');
			redirect(base_url('user/detail/' . $this->input->post('id')));
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard User';

		$data['keranjang'] = $this->cart->contents();
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['transaksi'] = $this->User_model->data_transaksi_limit();
		$this->load->view('tema/home/header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('tema/home/footer');
	}

	public function transaksi()
	{
		$data['title'] = 'Riwayat Transaksi Anda';

		$data['keranjang'] = $this->cart->contents();
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['transaksi'] = $this->User_model->data_transaksi();
		$this->load->view('tema/home/header', $data);
		$this->load->view('user/transaksi', $data);
		$this->load->view('tema/home/footer');
	}


	public function detail($id)
	{
		if ($this->uri->segment(3) == '') {
			redirect('user');
		}
		$data['title'] = 'Detail Transaksi';

		$data['keranjang'] = $this->cart->contents();
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['dtransaksi'] = $this->User_model->detail_transaksi($id);
		$this->load->view('tema/home/header', $data);
		$this->load->view('user/detail', $data);
		$this->load->view('tema/home/footer');
	}

	public function profil()
	{
		$data['title'] = 'Profil Anda';

		$data['keranjang'] = $this->cart->contents();
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['profilanda'] = $this->db->get_where('customer', ['user_id' => $this->session->userdata('userid')])->row_array();
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'regex_match' =>	'Nama harus berupa huruf'
		]);
		$this->form_validation->set_rules('telepon', 'telepon', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'valid_email' =>	'Email tidak valid'
		]);
		$this->form_validation->set_rules('password', 'password', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/home/header', $data);
			$this->load->view('user/profil', $data);
			$this->load->view('tema/home/footer');
		} else {
			$this->User_model->_cekpas();
		}
	}


	public function ganti_password()
	{
		$data['title'] = 'Ganti Password';

		$data['keranjang'] = $this->cart->contents();
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['profilanda'] = $this->db->get_where('customer', ['user_id' => $this->session->userdata('userid')])->row_array();
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
			$this->load->view('tema/home/header', $data);
			$this->load->view('user/sandi', $data);
			$this->load->view('tema/home/footer');
		} else {
			$this->User_model->cek_ganti_password();
		}
	}
}
