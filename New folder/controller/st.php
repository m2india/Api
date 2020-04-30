<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    // This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
class Stockist extends REST_Controller {
    function __construct($config = 'rest'){
            // Construct the parent class
        parent::__construct();
        $this->load->model('api/StockistModel','StockistModel');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: content-type, Authorization, Accept, X-Requested-With');

        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
            $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
            $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
            $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
        }

    // add functions    
    public function addStockist_post(){
    //  echo "This is post method";

        //  $data = json_decode(file_get_contents("php://input"));

        // $username = isset($data->username) ? $data->username : "";
        // $email = isset($data->email) ? $data->name : "";
        // $mobile = isset($data->mobile) ? $data->mobile : "";
        // $course = isset($data->course) ? $data->course : "";
        //    

        $file_img = $_FILES['file_img']['name'];
       /* $username = $this->input->post("username");
        $rating = $this->input->post("rating");
        $prop_name = $this->input->post("prop_name");        
        $FatherOrHusband = $this->input->post("FatherOrHusband");
        $address = $this->input->post("address");
        $address2 = $this->input->post("address2");
        $postal_code = $this->input->post("postal_code");
        $state = $this->input->post("state");
        $district = $this->input->post("district");*/
        // $zone = $this->input->post("zone");
        // $route = $this->input->post("route");
    /*  $address_landmark = $this->input->post("address_landmark");
        $contact_number = $this->input->post("contact_number");
        $contact_number2 = $this->input->post("contact_number2");
        $mobile_number_sms = $this->input->post("mobile_number_sms");
        $religion = $this->input->post("religion");
        $edu_qlf = $this->input->post("edu_qlf");
        $dob = $this->input->post("dob"); 
        $occupation = $this->input->post("occupation");
        $pan = $this->input->post("pan");
        $gst = $this->input->post("gst");
        $fssai = $this->input->post("fssai");
        $tin = $this->input->post("tin");
        $cst = $this->input->post("cst");
        $account_number = $this->input->post("account_number");
        $branch = $this->input->post("branch");
        $bank_name = $this->input->post("bank_name");
        $IFS_code = $this->input->post("IFS_code");
        $marital_status = $this->input->post("marital_status");
        $business = $this->input->post("business");
        $email = $this->input->post("email");
        $freezer_capacity = $this->input->post("freezer_capacity"); */

        //family member
        /*$fam_name = $this->input->post("fam_name");
        $fam_relation = $this->input->post("fam_relation");
        $fam_education = $this->input->post("fam_education");
        $fam_occupation = $this->input->post("fam_occupation");
        $fam_income = $this->input->post("fam_income");*/

        //security deposite
        /*$sec_rs = $this->input->post("sec_rs");
        $sec_dd = $this->input->post("sec_dd");
        $sec_date = $this->input->post("sec_date");
        $sec_bankname = $this->input->post("sec_bankname")*/;

        //freezer
        /*$freezer_rs = $this->input->post("freezer_rs");
        $freezer_dd = $this->input->post("freezer_dd");
        $freezer_date = $this->input->post("freezer_date");
        $freezer_bankname = $this->input->post("freezer_bankname");*/

        //create 
       /* $create_rs = $this->input->post("create_rs");
        $create_dd = $this->input->post("create_dd");
        $create_date = $this->input->post("create_date");
        $create_bankname = $this->input->post("create_bankname");*/

        //can deposit
       /* $can_rs = $this->input->post("can_rs");
        $can_dd = $this->input->post("can_dd");
        $can_date = $this->input->post("can_date");
        $can_bankname = $this->input->post("can_bankname");*/

        //freezer deposit
        /*$have_freezer = $this->input->post("have_freezer");
        $freezer_details = $this->input->post("freezer_details");*/

        //shop deposit
       /* $rental_own = $this->input->post("rental_own");
        $rental_amount = $this->input->post("rental_amount");*/

        //shop deposit
        /*$hs_rental_own = $this->input->post("hs_rental_own");
        $hs_rental_amount = $this->input->post("hs_rental_amount");*/

        //st_vehicle
        $four_two_wheeler = $this->input->post("four_two_wheeler");
        $vehicle_det = $this->input->post("vehicle_det");

        //st_labours 
        $labours_yesorno = $this->input->post("labours_yesorno");
        $lab_name = $this->input->post("lab_name");
        $lab_education = $this->input->post("lab_education");
        $lab_designation = $this->input->post("lab_designation");

        // expected_income
        $expected_income_yesorno = $this->input->post("expected_income_yesorno");
        $income_type = $this->input->post("income_type");

        // exp_milk_bus
        $present_past = $this->input->post("present_past");
        $experience = $this->input->post("experience");
        $covered_area = $this->input->post("covered_area");
        $milk_name_and_volume = $this->input->post("milk_name_and_volume");
        $monthly_income = $this->input->post("monthly_income");
        $no_of_sub_dealer_and_labour = $this->input->post("no_of_sub_dealer_and_labour");
        $monthly_expense = $this->input->post("monthly_expense");

        // other_milk_bus
        $other_present_or_past = $this->input->post("other_present_or_past");
        $other_kind_of_business = $this->input->post("other_kind_of_business");
        $other_covered_area = $this->input->post("other_covered_area");
        $other_started_on = $this->input->post("other_started_on");
        $other_monthly_income = $this->input->post("other_monthly_income");
        $other_no_of_sub_dealer_and_numbers = $this->input->post("other_no_of_sub_dealer_and_numbers");
        $other_product_details = $this->input->post("other_product_details");
        $other_monthly_expense = $this->input->post("other_monthly_expense");
        $other_annual_turnover = $this->input->post("other_annual_turnover");

        //other_brand_with_amirthaa 
        $other_bnd_amirtha_yesorno = $this->input->post("other_bnd_amirtha_yesorno");
        $milk_name = $this->input->post("milk_name");
        $milk_volume = $this->input->post("milk_volume");

        //selling_any_other_milk_product
        $selling_any_other_milk_product_yesorno = $this->input->post("selling_any_other_milk_product_yesorno");
        $kind_Of_product = $this->input->post("kind_Of_product");
        $brand_name = $this->input->post("brand_name");
        $volume = $this->input->post("volume");
        $profit_margin = $this->input->post("profit_margin");


        //Shop details
        //$rental_own = $this->input->post("rental_own");

    //    $total_array =  array($stockist_data);


        // var_dump($file_img); die();
        //  echo $file_img; die();
        //   print_r(count($file_img)); die();
       //  print_r(); die();
      //   print_r($file_img); die();

         // $this->form_validation->set_rules('username', 'User Name', 'required');
         // $this->form_validation->set_rules('rating', 'rating Name', 'required');
         // $this->form_validation->set_rules('prop_name', 'prop_name Name', 'required');
/*         $this->form_validation->set_rules('FatherOrHusband', 'FatherOrHusband Name', 'required');
         $this->form_validation->set_rules('address', 'address Name', 'required');
         $this->form_validation->set_rules('address2', 'address2 Name', 'required');
         $this->form_validation->set_rules('postal_code', 'postal_code Name', 'required');
         $this->form_validation->set_rules('state', 'state Name', 'required');
         $this->form_validation->set_rules('district', 'district Name', 'required');*/


        // $this->form_validation->set_rules('rating', 'rating', 'required');

        // $this->form_validation->set_rules('pan', 'rental own', 'required');

        // $this->form_validation->set_rules('rental_own', 'rental own', 'required');

    //    $this->form_validation->set_rules('file_img', 'file Name', 'required');

        // if ($this->form_validation->run() == FALSE)
        // {

        //    $this->response(array(
        //         "status" =>0,
        //         "data" => $stockist_data,
        //         "message" =>"All field are needed"),
        //         REST_Controller::HTTP_NOT_FOUND);
        // }
        // else
        // {
            if(count($file_img) > 0){
                $this->do_upload();                
            }else{
                echo "error";
            }

            // if(!empty($username)){
                 $stockist_data = array(
                    "file_img" => $file_img,
                     "username" => $this->input->post("username"), //Agency Name
                     "rating" => $this->input->post("rating"), //Distributor / Dealer / Sub-Dealer
                     "prop_name" => $this->input->post("prop_name"),
                     "FatherOrHusband" => $this->input->post("FatherOrHusband"),
                     "address" => $this->input->post("address"),
                     "address2" => $this->input->post("address2"),
                     "postal_code" => $this->input->post("postal_code"),
                     "state" => $this->input->post("state"),
                     "district" => $this->input->post("district"),
                     // "zone" => $zone,
                     // "route" => $route,
                     "address_landmark" => $this->input->post("address_landmark"),
                     "contact_number" => $this->input->post("contact_number"),
                     "contact_number2" => $this->input->post("contact_number2"),
                     "mobile_number_sms" => $this->input->post("mobile_number_sms"),
                     "religion" => $this->input->post("religion"),
                     "edu_qlf" => $this->input->post("edu_qlf"),
                     "dob" => $this->input->post("dob"),
                     "occupation" => $this->input->post("occupation"),
                     "pan" => $this->input->post("pan"),
                     "gst" => $this->input->post("gst"),
                     "fssai" => $this->input->post("fssai"),
                     "tin" => $this->input->post("tin"),
                     "cst" => $this->input->post("cst"),
                     "account_number" => $this->input->post("account_number"),
                     "branch" => $this->input->post("branch"),
                     "bank_name" => $this->input->post("bank_name"),
                     "IFS_code" => $this->input->post("IFS_code"),
                     "marital_status" => $this->input->post("marital_status"),
                     "business" => $this->input->post("business"),
                     "email_id" => $this->input->post("email"),
                     "freezer_capacity" => $this->input->post("freezer_capacity")                 
                );

                //created family
                $family_member = array(
                    "fam_name" => $this->input->post("fam_name"),
                    "fam_relation" => $this->input->post("fam_relation"),
                    "fam_education" => $this->input->post("fam_education"),
                    "fam_occupation" => $this->input->post("fam_occupation"),
                    "fam_income" => $this->input->post("fam_income")
                );

                //security deposit
                $security_deposit = array(
                    "rs" => $this->input->post("sec_rs"),
                    "dd_no" => $this->input->post("sec_dd"),
                    "date" => $this->input->post("sec_date"),
                    "bankname" => $this->input->post("sec_bankname")
                );

                // freezer deposit
                $freezer_deposit = array(
                    "rs" => $this->input->post("freezer_rs"),
                    "dd_no" => $this->input->post("freezer_dd"),
                    "date" => $this->input->post("freezer_date"),
                    "bankname" => $this->input->post("freezer_bankname")
                );

                // create deposit
                $create_deposit = array(
                    "rs" => $this->input->post("create_rs"),
                    "dd_no" => $this->input->post("create_dd"),
                    "date" => $this->input->post("create_date"),
                    "bankname" => $this->input->post("create_bankname")
                );

                // can deposit
                $can_deposit = array(
                    "rs" => $this->input->post("can_rs"),
                    "dd_no" => $this->input->post("can_dd"),
                    "date" => $this->input->post("can_date"),
                    "bankname" => $this->input->post("can_bankname")
                );

                // freezer_dt
                $freezer_dt = array(
                    "have_freezer" => $this->input->post("have_freezer"),
                    "freezer_details" => $this->input->post("freezer_details")
                );

                // shop details
                $shop_details = array( 
                    "rental_own" => $this->input->post("rental_own"), 
                    "rental_amount" => $this->input->post("rental_amount")
                );

                // house details
                $house_details = array( 
                    "hs_rental_own" => $this->input->post("hs_rental_own"), 
                    "hs_rental_amount" => $this->input->post("hs_rental_amount") 
                );

                // vechile details
                $vehicle_details = array( 
                    "four_two_wheeler" => $this->input->post("four_two_wheeler"), 
                    "details" => $this->input->post("vehicle_det") 
                );

                // labours details
                $labours_details = array( 
                    "labours_yesorno" => $this->input->post("labours_yesorno"), 
                    "lab_name" => $this->input->post("lab_name"),
                    "lab_education" => $this->input->post("lab_education"), 
                    "lab_designation" => $this->input->post("lab_designation")
                );

                // expected_income
                $expected_income = array( 
                    "expected_income_yesorno" => $expected_income_yesorno, 
                    "income_type" => $income_type
                );

                // expected_income
                $expected_income = array( 
                    "expected_income_yesorno" => $expected_income_yesorno, 
                    "income_type" => $income_type
                );

                // exp_milk_bus
                $exp_milk_bus = array( 
                    "present_past" => $present_past, 
                    "experience" => $experience,
                    "covered_area" => $covered_area,
                    "milk_name_and_volume" => $milk_name_and_volume,
                    "monthly_income" => $monthly_income,
                    "no_of_sub_dealer_and_labour" => $no_of_sub_dealer_and_labour,
                    "monthly_expense" => $monthly_expense
                );

                // other_milk_bus
                $other_milk_bus = array( 
                    "other_present_or_past" => $other_present_or_past, 
                    "other_kind_of_business" => $other_kind_of_business,
                    "other_covered_area" => $other_covered_area,
                    "other_started_on" => $other_started_on,
                    "other_monthly_income" => $other_monthly_income,
                    "other_no_of_sub_dealer_and_numbers" => $other_no_of_sub_dealer_and_numbers,
                    "other_product_details" => $other_product_details,
                    "other_monthly_expense" => $other_monthly_expense,
                    "other_annual_turnover" => $other_annual_turnover
                );

                // other brand with amirthaa
                $other_brand_with_amirthaa = array( 
                    "yes_or_no" => $other_bnd_amirtha_yesorno, 
                    "milk_name" => $milk_name,
                    "milk_volume" => $milk_volume
                );

                // other brand with amirthaa
                $selling_any_other_milk_product = array( 
                    "yes_or_no" => $selling_any_other_milk_product_yesorno, 
                    "kind_Of_product" => $kind_Of_product,
                    "brand_name" => $brand_name,
                    "volume" => $volume,
                    "profit_margin" => $profit_margin

                );

                $Check_pan = $this->StockistModel->check_pan($stockist_data['pan']);
                if( count($Check_pan) == 1){
                    $this->response(array('response'=>"Already Pan number is existing"), REST_Controller::HTTP_BAD_REQUEST);
                }

                if($this->StockistModel->insert_stockist($stockist_data,$family_member,$security_deposit,$freezer_deposit,$create_deposit,$can_deposit,$freezer_dt,$shop_details,$house_details,$vehicle_details,$labours_details,$expected_income,$exp_milk_bus,$other_milk_bus,$other_brand_with_amirthaa,$selling_any_other_milk_product)){
                    $this->response(array(
                    "status" => 1,
                    "message" => " Insert",
                    "data" => array($stockist_data,$family_member,$security_deposit,$freezer_deposit,$create_deposit,$can_deposit,$shop_details,$house_details,$vehicle_details,$labours_details,$expected_income,$exp_milk_bus,$other_milk_bus,$other_brand_with_amirthaa,$selling_any_other_milk_product)
                    ),REST_Controller::HTTP_OK);

                }else{
                    $this->response(array(
                    "status" => 0,
                    "message" => " not insert",
                    "data" => array($stockist_data,$family_member,$security_deposit,$freezer_deposit,$create_deposit,$can_deposit,$shop_details,$house_details,$vehicle_details,$labours_details,$expected_income,$exp_milk_bus,$other_milk_bus,$other_brand_with_amirthaa,$selling_any_other_milk_product)
                    ),REST_Controller::HTTP_NOT_FOUND);
                }

            // }else{
            //     $this->response(array(
            //     "status" => 0,
            //     "message" => " image filed empty not "                
            //     ),REST_Controller::HTTP_NOT_FOUND);
            // } //  print_r($_POST); die;   
       // }    
    }

        public function do_upload(){

                if(isset($_FILES['file_img']['name'])){            
                    $config['upload_path'] = './assets/uploads/stockist_users';
                    $config['allowed_types'] = 'gif|jpg|png'; 

                    $this->load->library('upload');
                    $this->upload->initialize($config);

                    if ( ! $this->upload->do_upload('file_img')) {
                         $error = array('error' => $this->upload->display_errors());
                         $this->response(["data" => $error],REST_Controller::HTTP_NOT_FOUND);
                      }
                      //  echo json_encode($data);
                }                                   
        }
    // Category
        
        public function get_rating_get(){
            $getOrder = $this->StockistModel->get_rating();
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
       public function updateStockist_put(){

    //  $data = json_decode(file_get_contents("php://input"));

        $stockist_id = $this->put('id');

    //  print_r($stockist_id); die();

        $stockist_info = array(
                "username" => $this->put('username')  
        );

        $family_member = array(
                    "fam_name" => $this->put('fam_name'),
                    "lastupdated_on" => date('Y-m-d H:i:s')
        );


    //  print_r($stockist_info); die();

        if($this->StockistModel->update_stockist($stockist_info,$family_member,$stockist_id)){
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