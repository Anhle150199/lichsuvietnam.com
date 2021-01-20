<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text / html; charset = utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{$post->summary}}">
    <meta http-equiv=”content-language” content=”vi” />
    <title>LSVN- {{$post->title}}</title>
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
                            <div class="sharethis-inline-share-buttons"></div>
                            <!-- <div class="fb-share-button" data-href="https://www.addthis.com/dashboard#gallery/pub/ra-5ffe63f7a61ed552/get-the-code/pco/shin/widgetId/agmd" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8080%2Flichsuvietnam.com%2Fpublic%2Fid%3D28&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div> -->
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

                            
                            <div id="disqus_thread"></div>
                            <script>
                                var disqus_config = function() {
                                    this.page.url = '{{route('post-comment')}}'; // Replace PAGE_URL with your page's canonical URL variable
                                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                };

                                (function() { // DON'T EDIT BELOW THIS LINE
                                    var d = document,
                                        s = d.createElement('script');
                                    s.src = 'https://comments-860vbi6aal.disqus.com/embed.js';
                                    s.setAttribute('data-timestamp', +new Date());
                                    (d.head || d.body).appendChild(s);
                                })();
                            </script>
</div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="sidebar-area">

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
        $(function(){
            setInterval(function(){
                $.ajax({
                    url:'/comment-list',
                    success:function(res){
                        $('.comment_listing').html(res);
                    }
                })
            }, 5000);

            $('#btn_comment').click(function(){
                var comment = $('#comment').val();
                var post_id = $('#post_id').val();
                $.ajax({
                    url: '/comment-post',
                    data: 'post_id='+post_id+'&comment='+comment,
                    type: 'post',
                    success:function(){
                        alert('ok');
                    }
                })
            })
        })
    </script>
</body>

</html>