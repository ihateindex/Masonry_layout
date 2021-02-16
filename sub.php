<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery File Upload</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./lib/jquery-3.3.1.min.js"></script>
    <script src="./lib/jquery-ui.js"></script>
    <script src="./lib/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
    <script src="./lib/jQuery-File-Upload/js/jquery.iframe-transport.js"></script>
    <script src="./lib/jQuery-File-Upload/js/jquery.fileupload.js"></script>
</head>
<body>
    <div class="img-wrap">
        <input id="fileupload" type="file" name="files[]" data-url="./Upload.php">
        <label for="fileupload">이미지 업로드</label>
        <img id="image_section" src="" alt="">
    </div>
    <script>
        $(function () {
            $('#fileupload').fileupload({
                dataType: 'json',
                done: function (e, data) {
                    $.each(data.result.files, function (index, file) {
                        $('<p></p>').text(file.name).appendTo(document.body);
                    });
                }
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
            $('#image_section').attr('src', e.target.result);  
            }
            
            reader.readAsDataURL(input.files[0]);
            }
            }
            
            // 이벤트를 바인딩해서 input에 파일이 올라올때 위의 함수를 this context로 실행합니다.
            $("#fileupload").change(function(){
            readURL(this);
        });
    </script>
</body>
</html>