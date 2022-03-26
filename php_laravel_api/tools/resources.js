var fs = require('fs');
var t = require('../params.js');

var name = t.p1;
var tableName = t.p3;
var column = t.p2;

var params = "";

for (var i = 0; i < column.length; i++){
  if (column[i] === "created_at" || column[i] === "updated_at") {

  } else {
    params += "            '" + column[i] + "' => $this->" + column[i] + ",\n";    
  }
}
// params = params.slice(0, -1);

var content = "<?php\n\n";
content += "namespace App\\Http\\Resources;\n";
content += "\n";
content += "use App\\MyApp;\n";
content += "use Carbon\\Carbon;\n";
content += "use Illuminate\\Http\\Resources\\Json\\JsonResource;\n";
content += "\n";
content += "class "+name+"Resource extends JsonResource\n";
content += "{\n";
content += "    public function toArray($request)\n";
content += "    {   \n";
content += "        return [\n";
// content += "            'id_users' => $this->id,\n";
content += params;
content += "            // 'created_at' => Carbon::parse($this->created_at)->format(MyApp::created_at),\n";
content += "            // 'updated_at' => Carbon::parse($this->updated_at)->format(MyApp::updated_at),\n";
content += "        ];\n";
content += "    }\n";
content += "}\n";


fs.writeFile('result/Resources/'+name+'Resource.php', content, function(err, result) {
  if(err) console.log('error', err);
});

console.log('php_laravel_api/result/Resources/'+name+'Resource.php -> created');