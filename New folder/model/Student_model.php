<?php
/**
 * 
 */
class Student_model extends CI_MOdel
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	public function get_students(){
			$this->db->select("*");
		$this->db->from("tbl_student");
		$query = $this->db->get();
		return $query->result();
	}

	public function insert_student($data = array()){
		return $this->db->insert("tbl_student",$data);
	} 

	public function delete_student($id){
		$this->db->where('id', $id);
		return	$this->db->delete('tbl_student');
	} 

	public function update_student($student_info,$student_id){
		$this->db->where('id', $student_id);
		return	$this->db->update('tbl_student',$student_info);
	}

}

?>