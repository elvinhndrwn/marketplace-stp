<?php 

class Admin_model extends CI_Model{
	public function findByCategoryId($category_id, $table){
		return $this->db->get_where($table, array('category_id' => $category_id));
	}

	public function findByUsernameAndPassword($username, $password){
		return $this->db->get_where("management", array('username' => $username, 'password' => $password));
	}

	public function findByUsername($username){
		return $this->db->get_where("management", array('username' => $username));
	}
}