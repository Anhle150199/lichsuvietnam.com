<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Lịch Sử Việt Nam</title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo url('/'); ?>/img/core-img/favicon.ico">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css/style.css">
</head>

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

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Login</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Great to have you back!</h4>
                            <div class="line"></div>
                        </div>

                        <form action="index.html" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email or User Name">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                    <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn vizew-btn w-100 mt-30">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Login Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
        <!-- ##### Footer Area Start ##### -->
        <footer class="footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget mb-70" style="margin-top: 10%;">
                        <!-- Logo -->
                        <a href="home" class="foo-logo d-block mb-4"><img src="<?php echo url('/'); ?>/img/core-img/logo1.png" alt=""></a>
                        <p></p>

                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget mb-70">
                        <div class="twitter-slides owl-carousel">
                            <div class="">
                                <div class="single-twit">
                                    <p>Chúng tôi là một trang web phi lợi nhuận, giúp mọi người có hứng thú với lịch sử nước nhà nhiều hơn. Nếu bạn cảm thấy lịch sử nhàm chán, hãy đến với chúng tôi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget mb-70">
                        <h6 class="widget-title">Các trang thông tin</h6>
                        <div class="post-content">
                            <a href="http://quochoi.vn/Pages/default.aspx" class="post-title">- Quốc hội VN</a>
                        </div>
                        <br>
                        <div class="post-content">
                            <a href="https://dangcongsan.vn/" class="post-title">- Đảng Cộng Sản VN</a>
                        </div>
                        <br>
                        <div class="post-content">
                            <a href="http://www.chinhphu.vn/portal/page/portal/chinhphu/trangchu" class="post-title">- Chính Phủ VN</a>
                        </div>
                        <br>
                        <div class="post-content">
                            <a href="https://daibieunhandan.vn/" class="post-title">- Đại biểu nhân dân</a>
                        </div>
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget mb-70">
                        <h6 class="widget-title">Địa chỉ</h6>
                        <!-- Contact Address -->
                        <div class="contact-address">
                            <p>Số 1, Đại Cồ Việt <br>Hai Bà Trưng, Hà Nội</p>
                            <p>Điện thoại: 0386435002</p>
                            <p>Email: lichsuvietnam@gmail.com</p>
                        </div>
                        <!-- Footer Social Area -->
                        <div class="footer-social-area">
                            <a href="https://www.facebook.com/lichsunuocvietnam" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.google.com" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="https://www.instagram.com/" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="https://twitter.com" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-sm-6">
                        <p class="copywrite-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved 
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <!-- <nav class="footer-nav">
                            <ul>
                                <li><a href="#">Advertise</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Disclaimer</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </nav> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>