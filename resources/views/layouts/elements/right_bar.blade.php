<div class="col-12 col-md-5 col-lg-4">
    <div class="sidebar-area">

        <!-- ***** Fan Page ***** -->
        <div class="single-widget latest-video-widget mb-50">
            <!-- <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Flichsunuocvietnam&tabs=timeline&width=300&height=450&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="450" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
            </iframe> -->

        </div>

        <!-- ***** Sidebar Widget *****  Youtub chanel-->
        <div class="single-widget youtube-channel-widget mb-50">
            <!-- Section Heading -->
            <div class="section-heading style-2 mb-30">
                <h4>Các kênh You Tube hay</h4>
                <div class="line"></div>
            </div>

            <!-- Single YouTube Channel -->
            <div class="single-youtube-channel d-flex align-items-center">
                <div class="youtube-channel-thumbnail">
                    <a href="https://www.youtube.com/user/TEDvnChannel" class="channel-title">
                        <img src="https://yt3.ggpht.com/ytc/AAUvwngzdiZX_K0XSpYaSXB-f_RA9-Qi1ufXz0eZC8UnZg=s88-c-k-c0x00ffffff-no-rj" alt="">
                    </a>
                </div>
                <div class="youtube-channel-content">
                    <a href="https://www.youtube.com/user/TEDvnChannel" class="channel-title">Đuốc Mồi</a>
                    <a href="https://www.youtube.com/user/TEDvnChannel" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                </div>
            </div>

            <div class="single-youtube-channel d-flex align-items-center">
                <div class="youtube-channel-thumbnail">
                    <a href="https://www.youtube.com/c/JhGochannel" class="channel-title">
                        <img src="https://yt3.ggpht.com/ytc/AAUvwnj2IK4miOjlmk36PpUEUc1h1Zyab4AnO9XpQo9h=s88-c-k-c0x00ffffff-no-rj" alt="">
                    </a>
                </div>
                <div class="youtube-channel-content">
                    <a href="https://www.youtube.com/c/JhGochannel" class="channel-title">JhGo Channel</a>
                    <a href="https://www.youtube.com/c/JhGochannel" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                </div>
            </div>

            <div class="single-youtube-channel d-flex align-items-center">
                <div class="youtube-channel-thumbnail">
                    <a href="https://www.youtube.com/channel/UCB3s9v6DPrOGgNHe49KO6DA" class="channel-title">
                        <img src="https://yt3.ggpht.com/ytc/AAUvwnhKog7IMLc4biOdBrtY7sFUqrsHyjDeg0v1vxQa=s88-c-k-c0x00ffffff-no-rj" alt="">
                    </a>
                </div>
                <div class="youtube-channel-content">
                    <a href="https://www.youtube.com/channel/UCB3s9v6DPrOGgNHe49KO6DA" class="channel-title">Việt Sử Toàn Thư</a>
                    <a href="https://www.youtube.com/channel/UCB3s9v6DPrOGgNHe49KO6DA" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                </div>
            </div>
        </div>

        <!-- ***** Single Widget ***** -->
        <div class="single-widget mb-50">
            <!-- Section Heading -->
            <div class="section-heading style-2 mb-30">
                <h4>Xem nhiều</h4>
                <div class="line"></div>
            </div>
            @foreach($postView as $p)
            <!-- Single Blog Post -->
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail">
                    <img src="<?php echo url('/'); ?>/upload/images/{{$p->image}}" alt="">
                </div>
                <div class="post-content">
                    <a href="id={{$p->id}}" class="post-title">{{$p->title}}</a>
                    <div class="post-meta d-flex justify-content-between">
                        <a href="#"><i class="fas fa-comments" aria-hidden="true"></i> 34</a>
                        <a href="#"><i class="fas fa-eye" aria-hidden="true"></i> {{$p->views}}</a>
                        <a href="#"><i class="fas fa-thumbs-up" aria-hidden="true"></i> {{$p->likes}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>