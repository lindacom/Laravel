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
 
