<?php

class M_mahasiswa extends CI_Model
{

	function show_pemilih()
	{
		$hasil = $this->db->query("SELECT * FROM tb_mahasiswa");
		return $hasil;
	}

	function insert_data()
	{
		$field = [
			'nim' => $this->input->post('nim'),
			'password' => $this->input->post('password'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'suara' => '0',
			'absen' => '0'
		];

		$this->db->insert('tb_mahasiswa', $field);
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
        Data mahasiswa berhasil ditambahkan.
        </div>'
		);
		redirect(base_url('DataMahasiswa'));
	}

	public function deletesiswa($id)
	{
		$hasil = $this->db->query("SELECT suara  FROM tb_mahasiswa where id='$id'");
		foreach ($hasil->result_array() as $i) :
			$k = $i['suara'];

			$hasil2 = $this->db->query("SELECT totalsuara  FROM tb_calon where id='$k'");
			foreach ($hasil2->result_array() as $i) :
				$l = $i['totalsuara'];
				$l = $l - 1;

				$this->db->query("UPDATE tb_calon set totalsuara='$l' where id='$k'");
			endforeach;
		endforeach;

		$this->db->where('id', $id);
		$this->db->delete('tb_mahasiswa');


		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function truncate()
	{
		$this->db->query('TRUNCATE TABLE tb_mahasiswa');

		$hasil = $this->db->query("SELECT *  FROM tb_calon");
		foreach ($hasil->result_array() as $i) :
			$b = $i['id'];
			$this->db->query("UPDATE tb_calon set totalsuara='0' where id='$b'");
		endforeach;

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function editsiswa($id)
	{
		$this->db->where('id', $id);
		$field = array(
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa')
		);
		$this->db->update('tb_mahasiswa', $field);

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	// start datatables
	var $column_order = array('id', 'nim', 'nama_mahasiswa', 'absen', 'suara'); //set column field database for datatable orderable
	var $column_search = array('id', 'nim', 'nama_mahasiswa'); //set column field database for datatable searchable
	var $order = array('id' => 'asc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select('*');
		$this->db->from('tb_mahasiswa');

		$i = 0;
		foreach ($this->column_search as $item) { // loop column
			if (isset($_POST['search']['value'])) { // if datatable send POST for search
				if ($i === 0) { // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) { // here order processing
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if (isset($_POST['length']) != -1)
			$this->db->limit(isset($_POST['length']), isset($_POST['start']));
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_all()
	{
		$this->db->from('tb_mahasiswa');
		return $this->db->count_all_results();
	}
	// end datatables

	public function get_mhs()
	{
		return $this->db->get("tb_mahasiswa");
	}
}
