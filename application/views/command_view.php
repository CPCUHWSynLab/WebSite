<html>
<?php
// if (isset($this->session->userdata['logged_in'])) {
//   $username = ($this->session->userdata['logged_in']['username']);
// } else {
//   redirect('welcome#section-sign_in');
// }
?>
<html>
<head>
  <!--
  More Templates Visit ==> ProBootstrap.com
  Free Template by ProBootstrap.com under the License Creative Commons 3.0 ==> (probootstrap.com/license)

  IMPORTANT: You can do whatever you want with this template but you need to keep the footer link back to ProBootstrap.com
  -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Control your watering</title>
  <meta name="description" content="Free Bootstrap 4 Theme by ProBootstrap.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:200,300,400" rel="stylesheet">

  <link rel="stylesheet" href="../../law/assets/css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="../../law/assets/fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../law/assets/fonts/law-icons/font/flaticon.css">

  <link rel="stylesheet" href="../../law/assets/fonts/fontawesome/css/font-awesome.min.css">


  <link rel="stylesheet" href="../../law/assets/css/slick.css">
  <link rel="stylesheet" href="../../law/assets/css/slick-theme.css">

  <link rel="stylesheet" href="../../law/assets/css/helpers.css">
  <link rel="stylesheet" href="../../law/assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <style>
      body{
        padding-top: 100px;
      }
  </style>
  <script src="https://cdn.netpie.io/microgear.js"></script>
</head>
<body data-spy="scroll" data-target="#pb-navbar" data-offset="200">
  <script>
    const APPID = "CPCUHWSynLab";
    const KEY = "OvTBknxUKkpVyHg";
    const SECRET = "WAa3m9eMow8UZESMy1ARRlzip";
    const ALIAS = "switch";
    var microgear = Microgear.create({
     key: KEY,
     secret: SECRET,
     alias : ALIAS
     });

 function readTextFile(file, callback) {
   var rawFile = new XMLHttpRequest();
   rawFile.overrideMimeType("application/json");
   rawFile.open("GET", file, true);
   rawFile.onreadystatechange = function() {
       if (rawFile.readyState === 4 && rawFile.status == "200") {
           callback(rawFile.responseText);
       }
   }
   rawFile.send(null);
 }

  function toggle() {
   if(document.getElementById("button").innerText=="OFF"){
     microgear.chat('pieled','1');
     readTextFile("../../data/histqueue.json", function(text){
         var data = JSON.parse(text);
         console.log(data.queue);
         var obj = {};
         obj.type = 1;
         obj.timestamp = Math.trunc(Date.now()/1000);
         data.queue.push(obj);
         data.queue.shift();
         $(document).ready(function() {
            var sendData = data;
            $.ajax({
                url: 'updatejson/updatehistory',    //Your api url
                type: 'POST',   //type is any HTTP method
                data: {
                    data: sendData
                },      //Data as js object
                success: function () {
                  console.log("success");
                }
            });
        });
     });

   }
   else{
     microgear.chat('pieled','0');
   }
  }
   microgear.on('message',function(topic,msg) {
     document.getElementById("data").innerHTML = msg;
      if(msg=="1"){
        document.getElementById("button").innerText="ON";
      }else if(msg=="0"){
        document.getElementById("button").innerText="OFF";
      }
    });
      microgear.on('connected', function() {
      microgear.setAlias(ALIAS);
      document.getElementById("data").innerHTML = "Connected";
    });
    microgear.connect(APPID);
  </script>

  <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" id="pb-navbar">
    <div class="container">
      <a class="navbar-brand" href="/">Pump it up!</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#probootstrap-navbar" aria-controls="probootstrap-navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="ion-navicon"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="probootstrap-navbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="#section-home">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#section-about">About</a></li>
          <li class="nav-item"><a class="nav-link" href="#section-sign_in">Sign in</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- END nav -->
  <div class="container">
  <div id="data">Waiting for connection</div>
  <center>
  <button onclick="toggle()" id="button">OFF</button>
  </center>
</div>
</body>
</html>
