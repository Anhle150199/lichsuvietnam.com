@include("layouts.elements.head")
<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    @include("layouts.elements.header")
    <!-- ##### Route view Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="thoi-hien-dai">Thời hiện đại</a></li>
                            <!-- <li class="breadcrumb-item active" aria-current="page">Archive by Category MUSIC</li> -->
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Route view End ##### -->

    <!-- ##### Archive List Posts Area Start ##### -->
    <div class="vizew-archive-list-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Archive Catagory & View Options -->
                    <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                        <div class="archive-catagory">
                            <h4><i aria-hidden="true"></i> Thời hiện đại </h4>
                        </div>
                        <!-- View Options -->
                        <div class="view-options">
                            <a href="archive-grid.html"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="archive-list.html" class="active"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single Post Area -->
                    @foreach ($posts as $p)
                    <div class="single-post-area style-2">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="<?php echo url('/'); ?>/upload/images/{{$p->image}}" alt="">

                                    <!-- Video Duration -->
                                    {{-- <span class="video-duration">05.03</span> --}}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Post Content -->
                                <div class="post-content mt-0">
                                   <!-- <a href="#" class="post-cata cata-sm cata-success">Sports</a> -->
                                    <a href="single-post.html" class="post-title mb-2"> {{$p->title}}</a>
                                    <div class="post-meta d-flex align-items-center mb-2">
                                        <a href="#" class="post-author">By {{$p->authorname}}</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date"> {{$p->created_at}}</a>
                                    </div>
                                    <p class="mb-2">{{$p->summary}}</p>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> 32</a>
                                        <a href="#"><i class="fas fa-eye" aria-hidden="true"></i> {{$p->views}}</a>
                                        <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$p->likes}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                        
                    @endforeach
                    
                    <!-- Pagination -->
                    <nav class="mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>

                @include("layouts.elements.right_bar")
            </div>
        </div>
    </div>
    <!-- ##### Archive List Posts Area End ##### -->

    @include("layouts.elements.footer")

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?php echo url('/'); ?>/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo url('/'); ?>/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo url('/'); ?>/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?php echo url('/'); ?>/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?php echo url('/'); ?>/js/active.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</body>

</html>