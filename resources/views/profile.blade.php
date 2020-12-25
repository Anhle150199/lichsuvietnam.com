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
                            <li class="breadcrumb-item"><a href="">{{Auth::user()->name}}</a></li>
                        </ol>
                    </nav>
                    @if(session('dialog'))
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="font-size:25px">×</span>
                        </button>
                        <p class="text-body">{{session('dialog')}}</p>
                    </div>
                    @endif
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
                <div class="avatar-profile ">
                    <img src="<?php echo url('/'); ?>/upload/images/{{Auth::user()->avatar}}" style="display: block;width: 350px; height: 350px;">
                    <div style="max-width: fit-content;margin: auto;">
                        <button type="button" class="btn btn-primary  mt-30" data-toggle="modal" data-target="#myModal" style="margin: auto;">
                            Đổi avatar
                        </button>
                    </div>

                </div>

                <div class="media-body">
                    <div class="personal_text">
                        <form method="POST" action="{{ route('profile') }}" class="text-white">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-md-0 col-form-label text-md-right">{{ __('Họ và tên :') }}</label>
                                <input id="name " type="text" class="form-control text-white  @error('name') is-invalid @enderror" placeholder="Họ và tên" name="name" value="{{Auth::user()->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-md-0 col-form-label text-md-right">{{ __('Email :') }}</label>
                                <input id="email" type="email" class="form-control text-white  @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ Auth::user()->email }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                @if(Auth::user()->level > 0)
                                <label for="status" class="col-md-0 col-form-label text-md-right">{{ __('Quyền :') }}</label>
                                @if(Auth::user()->level == 1)
                                <span class="padding-15px">Admin</span>
                                @endif
                                @if(Auth::user()->level == 2)
                                <span class="padding-15px">Supper Admin</span>
                                @endif
                                <br>
                                @endif
                                <label for="status" class="col-md-0 col-form-label text-md-right">{{ __('Trạng thái :') }}</label>
                                <span class="padding-15px">Kích hoạt</span>
                                <br>
                                <label for="status" class="col-md-0 col-form-label text-md-right">{{ __('Ngày tạo :') }}</label>
                                <span class="padding-15px">{{Auth::user()->created_at}}</span>
                                <br>


                            </div>
                            <button type="submit" class="btn vizew-btn w-100 mt-30">Submit</button>
                        </form>

                        <a href="{{ route('change-password') }}">
                            <button type="button" class="btn btn-light  mt-30" data-toggle="modal" data-target="#passwordModal" style=" float: left;">
                                Đổi mật khẩu
                            </button>
                        </a>
                        <form action="{{route('disable-user')}}" method="post" style="float: right">
                            @csrf
                            <button class="btn btn-danger w-40 mt-30">Vô hiệu hóa tài khoản</button>
                        </form>
                    </div>
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-body">Thay đổi Avatar</h4>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div>
                                <form method="POST" action="{{route('change-avatar')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <div class="form-group" style="max-width: fit-content; margin: auto;">
                                            <input id="image" type="file" class="" name="img" accept="image/*" onchange="return fileValidation()" />
                                            <div id="imagePreview"></div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
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