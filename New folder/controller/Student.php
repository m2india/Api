<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Student extends REST_Controller
{
	
	function __construct()
	{
		 parent::__construct();
		 $this->load->database();
		 $this->load->model(array("api/student_model"));
		// $this->load->library("security");
	}

	public function index_post(){
	//	echo "This is post method";

		// $data = json_decode(file_get_contents("php://input"));

		// $name = isset($data->name) ? $data->name : "";
		// $email = isset($data->email) ? $data->name : "";
		// $mobile = isset($data->mobile) ? $data->mobile : "";
		// $course = isset($data->course) ? $data->course : "";


		$name = $this->security->xss_clean($this->input->post("name"));
		$email = $this->security->xss_clean($this->input->post("email"));
		$mobile = $this->security->xss_clean($this->input->post("mobile"));
		$course = $this->security->xss_clean($this->input->post("course"));

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required');
		$this->form_validation->set_rules('course', 'Course', 'required');

		if ($this->form_validation->run() == FALSE)
        {
			$this->response(array(
				"status" =>0,
				"message" =>"All field are needed"),
				REST_Controller::HTTP_NOT_FOUND);
			//$this->response(["data" => $error],REST_Controller::HTTP_NOT_FOUND);
        }
        else
        {
        	if(!empty($name) && !empty($email) && !empty($mobile) && !empty($course)){

			$student = array(
				"name" => $name,
				"email" => $email,
				"mobile" => $mobile,
				"course" => $course
			);

			if($this->student_model->insert_student($student)){

				$this->response(array(
				"status" => 1,
				"message" => "Student Insert",
				"data" => $student
				),REST_Controller::HTTP_OK);

			}else{
				$this->response(array(
				"status" => 0,
				"message" => "Student not insert",
				"data" => $student
				),REST_Controller::HTTP_NOT_FOUND);
			}

		}
        }


	//	print_r($_POST); die;


	
	}

	public function index_put(){
		//echo "This is put method";

		$data = json_decode(file_get_contents("php://input"));
		
		// if(isset($data->id) && isset($data->name) && isset($data->email) && isset($data->mobile) && isset($data->course)){

			$student_id = $data->id;

		//	print_r($student_id); die();

			$student_info = array(
				"name" => $data->name
				// "email" => $data->email,
				// "mobile" => $data->mobile,
				// "course" => $data->course
			);

			if($this->student_model->update_student($student_info,$student_id)){
				$this->response(array(
				"status" => 1,
				"message" => "Student Updated"
				),REST_Controller::HTTP_OK);

			}else{
				$this->response(array(
				"status" => 0,
				"message" => "Student not Updated"
				),REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
			}

		// }else{
		// 	$this->response(array(
		// 		"status" =>0,
		// 		"message" =>"All field are needed"),
		// 		REST_Controller::HTTP_NOT_FOUND);

		// }
	}

	public function index_delete(){
	//	echo "This is delete method";

		$data = json_decode(file_get_contents("php://input"));
		$id = $this->security->xss_clean($data->id);
		
		if($this->student_model->delete_student($id)){

			$this->response(array(
			"status" => 1,
			"message" => "Student Delete"
			),REST_Controller::HTTP_OK);

		}else{
			$this->response(array(
			"status" => 0,
			"message" => "Student not deleted"
			),REST_Controller::HTTP_NOT_FOUND);
		}

	}

	public function index_get(){
		//echo "This is get method";
	

		//print_r($query->result());

		$students = $this->student_model->get_students();

		if(count($students > 0)){

			$this->response(array(
			"status" => 1,
			"message" => "Student Found",
			"data" => $students
		),REST_Controller::HTTP_OK);

		}else{
			$this->response(array(
			"status" => 0,
			"message" => "Student not Found",
			"data" => $students
		),REST_Controller::HTTP_NOT_FOUND);

		}

		
	}
}
	


?>