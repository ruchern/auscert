<?php

Class model_usercourse extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	//Validate user
	public function validate() {
		$this->db->where('email',$this->input->post('loginEmail'));
		$this->db->where('password',$this->input->post('loginPassword'));
		$query = $this->db->get('users');
		if ($query->num_rows == 1) {
			return $query->result();
		}
		return false;
	}

	//Returns a list of the current user's courses
	public function GetUserCourses() {
		$this->db->where('userID', $this->session->userdata['logged_in']['userID']);
		$this->db->join('courses', 'courses.courseID = user_courses.courseID', 'INNER');
		$this->db->order_by('courseName', 'ASC');
		$query = $this->db->get('user_courses');
		return $query->result();
	}

	//Returns the number of courses a user is enrolled into
	public function GetNumberOfUserCourses() {
		$this->db->where('userID', $this->session->userdata['logged_in']['userID']);
		$query = $this->db->get('user_courses');
		return $query->num_rows;
	}

	//Add a user and his corresponding enrolled course to the usercourse table
	public function RegisterToCourse($userID, $courseID) {
		$data = array('userID' => $userID, 'courseID' => $courseID);
		$this->db->insert('user_courses', $data);
	}

	//Returns true if userID and courseID pair already exists in the table
	public function CourseAlreadyAssigned($userID, $courseID) {
		$data = array('userID' => $userID, 'courseID' => $courseID);
		$this->db->where($data);
		$query = $this->db->get('user_courses');
		if ($query -> num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//Remove a user and his corresponding dropped course from the usercourse table
	public function DropFromCourse($userID, $courseID) {
		$data = array('userID' => $userID, 'courseID' => $courseID);
		$this->db->delete('user_courses', $data);
	}

	//Returns a list of users who are enrolled in a course
	public function GetUsersFromCourse($courseID) {
		$this->db->where('courseID', $courseID);
		$this->db->join('users', 'users.userID = user_courses.userID', 'INNER');
		$this->db->order_by('fname', 'ASC');
		$query = $this->db->get('user_courses');
		return $query->result();
	}

	//Returns a list of users who have completed the course
	public function GetCompletedUsers($courseID) {
		$this->db->where('courseID', $courseID);
		$this->db->where('completion', 4);
		$this->db->join('users', 'users.userID = user_courses.userID', 'INNER');
		$this->db->order_by('fname', 'ASC');
		$query = $this->db->get('user_courses');
		return $query->result();
	}

	//Returns a list of courses completed by the user
	public function GetCompletedUserCourse($userID) {
		$this->db->where('userID', $userID);
		$this->db->where('completion', 4);
		$this->db->join('courses', 'courses.courseID = user_courses.courseID', 'INNER');
		$this->db->order_by('courseName', 'ASC');
		$query = $this->db->get('user_courses');
		return $query->result();
	}

	//Update a users quiz score 
	public function CourseCompleted($courseID, $userID) {
		$this->db->where('courseID', $courseID);
		$this->db->where('userID', $userID);
		$this->db->where('completion', 4);
		$query = $this->db->get('user_courses');

		if ($query -> num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//Update a users quiz score 
	public function UpdateScore($courseID, $userID, $grading) {
		$data = array(
			'userID' => $userID,
			'courseID' => $courseID,
			'grading' => $grading
		);

		$this->db->where('courseID', $courseID);
		$this->db->where('userID', $userID);
		$this->db->set('grading', $grading);
		$this->db->update('user_courses');
	}

	//Update a users course status
	public function UpdateStatus($courseID, $userID, $status) {
		$this->db->where('courseID', $courseID);
		$this->db->where('userID', $userID);

		switch ($status) {
			case 1:
				$this->db->set('completion', 'Not started');
				break;
			case 2:
				$this->db->set('completion', 'Started');
				break;
			case 3:
				$this->db->set('completion', 'Quiz failed');
				break;
			case 4:
				$this->db->set('completion', 'Completed');
				break;
		}

		$this->db->update('user_courses');
	}

}
?>