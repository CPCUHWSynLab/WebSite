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
  $string = file_get_contents("./data/user1settings.json");
  $settings = json_decode($string, true);
  $settings = $settings['settings'];
  if($data['lastest_data'][0]['values'][1] < $settings['threshold']){
    if($settings['mode'] == 0){ //manual mode
      $histqueuefile = file_get_contents("./data/histqueue.json");
      $histqueue = json_decode($histqueuefile, true);
      $histqueue = $histqueue['queue'];
      $arr = array(
        "type" => 0,
        "timestamp" => $data['lastest_data'][0][0]
      );
      array_push($histqueue, $arr);
      array_shift($histqueue);
      $write_data = json_encode(array("queue" => $histqueue));
      if ( ! write_file('./data/histqueue.json', $write_data)){echo 'Unable to write histqueue';}
      else{echo 'Histqueue written!';}
    }
    else{     //automatic mode
      $this->load->library('curl');
      $options = array(CURLOPT_URL => 'api.netpie.io/microgear/CPCUHWSynLab/pieled',
                 CURLOPT_HEADER => false,
                 CURLOPT_POSTFIELDS => 1
                );
      $params = array("auth" => "L5NiGlMSwnpT1Gv:OAhEC66LXmLiBst6tG1nUZxNb");
      $this->curl->put($params, $options);
      $histqueuefile = file_get_contents("./data/histqueue.json");
      $histqueue = json_decode($histqueuefile, true);
      $histqueue = $histqueue['queue'];
      $arr = array(
        "type" => 1,
        "timestamp" => $data['lastest_data'][0][0]
      );
      array_push($histqueue, $arr);
      array_shift($histqueue);
      $write_data = json_encode(array("queue" => $histqueue));
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
