<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->model("main_model");
		 $this->load->database();  
		 $this->load->helper('url');

	}

	public function index()
	{
		if($this->session->userdata('email') != '')  
		           {  
		              $data['email'] =  '<h2>'.$this->session->userdata('email').'</h2>';  
		              $data['logout'] =  '<label><a href="'.base_url().'login/logout">Logout</a></label>';  
		           }  
		           else  
		           {  
		              redirect(base_url() . '/main/index');  
		           } 
		           //echo $this->session->userdata('id');
		          // print_r($_SERVER['REQUEST_URI']);
		$data['title'] = 'Main';
		$data['firms'] = $this->main_model->getFirms();
		//$data['journal'] = $this->main_model->getJournal();
		$this->load->view('templates/header', $data);
      	$this->load->view('main/index',$data);
        $this->load->view('templates/footer');
	}
	//       function fetch_user(){  
 //           $fetch_data = $this->main_model->make_datatables();  
 //           $data = array();  
 //           foreach($fetch_data as $row)  
 //           {  
 //                $sub_array = array();  
 //                $sub_array[] = $row->id_user;  
 //                $sub_array[] = $row->id_firm;  
 //                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs">Update</button>';  
 //                $data[] = $sub_array;  
 //           }  
 //           $output = array(  
 //                "draw"                    =>     intval($_POST["draw"]),  
 //                "recordsTotal"          =>      $this->main_model->get_all_data(),  
 //                "recordsFiltered"     =>     $this->main_model->get_filtered_data(),  
 //                "data"                    =>     $data  
 //           );  
 //           echo json_encode($output);  
	// }
	public function control()
	{
		$data['title'] = 'Control';
		$data['firms'] = $this->main_model->getFirms();
		$data['categories'] = $this->main_model->getCategories();
		$data['user'] = $this->main_model->getUser();
		$data['categories2'] = $this->main_model->getCategories2FromCategories();
		
		if($this->input->post('insert'))
		{
			if($this->input->post('user') != '' && $this->input->post('firms') != '' && $this->input->post('categories') != '' && $this->input->post('categories2') != '')
			{
			$insert_data = array(
				'user_name' => $this->input->post('user'),
				'id_firm' => $this->input->post('firms'),
				'id_categories' => $this->input->post('categories'),
				'id_categories2' => $this->input->post('categories2'),
				'id_categories3' => $this->input->post('categories3')
			);
			//$this->main_model->setJournal($insert_data);
			redirect('/main/index', 'refresh');
			}else{
				echo "Заповніть всі дані";
			}
		}
		$this->load->view('templates/header', $data);
      	$this->load->view('main/control',$data);
        $this->load->view('templates/footer');
	}
	function fetch()
	{
		$output = '';
		$query = '';
		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		//$data = $this->main_model->searchJournal($query);
		$output .= '
		<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<tr>
							<th>Користувач</th>
							<th>Фірма</th>
							<th>Редагувати</th>
	
						</tr>
		';
		if($data->num_rows() > 0)
		{
			foreach($data->result() as $row)
			{
				$output .= '
						<tr>
							<td>'.$row->name.'</td>
							<td>'.$row->name_firms.'</td>
							<td><button type="button" name="update"data-toggle="modal" data-target="#Modal_Edit" id="'.$row->id.'" class="type btn btn-warning btn-xs" onClick ="getDetails(this)">Update</button></td>

						</tr>
				';
			}
		}
		else
		{
			$output .= '<tr>
							<td colspan="5">No Data Found</td>
						</tr>';
		}
		$output .= '</table>';
		echo $output;
	}
	function getId(){
		print_r($this->input->post('id'));
	}
	 function update(){
        $data=$this->product_model->update_product();
        echo json_encode($data);
    }
    public function fetch_categories2()
	{
		if($this->input->post('categories_id')){
			echo $this->main_model->getCategories2($this->input->post('categories_id'));
		}
	}
	public function fetch_categories3()
	{

		if($this->input->post('categories2_id')){
			echo $this->main_model->getCategories3($this->input->post('categories2_id'));
		}
	}
	public function saveData()
	{
		//print_r($_POST);
	
		$cat2 = $this->input->post('name');
		print_r($cat2);
		$cat1 = $this->input->post('cat');
		echo "<br />";
		print_r($cat1);
		$temp = $this->input->post('temp');
		echo "<br />";
		print_r($temp);
		//$arr = array_merge($cat2,$temp);
		// $arr = array_keys($cat1,$cat2);
				 $i = 0;
				 $j = 0;
		$arr = [];
		$arr2 = [];
		$keys = array_keys($arr);

		foreach ($temp as  $d) {
			        foreach($cat1 as $k=>$v){
			        	
			        	foreach ($cat2 as $y) {
			        			//if($keys == $arr[$k]){
			        			$arr[$k][$v] = $cat2;
			        			foreach ($keys as  $value) {
			        				if($keys[$value] == $temp[$d]){
			        					echo $keys[$value];
			        				}
			        			}

			        		//};
			        		}
			        	};	      
			          };  
			          
			// $arr = [];
			// for($i=0;$i<count($cat1);$i++){
			//    for($j=0;$j<$i;$j++){
			//       $arr[$j+1][$i]=$cat1[$i];
			//       $arr[$j][$i]=$cat2[$i];
			// }}    
			     echo '<pre>';
			   print_r($arr);
			    echo '<pre>';  
			    echo '<pre>';
			   print_r($arr2);
			    echo '<pre>';
			    //  echo '<pre>';
			    // print_r($arr2);
			    // echo '<pre>';
			   

		$pib = array(
				'name' => $this->input->post('pib'),
				'id_firm' => $this->input->post('firms')
			);
		// $this->main_model->setUser($pib);
		// $lastUserId = $this->main_model->getlasIdUser();
		// $lastUserId = implode($lastUserId);
		// 	 $cat1 = array(
		//  		'name_categories' => $this->input->post('cat1'),
		//  		'user_id' => $lastUserId
		//  	);
		// 	 $this->main_model->setCategories($cat1);
		// 	$lasCatId = $this->main_model->getLastIdCat1();
		// 	$lasCatId = implode($lasCatId) ;
		//$this->main_model->setCategories2($cat2,$lasCatId);



	
	}
	public function createCategories()
	{
		if($this->input->post('name_categories'))
		{
			$insert_data = array(
				'name_categories' => $this->input->post('name_categories')
			);

			$this->main_model->setCategories($insert_data);
		}
	}

	public function createCategories2()
	{
		 if($this->input->post('name_categories2')){
           	$insert_data = array(  
                     'name_categories2'   =>     $this->input->post('name_categories2'),  
                     'categories_id'      =>     $this->input->post('categoriesAdd')  
             );  
                $this->main_model->setCategories2($insert_data);  
                echo 'Data Inserted';    
           }
           
	}
	public function createCategories3()
	{
		if($this->input->post('name_item'))
		{
			$insert_data = array(
				'name_item' => $this->input->post('name_item'),
				'categories2_id' => $this->input->post('categoriesAdd3')
			);
			$this->main_model->setCategories3($insert_data);
			echo "Data Inserted";
		}
	}
	public function createUser()
	{
		if($this->input->post('user_name'))
		{
			$insert_data = array(
				'name' => $this->input->post('user_name'),
				'id_firm' => $this->input->post('name_firm')
			);
			$this->main_model->setUser($insert_data);
			echo "Data Inserted";

		}
	}
	public function createFirm()
	{
		if($this->input->post('firm_name'))
		{
			$insert_data  = array(
				'name_firms' => $this->input->post('firm_name')
			 );
			$this->main_model->setFirms($insert_data);
			echo "Data Inserted";
		}
	}
	public function saveControl()
	{

		if($this->input->post('user'))
		{
			$insert_data = array(
				'user_name' => $this->input->post('user'),
				'id_firm' => $this->input->post('firms'),
				'id_categories' => $this->input->post('categories'),
				'id_categories2' => $this->input->post('categories2'),
				'id_categories3' => $this->input->post('categories3')
			);
			//$this->main_model->setJournal($insert_data);
			echo "Data Inserted";
			//redirect('/main/index', 'refresh');
		}
	}
}
