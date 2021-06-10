<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('login');
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$where2 = array(
			'nim' => $username,
			'password' =>  $password
		);
		$cek = $this->M_login->cek_login("admin", $where)->num_rows();
		$cek2 = $this->M_login->cek_login("tb_mahasiswa", $where2)->num_rows();
		$cek3 = $this->M_login->cek_login("tb_pengawas", $where)->num_rows();
		if ($cek > 0) {

			$data_session = array(
				'id' => "admin1",
				'nama' => $username,
				'status' => "loginadmin"
			);

			$this->session->set_userdata($data_session);

			redirect(base_url("Dashboard"));
		} else if ($cek2 > 0) {

			$hasil = $this->db->query("SELECT *  FROM tb_mahasiswa where nim='$username'");
			foreach ($hasil->result_array() as $i) :
				$k = $i['suara'];
				$ab = $i['absen'];

				if ($ab != '0' && $k == 0) {
					$data_session = array(
						'nim' => $username,
						'nama_mahasiswa' => $i['nama_mahasiswa'],
						'status' => "loginsiswa"
					);
					$this->session->set_userdata($data_session);
					redirect(base_url("Form"));
				} else if ($k == 0 && $ab == 0) {
					redirect(base_url("?pesan=belumabsen"));
				} else if ($k != '0' && $ab != '0') {
					redirect(base_url("?pesan=sudahmemilih"));
				} else {
					redirect(base_url("?pesan=gagal"));
				}
			endforeach;
		} else if ($cek3 > 0) {

			$hasil2 = $this->db->query("SELECT *  FROM tb_pengawas where username='$username'");
			foreach ($hasil2->result_array() as $i2) :
				$data_session = array(
					'id' => $i2['id'],
					'nama' => $i2['namapengawas'],
					'status' => "loginpengawas"
				);
				$this->session->set_userdata($data_session);
				redirect(base_url("Pengawas"));
			endforeach;
		} else {
			redirect(base_url('?pesan=gagal'));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('?pesan=logout'));
	}
}
