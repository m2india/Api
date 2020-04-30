<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    // This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
class Retailer extends REST_Controller {
    function __construct($config = 'rest'){
            // Construct the parent class
        parent::__construct();
        $this->load->model('api/RetailerModel','RetailerModel');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: content-type, Authorization, Accept, X-Requested-With');

        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
            $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
            $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
            $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        }

    // add functions    
    public function addRetailer_post(){

        $retailer_data = array(
                    "Retailer_Category" => $this->input->post("Retailer_Category"),    
                    "SHOP_NAME" => $this->input->post("shop_name"),     
                    "CODE" => $this->input->post("retail_code"),
                    "proprietor_name" => $this->input->post("proprietor_name"),
                    "proprietor_contact_no" => $this->input->post("proprietor_contact_no"),
                    "dob" => $this->input->post("dob"),
                    "SHOP_ADDRESS1" => $this->input->post("SHOP_ADDRESS1"),
                    "pan" => $this->input->post("pan"),
                    "gst" => $this->input->post("gst"),
                    "POSTAL_CODE" => $this->input->post("POSTAL_CODE"), 
                    "STATE" => $this->input->post("STATE"),
                    "DISTRICT" => $this->input->post("DISTRICT"),
                    "AREA_ID" => $this->input->post("AREA_ID"),
                    "ZONE" => $this->input->post("ZONE"),
                    "Landmark" => $this->input->post("landmark"),
                    "Mobile_no" => $this->input->post("Mobile_no"),
                    "CONTACT_NAME" => $this->input->post("Contact_name"),
                    "CONTACT_MOBILE" => $this->input->post("Contact_mobile")
                );

       // print_r($retailer_data); die();


        if($this->RetailerModel->insert_retailer($retailer_data)){
                $this->response(array(
                "status" => 1,
                "message" => " Insert",
                "data" => array($retailer_data)
                ),REST_Controller::HTTP_OK);

            }else{
                $this->response(array(
                "status" => 0,
                "message" => " not insert",
                "data" => array($retailer_data)
                ),REST_Controller::HTTP_NOT_FOUND);
            }
    }

       
    // Category
        
        public function get_rating_get(){
            $getOrder = $this->RetailerModel->get_retailer_cat();
            $this->response(['data' => $getOrder], REST_Controller::HTTP_OK);
        }

        //search functions
        public function search_fun_post(){
            $search = $this->input->post("search");
            $Check = $this->StockistModel->search_all($search);
        //    print_r($Check); die();
            $this->response(['data' => $Check], REST_Controller::HTTP_OK);
       }

       // updating
       public function updateRetailer_put(){

    //  $data = json_decode(file_get_contents("php://input"));

        $retailer_id = $this->put('id');

    //  print_r($stockist_id); die();

        $retailer_info = array(
                "SHOP_NAME" => $this->put('shop_name')  
        );


    //  print_r($retailer_info); die();

        if($this->RetailerModel->update_retailer($retailer_info,$retailer_id)){
                $this->response(array(
                "status" => 1,
                "message" => "Successfully Updated"
                ),REST_Controller::HTTP_OK);

            }else{
                $this->response(array(
                "status" => 0,
                "message" => "Successfully not Updated"
                ),REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
       }


}
    ?>