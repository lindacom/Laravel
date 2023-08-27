var server = require('http').Server();

var io = require('socket.io')(server);

var Redis = require('ioredis');
var redis = new Redis();

redis.subscribe('test-channel');

redis.on('message', function(channel, message) {
  
 message = JSON.parse(message);

  io.emit(channel + ':' + message.event, message.data); 

 // console.log(message.data.username);
  
    //  console.log('Message Received');
  //  console.log(message);
});

server.listen(3000);