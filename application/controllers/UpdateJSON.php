<?php
class UpdateJSON extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->helper('file');
}

public function index()
{
    // $countries = $this->European_countries_model->get_countries();
    // $data['countries'] = $countries;
    //
    // $response = array();
    // $posts = array();
    // foreach ($countries as $country)
    // {
    //     $posts[] = array(
    //         "title"                 =>  $country->euro_id,
    //         "flag"                  =>  $country->flag_name,
    //         "population"            =>  $country->population,
    //         "avg_annual_gcountryth" =>  $country->avg_annual_gcountryth,
    //         "date"                  =>  $country->date
    //     );
    // }
    // $response['posts'] = $posts;
    // echo json_encode($response,TRUE);

    //If the json is correct, you can then write the file and load the view

    // $fp = fopen('./eur_countries_array.json', 'w');
    // fwrite($fp, json_encode($response));

    // if ( ! write_file('./eur_countries_array.json', $arr))
    // {
    //     echo 'Unable to write the file';
    // }
    // else
    // {
    //     echo 'file written';
    // }
    // $this->load->view('european_countries_view', $data);
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
