<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class StockistModel extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert_stockist($stockist_data,$family_member,$security_deposit,$freezer_deposit,$crate_deposit,$can_deposit,$freezer_dt,$shop_details,$house_details,$vehicle_details,$labours_details,$expected_income,$exp_milk_bus,$other_milk_bus,$other_brand_with_amirthaa,$selling_any_other_milk_product){

        $this->db->insert("stockist",$stockist_data); //stockist
        $insert_id = $this->db->insert_id(); // last insert id

        $family_member['user_id'] = $insert_id;
        $this->db->insert('st_family_members', $family_member); //family_member_data

        $security_deposit['user_id'] = $insert_id;
        $this->db->insert('st_security_deposit', $security_deposit); //st_security_deposit

        $freezer_deposit['user_id'] = $insert_id; 
        $this->db->insert('st_freezer_deposit', $freezer_deposit); //st_freezer_deposit

        $crate_deposit['user_id'] = $insert_id; 
        $this->db->insert('st_crate_deposit', $crate_deposit); //st_crate_deposit

        $can_deposit['user_id'] = $insert_id; 
        $this->db->insert('st_can_deposit', $can_deposit); //st_can_deposit

        $freezer_dt['user_id'] = $insert_id; 
        $this->db->insert('st_freezer_dt', $freezer_dt); //st_freezer_dt

        $shop_details['user_id'] = $insert_id; 
        $this->db->insert('st_shop_details', $shop_details); //st_shop_details

        $house_details['user_id'] = $insert_id; 
        $this->db->insert('st_house_details', $house_details); //st_house_details

        $vehicle_details['user_id'] = $insert_id; 
        $this->db->insert('st_vehicle', $vehicle_details); //st_vehicle

        $labours_details['user_id'] = $insert_id; 
        $this->db->insert('st_labours', $labours_details); //st_labours

        $expected_income['user_id'] = $insert_id; 
        $this->db->insert('st_expected_income', $expected_income); // st_expected_income 

        $exp_milk_bus['user_id'] = $insert_id; 
        $this->db->insert('st_exp_milk_bus', $exp_milk_bus); // st_exp_milk_bus

        $other_milk_bus['user_id'] = $insert_id;  
        $this->db->insert('st_other_milk_bus', $other_milk_bus); // st_other_milk_bus

        $other_brand_with_amirthaa['user_id'] = $insert_id;
        $this->db->insert('st_any_other_brand_with_amirthaa', $other_brand_with_amirthaa); // st_other_milk_bus

        $selling_any_other_milk_product['user_id'] = $insert_id;
        return $this->db->insert('st_selling_any_other_milk_product', $selling_any_other_milk_product); 
    }

    public function get_rating(){
        $stockist_id = $this->security->xss_clean($this->input->post('sid'));
        $sqlstr="select id,retailer_rating from m_retailer_rating where status!=3";
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


    public function update_stockist($stockist_info,$family_member,$stockist_id){
        
        $this->db->where('id', $stockist_id);
        $this->db->update('stockist',$stockist_info);

        $this->db->where('user_id',$stockist_id );
       return $this->db->update('st_family_members',$family_member);


    }

    
}
