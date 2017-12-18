<?php
class Graph extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->helper('file');
}

public function index()
{
    $this->load->view('graph');
}


}?>
