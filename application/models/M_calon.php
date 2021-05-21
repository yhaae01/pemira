<?php

class M_calon extends CI_Model{

	private $_table = "tb_calon";

    public $id;
    public $namacalon;
	public $visi;
	public $misi;
    public $foto = "default.png";
	
	function show_calon(){
		$hasil=$this->db->query("SELECT * FROM tb_calon");
		return $hasil;
	} 
	
	function insert_data(){
		$post = $this->input->post();
		$this->id = uniqid();
        $this->namacalon = $post["namacalon"];
        $this->visi = $post["visi"];
        $this->misi = $post["misi"];
        $this->foto = $this->_uploadImage();
        $this->db->insert('tb_calon', $this);
		if ($this->db->affected_rows()>0) {
			return true;
		}else{
			return false;
		}
	}

	public function editcalon($id){
		$this->db->where('id',$id);
		$post = $this->input->post();
		$this->id = uniqid();
        $this->namacalon = $post["namacalon"];
        $this->visi = $post["visi"];
        $this->misi = $post["misi"];
		
        // jika ada gambar yang di upload
		$uploadfoto = $_FILES['foto']['nama'];

		if ($uploadfoto) {
			$nama = 'calon_' . time();
			$config['upload_path'] = './assets/img/calon/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000';
			$config['max_width']  = '2000';
			$config['max_height']  = '2000';
			$config['file_name'] = $nama;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$prevfoto  = $this->db->get_where('tb_calon', ['id' => $id])->row_array()['foto'];
				// delete previous foto
				if ($prevfoto != 'default.jpg') {
					unlink(FCPATH . 'assets/img/calon/' . $prevfoto);
				}
				$new_foto = $this->upload->data('file_name');

				$this->db->set('foto', $new_foto);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$this->db->update('tb_calon', $this);
	}

	private function _uploadImage()
	{
		$config['upload_path']          = './assets/img/calon/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $this->id;
		$config['overwrite']			= true;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('upfoto')) {
        return $this->upload->data("file_name");
    }
    
    return "default.png";
	}

	public function deletecalon($id){
		$hasil=$this->db->query("SELECT * FROM tb_siswa");
		foreach($hasil->result_array() as $i):
								$r=$i['id'];
                                $k=$i['suara'];
        if ($k==$id) {
        	$this->db->query("UPDATE tb_siswa set suara='0' where id='$r'");
        };
		endforeach;

		$prevImage  = $this->db->get_where('tb_calon', ['id' => $id])->row_array()['foto'];

		if ($prevImage != 'default.jpg') {
            unlink(FCPATH . 'assets/img/calon/' . $prevImage);
        }

		$this->db->where('id',$id);
		$this->db->delete('tb_calon');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function truncate(){
		$hasil=$this->db->query("SELECT * FROM tb_siswa");
		foreach($hasil->result_array() as $i):
                                $b=$i['id'];
        $this->db->query("UPDATE tb_siswa set suara='0' where id='$b'");
        endforeach;

		$this->db->query('TRUNCATE TABLE tb_calon');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	} 

	public function pilihcalon($id){
		$hasil=$this->db->query("SELECT totalsuara  FROM tb_calon where id='$id'");
		foreach($hasil->result_array() as $i):
                                $k=$i['totalsuara'];
                                $k=$k+1;
		$this->db->query("UPDATE tb_calon set totalsuara='$k' where id='$id'");
		endforeach;

		$loginnis=$this->session->userdata('nis');
		$field2 = array(
			'suara' => $id
		);
		$this->db->where('nis',$loginnis);
		$this->db->update('tb_siswa',$field2);

		if ($this->db->affected_rows()>0) {
			return true;
		}else{
			return false;
		}
	}
}