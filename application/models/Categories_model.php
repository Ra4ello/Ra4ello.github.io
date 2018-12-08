<?php

/**
 * 
 */
class Categories_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}
	public function getUser()
	{
		return $this->db->select('id,name')->get('user')->result_array();
	}
	public function getIdByUser($username){
		return $this->db->query("SELECT id FROM `user` WHERE email = '$username' ")->row_array();


	}
	public function getLastId()
	{
		return $this->db->query("SELECT MAX(`id`) FROM `categories`")->row_array();
	}
	public function getCategoriesByUser($user_id)
	{
		return $this->db->query("SELECT categories.id,categories.name_categories FROM categories INNER JOIN users_categories as uc ON categories.id = uc.categories_id INNER JOIN user on uc.user_id = user.id WHERE user.id = '$user_id'")->result_array();
	}

	public function getCategories2FromAdd()
	{
		return $this->db->query("SELECT * FROM `categories2` ")->result_array();
	}
	public function getCategories2($categories_id)
	{
		$this->db->where('categories_id',$categories_id);
		$this->db->order_by('name_categories2','ASC');
		$query = $this->db->get('categories2');
		$output .= '<option value>Select Categories2</option>';
		foreach ($query->result() as $item) 
		{
			$output .='<option value="'.$item->id_categories2.'">'.$item->name_categories2.'</option>';
		}
		return $output;
	}
	public function getCategories3($categories2_id)
	{
		$this->db->where('categories2_id', $categories2_id);
		  $this->db->order_by('name_item', 'ASC');
		  $query = $this->db->get('categories3');
		  $output = '<option value="">Select Categories3</option>';
		  foreach($query->result() as $item)
		  {
		   $output .= '<option value="'.$item->id_categories3.'">'.$item->name_item.'</option>';
		  }
		  return $output;
 	}
 	// public function setCategories2($data){

 	// 	$this->db->insert('categories2', $data); 
 	// }
 	// public function setCategories3($data)
 	// {
 	// 	$this->db->insert('categories3', $data); 
 	// }
 	// public function setCategories($name_categories){
 	// 	$this->db->insert('categories', $name_categories);
 	// }
		// public function setCategoriesUser($user_categories){
 	// 	$this->db->insert('users_categories', $user_categories);  
 	// }
}

