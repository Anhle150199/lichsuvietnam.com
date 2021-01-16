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
                                <div class="single-blog-post style-2 d-flex align-items-center" >
                                    <div class="post-thumbnail">
                                        <img src="<?php echo url('/'); ?>/upload/images/{{$video->image}}">
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


    <!-- ##### Vizew Post Area Start ##### -->
    <section class="vizew-post-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="all-posts-area">
                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4>Danh Nhân</h4>
                            <div class="line"></div>
                        </div>

                        <!-- Featured Post Slides -->
                        <div class="featured-post-slides owl-carousel mb-30">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(img/bg-img/14.jpg);">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata">Sports</a>
                                    <a href="single-post.html" class="post-title">Reunification of migrant toddlers, parents should be completed Thursday</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">05.03</span>
                            </div>

                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(img/bg-img/7.jpg);">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata">Sports</a>
                                    <a href="single-post.html" class="post-title">Reunification of migrant toddlers, parents should be completed Thursday</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            @foreach($danhnhan as $dn)
                            <!-- Single Blog Post -->
                            <div class="col-12 col-md-6">
                                <div class="single-post-area mb-80">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="<?php echo url('/'); ?>/upload/images/{{$dn->image}}" alt="">
                                    </div>

                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="post-cata cata-sm cata-danger">Danh Nhân</a>
                                        <a href="id={{$dn->id}}" class="post-title">{{$dn->title}}</a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> 28</a>
                                            <a href="#"><i class="fas fa-eye" aria-hidden="true"></i> {{$dn->views}}</a>
                                            <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$dn->likes}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Single Blog Post -->
                            <div class="col-12 col-md-6">
                                <div class="single-post-area mb-80">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="<?php echo url('/'); ?>/img/bg-img/13.jpg" alt="">

                                        <!-- Video Duration -->
                                        <span class="video-duration">05.03</span>
                                    </div>

                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="post-cata cata-sm cata-primary">Danh nhân</a>
                                        <a href="single-post.html" class="post-title">Love Island star's boyfriend found dead after her funeral</a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 38</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <!-- Section Heading -->
                                <div class="section-heading style-2">
                                    <h4>Sự Kiện</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Sports Video Slides -->
                                <div class="sport-video-slides owl-carousel mb-50">
                                    <!-- Single Blog Post -->
                                    @foreach($sukien as $sk)
                                    <div class="single-post-area">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="<?php echo url('/'); ?>/upload/images/{{$sk->image}}" alt="">
                                        </div>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="post-cata cata-sm cata-success">Sự kiện</a>
                                            <a href="id={{$sk->id}}" class="post-title">{{$sk->title}}</a>
                                            <div class="post-meta d-flex">
                                                <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> 14</a>
                                                <a href="#"><i class="fas fa-eye" aria-hidden="true"></i> {{$sk->views}}</a>
                                                <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$sk->likes}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <!-- Section Heading -->
                                <div class="section-heading style-2">
                                    <h4>Di Tích</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Business Video Slides -->
                                <div class="business-video-slides owl-carousel mb-50">
                                    <!-- Single Blog Post -->
                                    @foreach($ditich as $dt)
                                    <div class="single-post-area">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="<?php echo url('/'); ?>/upload/images/{{$dt->image}}" alt="">
                                        </div>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <a href="#" class="post-cata cata-sm cata-primary">Di tích</a>
                                            <a href="id={{$dt->id}}" class="post-title">{{$dt->title}}</a>
                                            <div class="post-meta d-flex">
                                                <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> 14</a>
                                                <a href="#"><i class="fas fa-eye" aria-hidden="true"></i> {{$dt->views}}</a>
                                                <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$dt->likes}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="row mb-30">
                            <!-- Single Blog Post -->
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3 d-flex mb-50">
                                    <div class="post-thumbnail">
                                        <img src="<?php echo url('/'); ?>/img/bg-img/16.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.html" class="post-title">Epileptic boy's cannabis let through border</a>
                                        <div class="post-meta d-flex justify-content-between">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 16</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 26</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 17</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3 d-flex mb-50">
                                    <div class="post-thumbnail">
                                        <img src="<?php echo url('/'); ?>/img/bg-img/18.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.html" class="post-title">Paramedics 'drilled into boat death woman'</a>
                                        <div class="post-meta d-flex justify-content-between">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 16</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 26</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 17</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3 d-flex mb-50">
                                    <div class="post-thumbnail">
                                        <img src="<?php echo url('/'); ?>/img/bg-img/19.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.html" class="post-title">Tory vice-chairs quit over PM's Brexit plan</a>
                                        <div class="post-meta d-flex justify-content-between">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 16</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 26</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 17</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3 d-flex mb-50">
                                    <div class="post-thumbnail">
                                        <img src="<?php echo url('/'); ?>/img/bg-img/20.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.html" class="post-title">Do This One Simple Action for an Absolutely</a>
                                        <div class="post-meta d-flex justify-content-between">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 16</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 26</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 17</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4>Bài Viết Mới</h4>
                            <div class="line"></div>
                        </div>

                        <!-- Featured Post Slides -->
                        <div class="featured-post-slides owl-carousel mb-30">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(img/bg-img/14.jpg);">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata">Sports</a>
                                    <a href="single-post.html" class="post-title">{{$newpost->title}}</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fas fa-eye" aria-hidden="true"></i> {{$newpost->views}}</a>
                                        <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$newpost->likes}}</a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                {{-- <span class="video-duration">05.03</span> --}}
                            </div>

                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(upload/images/{{$newpost->image}});">
                                <!-- Play Button -->
                                <a href="id={{$newpost->id}}" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata">Sports</a>
                                    <a href="id={{$newpost->id}}" class="post-title">{{$newpost->title}}</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> {{$newpost->views}}</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$newpost->likes}}</a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">05.03</span>
                            </div>
                        </div>

                        <!-- Single Post Area -->
                        <div class="single-post-area mb-30">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-6">
                                    <div class="post-thumbnail">
                                        <img src="<?php echo url('/'); ?>/img/bg-img/21.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="post-content mt-0">
                                        <a href="#" class="post-cata cata-sm cata-success">Sports</a>
                                        <a href="single-post.html" class="post-title mb-2">May fights on after Johnson savages Brexit approach</a>
                                        <div class="post-meta d-flex align-items-center mb-2">
                                            <a href="#" class="post-author">By Jane</a>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <a href="#" class="post-date">Sep 08, 2018</a>
                                        </div>
                                        <p class="mb-2">Quisque mollis tristique ante. Proin ligula eros, varius id tristique sit amet, rutrum non ligula.</p>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 32</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 42</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 7</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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