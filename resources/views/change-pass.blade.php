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
                            <li class="breadcrumb-item"><a href=""> {{Auth::user()->name}}</a></li>
                            <li class="breadcrumb-item"><a href=""> Đổi mật khẩu</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="vizew-archive-list-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <!-- <div class="col-12"> -->
                <!-- <div class="media"> -->
                <!-- <div style="max-width: 1000px;"> -->

            <div class="col-12 col-md-6">
                    <div class="login-content">

                            <form method="POST" action="{{ route('change-password') }}">
                                @csrf
                                <div class="form-group">

                                    <label for="old_password" class="col-md-0 col-form-label text-md-right">{{ __('Mật khẩu cũ') }}</label>
                                    <input id="old_password" placeholder="Mật khẩu cũ" type="password" class="form-control text-white  @error('old_password') is-invalid @enderror" name="old_password" required autocomplete="on">
                                    @if(session('error'))
                                    <div>
                                        <p style="font-size: smaller; color: red;">{{session('error')}}</p>
                                    </div>
                                    @endif
                                    @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <label for="new_password" class="col-md-0 col-form-label text-md-right">{{ __('Mật khẩu mới') }}</label>


                                    <input id="new_password" placeholder="Mật khẩu mới" type="password" class="form-control text-white @error('new_password') is-invalid @enderror" name="new_password" required autocomplete="off">

                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="new_password-confirm" class="col-md-0 col-form-label text-md-right">{{ __('Xác nhận mật khẩu') }}</label>
                                    <input id="new_password-confirm" type="password" class="form-control text-white" name="new_password_confirmation" placeholder="Xác nhận mật khẩu" required autocomplete="off">
                                </div>
                                <button type="submit" class="btn vizew-btn w-100 mt-30">Đổi mật khẩu</button>
                            </form>
                    </div></div>
            </div>
        </div>
    </div>
    <!-- ##### Archive List Posts Area End ##### -->

    @include("layouts.elements.footer")

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="<?php echo url('/'); ?>/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?php echo url('/'); ?>/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo url('/'); ?>/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?php echo url('/'); ?>/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="<?php echo url('/'); ?>/js/active.js"></script>

</body>

</html>