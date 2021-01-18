<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sự kiên thời cổ đại - Lịch Sử Việt Nam</title>
@include("layouts.elements.head")
<body>

    @include("layouts.elements.header")
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Thời cổ đại</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="vizew-archive-list-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                        <div class="archive-catagory">
                            <h4><i aria-hidden="true"></i> Thời cổ đại </h4>
                        </div>
                    </div>

                    @foreach ($posts as $p)
                    <div class="single-post-area style-2">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <div class="post-thumbnail">
                                    <img src="<?php echo url('/'); ?>/upload/images/{{$p->image}}" alt="" >
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="post-content mt-0">
                                    @if($p->post_type_id == 2)
                                    <a href="#" class="post-cata cata-sm cata-success">Bài Viết</a>
                                    @else
                                    <a href="#" class="post-cata cata-sm cata-danger">Video</a>
                                    @endif
                                    <a href="id={{$p->id}}" class="post-title mb-2"> {{$p->title}}</a>
                                    <div class="post-meta d-flex align-items-center mb-2">
                                        <a href="#" class="post-author">By {{$p->name}}</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date"> {{$p->created_at}}</a>
                                    </div>
                                    <p class="mb-2">{{$p->summary}}</p>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$p->likes}}</a>
                                        <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> {{$p->comments}}</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$p->views}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                        
                    @endforeach
                    
                    <!-- Pagination -->
                    {{ $posts->links() }}
                </div>

                @include("layouts.elements.right_bar")
            </div>
        </div>
    </div>

    @include("layouts.elements.footer")

    <script src="<?php echo url('/'); ?>/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/bootstrap/popper.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/plugins/plugins.js"></script>
    <script src="<?php echo url('/'); ?>/js/active.js"></script>
</body>

</html>