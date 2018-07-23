function upload(num,server,url){
    // 优化retina, 在retina下这个值是2
    ratio = window.devicePixelRatio || 1;

    // 缩略图大小
    thumbnailWidth = 110 * ratio;
    thumbnailHeight = 110 * ratio;
    // 判断浏览器是否支持图片的base64
    isSupportBase64 = ( function() {
        var data = new Image();
        var support = true;
        data.onload = data.onerror = function() {
            if( this.width != 1 || this.height != 1 ) {
                support = false;
            }
        };
        data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
        return support;
    } )();
    // 初始化Web Uploader
    var uploader = WebUploader.create({

        // 选完文件后，是否自动上传。
        auto: false,
        formData: {
            oldurl:$('input[name="pictur['+num+']"]').val()
        },
        // swf文件路径
        swf:  '/js/Uploader.swf',

        // 文件接收服务端。
        server:server,

        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#filePicker'+num,

        // 只允许选择图片文件。
        accept: {
        title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
    }
});
    //添加文件时触发
    uploader.onFileQueued = function( file ) {
        addFile( file );
    };
    uploader.onUploadSuccess = function(file,response){
        url1 = url+JSON.parse( response._raw).result;
        $('#preview'+num+' span').html('已上传');
        // $('#filePicker'+num).html('重置');
        console.log($('input[name="pictur['+num+']"]'));
        $('input[name="pictur['+num+']"]').val(url1);
    };
    uploader.onUploadComplete = function(file){

    }
    uploader.onUploadError = function(file,reason){

    }
    // 当有文件添加进来时执行，负责view的创建
    function addFile( file ) {
        uploader.makeThumb( file, function( error, src ) {
            var img;
            if ( error ) {
                return;
            }
            img = $('<img src="'+src+'"><span class="up webuploader-pick" >点击上传</span>');
            $('#preview'+num).html(img);
            $('.up').click(function(){
                uploader.upload(file);
            });
        }, thumbnailWidth, thumbnailHeight );


    }
}


function get_html(num)
{
    title = '<div class="uk-form-row">' +
        '<label class="uk-form-label uk-text-bold uk-text-primary" for="title['+num+']">标题</label>'+
        '<div class="uk-form-controls">'+
        ' <input class="uk-form-large uk-form-width-large" type="text"  name="title['+num+']" placeholder="输入名称..."  maxlength="30" value="">'+
        '</div></div>';
    descript =  '<div class="uk-form-row">' +
        '<label class="uk-form-label uk-text-bold uk-text-primary" for="description['+num+']">描述</label>'+
        '<div class="uk-form-controls">'+
        ' <input class="uk-form-large uk-form-width-large" type="text"  name="description['+num+']" placeholder="输入描述"   value="">'+
        '</div></div>';
    pictur =  '<div class="uk-form-row">' +
        '<label class="uk-form-label uk-text-bold uk-text-primary" for="pictur['+num+']">图片</label>'+
        '<div class="uk-form-controls">'+
        ' <input class="uk-form-large uk-form-width-large" type="text"  name="pictur['+num+']" placeholder="输入描述"   value="">'+
        '</div>' +
        '<div id="uploader-demo"> <div id="fileList" class="uploader-list"></div>'+
        '<div id="filePicker'+num+'">选择图片</div> </div>'+
        '<div class="uk-form-controls" id="preview'+num+'"> </div></div>';

    url =  '<div class="uk-form-row">' +
        '<label class="uk-form-label uk-text-bold uk-text-primary" for="url['+num+']">链接</label>'+
        '<div class="uk-form-controls">'+
        ' <input class="uk-form-large uk-form-width-large" type="text"  name="url['+num+']" placeholder="输入描述"  value="">'+
        '</div></div>';
    add_html = title+descript+pictur+url;
    return add_html;
}