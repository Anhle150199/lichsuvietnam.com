

  <link rel="icon" href="<?php echo url('/'); ?>/img/core-img/vietnam-icon.png">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/css/style.css">
  <link href="<?php echo url('/'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <div id="fb-root"></div>
  <!-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=1693660827482004&autoLogAppEvents=1" nonce="lVfFGBO7"></script> -->
  <style>
    .avatar-profile {
      /* width: 30%;
            height: auto; */
      margin-right: 5%;
    }

    .padding-15px {
      padding: 15px;
    }
  </style>
  <script>
    function fileValidation() {
      var fileInput = document.getElementById('image');
      var filePath = fileInput.value;
      var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      if (!allowedExtensions.exec(filePath)) {
        alert('File của bạn phải có đuôi .jpeg/.jpg/.png/.gif.');
        fileInput.value = '';
        return false;
      } else {
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            document.getElementById('imagePreview').innerHTML = '<img style="height: 250px; width:250px" src="' + e.target.result + '"/>';
          };
          reader.readAsDataURL(fileInput.files[0]);
        }
      }
    }
  </script>
</head>