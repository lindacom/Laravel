How to - Tinker
================

Use Tinker to create a (thread subscription) record (passing in user id)

1. In visual studio code enter the command php artisan tinker
2. Get the latest thread record. $t = App\Thread:latest()->first();
3. Subscribe to the latest thread using user id two. $t->subscribe(2); N.b. The subscribe method is contained in the thread model file.

In the thread subscriptions table an entry will have been made wth user id and thread id inserted
