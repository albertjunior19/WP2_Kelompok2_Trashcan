<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
	public function data_transaksi()
	{
		$this->db->select('*');
		$this->db->from('tb_transaksi');
		$this->db->join('customer', 'customer.user_id = tb_transaksi.transaksi_userid');
		$this->db->where('transaksi_status', 'diproses');
		$this->db->order_by('transaksi_time', 'DESC');
		return $this->db->get()->result_array();
	}

	public function format_tanggal($tgl)
	{
		$y    = date('Y', strtotime($tgl));
		$d    = date('d', strtotime($tgl));
		$dt_m = date('m', strtotime($tgl));
		$m    = $this->month($dt_m);
		$date = $d . ' ' . $m . ' ' . $y;
		return $date;
	}

	public function month($dt)
	{
		$array = array(
			'01' => 'Januari',
			'02' => 'Febuari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		);
		return $array[$dt];
	}

	public function hasil()
	{
		$this->db->select('SUM(d_transaksi_biaya) as penghasilan');
		$this->db->from('tb_detail_transaksi');
		return $this->db->get()->row()->penghasilan;
	}

	public function laporan_data_transaksi($daterange)
	{
		$this->db->from('tb_transaksi');
		$this->db->join('customer', 'customer.user_id = tb_transaksi.transaksi_userid');
		$this->db->join('tb_detail_transaksi', 'tb_detail_transaksi.d_transaksi_id = tb_transaksi.transaksi_id');
		if ($daterange[0] == $daterange[1]) {
			$this->db->where('DATE(transaksi_time)', $daterange[0]);
		} else {
			$this->db->where('DATE(transaksi_time) >=', $daterange[0]);
			$this->db->where('DATE(transaksi_time) <=', $daterange[1]);
		}
		$this->db->where('transaksi_status', 'diproses');
		$this->db->order_by('transaksi_time', 'DESC');
		$this->db->group_by('transaksi_id');
		return $this->db->get()->result_array();
	}

	public function getBB($coa, $tgl)
	{
		$sql = "SELECT a.*, nm_akun, header_akun
		FROM jurnal a
		JOIN akun b ON a.no_coa = b.no_akun
		WHERE no_coa = '$coa'
		AND LEFT(tgl_jurnal, 7) = '$tgl'
		";
		return $this->db->query($sql);
	}

	// public function total_profit() {
	// 	$cek = $this->data_transaksi();
	// 	$profit = $cek['transaksi_total'];
	// 	return $profit;
	// }
}
