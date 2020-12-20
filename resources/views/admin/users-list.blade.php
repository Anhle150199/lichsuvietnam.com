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
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Tình trạng</th>
                                            <th>Ngày tạo</th>
                                            <!-- <th></th> -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td><a href="edit/{{$user->id}}">{{$user->name}}</a></td>
                                                <td>{{$user->email}}</td>

                                                @if($user->active == 1)
                                                <td>Kích hoạt</td>
                                                @endif
                                                @if($user->active == 0)
                                                <td>Vô hiệu Hóa</td>
                                                @endif

                                                <td>{{$user->created_at}}</td>

                                                <!-- @if($user->active == 1)
                                                <td>
                                                    <a href={{"delete/".$user['id']}}>
                                                        <button class="btn text-white" style="background-color: red; width: 100%">
                                                            Vô hiệu hóa
                                                        </button>
                                                    </a>
                                                </td>
                                                @endif
                                                @if($user->active == 0)
                                                <td><a href={{"active/".$user['id']}}>
                                                        <button class="btn text-white btn-primary" style="width: 100%;">
                                                            Kích hoạt
                                                        </button>
                                                    </a></td>
                                                @endif -->
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