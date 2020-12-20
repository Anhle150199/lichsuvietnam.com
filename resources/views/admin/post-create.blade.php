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
                                <h4 class="m-0 font-weight-bold text-primary">Thêm mới bài viết</h4>
                            </div>
                            <div class="col" style="float: right; width:auto;">
                                <a>
                                    <input type="button" class="btn btn-primary" style="width: auto;" value="Quay lại trang trước" onclick="history.back(-1)" />
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-body">

                                <form method="POST" action="{{route('post-create')}}" style="margin: auto; color: black;">
                                    @csrf
                                    <div class="form-group">
                                        <strong for="title" class="col-md-0 col-form-label">{{ __('Tiêu đề') }}</strong>
                                        <input id="title " type="" class="form-control   @error('name') is-invalid @enderror" name="title" ">
                                        @error('title')
                                        <span class=" invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <strong for="category" class="col-md-0 col-form-label ">{{ __('Thể loại') }}</strong>
                                        <select class="browser-default custom-select" id="category" name="category">
                                            @foreach($categories as $category)
                                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <strong for="period" class="col-md-0 col-form-label ">{{ __('Thời kỳ') }}</strong>
                                        <select class="browser-default custom-select" id="period" name="period">
                                            @foreach($periods as $period)
                                            <option value="{{$period['id']}}">{{$period['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <strong for="editor" class="col-md-0 col-form-label ">{{ __('Nội dung') }}</strong>
                                        <div id="editor" class="text-body">
                                        </div>
                                        <script>
                                            var editor = CKEDITOR.replace('editor');
                                            // ClassicEditor
                                            //     .create(document.querySelector('#editor'))
                                            //     .catch(error => {
                                            //         console.error(error);
                                            //     });
                                        </script>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 mt-30" style="margin-bottom: 5%;">{{ __('Đăng tải') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("admin.layout.script")
</body>