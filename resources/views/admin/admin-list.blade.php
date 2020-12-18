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
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách quản trị viên</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Quyền</th>
                                            <th>Tình trạng</th>
                                            <th>Ngày tạo</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admins as $admin)
                                        <tr>
                                            <td>{{$admin->id}}</td>
                                            <td><a href="edit/{{$admin->id}}">{{$admin->name}}</a></td>
                                            <td>{{$admin->email}}</td>
                                            @if($admin->level == 1)
                                            <td>Admin</td>
                                            @endif
                                            @if($admin->level == 2)
                                            <td>Supper Admin</td>
                                            @endif
                                            @if($admin->active == 1)
                                            <td>Kích hoạt</td>
                                            @endif
                                            @if($admin->active == 0)
                                            <td>Vô hiệu Hóa</td>
                                            @endif
                                            <td>{{$admin->created_at}}</td>
                                            @if(Auth::user()->level == 2 )
                                            @if($admin->active == 1)
                                            <td>

                                                <a href={{"delete/".$admin['id']}}>
                                                    <button class="btn text-white" style="background-color: red; width: 100%">
                                                        Vô hiệu hóa
                                                    </button>
                                                </a>
                                            </td>
                                            @endif
                                            @if($admin->active == 0)
                                            <td><a href={{"active/".$admin['id']}}>
                                                    <button class="btn text-white btn-primary" style="width: 100%;">
                                                        Kích hoạt
                                                    </button>
                                                </a></td>
                                            @endif
                                            @endif

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