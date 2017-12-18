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
?>