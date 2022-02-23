var fs = require('fs');
var t = require('../params.js');

var name = t.p1;
var tableName = t.p3;
var column = t.p2;

var params = "[";

for(var i = 0; i < column.length; i++){
    params += "'" + column[i] + "',";
}
params = params.slice(0, -1);
params+= "];"

var content = "<?php\n\n";
content += "namespace App\\Models\\API;";
content += "\n\nuse App\\MyApp;";
content += "\nuse Illuminate\\Database\\Eloquent\\Factories\\HasFactory;";
content += "\nuse Illuminate\\Database\\Eloquent\\Model;\n";

content += "\nclass "+name+"Model extends Model";
content += "\n{";
content += "\n    use HasFactory;";
content += "\n    protected $table = '"+tableName+"';";
content += "\n    protected $fillable = "+params;
content += "\n    protected $casts = MyApp::datetime;";
content += "\n}";

fs.writeFile('result/Models/API/'+name+'Model.php', content, function(err, result) {
  if(err) console.log('error', err);
});

console.log('result/Models/API/'+name+'Model.php -> created');