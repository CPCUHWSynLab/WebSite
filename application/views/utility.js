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
var updateHistoryQueue = function(type){
  readTextFile("../../data/histqueue.json", function(text){
      var data = JSON.parse(text);
      console.log(data.queue);
      var obj = {};
      obj.type = type;
      obj.timestamp = Date.now()/1000;
      data.queue.push(obj);
      data.queue.pop();

      $(document).ready(function() {
             var sendData = data;
             console.log("send data = "+sendData);
             $.ajax({
                 url: 'updatejson/updatehistory',    //Your api url
                 type: 'POST',   //type is any HTTP method
                 data: {
                     data: sendData
                 },      //Data as js object
                 success: function () {
                   console.log("sed lana");
                 }
             });
     });
  });
}
