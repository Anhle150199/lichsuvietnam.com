<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lịch Sử Việt Nam</title>

@include("layouts.elements.head")

<body>
    @include("layouts.elements.header")

    <section class="hero--area section-padding-80">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="post-1" role="tabpanel" aria-labelledby="post-1-tab">
                            <div class="single-feature-post ">
                                <div id="videoShow">
                                    <iframe width="750" height="500" margin-left="5px" src="{{$videos[0]->video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4">
                    <ul class="nav vizew-nav-tab" role="tablist">
                        @foreach ($videos as $video)
                        <li class="nav-item" style="width: 100%;">
                            <a class="nav-link active" href="id={{$video->id}}" role="tab" aria-selected="true">
                                <div class="single-blog-post style-2 d-flex align-items-center">
                                    <div class="post-thumbnail">
                                        <img src="<?php echo url('/'); ?>/upload/images/{{$video->image}}" style="width: 100%; height: 80px;">
                                    </div>
                                    <div class="post-content">
                                        <h6 href="id={{$video->id}}" class="post-title">{{$video->title}}</h6>
                                        <div class="post-meta d-flex justify-content-between">
                                            <span><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$video->likes}}</span>
                                            <span><i class="fas fa-comments" aria-hidden="true"></i> {{$video->comments}}</span>
                                            <span><i class="fas fa-eye" aria-hidden="true"></i> {{$video->views}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="vizew-post-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="all-posts-area">
                        <div class="section-heading style-2">
                            <h4>Danh Nhân</h4>
                            <div class="line"></div>
                        </div>
                        <div class="featured-post-slides owl-carousel mb-30">
                            <?php $step  = 0; ?>
                            @foreach($danhnhan as $dn)
                            @if($step <= 1 )
                            <div class="single-feature-post video-post bg-img" style="background-image: url(upload/images/{{$dn->image}})">
                                <div class="post-content">
                                    @if($dn->post_type_id == 2)
                                    <a href="#" class="post-cata cata-sm cata-success">Bài Viết</a>
                                    @else
                                    <a href="#" class="post-cata cata-sm cata-danger">Video</a>
                                    @endif
                                    <a href="{{route('post.show', ['id'=>$dn->id])}}" class="post-title">{{$dn->title}}</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$dn->likes}}</a>
                                        <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> {{$dn->comments}}</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$dn->views}}</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <?php $step += 1; ?>
                            @endforeach
                        </div>
                        <?php $step  = 0; ?>
                        <div class="row">
                            @foreach($danhnhan as $dn)
                            @if($step > 1 )

                            <div class="col-12 col-md-6">
                                <div class="single-post-area mb-80">
                                    <div class="post-thumbnail">
                                        <img src="<?php echo url('/'); ?>/upload/images/{{$dn->image}}" style="width: 100%; height: 208px;">
                                    </div>

                                    <div class="post-content">
                                        @if($dn->post_type_id == 2)
                                        <a href="#" class="post-cata cata-sm cata-success">Bài Viết</a>
                                        @else
                                        <a href="#" class="post-cata cata-sm cata-danger">Video</a>
                                        @endif
                                        <a href="{{route('post.show', ['id'=>$dn->id])}}" class="post-title">{{$dn->title}}</a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$dn->likes}}</a>
                                            <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> {{$dn->comments}}</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$dn->views}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <?php $step += 1; ?>
                            @endforeach
                        </div>

                        <div class="section-heading style-2">
                            <h4>Di Tích</h4>
                            <div class="line"></div>
                        </div>
                        <div class="featured-post-slides owl-carousel mb-30">
                            <?php $step  = 0; ?>
                            @foreach($ditich as $dn)
                            @if($step <= 1 )
                            <div class="single-feature-post video-post bg-img" style="background-image: url(upload/images/{{$dn->image}})">
                                <div class="post-content">
                                    @if($dn->post_type_id == 2)
                                    <a href="#" class="post-cata cata-sm cata-success">Bài Viết</a>
                                    @else
                                    <a href="#" class="post-cata cata-sm cata-danger">Video</a>
                                    @endif
                                    <a href="{{route('post.show', ['id'=>$dn->id])}}" class="post-title">{{$dn->title}}</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$dn->likes}}</a>
                                        <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> {{$dn->comments}}</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$dn->views}}</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <?php $step += 1; ?>
                            @endforeach
                        </div>
                        <?php $step  = 0; ?>
                        <div class="row">
                            @foreach($ditich as $dn)
                            @if($step > 1 )

                            <div class="col-12 col-md-6">
                                <div class="single-post-area mb-80">
                                    <div class="post-thumbnail">
                                        <img src="<?php echo url('/'); ?>/upload/images/{{$dn->image}}" style="width: 100%; height: 208px;">
                                    </div>

                                    <div class="post-content">
                                        @if($dn->post_type_id == 2)
                                        <a href="#" class="post-cata cata-sm cata-success">Bài Viết</a>
                                        @else
                                        <a href="#" class="post-cata cata-sm cata-danger">Video</a>
                                        @endif
                                        <a href="{{route('post.show', ['id'=>$dn->id])}}" class="post-title">{{$dn->title}}</a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$dn->likes}}</a>
                                            <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> {{$dn->comments}}</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$dn->views}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <?php $step += 1; ?>
                            @endforeach
                        </div>
                        
                        <div class="section-heading style-2">
                            <h4>Sự Kiện</h4>
                            <div class="line"></div>
                        </div>
                        <div class="featured-post-slides owl-carousel mb-30">
                            <?php $step  = 0; ?>
                            @foreach($sukien as $dn)
                            @if($step <= 1 )
                            <div class="single-feature-post video-post bg-img" style="background-image: url(upload/images/{{$dn->image}})">
                                <div class="post-content">
                                    @if($dn->post_type_id == 2)
                                    <a href="#" class="post-cata cata-sm cata-success">Bài Viết</a>
                                    @else
                                    <a href="#" class="post-cata cata-sm cata-danger">Video</a>
                                    @endif
                                    <a href="{{route('post.show', ['id'=>$dn->id])}}" class="post-title">{{$dn->title}}</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$dn->likes}}</a>
                                        <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> {{$dn->comments}}</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$dn->views}}</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <?php $step += 1; ?>
                            @endforeach
                        </div>
                        <?php $step  = 0; ?>
                        <div class="row">
                            @foreach($sukien as $dn)
                            @if($step > 1 )

                            <div class="col-12 col-md-6">
                                <div class="single-post-area mb-80">
                                    <div class="post-thumbnail">
                                        <img src="<?php echo url('/'); ?>/upload/images/{{$dn->image}}" style="width: 100%; height: 208px;">
                                    </div>
                                    <div class="post-content">
                                        @if($dn->post_type_id == 2)
                                        <a href="#" class="post-cata cata-sm cata-success">Bài Viết</a>
                                        @else
                                        <a href="#" class="post-cata cata-sm cata-danger">Video</a>
                                        @endif
                                        <a href="{{route('post.show', ['id'=>$dn->id])}}" class="post-title">{{$dn->title}}</a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$dn->likes}}</a>
                                            <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> {{$dn->comments}}</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$dn->views}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <?php $step += 1; ?>
                            @endforeach
                        </div>
                    </div>
                </div>
                @include("layouts.elements.right_bar")
            </div>
        </div>
    </section>

    @include("layouts.elements.footer")

    <script src="<?php echo url('/'); ?>/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/bootstrap/popper.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/plugins/plugins.js"></script>
    <script src="<?php echo url('/'); ?>/js/active.js"></script>
</body>

</html>