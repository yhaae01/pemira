<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapem extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('M_pemilih', 'mp');
	}

	public function index()
	{
		$x['data'] = $this->mp->show_pemilih();
		$this->load->view('templates/admin/header');
		$this->load->view('datapemilih', $x);
		$this->load->view('templates/admin/footer');
	}

	function insert()
	{
		$result = $this->mp->insert_data();
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Data berhasil ditambah');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menambah data');
		}
		redirect(base_url('Datapem'));
	}

	public function edit($id)
	{
		$result = $this->mp->editsiswa($id);
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Data berhasil diubah');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal mengubah data');
		}
		redirect(base_url('Datapem'));
	}

	public function delete($id)
	{
		$result = $this->mp->deletesiswa($id);
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Berhasil hapus data');
		} else {
			$this->session->set_flashdata('error_msg', 'Oops! Terjadi suatu kesalahan.');
		}
		redirect(base_url('Datapem'));
	}

	public function hapussemua()
	{
		$result = $this->mp->truncate();
		redirect(base_url('Datapem'));
	}

	public function absen()
	{
		$result = $this->db->query('Update tb_siswa SET absen = 1');
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Berhasil absen');
		} else {
			$this->session->set_flashdata('error_msg', 'Oops! Terjadi suatu kesalahan.');
		}
		redirect(base_url('Datapem'));
	}

	public function batalabsen()
	{
		$result = $this->db->query('Update tb_siswa SET absen = 0');
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Berhasil batal absen');
		} else {
			$this->session->set_flashdata('error_msg', 'Oops! Terjadi suatu kesalahan.');
		}
		redirect(base_url('Datapem'));
	}

	public function resetpilihan()
	{
		$result = $this->db->query('UPDATE tb_siswa SET suara = 0');
		$result2 = $this->db->query('UPDATE tb_calon SET totalsuara = 0');

		if ($result && $result2) {
			$this->session->set_flashdata('success_msg', 'Berhasil reset pilihan');
		} else {
			$this->session->set_flashdata('error_msg', 'Oops! Terjadi suatu kesalahan.');
		}
		redirect(base_url('Datapem'));
	}
}
