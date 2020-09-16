CSS
====

Fix to top
--------------
basics:
Fix an element to the top of the browser.
 
 ```
 .classfix {
 position:fixed;
 top:0;
 width:100%
 z-index:10;
 }
 ```
 
 Fix to top on scroll
 ---------------------
 Wrap the div in a component tab.
 
 1. Create a view. If you need access to a dom element you need to give it a vue ref e.g. <div ref="series-banner-meta">
 2. Create a component with template and slot. In script mounted listen for when the user scrolls
 
 ```
 mounted() {
 window.addEventListener('scroll', () => {
 console.log('you are scrolling');
 });
 }
 ```
 
 3. Check location of scrollbar in relation to the top of the screen.
 
 N.b. to interact with an element in the console open dev tools. 
 
 Click an element, click console tab and type $0. 
 
 Window.scrollY shows the location of the element.
 
 $0.offsetTop shows where element is located in relation to the top of the page.
 
 so when window.scrollY = $0.offsetTop you apply css
 
 4. apply css class if true, remove if false.
 
 ```
 mounted() {
 for originaloffsetTop= this.$refs['series-banner-meta'].offsetTop;
 
 window.addEventListener('scroll; () => {
 if(window.scrollY .=originaloffsetTop) {
 this.$refs['series-banner-meta'].classlist.add('clearfix');
 } else {
 this.$refs['series-banner-meta'].classList.remove('classfix');
 }
 });
 }
 ```
 Nb. when using in a component use this.el instead of this.refs so it can be used on any element
 
 N.b. the event handler is triggered many times using this ethod so using lodash throttle function would resolve this only triggers by the amount of time set
 e.g. every two seconds.
 
 Tooltip
 ---------
 There are three ways to do this - data attribute, vue directive or vue component.
 
 You can use tooltip.js package hich is built on top of popper - 
 
 npm install tooltip.js
 import into coponent file

Data attribute
---------------
 In the view file create an element ith data tooltip element
 <span data-tooltip="I am a tooltip"></span>
 
 In the component file find element with data-tooltip attribute
 
 ```
 mounted() {
 document.querySelectorAll('[data-tooltip]').forEach(elem => {
 new Tooltip (elem, {
 placementelem.dataset.top
 title:elem.dataset.tooltip
 });
 }
 });
 ```
 Vue directive
 -------------
 In the view file create element 
 ```
 <span v-tooltip.top="tooltip"></span>
 ```
 Register a directive called tooltip
 ```
 vue.directive('tooltip', {
 bind(elem, bindings) {
 new Tooltip (elem, {
 placement:bindings.art,
 title: bindings.value
 })
 }
 });
 ```
 Component
 -----------
 Useful if the tooltip is to contin large text. In the view file create an element
 ```
 <span data-tooltip-name="prodcts-tooltip"></span>
 
 <tooltip name="products-tooltip">
 <h1>Our products </h1>
 <p>my text</p>
 </tooltip>
 ```
 In the component file look for data attribute equal to element.
 
 In app.js file iport tooltip component. Register tooltip component.
 In template add slots for tooltip text
 
 In script import tooltip from tooltip.js
 
 ```
 <script>
 props: {
 name: {
 },
 },
 
 mounted() {
 document.querySelectorAll('[data-tooltip-name=${this.name}]).forEach(elem => {
 new Tooltip(elem, {
 placement:  this.placement, 
 title: this.$refs.body.innerHtml,
 html:true
 });
 });
 }
 };
 </script>
 ```
 
 
 
 
 
 
