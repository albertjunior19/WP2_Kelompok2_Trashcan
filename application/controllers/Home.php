<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		// 		$params = array('server_key' => 'SB-Mid-server-LNCESpD84IyaCZQhfHAFhbP7', 'production' => false);
		$params = array('server_key' => 'SB-Mid-server-ToLYbVu7SpgGxTV5alLUTfr-', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		$data['title'] = 'Beranda';
		$data['produk'] = $this->Home_model->all_produk_forhome();
		$data['keranjang'] = $this->cart->contents();
		$data['kategori'] = $this->Home_model->all_kategori();
		$this->load->view('tema/home/header', $data);
		$this->load->view('tema/home/hero');
		$this->load->view('home/index');
		$this->load->view('tema/home/profil');
		$this->load->view('tema/home/footer');
	}

	public function trashpicktambah()
	{
		if ($this->session->userdata('userid') == '') {
			$this->session->set_flashdata('flash', 'Silahkan login dahulu');
			redirect('account');
		}
		$data['title'] = 'Trashpick';

		$data['kategori'] = $this->Home_model->all_kategori();
		$data['keranjang'] = $this->cart->contents();

		$this->form_validation->set_rules('nama', 'nama', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/home/header', $data);
			$this->load->view('home/trashpicktambah', $data);
			$this->load->view('tema/home/footer');
		} else {
			$simpan = array(
				'iduser' => $this->session->userdata('userid'),
				'nama'		=>	$this->input->post('nama'),
				'notelp'		=>	$this->input->post('notelp'),
				'alamat'		=>	$this->input->post('alamat'),
				'jenisbarang'		=>	$this->input->post('jenisbarang'),
				'berat'		=>	$this->input->post('berat'),
				'tanggalpickup'		=>	$this->input->post('tanggalpickup'),
				'waktupickup'		=>	$this->input->post('waktupickup'),
				'biayapickup'		=>	'6000',
				'uploadbukti'		=>	$this->input->post('uploadbukti'),
			);
			if (!empty($_FILES)) {
				$config['upload_path']          = getcwd() . '/assets/upload/';
				$config['allowed_types']        = '*';
				$this->upload->initialize($config);
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					$simpan['uploadbukti'] =  $this->upload->display_errors();
					// var_dump($simpan['uploadbukti']);
					// die();
				} else {
					$dataupload = array('upload_data' => $this->upload->data());
					$simpan['uploadbukti'] = $dataupload['upload_data']['file_name'];
				}
			}
			$this->db->insert('trashpick', $simpan);
			$this->session->set_flashdata('flash', 'Trashpick Berhasil Di Simpan');
			redirect('home/trashpickriwayat');
		}
	}

	public function trashpickriwayat()
	{
		$data['title'] = 'Riwayat Trashpick Anda';

		$data['keranjang'] = $this->cart->contents();
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['trashpick'] = $this->Home_model->trashpick();
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/trashpickriwayat', $data);
		$this->load->view('tema/home/footer');
	}

	public function single($id, $tag, $url)
	{
		$data['title'] = 'Detail Produk';

		$data['kategori'] = $this->Home_model->all_kategori();
		$data['keranjang'] = $this->cart->contents();
		$data['detail'] = $this->Home_model->detail_produk($id, $tag, $url);
		$data['related'] = $this->Home_model->related_produk($tag);

		$this->form_validation->set_rules('message', 'message', 'required', [
			'required'	=>	'Komentar tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/home/header_detail', $data);
			$this->load->view('home/single', $data);
			$this->load->view('tema/home/footer');
		} else {
			$link = $id . '/' . $tag . '/' . $url;
			$this->Home_model->simpan_komentar();
			$this->session->set_flashdata('flash', 'Komentar berhasil dikirim');
			redirect('' . '/p/' . $link . '#reviews');
		}
	}

	public function all_pro()
	{
		$data['title'] = 'Semua Produk';
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['produk'] = $this->Home_model->all_produk();
		$data['keranjang'] = $this->cart->contents();
		if ($this->input->post('kategoricari') != "") {
			$kategoricari = $this->input->post('kategoricari');
		} else {
			$kategoricari = 0;
		}
		$data['kategoricari'] = $kategoricari;
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/shops', $data);
		$this->load->view('tema/home/footer');
	}

	public function all_artikel()
	{
		$data['title'] = 'Blog';
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['artikel'] = $this->Home_model->data_artikel();
		$data['keranjang'] = $this->cart->contents();
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/blog', $data);
		$this->load->view('tema/home/footer');
	}

	public function single_blog($url)
	{
		if ($this->session->userdata('userid') == '') {
			$this->session->set_flashdata('flash', 'Silahkan login dahulu');
			redirect('account');
		}
		$data['title'] = 'Detail Artikel';
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['keranjang'] = $this->cart->contents();
		$data['detailblog'] = $this->Home_model->detail_artikel($url);
		$this->load->view('tema/home/header_detail_blog', $data);
		$this->load->view('home/single_blog', $data);
		$this->load->view('tema/home/footer');
	}

	public function cari_s()
	{
		$data['title'] = 'Hasil Pencarian';
		$s = $this->input->post('s');
		$data['s'] = $this->input->post('s');
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['keranjang'] = $this->cart->contents();
		$data['artikel'] = $this->Home_model->cari_artikel($s);
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/results_blog', $data);
		$this->load->view('tema/home/footer');
	}

	public function kontak_kami()
	{
		$data['title'] = 'Kontak Kami';
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['keranjang'] = $this->cart->contents();
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'regex_match' =>	'Nama harus berupa huruf'
		]);
		$this->form_validation->set_rules('mail', 'mail', 'required|valid_email', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'valid_email' =>	'Email tidak valid'
		]);
		$this->form_validation->set_rules('message', 'message', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/home/header', $data);
			$this->load->view('home/kontak', $data);
			$this->load->view('tema/home/footer');
		} else {
			$this->Home_model->simpan_pesan();
			$this->session->set_flashdata('flash', 'Pesan anda berhasil dikirim');
			redirect('kontak');
		}
	}

	public function cari_key()
	{
		$data['title'] = 'Hasil Pencarian';
		$key = $this->input->post('key');
		$data['key'] = $this->input->post('key');
		if ($this->input->post('kategoricari') != "") {
			$kategoricari = $this->input->post('kategoricari');
		} else {
			$kategoricari = 0;
		}
		$data['kategoricari'] = $kategoricari;
		$data['keranjang'] = $this->cart->contents();
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['produk'] = $this->Home_model->cari_produk($key, $kategoricari);
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/results', $data);
		$this->load->view('tema/home/footer');
	}

	public function akun()
	{
		$data['title'] = 'Masuk atau Daftar';

		$data['kategori'] = $this->Home_model->all_kategori();
		$data['keranjang'] = $this->cart->contents();
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/akun', $data);
		$this->load->view('tema/home/footer');
	}

	public function signup()
	{
		$data['title'] = 'Masuk atau Daftar';
		$data['keranjang'] = $this->cart->contents();

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
		$this->form_validation->set_rules('password1', 'password1', 'required|min_length[5]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'min_length' =>	'Minimal 5 karakter'
		]);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'matches'	=>	'Konfirmasi sandi salah'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/home/header', $data);
			$this->load->view('home/akun', $data);
			$this->load->view('tema/home/footer');
		} else {
			$this->Home_model->register_user();
			$this->session->set_flashdata('flash', 'Registrasi berhasil');
			redirect('account');
		}
	}

	public function sigin()
	{
		$data['title'] = 'Masuk atau Daftar';

		$data['keranjang'] = $this->cart->contents();
		$this->form_validation->set_rules('email', 'email', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('password', 'password', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/home/header', $data);
			$this->load->view('home/akun', $data);
			$this->load->view('tema/home/footer');
		} else {
			$this->Home_model->sigin_user();
		}
	}

	public function sigout()
	{
		$this->session->sess_destroy();
		redirect('account');
	}

	public function lanjut()
	{
		if ($this->session->userdata('userid') == '') {
			$this->session->set_flashdata('flash', 'Silahkan login dahulu');
			redirect('account');
		}
		if ($this->cart->total() == 0) {
			redirect('');
		}
		$data['title'] = 'Checkout';

		$data['kategori'] = $this->Home_model->all_kategori();
		$data['keranjang'] = $this->cart->contents();
		// $this->form_validation->set_rules('prov', 'prov', 'required', [
		// 	'required'	=>	'Kolom ini tidak boleh kosong'
		// ]);
		$this->form_validation->set_rules('kota', 'kota', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('kd_pos', 'kd_pos', 'required|numeric|min_length[5]|max_length[5]', [
			'required'	=>	'Kolom ini tidak boleh kosong',
			'numeric'	=>	'Kode POS harus berupa angka',
			'min_length' =>	'Kode POS minimal 5 angka',
			'max_length' =>	'Kode POS maksimal 5 angka'
		]);
		// $this->form_validation->set_rules('kurir', 'kurir', 'required', [
		// 	'required'	=>	'Kolom ini tidak boleh kosong'
		// ]);
		// $this->form_validation->set_rules('layanan', 'layanan', 'required', [
		// 	'required'	=>	'Kolom ini tidak boleh kosong'
		// ]);
		$this->form_validation->set_rules('alamat', 'alamat', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('ongkir', 'ongkir', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		$this->form_validation->set_rules('total', 'total', 'required', [
			'required'	=>	'Kolom ini tidak boleh kosong'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/home/header', $data);
			$this->load->view('home/checkout', $data);
			$this->load->view('tema/home/footer');
		} else {
			$tagihan = array(
				'tagihan'		=>	$this->input->post('total'),
			);
			$this->session->set_userdata($tagihan);
			$this->Home_model->simpan_transaksi();
			$this->session->set_flashdata('flash', 'Transaksi berhasil');
			redirect('transaksi');
		}
	}

	public function city()
	{
		$prov = $this->input->post('prov', TRUE);

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$prov",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: 7d0b4eeaf6bcd262bc67cd532a17055d"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, TRUE);

			echo '<option value="" selected disabled>Kota / Kabupaten</option>';

			for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
				echo '<option value="' . $data['rajaongkir']['results'][$i]['city_id'] . ',' . $data['rajaongkir']['results'][$i]['city_name'] . '">' . $data['rajaongkir']['results'][$i]['city_name'] . '</option>';
			}
		}
	}

	public function getcost()
	{
		$keranjang = $this->cart->contents();
		$asal = 327;
		// $asal = 305;
		$dest = $this->input->post('dest', TRUE);
		$kurir = $this->input->post('kurir', TRUE);
		$berat = 0;

		foreach ($keranjang as $key) {
			$berat += ($key['weight'] * $key['qty']);
		}

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=$asal&destination=$dest&weight=$berat&courier=$kurir",
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: 7d0b4eeaf6bcd262bc67cd532a17055d"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$data = json_decode($response, TRUE);

			echo '<option value="" selected disabled>Layanan yang tersedia</option>';

			for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {

				for ($l = 0; $l < count($data['rajaongkir']['results'][$i]['costs']); $l++) {

					echo '<option value="' . $data['rajaongkir']['results'][$i]['costs'][$l]['cost'][0]['value'] . ',' . $data['rajaongkir']['results'][$i]['costs'][$l]['service'] . '(' . $data['rajaongkir']['results'][$i]['costs'][$l]['description'] . ')">';
					echo $data['rajaongkir']['results'][$i]['costs'][$l]['service'] . '(' . $data['rajaongkir']['results'][$i]['costs'][$l]['description'] . ')</option>';
				}
			}
		}
	}

	public function cost()
	{
		$biaya = explode(',', $this->input->post('layanan', TRUE));
		$total = $this->cart->total() + $biaya[0];

		echo $biaya[0] . ',' . $total;
	}

	public function token()
	{
		$keranjang = $this->cart->contents();

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $this->session->userdata('tagihan'), // no decimal allowed for creditcard
		);

		// Optional
		$customer_details = array(
			'first_name'    => $this->session->userdata('username'),
			'email'         => $this->session->userdata('usermail'),
			//   'phone'         => 0855555555
			'phone'         => '0855555555'
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'hour',
			'duration'  => 4
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			// 'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function send()
	{
		if ($this->input->post('result_data') == '') {
			redirect('logout');
		} else {
			$result = json_decode($this->input->post('result_data'), true);
			$this->session->unset_userdata('tagihan');
			$this->Home_model->simpan_notif();
			$this->session->set_flashdata('flash', $result['status_message']);
			redirect('user');
		}
		// echo 'RESULT <br><pre>';
		// $status = $result['status_message'];
		// var_dump($status);
		// echo '</pre>' ;

	}




	public function met()
	{
		if ($this->session->userdata('tagihan') == 0) {
			redirect('checkout');
		}
		$data['title'] = 'Pilih Metode Pembayaran';

		$data['kategori'] = $this->Home_model->all_kategori();
		$data['keranjang'] = $this->cart->contents();
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/method', $data);
		$this->load->view('tema/home/footer');
	}

	public function tag($url)
	{
		if ($this->uri->segment(2) == '') {
			redirect('');
		}
		$data['title'] = 'Produk Kategori ';

		$data['kate'] = $this->uri->segment(2);
		$data['kategori'] = $this->Home_model->all_kategori();
		$data['prokategori'] = $this->Home_model->produkbytag($url);
		$data['keranjang'] = $this->cart->contents();
		$this->load->view('tema/home/header', $data);
		$this->load->view('home/tag_result', $data);
		$this->load->view('tema/home/footer');
	}


	public function ganti()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$pengguna = $this->db->get_where('customer', ['email' => $email])->row_array();

		if ($pengguna) {
			$token_pengguna = $this->db->get_where('tb_token', ['token' => $token])->row_array();
			if ($token_pengguna) {
				if (time() - $token_pengguna['created'] < (60 * 60 * 60)) {
					$this->session->set_userdata('reset_email', $email);
					$this->ubah_password();
				} else {
					$this->db->delete('tb_token', ['email' => $email]);
					$this->session->set_flashdata('error', 'Token kadaluarsa !');
					redirect('account');
				}
			} else {
				$this->session->set_flashdata('error', 'Token salah');
				redirect('account');
			}
		} else {
			$this->session->set_flashdata('error', 'Email salah');
			redirect('account');
		}
	}

	public function ubah_password()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('account');
		}
		$data['title'] = 'Masukan kata sandi baru';

		$data['kategori'] = $this->Home_model->all_kategori();
		$data['keranjang'] = $this->cart->contents();
		$this->form_validation->set_rules('password1', 'password1', 'required|min_length[5]', [
			'required'	=>	'Kolom password baru tidak boleh kosong',
			'min_length' =>	'Minimal 5 karakter'
		]);
		$this->form_validation->set_rules('password2', 'password2', 'required|matches[password1]', [
			'required'	=>	'Kolom konfirmasi password baru tidak boleh kosong',
			'matches'	=> 'Konfirmasi password baru tidak sama'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/home/header', $data);
			$this->load->view('home/change', $data);
			$this->load->view('tema/home/footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('customer');
			$this->db->where('email', $email);
			$this->db->delete('tb_token');

			$this->session->unset_userdata('reset_email');
			$this->session->set_flashdata('flash', 'Sandi berhasil diganti');
			redirect('account');
		}
	}
}
