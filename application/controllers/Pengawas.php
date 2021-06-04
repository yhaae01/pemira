<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengawas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_pemilih', 'mp');
	}

	public function index()
	{
		$x['data'] = $this->mp->show_pemilih();
		$this->load->view('viewpengawas', $x);
	}

	public function edit($id)
	{
		$result = $this->mp->editabsen($id);
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Data berhasil diubah');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal mengubah data');
		}
		redirect(base_url('Pengawas'));
	}

	public function editbatal($id)
	{
		$result = $this->mp->editabsenbatal($id);
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Data berhasil diubah');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal mengubah data');
		}
		redirect(base_url('Pengawas'));
	}

	public function hasilpemilihan()
	{
		$this->load->model('M_calon', 'mc');
		$x['data'] = $this->mc->show_calon();
		$x['datapemilih'] = $this->mp->show_pemilih();
		$this->load->view('hasilpemilihanpeng', $x);
	}
}
