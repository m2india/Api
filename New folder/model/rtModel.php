<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RetailerModel extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert_retailer($retailer_data){

       return  $this->db->insert("retailer",$retailer_data); //retailer_data        
    }

    public function get_retailer_cat(){
        $user_id =$this->security->xss_clean($this->input->post('user_id'));
        $this->load->database();
        $sqlstr="select id,retailer_category from m_retailer_category where status!=3";
        $query = $this->db->query($sqlstr)->result();
        return $query;
    }

    public function check_pan($pan){
        $this->db->select("username")->from("stockist")->where('pan',$pan);
        $query = $this->db->get();
        return $query->row();
        // print_r($this->db->last_query()); die();   
    }

    public function search_all($search = NULL){       
        // $this->db->select("*")->from("stockist")->where('mobile_no',$search);
        // $query = $this->db->get();
        // return $query->result_array();
        // print_r($this->db->last_query()); die();
         $conditions = array();

        if (!empty($search)) {
            $conditions[] = 'stockist.username  LIKE "%' . $search . '%"';
            $conditions[] = 'stockist.mobile_no  LIKE "%' . $search . '%"';
            $conditions[] = 'stockist.contact_number  LIKE "%' . $search . '%"';
            $sqlStatement = "SELECT * FROM stockist WHERE ".implode(' OR ', $conditions)." ORDER BY id";
            $result = $this->db->query($sqlStatement)->row_array();
        }else{
            $result = '';
        }
        
        return $result;  
    }


    public function update_retailer($retailer_info,$retailer_id){
        
        $this->db->where('id', $retailer_id);
        return $this->db->update('retailer',$retailer_info);



    }

    
}
