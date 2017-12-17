<?php

session_start(); //we need to start session in order to access it through CI

Class Command_things extends CI_Controller {

public function __construct() {
  parent::__construct();
  // Load session library
  $this->load->library('session');

  // Load database
  $this->load->model('login_database');
  $this->load->helper('url');
}

// Show login page
public function index() {
  // if(isset($this->session->userdata['logged_in'])){
    $this->load->view('command_view');
  // }else{
  //   $this->load->view('welcome_message');
  // }
}

}
?>
