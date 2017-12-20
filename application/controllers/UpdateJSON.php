<?php
class UpdateJSON extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->helper('file');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('form_validation');
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
  $string = file_get_contents("./data/user1settings.json");
  $settings = json_decode($string, true);
  $data = json_decode($data, true);
  $settings = $settings['settings'];
  if($data['lastest_data'][0]['values'][0][1] < $settings['threshold']){
    if($settings['mode'] == 0){ //manual mode
      $histqueuefile = file_get_contents("./data/histqueue.json");
      $histqueue = json_decode($histqueuefile, true);
      $watered = $histqueue['last_watered'];
      $histqueue = $histqueue['queue'];
      $arr = array(
        "type" => 0,
        "timestamp" => time()
      );
      array_push($histqueue, $arr);
      array_shift($histqueue);
      $write_data = json_encode(array("queue" => $histqueue,  "last_watered" => $watered));
      if ( ! write_file('./data/histqueue.json', $write_data)){echo 'Unable to write histqueue';}
      else{echo 'Histqueue written!';}
    }
    else{     //automatic mode
      $this->load->library('curl');
      $options = array(CURLOPT_URL => 'api.netpie.io/microgear/CPCUHWSynLab/pieled',
                 CURLOPT_HEADER => false,
                 CURLOPT_POSTFIELDS => "1"
                );
      $params = array("auth" => "L5NiGlMSwnpT1Gv:OAhEC66LXmLiBst6tG1nUZxNb");
      $this->curl->put($params, $options);
      $histqueuefile = file_get_contents("./data/histqueue.json");
      $histqueue = json_decode($histqueuefile, true);
      $watered = $histqueue['last_watered'];
      $histqueue = $histqueue['queue'];
      $new_water = time();
      $arr = array(
        "type" => 1,
        "timestamp" => $new_water
      );
      array_push($histqueue, $arr);
      array_shift($histqueue);
      $write_data = json_encode(array("queue" => $histqueue, "last_watered" => $new_water));
      if ( ! write_file('./data/histqueue.json', $write_data)){echo 'Unable to write histqueue';}
      else{echo 'Histqueue written!';}
      sleep(1);
      $options = array(CURLOPT_URL => 'api.netpie.io/microgear/CPCUHWSynLab/pieled',
                 CURLOPT_HEADER => false,
                 CURLOPT_POSTFIELDS => 0
                );
      $params = array("auth" => "L5NiGlMSwnpT1Gv:OAhEC66LXmLiBst6tG1nUZxNb");
      $this->curl->put($params, $options);
    }
  }
}

public function updatesettings(){
  if(!empty($_POST)){
    if(!empty($_POST['mode'])){
      $mode = 1;
    }
    else{
      $mode = 0;
    }
    $threshold = $_POST['threshold'];
    $this->form_validation->set_rules('threshold', 'Threshold', 'required|numeric');
    $tmp = array(
      "threshold" => $threshold,
      "mode" => $mode
    );
    $data = array(
        "settings" => $tmp
    );
    $data = json_encode($data);
    if ( ! write_file('./data/user1settings.json', $data))
    {
            $error_message = "Error";
            $this->load->view('settings');
    }
    else
    {
            redirect('/');
    }
  }
}

public function updatehistory(){
  if(!empty($_POST)){
    $data = json_encode($_POST['data']);
    if ( ! write_file('./data/histqueue.json', $data))
    {
            echo 'Unable to write the file';
    }
    else
    {
            echo 'File written!';
    }
  }
}

}?>
