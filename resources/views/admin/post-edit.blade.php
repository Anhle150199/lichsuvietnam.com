@include("admin.layout.head")

<body id="page-top">
    <div id="wrapper">
        @include("admin.layout.right-header")
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include("admin.layout.header")

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <span class="">
                            <h1>Bài đăng:</h1>
                            <h3 style="color:crimson">{{$post->title}}</h3>

                        </span>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Lượt xem</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$post->views}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-eye fa-2x "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lượt like</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$post->likes}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-thumbs-up fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Lượt bình luận</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$post->comments}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<br>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div style="width: 70%; float: left;">
                                <h4 class="m-0 font-weight-bold text-primary">Chỉnh sửa</h4>
                            </div>
                            <div class="col" style="float: right; width:auto;">
                                <a>
                                    <input type="button" class="btn btn-primary" style="width: auto;" value="Quay lại trang trước" onclick="history.back(-1)" />
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-body">
                                @if($post['post_type_id'] == 2)
                                <form method="POST" action="{{ route('post-edit',  ['id' => $post['id']]) }}" name="myForm" onsubmit="return validateFormPost()" enctype="multipart/form-data" style="margin: auto; color: black;">
                                    @elseif($post['post_type_id'] == 1)
                                    <form method="POST" action="{{ route('video-edit',  ['id' => $post['id']]) }}" name="myForm" onsubmit="return validateFormPost()" enctype="multipart/form-data" style="margin: auto; color: black;">
                                        @endif
                                        @csrf

                                        <div class="form-group">
                                            <strong for="title" class="col-md-0 col-form-label">{{ __('Tiêu đề') }}</strong>
                                            <input value="{{ $post['title'] }}" id="title " type="text" class="form-control   @error('title') is-invalid @enderror" name="title">

                                        </div>

                                        <div class="form-group">
                                            <strong for="summary" class="col-md-0 col-form-label">{{ __('Tóm tắt') }}</strong>
                                            <textarea id="summary " rows="3" class="form-control   @error('summary') is-invalid @enderror" name="summary"> {{ $post['summary'] }} </textarea>

                                        </div>

                                        <div class="form-group">
                                            <strong for="category" class="col-md-0 col-form-label ">{{ __('Thể loại') }}</strong>
                                            <select class="browser-default custom-select" id="category" name="category">
                                                @foreach($categories as $category)
                                                @if($post['category_id'] == $category['id'])
                                                <option value="{{$category['id']}}" selected="selected"> {{$category['name']}} </option>
                                                @else
                                                <option value="{{$category['id']}}"> {{$category['name']}} </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <strong for="period" class="col-md-0 col-form-label ">{{ __('Thời kỳ') }}</strong>
                                            <select class="browser-default custom-select" id="period" name="period">

                                                @foreach($periods as $period)
                                                @if($post['period_id'] == $period['id'])
                                                <option value="{{$period['id']}}" selected="selected"> {{$period['name']}} </option>
                                                @else
                                                <option value="{{$period['id']}}"> {{$period['name']}} </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <strong for="img" class="col-md-0 col-form-label">
                                                @if($post['post_type_id'] == 2)
                                                {{ __('Hình ảnh') }}
                                                @else
                                                {{ __('Hình ảnh thumbnail ') }}
                                                @endif
                                            </strong>
                                            <input id="image" type="file" class="" name="img" accept="image/*" onchange="return fileValidation()" style="margin-left: 5%;" />
                                            <div class="form-group">
                                                <img id="imageOld" name="imageOld" src="<?php echo url('/'); ?>/upload/images/{{$post['image']}}" style="max-height: 250px; margin-top: 2%;" alt="">
                                            </div>
                                            <div id="imagePreview"></div>
                                        </div>

                                        @if($post['post_type_id'] == 1)
                                        <div class="form-group">
                                            <strong for="video" class="col-md-0 col-form-label">{{ __('Video') }}</strong>
                                            <textarea id="video" type="text" class="form-control   @error('video') is-invalid @enderror" cols="30" rows="" name="video"> {{ $post['video'] }} </textarea>
                                        </div>
                                        @endif

                                        <div class="form-group">
                                            <strong for="post_content" class="col-md-0 col-form-label ">{{ __('Nội dung') }}</strong>
                                            <textarea type="text" name="post_content" id="post_content" cols="30" rows="10">{{ $post['content'] }}</textarea>
                                            <script>
                                                CKEDITOR.replace('post_content');
                                            </script>

                                        </div>
                                        <div class="form-group">
                                            <strong for="highlight" class="col-md-0 col-form-label">{{ __('Nổi bật') }}</strong>
                                            <div class="form-control" style="height: fit-content; ">
                                                @if($post['highlight'] == 0)
                                                <label for="highlight" class="radio-inline">
                                                    <input name="highlight" type="radio" value="1"> Có
                                                </label>

                                                <label for="highlight" class="radio-inline" style="margin-left: 15%;">
                                                    <input name="highlight" type="radio" value="0" checked=""> Không
                                                </label>
                                                @else
                                                <label for="highlight" class="radio-inline">
                                                    <input name="highlight" type="radio" value="1" checked=""> Có
                                                </label>

                                                <label for="highlight" class="radio-inline" style="margin-left: 15%;">
                                                    <input name="highlight" type="radio" value="0"> Không
                                                </label>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <strong for="hidden" class="col-md-0 col-form-label">{{ __('Ẩn bài viết') }}</strong>
                                            <div class="form-control" style="height: fit-content; ">
                                                @if($post['hidden'] == 0)
                                                <label for="hidden" class="radio-inline">
                                                    <input name="hidden" type="radio" value="1"> Có
                                                </label>

                                                <label for="hidden" class="radio-inline" style="margin-left: 15%;">
                                                    <input name="hidden" type="radio" value="0" checked=""> Không
                                                </label>
                                                @else
                                                <label for="hidden" class="radio-inline">

                                                    <input name="hidden" type="radio" value="1" checked=""> Có
                                                </label>

                                                <label for="hidden" class="radio-inline" style="margin-left: 15%;">
                                                    <input name="hidden" type="radio" value="0"> Không
                                                </label>
                                                @endif
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 mt-30" style="margin-bottom: 5%;">{{ __('Cập nhật') }}</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("admin.layout.script")
    <script>
        function validateFormPost() {
            var title = document.forms["myForm"]["title"].value;
            if (title == "") {
                alert("Chưa nhập tiêu đề");
                return false;
            }
            var summary = document.forms["myForm"]["summary"].value;
            if (summary == "") {
                alert("Chưa nhập tóm tắt");
                return false;
            }

            var video = document.forms["myForm"]["video"].value;
            if (video == "") {
                alert("Chưa nhập video");
                return false;
            }
            var content = document.forms["myForm"]["post_content"].value;
            if (content == "") {
                alert("Chưa nhập Nội dung");
                return false;
            }

            if (summary.length > 200 || title.length > 200) {
                alert("tiêu đề  hoặc tóm tắt không quá 200 ký tự");
                return false;
            }
        }
    </script>
</body>