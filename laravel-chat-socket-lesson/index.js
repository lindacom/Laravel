var app = require('express')();
var server = require('http').Server(app);
var io = require('socket.io')(server);

server.listen(3000);

app.get('/', function(request, response) {
    response.sendFile(__dirname + '/index.html');
});

io.sockets.on('connection', function(socket) {
    socket.on('chat.message', function(message) {
        io.sockets.emit('chat.message', message);
   

        // added user suggestion
        io.sockets.broadcast.emit('chat.message', message);
   
    });

    socket.on('disconnect', function() {
        io.sockets.emit('chat.message', 'User has disconnected.');
    });
});