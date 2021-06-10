<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_calon', 'mc');
		$this->load->model('M_Mahasiswa', 'mm');
	}

	public function index()
	{
		$x['data']			= $this->mc->show_calon();
		$x['datapemilih']	= $this->mm->show_pemilih();
		$this->load->view('templates/admin/header');
		$this->load->view('dashboard', $x);
		$this->load->view('templates/admin/footer');
	}

	public function export()
	{
		$x['data']			= $this->mc->show_calon();
		$x['datapemilih']	= $this->mm->show_pemilih();
		$this->load->view('hasilpemilihanexport', $x);
	}
}
