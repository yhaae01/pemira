<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataCalon extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_calon', 'mc');
	}

	public function index()
	{
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required|numeric|min_length[8]', [
			'required' => 'NIM tidak boleh kosong!',
			'min_length' => 'NIM minimal 6 karakter!',
			'numeric' => 'Hanya bisa menggunakan angka!'
		]);
		$this->form_validation->set_rules('namacalon', 'Nama', 'trim|required|max_length[100]', [
			'required' => 'Nama tidak boleh kosong!',
			'max_length' => 'Nama maksimal 100 karakter!'
		]);
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required', [
			'required' => 'Jurusan tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('asalkampus', 'Asal Kampus', 'trim|required', [
			'required' => 'Asal Kampus tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('riwayat', 'Riwayat', 'trim|required', [
			'required' => 'Riwayat tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('proker', 'Proker', 'trim|required', [
			'required' => 'Proker tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('visi', 'Visi', 'trim|required', [
			'required' => 'Visi tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('misi', 'Misi', 'trim|required', [
			'required' => 'Misi tidak boleh kosong!'
		]);

		$nama 						= 'calon_' . time();
		$config['upload_path']      = './assets/img/calon/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['max_size']  		= '2000';
		$config['max_width']  		= '2000';
		$config['max_height']  		= '2000';
		$config['overwrite']		= true;
		$config['file_name'] 		= $nama;

		$this->load->library('upload', $config);

		if ($this->form_validation->run() == FALSE) {
			$x['data'] = $this->mc->show_calon();

			$this->load->view('templates/admin/header');
			$this->load->view('datacalon', $x);
			$this->load->view('templates/admin/footer');
		} else {
			if (!$this->upload->do_upload('upfoto')) {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger" role="alert">
                    Oops! Terjadi suatu kesalahan.
                    </div>'
				);
				redirect('datacalon');
			} else {
				$this->mc->insert_data();
			}
		}
	}

	public function truncate()
	{
		$result = $this->mc->truncate();
		redirect(base_url('datacalon'));
	}

	public function edit()
	{
		$id = $this->input->post('id');

		$this->form_validation->set_rules('nim', 'NIM', 'trim|required|numeric|min_length[8]', [
			'required' => 'NIM tidak boleh kosong!',
			'min_length' => 'NIM minimal 6 karakter!',
			'numeric' => 'Hanya bisa menggunakan angka!'
		]);
		$this->form_validation->set_rules('namacalon', 'Nama', 'trim|required|max_length[100]', [
			'required' => 'Nama tidak boleh kosong!',
			'max_length' => 'Nama maksimal 100 karakter!'
		]);
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required', [
			'required' => 'Jurusan tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('asalkampus', 'Asal Kampus', 'trim|required', [
			'required' => 'Asal Kampus tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('riwayat', 'Riwayat', 'trim|required', [
			'required' => 'Riwayat tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('proker', 'Proker', 'trim|required', [
			'required' => 'Proker tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('visi', 'Visi', 'trim|required', [
			'required' => 'Visi tidak boleh kosong!'
		]);
		$this->form_validation->set_rules('misi', 'Misi', 'trim|required', [
			'required' => 'Misi tidak boleh kosong!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$x['data'] = $this->mc->show_calon();

			$this->load->view('templates/admin/header');
			$this->load->view('datacalon', $x);
			$this->load->view('templates/admin/footer');
		} else {
			$this->mc->editcalon($id);
		}
	}

	public function delete($id)
	{
		$result = $this->mc->deletecalon($id);
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data');
		}
		redirect(base_url('datacalon'));
	}
}
