@include('layouts.elements.head')

<body>
    @include("layouts.elements.header")
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Đăng ký</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="vizew-login-area section-padding-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="login-content">
                        <!-- Section Title -->
                        <div class="section-heading">
                            <h4>ĐĂNG KÝ</h4>
                            <div class="line"></div>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="text-white">
                            @csrf
                            <div class="form-group">

                                <label for="name" class="col-md-0 col-form-label text-md-right">{{ __('Họ và tên :') }}</label>
                                <input id="name " type="text" class="form-control text-white @error('name') is-invalid @enderror" placeholder="Họ và tên" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-0 col-form-label text-md-right">{{ __('Email :') }}</label>


                                <input id="email" type="email" class="form-control text-white @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">

                                <label for="password" class="col-md-0 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>


                                <input id="password" placeholder="Mật khẩu" type="password" class="form-control text-white @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-0 col-form-label text-md-right">{{ __('Xác nhận mật khẩu') }}</label>
                                    <input id="password-confirm" type="password" class="form-control text-white" name="password_confirmation" placeholder="Xác nhận mật khẩu" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn vizew-btn w-100 mt-30">{{ __('Đăng ký') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### registration form End ##### -->

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
