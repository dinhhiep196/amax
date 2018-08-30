@extends('layouts.admin')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa {{ $icon }}"></i> {{ $pageName }}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">{{ $pageName }}</li>
            <li class="breadcrumb-item active"><a href="#">Tạo mới</a></li>
        </ul>
    </div>
    <div class="tile">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 offset-lg-1">
                    <form method="POST" action="{{ route($routeName.'.store') }}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="form-group">
                            <label for="titleHelp"><b>Tiêu đề (*)</b></label>
                            <input class="form-control" id="titleHelp" name="title" type="text" placeholder="Nhập tiêu đề" value="{{ old('title') }}" required>
                        </div>
                        <label for="thumbnail"><b>Ảnh đại diện của bài viết (*)</b></label>
                        <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Chọn ảnh
                            </a>
                        </span>
                            <input id="thumbnail" class="form-control" type="text" name="thumbnailImage" required>
                        </div>
                        <img class="w-50" id="holder" style="margin-top:15px;margin-bottom: 15px;">

                        <div class="form-group">
                            <label for="editor1"><b>Nội dung (*)</b></label>
                            <textarea class="form-control" id="editor1" name="content1" rows="10">{{ old('content1') }}</textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="seoTitle"><b>SEO Title</b></label>
                            <input class="form-control" id="seoTitle" name="seoTitle" type="text" value="{{ old('seoTitle') }}">
                        </div>
                        <div class="form-group">
                            <label for="metaKeywords"><b>Meta Keywords</b></label>
                            <input class="form-control" id="metaKeywords" name="metaKeywords" type="text" value="{{ old('metaKeywords') }}">
                        </div>
                        <div class="form-group">
                            <label for="metaDescription"><b>Meta Description</b></label>
                            <input class="form-control" id="metaDescription" name="metaDescription" type="text" value="{{ old('metaDescription') }}">
                        </div>
                        <hr>
                        <button class="btn btn-primary float-left" type="submit" onclick="return confirm('Đăng bài viết?');">ĐĂNG BÀI</button>
                        <a class="btn btn-warning float-right" href="javascript:window.history.back();">TRỞ VỀ</a>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $('#{{ $routeName }}').addClass('active');
        var domain = '{{ asset('/laravel-filemanager') }}';
        $('#lfm').filemanager('image', {prefix: domain});

        var editor_config = {
            path_absolute : "{{ url('/') }}",
            selector: "textarea#editor1",
            // image_caption: true,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                var cmsURL = editor_config.path_absolute + '/laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {cmsURL = cmsURL + "&type=Images";} else {cmsURL = cmsURL + "&type=Files";}
                tinyMCE.activeEditor.windowManager.open({file : cmsURL, title : 'Filemanager', width : x * 0.8, height : y * 0.8, resizable : "yes", close_previous : "no"});
            }
        };
        tinymce.init(editor_config);
    </script>
@endsection

