<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataMahasiswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_mahasiswa', 'mm');
	}

	// public function index()
	// {
	// 	$this->load->view('templates/admin/header');
	// 	$this->load->view('dataMahasiswa');
	// 	$this->load->view('templates/admin/footer');
	// }

	public function json()
	{
		$this->load->library('datatables');
		$this->datatables->select('*');
		$this->datatables->from('tb_mahasiswa');
		return print_r($this->datatables->generate());
	}

	function get_ajax1()
	{
		$this->load->model('M_mahasiswa');
		$list = $this->M_mahasiswa->get_datatables();
		$data = array();
		$no = 1;
		foreach ($list as $item) {
			$no++;
			$row = array();
			$row[] = $no . ".";
			$row[] = $item->id;
			$row[] = $item->nim;
			$row[] = $item->nama_mahasiswa;
			$row[] = $item->absen;
			$row[] = $item->suara;
			$data[] = $row;
		}
		$output = array(
			"draw" => intval($this->input->post('draw')),
			"recordsTotal" => $this->mp->count_all(),
			"recordsFiltered" => $this->mp->count_filtered(),
			"data" => $data,
		);
		// output to json format
		echo json_encode($output);
	}

	public function get_ajax()
	{
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));
		$this->load->model('M_mahasiswa');

		$books = $this->M_mahasiswa->get_mhs();

		$data = array();

		foreach ($books->result() as $r) {

			$data[] = array(
				$r->id,
				$r->nim,
				$r->nama_mahasiswa,
				$r->status,
				$r->absen
			);
		}

		$output = array(
			"draw" => $draw,
			"recordsTotal" => $books->num_rows(),
			"recordsFiltered" => $books->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
	}

	public function index()
	{
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required|numeric|min_length[8]|is_unique[tb_mahasiswa.nim]|matches[password]', [
			'required' => 'NIM tidak boleh kosong!',
			'min_length' => 'NIM minimal 6 karakter!',
			'numeric' => 'Hanya bisa menggunakan angka!',
			'is_unique' => 'NIM sudah digunakan!',
			'matches' => 'NIM harus sama seperti Password!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[nim]', [
			'required' => 'Password tidak boleh kosong!',
			'min_length' => 'Password minimal 6 karakter!',
			'matches' => 'Password harus sama seperti NIM!'
		]);
		$this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'trim|required|max_length[50]', [
			'required' => 'Nama Mahasiswa tidak boleh kosong!',
			'max_length' => 'Nama Mahasiswa maksimal 50 karakter!'
		]);

		if ($this->form_validation->run() == FALSE) {
			$x['data'] = $this->mm->show_pemilih();

			$this->load->view('templates/admin/header');
			$this->load->view('dataMahasiswa', $x);
			$this->load->view('templates/admin/footer');
		} else {
			$this->mm->insert_data();
		}
	}

	public function edit($id)
	{
		$result = $this->mm->editsiswa($id);
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Data berhasil diubah');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal mengubah data');
		}
		redirect(base_url('DataMahasiswa'));
	}

	public function delete($id)
	{
		$result = $this->mm->deletesiswa($id);
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Berhasil hapus data');
		} else {
			$this->session->set_flashdata('error_msg', 'Oops! Terjadi suatu kesalahan.');
		}
		redirect(base_url('DataMahasiswa'));
	}

	public function hapussemua()
	{
		$result = $this->mm->truncate();
		redirect(base_url('DataMahasiswa'));
	}

	public function absen()
	{
		$result = $this->db->query('Update tb_mahasiswa SET absen = 1');

		if ($result) {
			$this->session->set_flashdata('success_msg', 'Berhasil absen');
		} else {
			$this->session->set_flashdata('error_msg', 'Oops! Terjadi suatu kesalahan.');
		}
		redirect(base_url('DataMahasiswa'));
	}

	public function batalabsen()
	{
		$result = $this->db->query('Update tb_mahasiswa SET absen = 0');

		if ($result) {
			$this->session->set_flashdata('success_msg', 'Berhasil batal absen');
		} else {
			$this->session->set_flashdata('error_msg', 'Oops! Terjadi suatu kesalahan.');
		}
		redirect(base_url('DataMahasiswa'));
	}

	public function resetpilihan()
	{
		$result = $this->db->query('UPDATE tb_mahasiswa SET suara = 0');
		$result2 = $this->db->query('UPDATE tb_calon SET totalsuara = 0');

		if ($result && $result2) {
			$this->session->set_flashdata('success_msg', 'Berhasil reset pilihan');
		} else {
			$this->session->set_flashdata('error_msg', 'Oops! Terjadi suatu kesalahan.');
		}
		redirect(base_url('DataMahasiswa'));
	}
}
