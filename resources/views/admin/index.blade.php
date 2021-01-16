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
  <link href="<?php echo url('/'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo url('/'); ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body id="page-top">
    <div id="wrapper">
        @include("admin.layout.right-header")
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include("admin.layout.header")
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                        <h1 class="h3 mb-0 text-gray-800">Trang tổng quan</h1>
                        
                    </div>
                    <div class="row">

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Bài viết</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$total_post}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-file fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Lượt xem</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$views}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-eye fa-2x "></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lượt like</div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$likes}}</div>
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

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Lượt bình luận</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$comments}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Lượt truy cập theo tháng</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($total_post != 0)
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
                            @if($post_highlight != null)
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bài viết nổi bật</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 100%; max-height: 300px;" src="<?php echo url('/'); ?>/upload/images/{{$post_highlight->image}}" alt="">
                                    </div>
                                    <p> <a href="{{ route('post-edit', ['id' => $post_highlight->id]) }}">{{$post_highlight->title}}</a></p>
                                    <p target="_blank" rel="nofollow"> {{$post_highlight->summary}}</p>
                                    <div class="d-flex justify-content-between mb-30" style="font-size: 12px; color: #4e73df;">
                                        <div class="post-meta d-flex align-items-center">
                                            <a href="{{route('user-edit',['id' => $user_post->id])}}">{{$user_post->name}}</a>
                                            <i class="fa fa-circle " aria-hidden="true"></i>
                                            <span>{{$post_highlight->created_at}}</span>
                                        </div>
                                        <div class="post-meta d-flex">
                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i> {{$post_highlight->likes}}
                                            <i class="fa fa-comments" aria-hidden="true"></i> {{$post_highlight->comments}}
                                            <i class="fa fa-eye" aria-hidden="true"></i> {{$post_highlight->views}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        @if($user_post_new != null)
                        <div class="col-lg-6 mb-4">
                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Bài viết mới nhất</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 100%; max-height: 300px;" src="<?php echo url('/'); ?>/upload/images/{{$post_new->image}}" alt="">
                                    </div>
                                    <p> <a href="{{ route('post-edit', ['id' => $post_new->id]) }}"> {{$post_new->title}}</a></p>
                                    <p target="_blank" rel="nofollow"> {{$post_new->summary}}</p>

                                    <div class="d-flex justify-content-between mb-30" style="font-size: 12px; color: #4e73df;">
                                        <div class="post-meta d-flex align-items-center">
                                            <a class="post-author" href="{{route('user-edit',['id' => $user_post_new->id])}}">{{$user_post_new->name}}</a>
                                            <i class="fa fa-circle " aria-hidden="true"></i>
                                            <span class="post-date">{{$post_new->created_at}}</span>
                                        </div>
                                        <div class="post-meta d-flex">
                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>{{$post_new->likes}}
                                            <i class="fa fa-comments" aria-hidden="true"></i>{{$post_new->comments}}
                                            <i class="fa fa-eye" aria-hidden="true"></i> {{$post_new->views }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

      <!-- Bootstrap core JavaScript-->
  <script src="<?php echo url('/'); ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo url('/'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo url('/'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo url('/'); ?>/js/sb-admin-2.min.js"></script>
  <script src="<?php echo url('/'); ?>/vendor/chart.js/Chart.min.js"></script>
<script type="text/javascript">
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

var time = <?php echo json_encode($arrTime); ?>;
var views = <?php echo json_encode($arrViews); ?>;
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: time,
    datasets: [{
      label: "Views",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: views,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return  number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

</script>
</body>

</html>