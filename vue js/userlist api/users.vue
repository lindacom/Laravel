<template>
  <div>
    <h2>userss</h2>
    <form @submit.prevent="addusers" class="mb-3">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Title" v-model="users.title">
      </div>
      <div class="form-group">
        <textarea class="form-control" placeholder="Body" v-model="users.body"></textarea>
      </div>
      <button type="submit" class="btn btn-light btn-block">Save</button>
    </form>
    <button @click="clearForm()" class="btn btn-danger btn-block">Cancel</button>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchuserss(pagination.prev_page_url)">Previous</a></li>

        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
    
        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchuserss(pagination.next_page_url)">Next</a></li>
      </ul>
    </nav>
    <div class="card card-body mb-2" v-for="users in userss" v-bind:key="users.id">
      <h3>{{ users.first_name}}</h3>
      <p>{{ users.email }}</p>
      <hr>
      <button @click="editusers(users)" class="btn btn-warning mb-2">Edit</button>
      <button @click="deleteusers(users.id)" class="btn btn-danger">Delete</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      userss: [],
      users: {
        id: '',
        title: '',
        body: ''
      },
      users_id: '',
      pagination: {},
      edit: false
    };
  },
  created() {
    this.fetchuserss();
  },
  methods: {
    fetchuserss(page_url) {
      let vm = this;
      page_url = page_url || '/api/userss';
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.userss = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
      this.pagination = pagination;
    },
    deleteusers(id) {
      if (confirm('Are You Sure?')) {
        fetch(`api/users/${id}`, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
            alert('users Removed');
            this.fetchuserss();
          })
          .catch(err => console.log(err));
      }
    },
    addusers() {
      if (this.edit === false) {
        // Add
        fetch('api/users', {
          method: 'post',
          body: JSON.stringify(this.users),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('users Added');
            this.fetchuserss();
          })
          .catch(err => console.log(err));
      } else {
        // Update
        fetch('api/users', {
          method: 'put',
          body: JSON.stringify(this.users),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('users Updated');
            this.fetchuserss();
          })
          .catch(err => console.log(err));
      }
    },
    editusers(users) {
      this.edit = true;
      this.users.id = users.id;
      this.users.users_id = users.id;
      this.users.title = users.title;
      this.users.body = users.body;
    },
    clearForm() {
      this.edit = false;
      this.users.id = null;
      this.users.users_id = null;
      this.users.title = '';
      this.users.body = '';
    }
  }
};
</script>
