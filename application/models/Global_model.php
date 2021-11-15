<?php 

class Global_model extends CI_Model{

	public function findAll($table){
		return $this->db->get_where($table, array('is_deleted' => FALSE))->result();
	}

	public function findById($id, $table){
		return $this->db->get_where($table, array('id' => $id))->result();
	}

	public function selectMax($field, $table){
		$this->db->select_max($field);
		$query = $this->db->get($table);
		return $query;
	}

	public function save($table, $data){
		$this->db->insert($table, $data);
	}

	public function update($id, $table, $data){
		$this->db->where('id', $id);
		$this->db->update($table, $data);
	}

	public function delete($id, $table){
		$this->db->delete($table, array('id' => $id));
	}

	public function softDelete($id, $table){
		$this->db->where('id', $id);
		$this->db->update($table, array('is_deleted' => TRUE));
	}
}