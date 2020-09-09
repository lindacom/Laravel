Laravel mix
==============

With laravel mix there is no need to modify and conigure webpack file. The process is simplified using the webpack.mix.js file which is included
in the laravel installation

Laravel mix can be used to compile js, extract sass, ersions assets etc.

In the webpack.mix.js file the api copiles sass and js by deault.

In the package.json file webpack i included in the script which references the weback.config.js file.

N.b. if you do want to manually configure webpack file copy it to the project root

cd node_modules/laravel-mix/setup/webpath.config.js

To compile assets add the path to the weback.mix.js file ad run npm run webpack

N.b. to bundle files together you can pass an array of paths

Other available commands:

.version()
.copy()
.minif()
