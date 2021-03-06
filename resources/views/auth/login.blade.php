@include('layouts.elements.head')

<body>
    @include("layouts.elements.header")

    <!-- ##### Link Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đăng nhập</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <div class="vizew-login-area section-padding-60" style="padding-bottom: 60px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>Đăng nhập</h4>
                            <div class="line"></div>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @if(session('error'))
                            <div>
                                <p style="font-size: smaller; color: red;">{{session('error')}}</p>
                            </div>
                            @endif
                            <div class="form-group">
                                <input type="email" class="form-control text-white @error('email') is-invalid @enderror" id="email exampleInputEmail1" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id=" password exampleInputPassword1" type="password" class="form-control text-white @error('password') is-invalid @enderror" placeholder="Mật khẩu" name="password" autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn vizew-btn w-100 mt-30">Đăng nhập</button>


                        </form>
                        <br>
                        <div class="or-seperator"><i>OR</i></div>
                        <div class="row mx-gutters-2 mb-4">
                            <div class="col">
                                <a href="{{ route('login.google') }}">
                                    <button type="button" class="btn vizew-btn w-100 mt-20 bg-danger ">
                                        <i class="fab fa-google-plus-g " style="margin-right: 5%;"></i>Google
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="row mx-gutters-2 mb-4">
                            <div class="col">
                                <a href="{{ route('login.facebook') }}">
                                    <button type="button" class="btn vizew-btn w-100  bg-primary">
                                        <i class="fab fa-facebook-square " style="margin-right: 5%;"></i>Facebook
                                    </button>
                                </a>
                            </div>
                        </div>


                        @if (Route::has('register'))
                        <a class="btn btn-link w-100" href="{{ route('register') }}">
                            {{ __('Bạn chưa có tài khoản? Đăng ký') }}
                        </a>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Login Area End ##### -->

    @include("layouts.elements.footer")

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