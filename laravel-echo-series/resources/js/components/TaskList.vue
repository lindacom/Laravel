<template>
<div>

<h3 v-text="project.name"></h3>

<ul cla="list-group">
<li class="list-group-item" v-for="task in project.tasks" v-text="task.body"></li>
</ul>

<input class="form-control" type="text" placeholder="New Task" v-model="newTask" @blur="save" @keydown="tapParticipants">
<span v-if="activePeer" v-text="activePeer.nae + ' is typing...' "></span>
</div>
</template>

<script>
export default {

    props ["data-project"],

    data() {
        return {
            project: this.dataProject,
            newTask: "",
            activePeer: false,
            typingTimer: false
        };
    },

    created() {
     
        window.Echo.private("tasks." + this.project.id)
        .listen("TaskCreated", ({ task }) => this.addTask(task))
        .listenForWhisper("typing", e => {
           this.activePeer = e;

           if(this.typingTimer) clearTimeout(this.typingTimer);


           this.typingTimer = setTimeout(() => {
               this.activePeer = false;
           }, 3000);
        });
        },
    

    methods: {

        tapParticipants() {
             window.Echo.private("tasks." + this.project.id)
          .whisper("typing", {
              name: window.App.user.name
          });
        },

        save() {
            axios
            .post('/api/projects/${this.project.id}/tasks', {
                body: this.newTask 
                })

            .then(response => response.data)
            .then(this.addTask);
        },

        addTask(task) {
            this.activePeer = false;
  this.project.tasks.push(task);

  this.newTask = "";
        }
            
          

          
    }
</script>