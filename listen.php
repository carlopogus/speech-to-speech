<!doctype html>
<html>
<head>
<title>annyang</title>
<style>
body{
font-size: 10vh;
text-align: center;
text-transform: uppercase;
}
</style>
<body>


<script src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.4.0/annyang.min.js"></script>
<script src="node_modules/socket.io/node_modules/socket.io-client/socket.io.js"></script>
<script>

  var say = new SpeechSynthesisUtterance();
  var baseURL = getBaseURL();
  var socketIOPort = 3001;
  var socketIOLocation = baseURL + socketIOPort;
  socket = io.connect(socketIOLocation);

  function getBaseURL() {
    baseURL = location.protocol + "//" + location.hostname + ":" + location.port;
    return baseURL;
  }

  socket.on('speechdata', function (data) {
    $('body').html('<h1>' + data + '</h1>');
    $('body').css({'background': data});
    say.text = data;
    speechSynthesis.speak(say);
  });

</script>
</body>
</head>
</html>
