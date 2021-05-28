<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datacal extends CI_Controller {

	function __construct(){
            parent::__construct();
            $this->load->model('M_calon','mc');
	}
	
	public function index(){
		$x['data']=$this->mc->show_calon();
		$this->load->view('templates/admin/header');
		$this->load->view('datacalon',$x);
		$this->load->view('templates/admin/footer');
	}

    function insert(){
		$result=$this->mc->insert_data();
		if($result){
			$this->session->set_flashdata('success_msg','Data berhasil ditambah');
		}else{
			$this->session->set_flashdata('error_msg','Gagal menambah data');
		}
		redirect(base_url('Datacal'));
	}
	
	public function edit(){
		$id = $this->input->post('id');

		// jika ada gambar yang di upload
		$uploadImage = $_FILES['image']['name'];

		if ($uploadImage) {
			$nama = 'calon_' . time();
			$config['upload_path'] = './assets/img/calon/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000';
			$config['max_width']  = '2000';
			$config['max_height']  = '2000';
			$config['file_name'] = $nama;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('image')) {
				$prevImage  = $this->db->get_where('tb_calon', ['id' => $id])->row_array()['foto'];
				// delete previous image
				if ($prevImage != 'default.jpg') {
					unlink(FCPATH . 'assets/img/calon/' . $prevImage);
				}
				$new_image = $this->upload->data('file_name');

				$this->db->set('foto', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$this->mc->editcalon($id);
	}

	public function delete($id){
		$result=$this->mc->deletecalon($id);
		if($result){
			$this->session->set_flashdata('success_msg','Data berhasil dihapus');
		}else{
			$this->session->set_flashdata('error_msg','Gagal menghapus data');
		}
		redirect(base_url('Datacal'));
	}
}
