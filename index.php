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
    <script src="./lib/imagesloaded.pkgd.min.js"></script>
    <script src="./lib/masonry.pkgd.min.js"></script>
</head>
<body>
    <header>
        <h2>iloom</h2>
    </header>
    <div class="grid" data-masonry-target="masonry">
        <div class="grid-sizer"></div>
        <div class="grid-gutter"></div>
        <!-- <div class="grid-item">
            <div>
                <img src="./images/1.jpg" alt="">
            </div>
        </div>
        <div class="grid-item">
            <div>
                <img src="./images/2.jpg" alt="">
            </div>
        </div>
        <div class="grid-item">
            <div>
                <img src="./images/3.jpg" alt="">
            </div>
        </div>
        <div class="grid-item">
            <div>
                <img src="./images/4.jpg" alt="">
            </div>
        </div>
        <div class="grid-item">
            <div>
                <img src="./images/5.jpg" alt="">
            </div>
        </div>
        <div class="grid-item">
            <div>
                <img src="./images/6.jpg" alt="">
            </div>
        </div>
        <div class="grid-item">
            <div>
                <img src="./images/7.jpg" alt="">
            </div>
        </div>
        <div class="grid-item">
            <div>
                <img src="./images/8.jpg" alt="">
            </div>
        </div>
        <div class="grid-item">
            <div>
                <img src="./images/9.jpg" alt="">
            </div>
        </div> -->
    </div>
    <div class="button-wrap">
        <button class="leadmore">더보기</button>
    </div>
    <script>
        // console.log('script block');
        // $(document).ready(function() {
        //     console.log('doc ready');
        // });
        // $(window).on('load', function() {
        //     console.log('win load');
        //     $('.grid').masonry({
        //         // options
        //         itemSelector: '.grid-item',
        //         columnWidth: 200,
        //         gutter: 10,
        //         // horizontalOrder: true,
        //     });
        // });

            
            $(document).ready(function () {
                var index = 6;
                $.ajax({
                    url: "./images.json",
                    cache: false,
                    dataType: "json",
                    type: 'get',
                    beforeSend: function () {
                        // console.log('beforeSend...');
                    },
                    success: function (data) {
                        // var object = data[masonry];

                        // $.each($('[data-masonry-target]'), function () {
                        //     // var datakey = $(this)
                        //     var datakey = $(this).data('masonry-target');
                        //     // console.log(data[datakey][0]);
                        //     $(this).html(data[datakey]);
                        // });

                        for(i=0; i < index; i++) {
                                $this = $('[data-masonry-target]')
                                var datakey = $this.data('masonry-target');
                                $this.append(data[datakey][i]);
                        }

                        masonrySetting();
                    },
                    error: function (jqXHR, errMsg) {
                        // Handle error
                        alert(errMsg);
                    }
                });
            });
            
            $(document).on('click','.leadmore', function(){
                var length = $('.grid-item').length;
                var index = 4;
                var totalIndex = length+index;
                console.log(totalIndex);

                $.ajax({
                    url: "./images.json",
                    cache: false,
                    dataType: "json",
                    type: 'get',
                    beforeSend: function () {
                        // console.log('beforeSend...');
                    },
                    success: function (data) {
                        // var object = data[masonry];

                        // $.each($('[data-masonry-target]'), function () {
                        //     // var datakey = $(this)
                        //     var datakey = $(this).data('masonry-target');
                        //     // console.log(data[datakey][0]);
                        //     $(this).html(data[datakey]);
                        // });
                        if($('.grid-item')) {
                            // $('.grid').masonry('destroy');
                            $('.grid').removeData('masonry');
                        };
                        for(i=length; i < totalIndex; i++) {
                                $this = $('[data-masonry-target]')
                                var datakey = $this.data('masonry-target');
                                $this.append(data[datakey][i]);
                        };

                        masonrySetting();

                    },
                    error: function (jqXHR, errMsg) {
                        // Handle error
                        alert(errMsg);
                    }
                });
            });
            function masonrySetting() {
                    var $grid = $('.grid').masonry({
                    itemSelector: '.grid-item',
                    columnWidth: '.grid-sizer',
                    initLayout: false,
                    gutter: '.grid-gutter'
                });
                $('.grid').imagesLoaded().progress( function(instance, image) {
                    console.log(arguments);
                    // console.log(arguments[0] === instance);
                    // console.log(imgLoad, image);
                    // console.log(imgLoad.elements);
                    // console.log($(imgLoad.elements));
                    // $(imgLoad.elements[0]).addClass('loaded');
                    // $(image).addClass("loaded");


                    // $(image.img).addClass('loaded');
                    $grid.masonry({
                        // options
                        itemSelector: '.grid-item',
                        columnWidth: '.grid-sizer',
                        // gutter: '.grid-gutter',
                        // horizontalOrder: true,
                    });
                });
            };
    </script>
</body>
</html>