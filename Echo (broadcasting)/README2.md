Creating a client event
=======================
e.g. chat notifications - notifying a user that nother user is typing

1. Whisper an event - In the vue component file in the method use the .whisper method passing in data (e.g. "typing")
2. Listen for a Whisper - in the vue component file in the created method of the script section use .listenForWhisper()

Get auth user details
-----------------------
In the layouts file enter script in the head tag

```
<script>
window.App = <?=json_encode(['user' =>auth()->user()]); ?>
<script>

```

Then in the vue file methods section enter

```
name: window.App.user.name

```

Creating a presence channel
=============================

e.g. showing all users in a forum

1. In the file use .join() to join a presence channel

There are three methods available for the presence channel:

.here
.joining
.leaving

2. In the routes > channels file you need to return information about the user who is present e.g. return name

3. In the event file broadcast on the presence channel.
