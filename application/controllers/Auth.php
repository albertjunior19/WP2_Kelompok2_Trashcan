<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
	}

	public function index() {
		$data['title'] = 'Login Administrator';
		$this->form_validation->set_rules('email', 'email', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		$this->form_validation->set_rules('sandi', 'sandi', 'required', [
					'required'	=>	'Kolom ini tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('admin/login', $data);
		}else {
			$this->_cek();
		}
	}

	private function _cek() {
		$email		=	$this->input->post('email');
		$password	=	$this->input->post('sandi');

		$cekadm = $this->log_mod($email);
		if($cekadm) {
			if(password_verify($password, $cekadm['password'])) {
				$admin = array (
					'adminid'					=>	$cekadm['admin_id'],
					'adminusername'				=>	$cekadm['username'],
					'adminnama'					=>	$cekadm['nama'],
					'adminemail'					=>	$cekadm['email'],
					'password'				=>	$cekadm['password'],
					'adminfoto'					=>	$cekadm['foto'],
					'status_login_'				=>	'jgeiwi4893jbbnmBYT*&(ueow98734fbndbls'
				);

				$this->session->set_userdata($admin);
				redirect('admin');
			}else {
				$this->session->set_flashdata('error','Password anda salah');
				redirect('auth');
			}
		}else {
			$this->session->set_flashdata('error','Akun tidak terdaftar');
			redirect('auth');
		}
	}

	private function log_mod($email) {
		$this->db->where('email', $email);
		$this->db->or_where('username', $email);
		return $this->db->get('admin')->row_array();
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('home');
	}
}