@extends('layouts.admin')

@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa {{ $icon }}"></i> {{ $pageName }} &nbsp; <a class="btn btn-success" href="{{ route($routeName.'.create') }}"><i class="fa fa-plus"></i> Tạo mới</a></h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item">{{ $pageName }}</li>
        <li class="breadcrumb-item active"><a href="#">Danh sách</a></li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Liên kết</th>
                        <th>Cập nhật lần cuối</th>
                        @if($routeName !='partner' && $routeName !='recruitment')
                        <th>Hiển thị trên trang chủ</th>
                        @endif
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $posts as $post)
                        <tr>
                            <td>{{ \Str::words($post->title,10,'....') }}</td>
                            <td><a href="{{ route('post',$post->slug) }}" target="_blank">Link bài viết</a></td>
                            <td>{{ $post->updated_at }}</td>
                            @if($routeName !='partner' && $routeName !='recruitment')
                            <td align="center">
                                <div class="animated-checkbox">
                                    <label>
                                        <input class="showHomePage"
                                            data-id="{{$post->id}}"
                                            {{ $post->showHomePage ? 'checked': '' }}
                                            type="checkbox"><span class="label-text"></span>
                                    </label>
                                </div>
                            </td>
                            @endif
                            <td align="center">
                                <a class="btn btn-outline-secondary" href="{{ route($routeName.'.edit', $post->id) }}">Sửa</a>
                                <a class="btn btn-outline-danger" href="{{ route($routeName.'.destroy',$post->id) }}"
                                onclick="event.preventDefault();
                                confirm('Có chắc muốn xóa?') ? document.getElementById('deletePost-form').submit():null">
                                Xóa
                                </a>
                                <form id="deletePost-form" action="{{ route($routeName.'.destroy',$post->id) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        $('#{{ $routeName }}').addClass('active');
        var target = {{ $routeName =='partner' || $routeName =='recruitment'? 3:4 }}
        $('#sampleTable').DataTable( {
            "language": {
              "url": "{{ asset('js/plugins/Vietnamese.json') }}"
            },
            "columnDefs": [{ "orderable": false, "targets": target }],
            "order": [[ 2, "desc" ]]
        });
        $('.showHomePage').on('click', function () {
            $.ajax({
                url: '{{ url('/admin/show-home-page') }}'+ '/'+ $(this).data('id'),
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function (data) {
                    if(data === 'FULL'){
                        alert('Chỉ được chọn 3 bài viết. Vui lòng bỏ chọn 1 bài biết trước.')
                        location.reload();
                    }
                }
            })
        })
    </script>
@endsection