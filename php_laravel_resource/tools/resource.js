//https://melvingeorge.me/blog/get-all-the-contents-from-file-as-string-nodejs
const fs = require("fs");
const buffer = fs.readFileSync("params.txt");

let fileContent = buffer.toString();
fileContent = fileContent
                .replaceAll('"','')
                .replace('{','')
                .replace('}','')
                .replaceAll(' ','')
                .replace(/\r?\n|\r/g, "");

var data = fileContent.split(",");

for(var i=0; i<data.length; i++){
        data[i] = data[i].substring(0, data[i].indexOf(':'));
}

var content = "php artisan make:resource Resource\n\n";
content +="        return [\n";

for (var i = 0; i < data.length; i++) {
        if(data[i] == "created_at" || data[i] == "updated_at"){
                content += "            '" + data[i] + "' => Carbon::parse($this->" + data[i] + ")->format('Y-m-d H:i:s'),\n";
        } else{
                content += "            '" + data[i] + "' => $this->" + data[i] + ",\n";
        }
}
content +="        ];";

fs.writeFile('result/Resource.text', content, function (err, result) {
        if (err) console.log('error', err);
});

console.log('php_laravel_resource/result/Resource.text -> created');
