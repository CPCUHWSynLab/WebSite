<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('login_database');

		$this->load->helper('url');

		$this->load->helper('security');

		$this->load->library('encryption');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('welcome_message');
	}
	public function user_login_process() {

		  $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		  $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		  if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
			  $this->load->view('admin_page');
			}else{
			  $this->load->view('welcome_message');
			}
		  } else {
			$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);
			$result = $this->login_database->login($data);
			if ($result == TRUE) {

			$username = $this->input->post('username');
			$result = $this->login_database->read_user_information($username);
			if ($result != false) {
				  $session_data = array(
				  'username' => $result[0]->user_name
				);
				// Add user data in session
				$this->session->set_userdata('logged_in', $session_data);
				$this->load->view('admin_page');
			  }
			} else {
			  $data = array(
			  'error_message' => 'Invalid Username or Password'
			  );
			  $this->load->view('login_form', $data);
			}
		  }
		}
}
