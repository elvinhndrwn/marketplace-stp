<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('Global_model', 'Query');
		$this->load->model('admin/Admin_model', 'AdminModel');
		if($this->session->userdata('role') != 'admin'){
			redirect("admin/login/err", 'refresh');
		}
		
	}

	// ===========================================================================
	// Variables for table name
	var $tblProducts = "products";
	var $tblCategories = "categories";
	// ===========================================================================

	// Template for web view
	public function template_web($url_view, $data){
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/navbar');
		$this->load->view('admin/templates/sidebar');
		$this->load->view($url_view);
		$this->load->view('admin/templates/footer');
	}

	// Controller 
	public function getUserData(){
		$username = $this->session->userdata('username');

		return $this->AdminModel->findByUsername($username)->row();
	}
	public function index(){
		$data['user'] = $this->getUserData();

		$this->template_web("admin/index", $data);
	}

	public function products(){
		$data['title'] = "Products";
		$data['products'] = $this->Query->findAll($this->tblProducts);
		
		$this->template_web("admin/products", $data);
	}

	public function categories(){
		$data['title'] = "Categories";
		$data['categories'] = $this->Query->findAll($this->tblCategories);
		
		$this->template_web("admin/categories", $data);
	}

	public function delete(){
		$id = $this->input->post('id');
		$table = $this->input->post('table');

		switch ($table){
			case 'categories':
			$categoryInProducts = $this->AdminModel->findByCategoryId($id, $this->tblProducts)->num_rows();
			if($categoryInProducts > 0){
				$error = 1;
				echo $error;
			}else{
				$this->Query->softDelete($id, $table);
				$error = 0;
				echo $error;
			}
			break;

			case 'products':
			$this->Query->softDelete($id, $table);
			$error = 0;
			echo $error;
			break;
		}

		
	}

	public function updatedAt(){
		return Date('Y-m-d H:i:s');
	}

	public function add($param){
		$data['title'] = $param;

		switch (strtolower($param)){
			case 'categories':
			$this->template_web("admin/forms/add_categories", $data);
			break;

			case 'products':
			$data['categories'] = $this->Query->findAll($this->tblCategories);
			$this->template_web("admin/forms/add_products", $data);
			break;

			default:
			echo "Oppss 404 not found!";
			break;
		}
	}

	public function edit($param, $id){
		$data['title'] = $param;

		switch (strtolower($param)){
			case 'categories':
			$data['categories'] = $this->Query->findById($id, $this->tblCategories);
			$this->template_web("admin/forms/edit_categories", $data);
			break;

			case 'products':
			$data['categories'] = $this->Query->findAll($this->tblCategories);
			$data['products'] = $this->Query->findById($id, $this->tblProducts);
			$this->template_web("admin/forms/edit_products", $data);
			break;

			default:
			echo "Oppss 404 not found!";
			break;
		}
	}

	public function save_category(){
		$data = [
			'name' => $this->input->post("name"),
			'unit' => $this->input->post("unit"),
			'is_deleted' => FALSE
		];

		$this->Query->save($this->tblCategories, $data);
		$this->session->set_flashdata('alert','Category saved');
		redirect("admin/pages/categories");
	}

	public function update_category(){
		$id = $this->input->post("id");

		$data = [
			'name' => $this->input->post("name"),
			'unit' => $this->input->post("unit"),
			'is_deleted' => FALSE,
			'updated_at' => $this->updatedAt(),

		];

		$this->Query->update($id, $this->tblCategories, $data);
		$this->session->set_flashdata('alert','Category updated');
		redirect("admin/pages/categories");
	}

	public function save_product(){
		// NOTE : Handle jika tidak upload foto belum ada.
		
		if(!empty($_FILES['file']['name'])){

			// Set preference
			$config['upload_path'] = 'upload/images/products/';	
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size']    = '5000'; // max_size in kb
			$config['file_name'] = "products_".random_string('numeric', 5);;

			//Load upload library
			$this->load->library('upload',$config);			

			// File upload
			if($this->upload->do_upload('file')){

				// Get data about the file
				$uploadData = $this->upload->data();

				$data = [
					'category_id' => $this->input->post("category_id"),
					'name' => $this->input->post("name"),
					'purchase_price' => $this->input->post("purchase_price"),
					'selling_price' => $this->input->post("selling_price"),
					'stock' => $this->input->post("stock"),
					'image' => $uploadData["file_name"],
					'is_deleted' => FALSE
				];

				$this->Query->save($this->tblProducts, $data);
				$this->session->set_flashdata('alert','Products saved');
			}
		}

		redirect("admin/pages/products");
	}

	public function update_product(){
		if(!empty($_FILES['file']['name'])){

			// Set preference
			$config['upload_path'] = 'upload/images/products/';	
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size']    = '5000'; // max_size in kb
			$config['file_name'] = "products_".random_string('numeric', 5);;

			//Load upload library
			$this->load->library('upload',$config);			

			// File upload
			if($this->upload->do_upload('file')){

				// Get data about the file
				$uploadData = $this->upload->data();

				$data = [
					'category_id' => $this->input->post("category_id"),
					'name' => $this->input->post("name"),
					'purchase_price' => $this->input->post("purchase_price"),
					'selling_price' => $this->input->post("selling_price"),
					'stock' => $this->input->post("stock"),
					'image' => $uploadData["file_name"],
					'is_deleted' => FALSE,
					'updated_at' => $this->updatedAt(),
				];

				$this->Query->update($this->input->post("id"), $this->tblProducts, $data);
			}
		}else{

			// If not update image
			$data = [
				'category_id' => $this->input->post("category_id"),
				'name' => $this->input->post("name"),
				'purchase_price' => $this->input->post("purchase_price"),
				'selling_price' => $this->input->post("selling_price"),
				'stock' => $this->input->post("stock"),
				'is_deleted' => FALSE,
				'updated_at' => $this->updatedAt(),
			];

			$this->Query->update($this->input->post("id"), $this->tblProducts, $data);
		}

		$this->session->set_flashdata('alert','Products updated');
		redirect("admin/pages/products");
	}
}
