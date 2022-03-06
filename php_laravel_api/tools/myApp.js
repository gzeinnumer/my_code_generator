var fs = require('fs');

var content = "<?php\n\n";
content += "namespace App;\n";

content += "\nclass MyApp {";

content += "\n    const datetime = [";
content += "\n        'created_at'  => 'datetime:Y-m-d H:i:s',";
content += "\n        'updated_at' => 'datetime:Y-m-d H:i:s',";
content += "\n    ];"
content += "\n}\n";

content += "\n/*";
content += "\n//app";
content += "\n//config/app.php -> this file\n";

content += "\n'aliases' => [";
content += "\n  //...";
content += "\n  'MyApp' => App\MyApp::class,";
content += "\n*/";

fs.writeFile('result/MyApp.php', content, function(err, result) {
   if(err) console.log('error', err);
});
      
console.log('php_laravel_api/result/MyApp.php -> created',);