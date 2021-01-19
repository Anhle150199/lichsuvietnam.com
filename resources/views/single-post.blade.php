<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text / html; charset = utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$post->summary}}">
    <meta http-equiv=”content-language” content=”vi” />
    <title>LSVN- {{$post->title}}</title>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=1693660827482004" nonce="rB5Me5mJ"></script>
    @include("layouts.elements.head")

<body>
    @include("layouts.elements.header")

    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb text-white">
                            <li class="breadcrumb-item text-white"><i class="fa fa-home" aria-hidden="true"></i> Home</li>
                            <li class="breadcrumb-item text-white">{{$category->name}}</li>
                            <li class="breadcrumb-item text-white">{{$post->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="post-details-area mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="post-details-thumb mb-50">
                        @if($post->post_type_id == 1)
                        <iframe width="100%" height="570px" src="{{$post->video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        @endif
                        @if($post->post_type_id == 2)
                        <img width="100%" height="570px" src="<?php echo url('/'); ?>/upload/images/{{$post['image']}}">
                        @endif
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                        <div class="blog-content">

                            <div class="post-content mt-0">
                                @if($post->post_type_id == 2)
                                <a href="#" class="post-cata cata-sm cata-success">Bài Viết</a>
                                @else
                                <a href="#" class="post-cata cata-sm cata-danger">Video</a>
                                @endif
                                <a href="id={{$post->id}}" class="post-title mb-2">{{$post->title}}</a>
                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-author">{{$category->name}}</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date">{{$post->created_at}}</a>
                                    </div>
                                    <div class="post-meta d-flex">

                                        <a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i> {{$post->likes}}</a>
                                        <a href="#"><i class="fa fa-comments" aria-hidden="true"></i> {{$post->comments}}</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$post->views}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <form id="form_like" action="{{route('post.like')}}" method="get">
                                            @csrf
                                            <input type="text" name="id" value="{{$post->id}}" hidden>
                                            <button class="btn btn-primary nav-link" id="like" type="submit" style="height: 34px;font-size: 14px;"><i class="far fa-thumbs-up">
                                                    @if($like == 1)
                                                    <span>Dislike </span>
                                                    @else
                                                    <span>Like</span>
                                                    @endif
                                                </i>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                                @if(Auth::check())
                                @if(Auth::user()->level > 0)
                                <a class="post-cata cata-sm cata-danger" href="{{route('post-edit', ['id'=>$post->id])}}" style="float: right;height: 27px;">Sửa bài viết</a>
                                @endif
                                @endif
                            </div>

                            <div class="text-body">
                                {!!$post->content!!}
                            </div>

                            <div class="fb-share-button" data-href="https://www.addthis.com/dashboard#gallery/pub/ra-5ffe63f7a61ed552/get-the-code/pco/shin/widgetId/agmd" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8080%2Flichsuvietnam.com%2Fpublic%2Fid%3D28&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
                            <div class="vizew-post-author d-flex align-items-center py-5">
                                <div class="post-author-thumb">
                                    <img src="<?php echo url('/'); ?>/upload/images/{{$user['avatar']}}" alt="">
                                </div>
                                <div class="post-author-desc pl-4">
                                    <a href="#" class="author-name">{{$user->name}}</a>
                                    <p> <i class="fas fa-mail-bulk"></i> {{$user->email}}</p>
                                </div>
                            </div>

                            <div class="related-post-area mt-5">
                                <div class="section-heading style-2">
                                    <h4>Các bài viết khác</h4>
                                    <div class="line"></div>
                                </div>

                                <div class="row">
                                    <?php $step = 0 ?>
                                    @foreach ($subpost as $sub)
                                    <div class="col-12 col-md-6">
                                        <a href="{{route('post.show', ['id'=>$sub->id])}}">
                                            <div class="single-post-area mb-50">
                                                <div class="post-thumbnail">
                                                    <img src="<?php echo url('/'); ?>/upload/images/{{$sub->image}}" style="height: 180px;">
                                                </div>
                                                <div class="post-content">
                                                    @if($sub->name == "Danh nhân")
                                                    <a href="#" class="post-cata cata-sm cata-success">
                                                        @elseif(($sub->name == "Di tích"))
                                                        <a href="#" class="post-cata cata-sm cata-primary">
                                                            @else
                                                            <a href="#" class="post-cata cata-sm cata-danger">
                                                                @endif
                                                                {{$sub->name}}</a>
                                                            <a href="id={{$sub->id}}" class="post-title">{{$sub->title}}</a>
                                                            <div class="post-meta d-flex">
                                                                <a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i> {{$sub->likes}}</a>
                                                                <a href="#"><i class="fa fa-comments" aria-hidden="true"></i> {{$sub->comments}}</a>
                                                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$sub->views}}</a>
                                                            </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>


                            <div class="comment_area clearfix mb-50">
                                <div class="section-heading style-2">
                                    <h4>Bình luận</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Post Comment -->
                                <ul id="data">
                                    <div class="post-a-comment-area ">
                                        <div class="contact-form-area" id="review-comment">
                                            <div class="comment-content d-flex">

                                                <form action="{{route('post-comment')}}" method="post" id="form-comment">
                                                    @csrf
                                                    <div class="row">
                                                        <input type="text" name="post_id" id="post_id" value="{{$post->id}}" hidden />
                                                        <div class="col-10">
                                                            <textarea type="text" name="comment" class="form-control text-white" id="comment" placeholder="Viết bình luận ..." required style="width: 100%; height: 70%;"></textarea>
                                                        </div>
                                                        <div class="col-2" style="float: right;">
                                                            <button id="btn-comment" class="btn vizew-btn " type="submit" style="margin-right: -13%;">Bình luận</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <hr style="background-color: whitesmoke; opacity: 50%;">
                                        </div>
                                    </div>

                                    <!-- show comments -->
                                    @foreach($comments as $comment)
                                    <li class="single_comment_area" id="{{$comment->id}}">
                                        <div class="comment-content d-flex">
                                            <div class="comment-author">
                                                <img src="<?php echo url('/'); ?>/upload/images/{{$comment->avatar}}" alt="author" style="margin-top: 20%;">
                                            </div>
                                            <div class="comment-meta alert ">
                                                <div class=" alert " style="background-color: #393c3d;  width: 550px;">
                                                    <h6 style="color: white;">{{$comment->name}}</h6>
                                                    <span>{{$comment->content}}</span>
                                                </div>
                                                @if(Auth::check())
                                                @if(Auth::user()->id == $comment->user_id)
                                                <div class="dropdown dropright" style="margin-top: -11%; margin-right: -5%; float: right; ">
                                                    <i class="fas fa-ellipsis-h  " data-toggle="dropdown"></i>
                                                    <div class="dropdown-menu " style="background: none;border: none;">
                                                        <a href="#" class="reply dropdown-item">Chỉnh sửa</a>
                                                        <a href="#" class="reply dropdown-item">Xóa</a>
                                                    </div>
                                                </div>
                                                @endif
                                                @endif
                                                <div class="d-flex align-items-center row" style="float: right;width: 100%;">
                                                    <a onclick="reply({{$comment->id}}, {{$replies}})" class="reply" style="height: 30px;">Reply</a>
                                                    <p class="comment-date" style="font-size: 13px; margin-top: 2%;">{{$comment->created_at}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- reply -->
                                        <div class=" " style="margin-top: -5%;">
                                            <form action="{{route('post-reply')}}" method="post" id="form-comment" style="margin-left: 18%; width: 68%;">
                                                @csrf
                                                <input type="text" name="comment_id" id="comment_id" value=" {{$comment->id}} " hidden />
                                                <input type="text" name="post_id" id="post_id" value="{{$post->id}}" hidden />
                                                <div class="row" id="reply-{{$comment->id}}">

                                                </div>
                                            </form>
                                        </div>
                                        <!-- more reply -->
                                        <ol class="children" style="margin-top: -5%; ">
                                            <li class="single_comment_area">
                                                @foreach($replies as $reply)
                                                @if($reply->comment_id == $comment->id)
                                                <div class="comment-content d-flex" style="height: 130px;">
                                                    <div class="comment-author">
                                                        <img src="<?php echo url('/'); ?>/upload/images/{{$reply->avatar}}" alt="author" style="margin-top: 20%;">
                                                    </div>
                                                    <div class="comment-meta alert">
                                                        <div class=" alert " style="background-color: #393c3d;  width: 499PX;">
                                                            <h6 style="color: white;">{{$reply->name}}</h6>
                                                            <span>{{$reply->content}}</span>
                                                        </div>
                                                        @if(Auth::check())
                                                        @if(Auth::user()->id == $reply->user_id)
                                                        <div class="dropdown dropright" style="margin-top: -11%; margin-right: -5%; float: right; ">
                                                            <i class="fas fa-ellipsis-h  " data-toggle="dropdown"></i>
                                                            <div class="dropdown-menu " style="background: none;border: none;">
                                                                <a href="#" class="reply dropdown-item">Chỉnh sửa</a>
                                                                <a href="#" class="reply dropdown-item">Xóa</a>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        @endif
                                                        <div class="d-flex align-items-center" style="float: right;width: 100%;">
                                                            <p class="comment-date " style="margin-right: 37%;">{{$reply->created_at}}</p>
                                                            <a href="#" class="reply" style="float: right;">Chỉnh sửa</a>
                                                            <a href="#" class="reply" style="float: right;">Xóa</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </li>
                                        </ol>
                                        <!-- end more reply -->

                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- end comments -->
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="sidebar-area">
                        <div class="single-widget share-post-widget mb-50">
                            <p>Chia sẻ bài viết</p>
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                            <a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i> Google+</a>
                        </div>

                        <div class="single-widget p-0 author-widget">
                            <div class="p-4">
                                <img src="<?php echo url('/'); ?>/upload/images/{{$user['avatar']}}" alt="">
                                <p href="#" class="author-name" style="margin-top: 5%;">Tác giả: {{$user->name}}</p>
                                <p>Cám ơn sự đồng hành của tất cả các bạn!</p>
                            </div>
                            <div class="authors--meta-data d-flex">
                                <p>Bài viết<span class="counter">{{$postcount}}</span></p>
                                <p>Bình luận<span class="counter"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include("layouts.elements.footer")

    <script src="<?php echo url('/'); ?>/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/bootstrap/popper.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo url('/'); ?>/js/plugins/plugins.js"></script>
    <script src="<?php echo url('/'); ?>/js/active.js"></script>



    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('7912005e9e4c47bb85d7', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.1/socket.io.js"></script>
    <script>
        function reply(id) {
            document.getElementById('reply-' + id).innerHTML =
                '<div class="col-10">' +
                '<textarea type="text" name="reply" class="form-control text-white" id="reply" placeholder="Trả lời ..." required style="width: 100%; height: 70%;"></textarea>' +
                '</div>' +
                '<div class="col-2" style="float: right;">' +
                '    <button id="btn-comment" class="btn vizew-btn " type="submit" style="margin-right: -13%;">Trả lời</button>' +
                '</div>';
        }

        // $(document).ready(function() {
        //     var submit =document.getElementById('like');

        //     // bắt sự kiện click vào nút Login
        //     submit.click(function update() {
        //         var id = $("input[name='id']").val();

        //         // Lấy tất cả dữ liệu trong form login
        //         var data = $('form#form_like').serialize();
        //         // Sử dụng $.ajax()
        //         $.ajax({
        //             type: 'GET', //kiểu post
        //             url: route('post.like'), //gửi dữ liệu sang trang submit.php
        //             data: data,
        //             success: function(data) {
        //                 alert("đã like")
        //             }
        //         });
        //         window.setTimeout(update, 1000000);
        //         return false;
        //     });
        // });
    </script>
</body>

</html>