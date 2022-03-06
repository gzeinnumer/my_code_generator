var fs = require('fs');
var t = require('../params.js');

var name = t.p1;
var nameLower = t.p4;

var content = "<?php\n\n";
content += "use Illuminate\\Support\\Facades\\Route;";
content += "\nuse App\\Http\\Controllers\\API\\"+name+"Controller;\n";
content += "\nRoute::prefix('"+nameLower+"')->group(function () {";
content += "\n    Route::post('/insert', ["+name+"Controller::class, 'insert'])->name('"+nameLower+".insert');";
content += "\n    Route::get('/all', ["+name+"Controller::class, 'all'])->name('"+nameLower+".all');";
content += "\n    Route::post('/update/{id}', ["+name+"Controller::class, 'update'])->name('"+nameLower+".update');";
content += "\n    Route::get('/delete/{id}', ["+name+"Controller::class, 'delete'])->name('"+nameLower+".delete');";
content += "\n    Route::get('/find/{id}', ["+name+"Controller::class, 'find'])->name('"+nameLower+".find');";
content += "\n});";

fs.writeFile('result/routes/api.php', content, function(err, result) {
  if(err) console.log('error', err);
});

console.log('php_laravel_api/result/api.php -> created');