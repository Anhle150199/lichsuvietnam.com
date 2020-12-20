@include("admin.layout.head")

<body id="page-top">
  <div id="wrapper">
    @include("admin.layout.right-header")
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        @include("admin.layout.header")
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div style="width: 70%; float: left;">
                <h4 class="m-0 font-weight-bold text-primary">Profile {{$user['name']}}</h4>
              </div>
              <div class="col" style="float: right; width:auto;">
                <a>
                  <input type="button" class="btn btn-primary" style="width: auto;" value="Quay lại trang trước" onclick="history.back(-1)" />
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               
                <form method="POST" action="{{route('edit')}}" style="margin: auto; max-width: 50%;">
                  @csrf
                  

                  <input type="hidden" name="id" value="{{$user['id']}}" />
                  <div class="form-group">
                    <label for="name" class="col-md-0 col-form-label text-md-right">{{ __('Tiêu đề') }}</label>
                    <input id="name " type="text" class="form-control   @error('name') is-invalid @enderror" placeholder="Họ và tên" name="name" value="{{$user['name']}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="email" class="col-md-0 col-form-label text-md-right">{{ __('Thể loại  :') }}</label>
                    <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ $user->email }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="level" class="col-md-0 col-form-label text-md-right">{{ __('Thời kỳ :') }}</label>
                    <select class="browser-default custom-select" id="level" name="level">
                      @if($user->level == 0)
                      <option value="0">Người dùng</option>
                      <option value="1">Admin</option>
                      @endif
                      @if($user->level == 1)
                      <option value="1">Admin</option>
                      <option value="0">Người dùng</option>
                      @endif
                      @if($user->level == 2)
                      <option value="2">Supper Admin</option>
                      @endif
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="active" class="col-md-0 col-form-label text-md-right">{{ __('Trạng thái :') }}</label>
                    <select class="browser-default custom-select" id="active" name="active">
                      @if($user->active == 0)
                      <option value="0">Vô hiệu hóa</option>
                      <option value="1">Kích hoạt</option>
                      @endif
                      @if($user->active == 1)
                      <option value="1">Kích hoạt</option>
                      <option value="0">Vô hiệu hóa</option>
                      @endif
                    </select>
                  </div>

                  <button type="submit" class="btn btn-primary w-100 mt-30" style="margin-bottom: 5%;">{{ __('Cập nhật') }}</button>
       

                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include("admin.layout.script")
</body>