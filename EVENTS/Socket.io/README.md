Socket.io
=========

Broadcast using Laravel, Redis and Socket.io eg. for a chat app. See socket.io/get-started/chat

Create a project
-----------------

1. Create a project folder on the desktop
2. In visual studio code open the project folder from the desktop
3. Create a blank package.json file and insert open and cloing curly braces. 
4. Check that node is installed on your computer - node -v
5. Install express - npm install --save express. N.b. the express dependency will now be shown in the package.json file.  The installation also created a node_modules folder.
6. Create an index.html file with a new vue element which references the io function

```
 var socket = io();
 ```
 
7. Create an index.js file and:

require express

```
var app = require('express') ();
```

Then require a server

```
var server = require('http').Server(app);
```

Then listen for a port

```
server.listen(3000);
```

Then set up a route in the index.js file

```
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
    
    ```
    
    8. In the terminal run node index.js
    9. In the browser go to localhost:3000 and ee the response on the page.
    
    Install socket.io
    ------------------
    
    Socket.io needs a server and it also needs a client side library.
    
    1. Get the socket.io.min.js CDN lbrary and paste at the bottom of the indexhtml page within a script file.
    2. Get the server - npm instll --save socket.io
    3. In the index.js file 
    
    require socket.io and pass the server to it.
    
    ```
    var io = require('socket.io')(server);
    ```
    N.b. the function (io.sockets.on('connection', function(socket){ ) in the index.js file listens for a connction between socket server and client. 
    
    4. run node index.js
    
