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
                                <h4 class="m-0 font-weight-bold text-primary">Thêm mới Video</h4>
                            </div>
                            <div class="col" style="float: right; width:auto;">
                                <a>
                                    <input type="button" class="btn btn-primary" style="width: auto;" value="Quay lại trang trước" onclick="history.back(-1)" />
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-body">

                                <form method="POST" action="{{route('video-create')}}" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()" style="margin: auto; color: black;">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <strong for="title" class="col-md-0 col-form-label">{{ __('Tiêu đề') }}</strong>
                                        <input id="title " type="text" class="form-control   @error('title') is-invalid @enderror" name="title">
                                        
                                    </div>

                                    <div class="form-group">
                                        <strong for="summary" class="col-md-0 col-form-label">{{ __('Tóm tắt') }}</strong>
                                        <textarea id="summary " rows="3" class="form-control   @error('summary') is-invalid @enderror" name="summary"></textarea>
                                        
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
                                        <strong for="img" class="col-md-0 col-form-label">{{ __('Hình ảnh thumbnail ') }}</strong>
                                        <input id="image" type="file" class="@error('img') is-invalid @enderror" name="img" onchange="return fileValidation()" style="margin-left: 5%;" />
                                        <div id="imagePreview"></div>

                                    </div>

                                    <!-- Video -->
                                    <div class="form-group">
                                        <strong for="video" class="col-md-0 col-form-label">{{ __('Video') }}</strong>
                                        <textarea id="video" type="text" class="form-control   @error('video') is-invalid @enderror" cols="30" rows="" name="video"></textarea>
                                    </div>


                                    <div class="form-group">
                                        <strong for="post_content" class="col-md-0 col-form-label ">{{ __('Nội dung') }}</strong>
                                        <textarea type="text" name="post_content" id="post_content" cols="30" rows="10"></textarea>
                                        <script>
                                            CKEDITOR.replace('post_content');
                                        </script>
                                        
                                    </div>
                                    <div class="form-group">
                                        <strong for="highlight" class="col-md-0 col-form-label">{{ __('Nổi bật') }}</strong>
                                        <div class="form-control" style="height: fit-content; ">
                                            <label for="highlight" class="radio-inline">
                                                <input name="highlight" type="radio" value="0" checked=""> Không
                                            </label>

                                            <label for="highlight" class="radio-inline" style="margin-left: 15%;">
                                                <input name="highlight" type="radio" value="1"> Có
                                            </label>
                                        </div>
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
    <script>
        function validateForm() {
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
            var image = document.forms["myForm"]["img"].value;
            if (image == "") {
                alert("Chưa có ảnh");
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

            if (summary.length >1000 || title.length >200 ) {
                alert("tiêu đề không quá 200 ký tự hoặc tóm tắt không quá 1000 ký tự");
                return false;
            }
        }
    </script>
</body>