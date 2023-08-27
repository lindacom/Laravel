<!DOCTYPE html>
<html>
    <head>
    
        <title>Laravel</title>

        </head>
    <body>

    <h1>New Users</h1>

    <ul>
    <li v-repeat="user: users">@{{ user }}</li>
</ul>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.12/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>

<script>

var socket = io('http://127.0.0.1:3000');

new Vue({
    el: 'body',

    data: {
        users: []
    },

    ready: function() {
        socket.on('test-channel:App\Events\UserSignedUp', function(data) {
            this.users.push(data.username);
        }.bind(this));
    }
        });
    

</script>


new Vue()
    </body>
</html>
