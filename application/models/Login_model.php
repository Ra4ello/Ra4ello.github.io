<?php

/**
 * 
 */
class Login_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function can_login($name_admin,$password_admin)
	{
		$this->db->where('name_admin',$name_admin);
		$this->db->where('password_admin',$password_admin);
		$query = $this->db->get('admin');
		if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
	}

}