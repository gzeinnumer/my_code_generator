var run = require('child_process');

run.fork('./tools/routes.js');
run.fork('./tools/models.js');
run.fork('./tools/myApp.js');
run.fork('./tools/controllers.js');
run.fork('./tools/resources.js');

//install node js first
//run this file in terminal
//node run.js