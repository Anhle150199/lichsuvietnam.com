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
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8 col-xl-7">
                    <div class="post-details-content">
                        <!-- Blog Content -->
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <span href="#" class="post-cata cata-sm cata-danger">
                                    @if($post->post_type_id ==1)
                                    Video
                                    @else
                                    Bài Viết
                                    @endif
                                </span>
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
                            <div class="text-body">
                                {!!$post->content!!}
                            </div>

                            <!-- Post Author -->
                            <div class="vizew-post-author d-flex align-items-center py-5">
                                <div class="post-author-thumb">
                                    <img src="<?php echo url('/'); ?>/upload/images/{{$user['avatar']}}" alt="">
                                </div>
                                <div class="post-author-desc pl-4">
                                    <a href="#" class="author-name">{{$user->name}}</a>
                                    <p>Email: {{$user->email}}</p>
                                    <div class="post-author-social-info">
                                        <a href="#"><i class="fas fa-facebook"></i></a>
                                        <a href="#"><i class="fas fa-twitter"></i></a>
                                        <a href="#"><i class="fas fa-pinterest"></i></a>
                                        <a href="#"><i class="fas fa-linkedin"></i></a>
                                        <a href="#"><i class="fas fa-dribbble"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Related Post Area -->
                            <div class="related-post-area mt-5">
                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Các bài viết khác</h4>
                                    <div class="line"></div>
                                </div>



                                <div class="row">

                                    @foreach ($subpost as $sub)
                                    <!-- Single Blog Post -->
                                    <div class="col-12 col-md-6">
                                        <div class="single-post-area mb-50">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="<?php echo url('/'); ?>/img/bg-img/{{$sub->image}}" alt="">
                                            </div>

                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="#" class="post-cata cata-sm cata-success">{{$sub->name}}</a>
                                                <a href="id={{$sub->id}}" class="post-title">{{$sub->title}}</a>
                                                <div class="post-meta d-flex">
                                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 22</a>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$sub->views}}</a>
                                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$sub->likes}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="comment_area clearfix mb-50">
                                <div class="section-heading style-2">
                                    <h4>Bình luận</h4>
                                    <div class="line"></div>
                                </div>

                                <ul id="data">
                                    <div class="post-a-comment-area ">
                                        <div class="contact-form-area" id="review-comment">
                                            <form action="{{route('post-comment')}}" method="post" id="form-comment">
                                                @csrf
                                                <div class="row">
                                                    <input type="text" name="post_id" id="post_id" value="{{$post->id}}" hidden />
                                                    <div class="col-8">
                                                        <textarea type="text" name="comment" class="form-control text-white" id="comment" placeholder="Viết bình luận ..." required style="width: 100%; height: 70%;"></textarea>
                                                    </div>
                                                    <div class="col-2" style="float: right;">
                                                        <button id="btn-comment" class="btn vizew-btn " type="submit">Bình luận</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr style="background-color: whitesmoke; opacity: 50%;">
                                        </div>
                                    </div>
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
                                                <div class="d-flex align-items-center">
                                                    <p class="comment-date ">{{$comment->created_at}}</p>
                                                    <a href="#" class="reply" style="float: right;">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        @if(comment->parent)
                                        <ol class="children">
                                            <li class="single_comment_area">
                                                <div class="comment-content d-flex">
                                                    <div class="comment-author">
                                                        <img src="img/bg-img/32.jpg" alt="author">
                                                    </div>
                                                    <div class="comment-meta">
                                                        <a href="#" class="comment-date">27 Aug 2019</a>
                                                        <h6></h6>
                                                        <p></p>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="like">like</a>
                                                            <a href="#" class="reply">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>

                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                    <div class="sidebar-area">

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget share-post-widget mb-50">
                            <p>Chia sẻ bài viết</p>
                            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                            <a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i> Google+</a>
                        </div>

                        <!-- ***** Single Widget ***** -->
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
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.0.5/socket.io.js" integrity="sha512-2rUSTSAeOO02jF6eBqENNqPs1EohenJ5j+1dgDPdXSLz9nOlrr8DJk4zW/lDy8rjhGCSonW3Gx812XJQIKZKJQ==" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js" integrity="sha512-v8ng/uGxkge3d1IJuEo6dJP8JViyvms0cly9pnbfRxT6/31c3dRWxIiwGnMSWwZjHKOuY3EVmijs7k1jz/9bLA==" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.1/socket.io.js"></script>
    <script>
        var socket = io('http://localhost:6001')
        socket.on('comment:message', function(data) {
            //console.log(data)
            if ($('#' + data.id).length == 0) {
                $('#data').append('<p><strong>' + data.user_id + '</strong>: ' + data.content + '</p>')
            } else {
                console.log('Đã có tin nhắn')
            }
        })
    </script>
</body>

</html>