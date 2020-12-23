@include("admin.layout.head")

<body id="page-top">
    <div id="wrapper">
        @include("admin.layout.right-header")
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include("admin.layout.header")
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách bài đăng</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(session('dialog'))
                                <div class="alert alert-success">
                                    <p>{{session('dialog')}}</p>
                                </div>
                                @endif
                                <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tiêu đề</th>
                                            <th>Loại</th>
                                            <th>Lượt xem</th>
                                            <th>Lượt like</th>
                                            <th>Lượt bình luận</th>
                                            <th>Ngày tạo</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($posts as $post)
                                        <tr>
                                            <td style="text-align: left;"><a href="{{route('post-edit', ['id' => $post['id']])}}">{{$post['title']}}</a></td>
                                            @if($post['post_type_id'] == 1)
                                            <td>Video</td>
                                            @endif
                                            @if($post['post_type_id'] == 2)
                                            <td>Bài viết</td>
                                            @endif
                                            <td>{{$post['views']}}</td>
                                            <td>{{$post['likes']}}</td>
                                            <td>{{$post['comments']}}</td>
                                            <td>{{$post['created_at']}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("admin.layout.script")
</body>

</html>