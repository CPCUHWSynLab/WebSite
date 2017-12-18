<?php
class UpdateJSON extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->helper('file');
}

public function index()
{
  
}

public function urlrequest(){

  //This will get the JSON data from NETPIE server
  $data = file_get_contents("https://api.netpie.io/feed/CPCUSoilhumidity?apikey=o9dYEQAyVBqDmWn1SORwfFTq7afHhYjd&granularity=10minutes&since=24hours&filter=humidity");
  if ( ! write_file('./data/user1JSON.json', $data))
  {
          echo 'Unable to write the file';
  }
  else
  {
          echo 'File written!';
  }
}

}?>
