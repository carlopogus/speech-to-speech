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

  var baseURL = getBaseURL();
  var socketIOPort = 3001;
  var socketIOLocation = baseURL + socketIOPort;
  socket = io.connect(socketIOLocation);

  function getBaseURL() {
    baseURL = location.protocol + "//" + location.hostname + ":" + location.port;
    return baseURL;
  }

  if (annyang) {
    // Let's define a command.
    var commands = {
      '*hello': function(hello){
        $('body').html('<h1>' + hello + '</h1>');
        $('body').css({'background': hello});
        socket.emit('speech', hello);
      },
    };

    // Add our commands to annyang
    annyang.addCommands(commands);

    // Start listening.
    annyang.start();
  }
</script>
</body>
</head>
</html>
