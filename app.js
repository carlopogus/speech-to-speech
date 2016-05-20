 var app = require('express')();
 var http = require('http').Server(app);
 var io = require('socket.io')(http);

 http.listen(3001, function(){
   console.log('listening on *:3001');
 });

 io.on('connection', function (socket) {
   socket.on('speech', function (data) {
     console.log(data);
     io.emit('speechdata', data);
   });
 });
