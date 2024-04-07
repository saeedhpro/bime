<h1>Upload an excel file to convert into JSON</h1>
<!-- Input element to upload an excel file -->
<input type="file" id="file_upload" />
<button onclick="upload()">Upload</button>
<br><br>
<!-- container to display the json result -->
<textarea id="json-result" style="display:none;height:500px;width:350px;"></textarea>


<script src="/public/js/xlsx.js"></script>


<script>

    function upload() {
        var files = document.getElementById('file_upload').files;
        if(files.length==0){
            alert("Please choose any file...");
            return;
        }
        var filename = files[0].name;
        var extension = filename.substring(filename.lastIndexOf(".")).toUpperCase();
        if (extension == '.XLS' || extension == '.XLSX') {
            excelFileToJSON(files[0]);
        }else{
            alert("Please select a valid excel file.");
        }
    }

    //Method to read excel file and convert it into JSON
    function excelFileToJSON(file){
        try {
            var reader = new FileReader();
            reader.readAsBinaryString(file);
            reader.onload = function(e) {

                var data = e.target.result;
                var workbook = XLSX.read(data, {
                    type : 'binary'
                });
                var result = {};
                workbook.SheetNames.forEach(function(sheetName) {
                    var roa = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                    if (roa.length > 0) {
                        result[sheetName] = roa;
                    }
                });
                //displaying the json result
                var resultEle=document.getElementById("json-result");
                resultEle.value=JSON.stringify(result, null, 4);
                resultEle.style.display='block';
                console.log(JSON.stringify(result, null, 4))
            }
        }catch(e){
            console.error(e);
        }
    }
</script>
