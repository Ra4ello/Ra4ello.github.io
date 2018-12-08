<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
	}
	public function index()
	{
    if($this->session->userdata('email') != ''){
      redirect('/main/index', 'refresh');
    }
		$data['title'] = 'Login';
      	$this->load->view('login/index',$data);
        $this->load->view('templates/footer');
	
	}
	    public  function login_validation()  
      {  
           $this->load->library('form_validation');  
           $this->form_validation->set_rules('name_admin', 'name_admin', 'required');  
           $this->form_validation->set_rules('password_admin', 'password_admin', 'required');  
           if($this->form_validation->run())  
           {  
                //true  
                $name_admin = $this->input->post('name_admin');  
                $password_admin = $this->input->post('password_admin'); 
                $this->load->model('login_model');  
                if($this->login_model->can_login($name_admin, $password_admin))  
                {  
                     $session_data = array(  
                          'email'     =>     $name_admin  
                     );  
                     $this->session->set_userdata($session_data);  
                     redirect(base_url() . 'main/index');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Username and Password');  
                     redirect(base_url() . 'login/index');  
                }  
           }  
           else  
           {  
                $this->index();  
           }  
      } 
     public function logout()  
      {  
           $this->session->unset_userdata('email');  
           redirect(base_url() . 'login/index');  
      }   
}
