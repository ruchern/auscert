<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends CI_Controller {
	function __construct() {
		parent::__construct();
		
		$this->load->model('model_user');
		$this->load->library('form_validation');
	}


	public function registerUsers() {
		$rules = array(
			array(
				'field' => 'registerUsername',
				'label' => 'Username',
				'rules' => 'required|is_unique[users.username]'
				),
			array(
				'field' => 'registerPassword',
				'label' => 'Password',
				'rules' => 'required|matches[registerRepeatPassword]'
				),
			array(
				'field' => 'registerRepeatPassword',
				'label' => 'Confirm Password',
				'rules' => 'required'
				),
			array(
				'field' => 'registerEmail',
				'label' => 'Email',
				'rules' => 'required|valid_email|is_unique[users.email]'
				),
			array(
				'field' => 'registerContact',
				'label' => 'Contact No.',
				'rules' => 'required|regex_match[/^[0-9().-]+$/]'
				)
			);

		$this->form_validation->set_rules($rules);

		$registerUsername = $this->input->post('registerUsername');
		$registerPassword = $this->input->post('registerPassword');
		$registerRepeatPassword = $this->input->post('registerRepeatPassword');
		$registerEmail = $this->input->post('registerEmail');
		$registerContact = $this->input->post('registerContact');

		if ($this->form_validation->run() == false) {
			$this->load->view('view_login');

			echo "<script>alert('Error registering. Please see register form for errors.');</script>";
		} else {
			$this->model_user->registerUsers($registerUsername, $registerPassword, $registerEmail, $registerContact);

			echo "<script>alert('Successfully registered. Please proceed to login.');</script>";
			
			// redirect('#', 'refresh');
			$this->load->view('view_login');
		}
	}
}
?>