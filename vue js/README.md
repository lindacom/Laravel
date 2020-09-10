Laravel Vue installation
====================

The Bootstrap and Vue scaffolding provided by Laravel is located in the laravel/ui Composer package, which may be installed using Composer:

composer require laravel/ui
Once the laravel/ui package has been installed, you may install the frontend scaffolding using the ui Artisan command:

// Generate basic scaffolding...
php artisan ui bootstrap
php artisan ui vue
php artisan ui react

// Generate login / registration scaffolding...
php artisan ui bootstrap --auth
php artisan ui vue --auth
php artisan ui react --auth


The resources > js > app.js file loads the global vue component (called example). It also requires bootstrap.js file (that pulls in jquery, axios (for ajax requests)etc.)
The resources > assets > js > components > example.vue file is rferenced by the app.js file

see vuecasts.com for more information.

Creating a component
====================
Components are reusable blocks of content e.g. navbar, card etc.

Compnents can be hooked into a view using tags. In the view file of your project you can use the example component <example></example>.Alternatively you can create your own component. 

A component vue file can contains markup (template), script (script) and styling (style) for a view.
Scripts can contain data, helper methods etc. The vue instance should be at the bottom of the file and the components need to be declared above it.

1. Create a .vue file in resource > assets > js > components
2. Reference the new component in the resources > js > app.js file (giving it a name and a path)

Data binding
-------------
In the component file create a vue instance and specify data

```
<script>
new Vue ({
el: '#root',
data: { message: 'hello' }
})
```

Bind to an element in the dom

For form inputs use the v-model directive. To change the message:

```
<input type="text" id="input" v-model="message">
```

To display the message echo data:

```
<p>I just wanted to say {{ message }}</p>
```

echo template text onto a page
------------------------------

Create a vue instance and bind it to the root div
Create a vue component 

```
Vue.component('task', {
template: '<li>Foobar</li>'
});
```

N.b. tamplate could contain code for a modal for example

In the view file use the component

```
<body>
<div id="root">
<task></task>
</div>
</body>
```
N.b if you pass in title and body you need to be specific using props

echo user input into template component
------------------------------------------

You can echo user input using slots. In the component file enter:

```
template: '<li><slot></slot></li>'
```
N.b you can also use named slots e.g. title (useful if you need multiple slots)

In the component enter <slot name="header"</slot> then us this named slot in the view file <div slot="header">my title</div>

N.b. alternatively you can use <template slot="header"> if you don't want a div wrapper around the content
  
  N.b. In the component file you can put default content in between the slot tag which wil be overwritten by user content or shown if ther is no user content.

N.b. for a vue instance you can set data equal to an object howevr for components you need to make data equal to a function that returns an object
(because components are not linked to an element)

```
template: '<li><slot></slot></li>',
data() {
return { message: 'foobar' };
}
```

Data binding - lists
---------------------
Enter data as an array
```
<script>
new Vue ({
el: '#root',
data: {names: ['joe', 'mary', 'jane'] }
})
```
You can then echo list items using the v-for directive

<li v-for="name in names"> {{ name }}</li>

N.b you could also write this as <li v-for="name in names" v-text="name"></li>

Data binding - add items to array using event listener
------------------------------------------------------
User can input a name into an input field. When button is cicked add items to array using event listener.

Create an input box with an id and use the v-model directive

```
<input id="input" type="text" v-model="newName">
```

Create a button using the v-on:click directive

```
<button v-on:click="addName">
```

In the script of the vue instance use methods to push the new name to the array and then clear the input field

```
methods: {
addName() {
this.names.push(this.newName);
this.newName = '';
},
```

Other blade directives:
v-on:keyup=
v-if (conditional directive)
v-show (used in a tag to set the visibility. Bind to a method which is set to true or false)

```
<v-show="isVisible">
```
```
hideModal() {
this.isVisible=false;
}
```

To display an edit box on button click:

```
<div v-if="editing">
<textarea></textarea>
</div>

<div v-else>
{{ reply body }}
</div>

<button @click="editing="true">
```

In the components file script tag write
```
data() {
return {
editing: false
};
```

Data binding - attribute and class binding
----------------------------------------------
Attribute binding:

Use the v-bind directive followed by the attribute which is bound to the data property e.g. v-bind:title="title"

Class binding:
Use the v-bind directive v-ind:class="className"

Computed properties
-------------------
Computed properties performs calculations before returning data.

In the vue element use computed method e.g. show incomplete tasks:

```
<li v-for="task in incompleteTasks" v-text="task.description"></li>
```

```
data: {
tasks: {
{description: 'go to the store', completed: true },
{description: 'finish work, completed: false }
},

computed: {
incompleteTasks() {
return this.tasks.filter(task = >!task.completed);
}
```
Emitting events
---------------
To emit an event when a button (called close) is clicked enter:

<button @click="$emit('close')">

To act on the event e.g. close a modal enter:

<@close="showModal=false">

N.b. to emit an event within a method enter this.$emit('coupon-was-applied');

Component communication
--------------------------
It is possible for a parent component to communicate with a child component or for sibling components to communicate
e.g. one component (e.g input) notifies another component (e.g. ajax or message)

In the method emit the event: 

$this.emit('applied');

Listen for the event using the created helper:

```
created() {
this.$on('applied', ()=>alert('hello'));
```

N.b. you can use v-on: in the component tag to listen for an event

Inline templates
----------------
Create vue component

```
vue.component('progress-view', {
data() {
return { completionRate: 50 };
}
});
```

In the view file you can then enter content in the component tag using inline-template directive 

<progress-view inline-template>
  <h1>your progress is {{ completionRate }}
    </progress-view>

Chrome dev tools
================
Add the vue.js dev tools extension to the chrome browser. Vue can then e seen in the browser dev tools on the new vue tab.

Webpack and vue-cli
===================
Vue-loader requires webpack. See vue-loader.vuejs.org

Create a new vue loader project
---------------------------------
1. run npm install -g vue-cli
2. Initialise new project using webpack vue template - vue init webpack-simple <name>
3. Open the project folder and go to src > assets > main.js - this file imports vue and creates an instance
  
The assets > app.vue file contains template (tags and slots), script (import components and set as child) and css styling (css code)

```
<script>
import message from './components/message.vue';

export default {
name: 'app',
components: {message},

data() {
return {
}
}
}
```

Webpack compiles everything to a bundled file that any browser can understand. The webpack.config.js file contains:

imports webpack

specifies that the main.js file is the entry point for the application

output - the directory and file that compilation will go to

various loaders - applies proprocessing (e.g. sass, vue-loader)

N.b. shows test is file type to load, loader is the name of the loader, options and names

4. Install project dependencies - npm install

The dependencies are listed in the package.json file. The package.json file includes scripts which are aliases for things related to the project
e.g. dev to boot up the server

5. run npm run dev to start the project and view in the browser


