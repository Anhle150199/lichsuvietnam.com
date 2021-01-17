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
                            <h6 class="m-0 font-weight-bold text-primary">Replies</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if(session('dialog'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true" style="font-size:20px">×</span>
                                    </button>
                                    <p>{{session('dialog')}}</p>
                                </div>
                                @endif
                                <div class=" alert alert-success">
                                    @foreach($comment as $comment)
                                    <h6> <strong>{{$comment->name}}</strong></h6>
                                    <span>{{$comment->content}}</span>
                                    @endforeach
                                </div>
                                <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Replies</th>
                                            <th>Ngày tạo</th>
                                            <th>Ngày sửa</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($replies as $reply)
                                        <tr>
                                            <td class="p" style="text-align: left;">
                                                <h6> <strong>{{$reply->name}}</strong></h6>
                                                <span class="text-body">{{$reply->content}}</span>
                                            </td>


                                            <td>{{$reply['created_at']}}</td>
                                            <td>{{$reply['updated_at']}}</td>
                                            <td>
                                                @if($reply['hidden'] == 1)
                                                <a href="{{route('replies.hidden', ['id'=>$reply->id])}}"><i class="fas fa-eye"></i></a>
                                                @endif
                                                @if($reply['hidden'] == 0)
                                                <a href="{{route('replies.hidden', ['id'=>$reply->id])}}"><i class="fas fa-eye-slash"></i></a>
                                                @endif
                                                <a href="{{route('replies.delete', ['id'=>$reply->id])}}" style="margin-left: 9px;"><i class="fas fa-trash"></i></a>
                                            </td>
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