<?php

class M_pemilih extends CI_Model{

	function show_pemilih(){
		$hasil=$this->db->query("SELECT * FROM tb_siswa");
		return $hasil;
	}  

	function insert_data(){
		$field = array(
			'id' => uniqid(),
			'nis' => $this->input->post('nis'),
			'password' => md5($this->input->post('password')),
			'namasiswa' => $this->input->post('nama'),
			// 'kelas' => $this->input->post('kelas'),
			'suara' => '0',
			'absen' => '0'
		);

		$this->db->insert('tb_siswa',$field);
		if ($this->db->affected_rows()>0) {
			return true;
		}else{
			return false;
		}
	}

	public function deletesiswa($id){
		$hasil=$this->db->query("SELECT suara  FROM tb_siswa where id='$id'");
		foreach($hasil->result_array() as $i):
                                $k=$i['suara'];

        $hasil2=$this->db->query("SELECT totalsuara  FROM tb_calon where id='$k'");
		foreach($hasil2->result_array() as $i):
                                $l=$i['totalsuara'];
                                $l=$l-1;

		$this->db->query("UPDATE tb_calon set totalsuara='$l' where id='$k'");
		endforeach;
		endforeach;
		
		$this->db->where('id',$id);
		$this->db->delete('tb_siswa');


		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}	

	public function truncate(){
		$this->db->query('TRUNCATE TABLE tb_siswa');

		$hasil=$this->db->query("SELECT *  FROM tb_calon");
		foreach($hasil->result_array() as $i):
                                $b=$i['id'];
        $this->db->query("UPDATE tb_calon set totalsuara='0' where id='$b'");
        endforeach;

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function editsiswa($id){
		$this->db->where('id',$id);
		$field = array(
			'namasiswa' => $this->input->post('nama'),
			// 'kelas' => $this->input->post('kelas'),
		);
		$this->db->update('tb_siswa',$field);

		if ($this->db->affected_rows()>0) {
			return true;
		}else{
			return false;
		}
	}

	public function editabsen($id){
		$pengaw=$this->session->userdata('id');
        $field = array(
			'absen' => $id
		);

		$this->db->where('id',$id);
		$this->db->update('tb_siswa',$field);

		if ($this->db->affected_rows()>0) {
			return true;
		}else{
			return false;
		}
	}

	public function editabsenbatal($id){
		$this->db->where('id',$id);
		$field = array(
			'absen' => '0'
		);
		$this->db->update('tb_siswa',$field);

		if ($this->db->affected_rows()>0) {
			return true;
		}else{
			return false;
		}
	}

	public function reset($id){

		$hasil=$this->db->query("SELECT suara  FROM tb_siswa where id='$id'");
		foreach($hasil->result_array() as $i):
                                $k=$i['suara'];

        $hasil2=$this->db->query("SELECT totalsuara  FROM tb_calon where id='$k'");
		foreach($hasil2->result_array() as $i):
                                $l=$i['totalsuara'];
                                $l=$l-1;

		$this->db->query("UPDATE tb_calon set totalsuara='$l' where id='$k'");
		endforeach;
		endforeach;

		$this->db->where('id',$id);
		$field = array(
			'suara' => '0',
		);
		$this->db->update('tb_siswa',$field);

		if ($this->db->affected_rows()>0) {
			return true;
		}else{
			return false;
		}
	}
}
