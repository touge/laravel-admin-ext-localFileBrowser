<style>
    .files > li {
        float: left;
        width: 150px;
        border: 1px solid #eee;
        margin-bottom: 10px;
        margin-right: 10px;
        position: relative;
    }

    .files>li>.file-select {
        position: absolute;
        top: -4px;
        left: -1px;
    }

    .file-icon {
        text-align: center;
        font-size: 65px;
        color: #666;
        display: block;
        height: 100px;
    }

    .file-info {
        text-align: center;
        padding: 10px;
        background: #f4f4f4;
    }

    .file-name {
        font-weight: bold;
        color: #666;
        display: block;
        overflow: hidden !important;
        white-space: nowrap !important;
        text-overflow: ellipsis !important;
    }

    .file-size {
        color: #999;
        font-size: 12px;
        display: block;
    }

    .files {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .file-icon.has-img {
        padding: 0;
    }

    .file-icon.has-img>img {
        max-width: 100%;
        height: auto;
        max-height: 92px;
    }

</style>
<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>
    <div class="col-sm-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('admin::form.error')
        <div class="controls">
            <button class="btn btn-info select-elfinder-file" id="select-{{$column}}-elfinder-file" type="button">选择文件</button>
        </div>
        <input type="hidden" name="{{$column}}" id="media-{{$column}}" value="{{old($column, $value)}}">
        <div id="preview-{{$column}}"></div>
        @include('admin::form.help-block')
    </div>
</div>

<script>

    if(typeof openwindow == 'undefined'){
        function openwindow(url,name,iWidth,iHeight)
        {
            var iTop = (window.screen.height-30-iHeight)/2; //获得窗口的垂直位置;
            var iLeft = (window.screen.width-10-iWidth)/2; //获得窗口的水平位置;
            window.open(url,name,'height='+iHeight+',,innerHeight='+iHeight+',width='+iWidth+',innerWidth='+iWidth+',top='+iTop+',left='+iLeft+',toolbar=no,menubar=no,scrollbars=auto,resizeable=no,location=no,status=no');
        }
    }
    if(typeof processSelectedFile == 'undefined') {
        function processSelectedFile(file, id) {
            $("#media-" + id).val(file)
            $('#preview-' + id).html(preview(file));
        }
    }
    if(typeof preview == 'undefined') {
        function preview(url) {
            var html = '<span class="file-icon has-img col-sm-2"><img src="{{$baseURL}}/storage/' + url + '" alt="Attachment" \/><\/span>';
            return html
        }
    }

    (function() {
        var _meida_val= $('#media-{{$column}}').val()
        if ($('#media-{{$column}}').val()) {
            $('#preview-{{$column}}').html(preview($('#media-{{$column}}').val()));
        }

        $("#select-{{$column}}-elfinder-file").on('click',function(event){
            event.preventDefault();
            var elfinderUrl= "/elfinder/popup/{{$column}}";
            openwindow(elfinderUrl ,'选择文件' ,850 ,450);
        });
    }())
</script>