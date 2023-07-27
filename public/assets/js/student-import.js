let fileInput = document.getElementById("filesStudent");

$('#filesStudent').on('change', function(){
   displayFile();
});

$('#resetFile').on('click', function(){

   clearFile();
});

function displayFile(){
   var filename = fileInput.files[0].name;
   console.log(filename)
   $('#fileSelected').val(filename);
}

function clearFile(){
   $('#filesStudent').val('');
   $('#fileSelected').val('');
   console.log(fileInput);
}