<?php

class M_calon extends CI_Model
{
	public $id;
	public $namacalon;
	public $visi;
	public $misi;
	public $foto = "default.png";

	private function _uploadImage()
	{
		$nama 						= 'calon_' . time();
		$config['upload_path']      = './assets/img/calon/';
		$config['allowed_types']    = 'gif|jpg|png';
		$config['file_name']        = $this->id;
		$config['overwrite']		= true;
		$config['file_name'] 		= $nama;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('upfoto')) {
			return $this->upload->data("file_name");
		}

		return "default.png";
	}

	function show_calon()
	{
		$hasil = $this->db->query("SELECT * FROM tb_calon");
		return $hasil;
	}

	function insert_data()
	{
		$post = $this->input->post();

		$this->nim = $post["nim"];
		$this->namacalon = $post["namacalon"];
		$this->jurusan = $post["jurusan"];
		$this->asalkampus = $post["asalkampus"];
		$this->riwayat = $post["riwayat"];
		$this->proker = $post["proker"];
		$this->visi = $post["visi"];
		$this->misi = $post["misi"];
		$this->foto = $this->_uploadImage();

		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
        Data calon berhasil ditambahkan.
        </div>'
		);
		$this->db->insert('tb_calon', $this);
		redirect('DataCalon');
	}

	public function editcalon()
	{
		$id         = $this->input->post('id');
		$namacalon  = $this->input->post('namacalon');
		$jurusan   	= $this->input->post('jurusan');
		$asalkampus = $this->input->post('asalkampus');
		$riwayat  	= $this->input->post('riwayat');
		$proker  	= $this->input->post('proker');
		$visi   	= $this->input->post('visi');
		$misi   	= $this->input->post('misi');

		$this->db->set('namacalon', $namacalon);
		$this->db->set('jurusan', $jurusan);
		$this->db->set('asalkampus', $asalkampus);
		$this->db->set('riwayat', $riwayat);
		$this->db->set('proker', $proker);
		$this->db->set('visi', $visi);
		$this->db->set('misi', $misi);
		$this->db->where('id', $id);
		$this->db->update('tb_calon');

		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
        Berhasil diubah!
        </div>'
		);
		redirect('DataCalon');
	}

	public function deletecalon($id)
	{
		$hasil = $this->db->query("SELECT * FROM tb_mahasiswa");
		foreach ($hasil->result_array() as $i) :
			$r = $i['id'];
			$k = $i['suara'];
			if ($k == $id) {
				$this->db->query("UPDATE tb_mahasiswa set suara='0' where id='$r'");
			};
		endforeach;

		$prevImage  = $this->db->get_where('tb_calon', ['id' => $id])->row_array()['foto'];

		if ($prevImage != 'default.jpg') {
			unlink(FCPATH . 'assets/img/calon/' . $prevImage);
		}

		$this->db->where('id', $id);
		$this->db->delete('tb_calon');
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function pilihcalon($id)
	{
		$hasil = $this->db->query("SELECT totalsuara  FROM tb_calon where id='$id'");
		foreach ($hasil->result_array() as $i) :
			$k = $i['totalsuara'];
			$k = $k + 1;
			$this->db->query("UPDATE tb_calon set totalsuara='$k' where id='$id'");
		endforeach;

		$loginnis = $this->session->userdata('nis');
		$field2 = array(
			'suara' => $id
		);
		$this->db->where('nis', $loginnis);
		$this->db->update('tb_mahasiswa', $field2);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
