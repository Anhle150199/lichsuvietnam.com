@include("admin.layout.head")

<body id="page-top">
    <div id="wrapper">
        @include("admin.layout.right-header")
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include("admin.layout.header")
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Trang tổng quan</h1>
                    </div>
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bài viết</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_post}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Lượt xem</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$views}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-eye fa-2x "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lượt like</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$likes}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-thumbs-up fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Lượt bình luận</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$comments}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Lượt truy cập theo tháng</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   @if($total_post != 0)
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bài viết nổi bật</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 100%; max-height: 300px;" src="<?php echo url('/'); ?>/upload/images/{{$post_highlight->image}}" alt="">
                                    </div>
                                    <p> <a href="{{ route('post-edit', ['id' => $post_highlight->id]) }}">{{$post_highlight->title}}</a></p>
                                    <p target="_blank" rel="nofollow"> {{$post_highlight->summary}}</p>
                                    <div class="d-flex justify-content-between mb-30" style="font-size: 12px; color: #4e73df;">
                                        <div class="post-meta d-flex align-items-center">
                                            <a href="{{route('user-edit',['id' => $user_post->id])}}">{{$user_post->name}}</a>
                                            <i class="fa fa-circle " aria-hidden="true" ></i>
                                            <span  >{{$post_highlight->created_at}}</span>
                                        </div>
                                        <div class="post-meta d-flex" >
                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i> {{$post_highlight->likes}}
                                            <i class="fa fa-comments" aria-hidden="true"></i> {{$post_highlight->comments}}
                                            <i class="fa fa-eye" aria-hidden="true"></i> {{$post_highlight->views}}          
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bài viết mới nhất</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 100%; max-height: 300px;" src="<?php echo url('/'); ?>/upload/images/{{$post_new->image}}" alt="">
                                    </div>
                                    <p> <a href="{{ route('post-edit', ['id' => $post_new->id]) }}"> {{$post_new->title}}</a></p>
                                    <p target="_blank" rel="nofollow"> {{$post_new->summary}}</p>
                                
                                <div class="d-flex justify-content-between mb-30" style="font-size: 12px; color: #4e73df;">
                                        <div class="post-meta d-flex align-items-center">
                                            <a class="post-author" href="{{route('user-edit',['id' => $user_post_new->id])}}">{{$user_post_new->name}}</a>
                                            <i class="fa fa-circle " aria-hidden="true" ></i>
                                            <span class="post-date" >{{$post_new->created_at}}</span>
                                        </div>
                                        <div class="post-meta d-flex" >
                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>{{$post_new->likes}} 
                                            <i class="fa fa-comments" aria-hidden="true"></i>{{$post_new->comments}} 
                                            <i class="fa fa-eye" aria-hidden="true"></i> {{$post_new->views  }}                
                                        </div>
                                    </div>
                                    </div>
                            </div>

                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include("admin.layout.script")

</body>

</html>