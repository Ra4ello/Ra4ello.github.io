<?php  
 class Main_model extends CI_Model  
 { 
 	// public function getUserFromJournal()
 	// {

 	// 	$user = $this->db->query("SELECT user.name from user INNER JOIN journal on user.id=journal.id_user")->result_array();
 	// 	return $user;
 	// }
 	// $user = getUserFromJournal()

 	// function getJournal()
 	// {
 	// 	$query = $this->db->query("SELECT user.name,firms.name_firms,categories.name_categories,categories2.name_categories2,categories3.name_item from user INNER JOIN journal on user.id=journal.user_name INNER JOIN firms on journal.id_firm = firms.id INNER JOIN categories on journal.id_categories = categories.id INNER JOIN categories2 ON journal.id_categories2= categories2.id_categories2 INNER join categories3 on journal.id_categories3 = categories3.id_categories3")->result_array();
 	// 	return $query;
 	// }
 	//   //  function update_product(){
  //   //     $product_code=$this->input->post('product_code');
  //   //     $product_name=$this->input->post('product_name');
  //   //     $product_price=$this->input->post('price');
 
  //   //     $this->db->set('product_name', $product_name);
  //   //     $this->db->set('product_price', $product_price);
  //   //     $this->db->where('product_code', $product_code);
  //   //     $result=$this->db->update('product');
  //   //     return $result;
  //   // }
  //   function getJournalById($id)
  //   {
  //   	$query = $this->db->query("SELECT journal.id,user.name,firms.name_firms,categories.name_categories,categories2.name_categories2,categories3.name_item from user INNER JOIN journal on user.id=journal.user_name INNER JOIN firms on journal.id_firm = firms.id INNER JOIN categories on journal.id_categories = categories.id INNER JOIN categories2 ON journal.id_categories2= categories2.id_categories2 INNER join categories3 on journal.id_categories3 = categories3.id_categories3 WHERE journal.id = $id")->result_array();
  //   	return $query;
  //   }
 	// function searchJournal($query)
 	// {

 	// 	$this->db->select('journal.id,user.name,firms.name_firms,categories.name_categories,categories2.name_categories2,categories3.name_item');
 	// 	$this->db->from('user');
 	// 	$this->db->join('journal','user.id=journal.user_name');
 	// 	$this->db->join('firms','journal.id_firm = firms.id');
 	// 	$this->db->join('categories','id_categories = categories.id');
 	// 	$this->db->join('categories2','journal.id_categories2= categories2.id_categories2');
 	// 	$this->db->join('categories3','journal.id_categories3 = categories3.id_categories3');
 	// 	if($query != '')
		// {
		// 	$this->db->like('user.name', $query);
		// 	$this->db->or_like('firms.name_firms', $query);
		// 		}
		// $this->db->order_by('journal.id', 'DESC');
		// return $this->db->get();
 	// }
 	// 	var $table = "journal"; 
 	// 	var $select_column = array("id","user_name","id_firm","id_categories","id_categories2","id_categories3");
 	// 	var $order_column  = array(null,'email',"id_user","id_firm");

  //     function make_query()  
  //     {  
  //          $this->db->select($this->select_column);  
  //          $this->db->from($this->table);  
  //          if(isset($_POST["search"]["value"]))  
  //          {  
  //               $this->db->like("user_name", $_POST["search"]["value"]);  
  //               $this->db->or_like("id_firm", $_POST["search"]["value"]);  
  //          }  
  //          if(isset($_POST["order"]))  
  //          {  
  //               $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
  //          }  
  //          else  
  //          {  
  //               $this->db->order_by('id', 'DESC');  
  //          }  
  //     }  
  //     function make_datatables(){  
  //          $this->make_query();  
  //          if($_POST["length"] != -1)  
  //          {  
  //               $this->db->limit($_POST['length'], $_POST['start']);  
  //          }  
  //          $query = $this->db->get();  
  //          return $query->result();  
  //     }  
  //     function get_filtered_data(){  
  //          $this->make_query();  
  //          $query = $this->db->get();  
  //          return $query->num_rows();  
  //     }       
  //     function get_all_data()  
  //     {  
  //     	$this->db->select('user.name');
		// $this->db->from('user');
		// $this->db->join('journal', 'user.id = journal.user_name');
		// return $this->db->count_all_results();
  //          // $this->db->select("*");  
  //          // $this->db->from($this->table);  
  //          // return $this->db->count_all_results();  
  //     } 
      function getUser()
      {
      	return $this->db->get('user')->result_array();
      }
      function getlasIdUser(){
      return $this->db->query("SELECT id FROM user ORDER BY id DESC LIMIT 1")->row_array();
      }
      function getFirms()
      {
      	return $this->db->get('firms')->result_array();
      } 
      function getCategories()
      {
      	return $this->db->get('categories')->result_array();
      }
      function getCategories2FromCategories()
      {
      	return $this->db->get('categories2')->result_array();
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
 	function setCategories($categories_name)
 	{
 		$this->db->insert('categories',$categories_name);
 	}
 	function getLastIdCat1()
 	{
 		return $this->db->query("SELECT id FROM categories ORDER BY id DESC LIMIT 1")->row_array();
 	}
 	 function setCategories2($cat2,$cat1){

 				for($i = 0; $i < count($cat2); $i++)
 				{
 					$data[] = array(
 						'name_categories2' => $cat2[$i]['cat2'],
 						'categories_id' => $cat1
 					);
 				}
 				for ($i=0; $i <count($cat2) ; $i++) { 
 				 $this->db->insert('categories2',$data[$i]);
 				}
 				
 		
 		}
 		
	function setCategories3($data)
	{
		$this->db->insert('categories3',$data);
	}
	function setUser($data)
	{
		$this->db->insert('user',$data);
	}
	function setFirms($data)
	{
		$this->db->insert('firms',$data);
	}
	function getlasIdFirm(){
	return $this->db->query("SELECT id FROM firms ORDER BY id DESC LIMIT 1")->row_array();
	}
	function setJournal($data)
	{
		$this->db->insert('journal',$data);
	}

}      
/*SELECT user.name,firms.name_firms,categories.name_categories,categories2.name_categories2 FROM user INNER JOIN firms on  user.id_firm = firms.id INNER JOIN categories on categories.user_id = user.id INNER JOIN categories2 on categories2.categories_id = categories.id */