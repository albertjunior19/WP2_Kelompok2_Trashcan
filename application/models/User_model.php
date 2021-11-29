<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function data_transaksi_limit() {
		$this->db->limit(5);
		$this->db->order_by('transaksi_tgl_pesan', 'DESC');
		$this->db->where('transaksi_userid', $this->session->userdata('userid'));
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function data_transaksi() {
		$this->db->order_by('transaksi_tgl_pesan', 'DESC');
		$this->db->where('transaksi_userid', $this->session->userdata('userid'));
		return $this->db->get('tb_transaksi')->result_array();
	}

	public function detail_transaksi($id) {
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.d_transaksi_id = tb_transaksi.transaksi_id');
		$this->db->join('tb_produk', 'tb_produk.produk_id = tb_detail_transaksi.d_transaksi_item');
		$this->db->join('customer', 'customer.user_id = tb_transaksi.transaksi_userid');
		$this->db->where('transaksi_id', $id);
		$this->db->where('transaksi_userid', $this->session->userdata('userid'));
		return $this->db->get();
	}

	public function _cekpas() {
		$nama = ucwords($this->input->post('nama'));
		$email = strtolower($this->input->post('email'));
		$sandi = $this->input->post('password');
		$cekpassw = $this->db->get_where('customer',['user_id' => $this->session->userdata('userid')])->row_array();

		if(password_verify($sandi, $cekpassw['password'])) {
			$data = array (
				'nama_lengkap'			=>   $nama,
				'telepon'			=>   $this->input->post('telepon'),
				'email'		=>   $email
			);
		
			$this->db->where('user_id', $this->session->userdata('userid'));
			$this->db->update('customer', $data);
			$this->session->set_flashdata('flash', 'Profil anda berhasil diperbaharui');
			redirect('user/profil');
		}else {
			$this->session->set_flashdata('error','Konfirmasi password salah, silahkan coba lagi');
			redirect('user/profil');
		}
	}


	public function cek_ganti_password() {
		$sandi = $this->input->post('sandi');
		$sandi1 = password_hash($this->input->post('sandi1'), PASSWORD_DEFAULT);
		$cek = $this->db->get_where('customer',['user_id' => $this->session->userdata('userid')])->row_array();

		if(password_verify($sandi, $cek['password'])) {
			$this->db->set('password', $sandi1);
			$this->db->where('user_id', $this->session->userdata('userid'));
			$this->db->update('customer');
			$this->session->set_flashdata('flash', 'Sandi anda berhasil diperbaharui');
			redirect('user/ganti_password');
		}else {
			$this->session->set_flashdata('error', 'Konfirmasi kata sandi salah');
			redirect('user/ganti_password');
		}
	}
}