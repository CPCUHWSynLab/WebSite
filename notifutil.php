<?php
function GetHistoryText($ntype){
if($ntype==0){
    echo "The plant is <strong>dry!</strong>";
}else{
    echo "<strong>Watered</strong> the plant";
}
}

function GetHistoryImg($ntype){
if($ntype==0){
    echo "./../../stat/assets/image/imgnotif1.png";
}else{
    echo "./../../stat/assets/image/imgnotif2.png";
}
}

$user1json = file_get_contents("data/user1JSON.json");
$user1json_a = json_decode($user1json, true);

$historys = file_get_contents("data/histqueue.json");
$history_a = json_decode($historys, true);

function GetLastest($user1json_a){
  return $user1json_a['lastest_data'];
}

function GetHistoryType($index,$history_a){
echo $history_a['queue'][$index]['type'];
}

function GetHistoryTimestamp($index,$history_a){
echo $history_a['queue'][$index]['timestamp'];
}

function GetLastWateredTimestamp($history_a){
  return $history_a['last_watered'];
}

function PrintFormatTimeStamp($unixtime){
  echo date("F j, Y - g:i A",$unixtime);
}

function GetUserSettings(){
  $settings = file_get_contents("data/user1settings.json");
  $settings_a = json_decode($settings, true);
  return $settings_a['settings'];
}

?>
