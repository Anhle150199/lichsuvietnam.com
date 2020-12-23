<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin-Lịch sử Việt Nam</title>
  <link rel="icon" href="<?php echo url('/'); ?>/img/core-img/vietnam-icon.png">
  <!-- Custom fonts for this template-->
  <link href="<?php echo url('/'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo url('/'); ?>/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?php echo url('/'); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo url('/'); ?>/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo url('/'); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <script src="<?php echo url('/'); ?>/ckeditor/ckeditor.js"></script>
  <script src="<?php echo url('/'); ?>/js/ckfinder/ckfinder.js"></script>
  <script>
    
    // check file
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
              document.getElementById('imagePreview').innerHTML = '<img style="max-height: 250px;" src="' + e.target.result + '"/>';
            };
          reader.readAsDataURL(fileInput.files[0]);
        }
      }
    }
  </script>
</head>