<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Lịch Sử Việt Nam</title>
    <link rel="icon" href="<?php echo url('/'); ?>/img/core-img/vietnam-icon.png">
    <link rel="stylesheet" href="<?php echo url('/'); ?>/css/style.css">
    <link href="<?php echo url('/'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="<?php echo url('/'); ?>/css/sb-admin-2.min.css" rel="stylesheet"> -->
    <style>
        .avatar-profile{
            /* width: 30%;
            height: auto; */
            margin-right: 5%;
        }
        .padding-15px{
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