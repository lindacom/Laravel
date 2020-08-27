Emit events using socket.io
=============================

1. Create an idex.html file - In the file pull in the vue.min.js and the socket.io.min.js libraries in a script tag at the bottom of the page. 

Give the body tag an id

```
<body id="chat">
```

Give the ul tag an id and set the li tag to loop through messages

```
 <ul id="messages">
  <li v-for="message in messages">{{ message }}</li>   
       
    </ul>
    ```

Create a form with an input button which will emit an event 

```
   <form v-onsubmit.prevent="send">
        <input v-model="message">
        <button>Send</button>
    </form>
    
 ```
 
 Create a new vue instance and bind it to the body tag by id
 
 ```
   <script>
        var socket = io();

        new Vue({
            el: '#chat',

            data: {
                messages: [],
                message: ''
            },

            mounted: function() {
          //  ready: function() {
                socket.on('chat.message', function(message) {
                    this.messages.push(message);
                }.bind(this));
            },

            methods: {
                send: function(e) {
                    socket.emit('chat.message', this.message);

                    this.message = '';

                    e.preventDefault();
                }
            }
        })
    </script>
    ```
 2. Create an index.js file which will listen for the event.
 
 ```
 io.sockets.on('connection', function(socket) {
    socket.on('chat.message', function(message) {
        io.sockets.emit('chat.message', message);
   
    });
 ```
    
    3. run node index.js
