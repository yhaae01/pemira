<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_calon','mc');
		$this->load->model('M_pemilih','mp');
	}

	public function index()
	{
		$x['data']			= $this->mc->show_calon();
		$x['datapemilih']	= $this->mp->show_pemilih();
		$this->load->view('templates/admin/header');
		$this->load->view('dashboard',$x);
		$this->load->view('templates/admin/footer');
	}

	public function export(){
		$x['data']			= $this->mc->show_calon();
		$x['datapemilih']	= $this->mp->show_pemilih();
		$this->load->view('hasilpemilihanexport',$x);
	}

}
