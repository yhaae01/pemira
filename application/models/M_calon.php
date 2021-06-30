<?php

class M_calon extends CI_Model
{
	function show_calon()
	{
		$hasil = $this->db->query("SELECT * FROM tb_calon");
		return $hasil;
	}

	function insert_data()
	{
		$post = $this->input->post();
		$gambar = $this->upload->data();

		$this->nim 			= $post["nim"];
		$this->namacalon 	= $post["namacalon"];
		$this->jurusan 		= $post["jurusan"];
		$this->asalkampus 	= $post["asalkampus"];
		$this->riwayat 		= $post["riwayat"];
		$this->proker 		= $post["proker"];
		$this->visi 		= $post["visi"];
		$this->misi 		= $post["misi"];
		$this->link 		= $post["link"];
		$this->foto 		= $gambar['file_name'];

		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
        Data calon berhasil ditambahkan.
        </div>'
		);
		$this->db->insert('tb_calon', $this);
		redirect('DataCalon');
	}

	public function truncate()
	{
		$this->db->query('TRUNCATE TABLE tb_calon');

		$files = glob('assets/img/calon/*'); // get all file names
		foreach ($files as $file) { // iterate files
			if (is_file($file)) {
				unlink($file); // delete file
			}
		}

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
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

		$loginnis = $this->session->userdata('nim');
		$field2 = array(
			'suara' => $id
		);
		$this->db->where('nim', $loginnis);
		$this->db->update('tb_mahasiswa', $field2);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
