$(document).ready(function () {

});
$('.textarea').summernote({
    height: 200,
    callbacks:{
        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable);
        }
    }
});
function sendFile(file, editor, welEditable) {
    data = new FormData();
    data.append("file", file);
    $.ajax({
        data: data,
        type: "POST",
        url: "index.php?page=ajaxeditorimg",
        cache: false,
        contentType: false,
        processData: false,
        success: function(url) {
            url=JSON.parse(url);
            console.log(url);
            $('#summernote').summernote('insertImage',url);

        }
    });
}
