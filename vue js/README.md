Laravel installation
====================
The resources > js > app.js file loads the global vue component (called example). It also requires bootstrap.js file (that pulls in jquery, axios (for ajax requests)etc.)
The resources > assets > js > components > example.vue file is rferenced by the app.js file

see vuecasts.com for more information.

Creating a component
====================
In the view file of your project you can use the example component <example></example>

Alternatively you can create your own component. A component vue file can contain markup (template), script (script) and styling (style) for a view.
Scripts can contain data, helper methods etc.

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

Data binding - lists
---------------------
Enter data as an array

<script>
new Vue ({
el: '#root',
data: {names: ['joe', 'mary', 'jane'] }
})
```
You can then echo list items using the v-for directive

<li v-for="name in names"> {{ name }}</li>

N.b yu could also write this as <li v-for="name in names" v-text="name"></li>

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

Chrome dev tools
================
Add the vue.js dev tools extension to the chrome browser. Vue can then e seen in the browser dev tools on the new vue tab.


