@include("admin.layout.head")

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    @include("admin.layout.right-header")

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Trang tổng quan</h1>
            </div>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <!-- Count posts -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Tổng bài viết</span>
                  <span class="info-box-number">10<small>%</small></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- Count Likes -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Likes</span>
                  <span class="info-box-number">41,410</span>
                </div>
              </div>
            </div>

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
            <!-- Count Comments -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-comments"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Comments</span>
                  <span class="info-box-number">760</span>
                </div>
              </div>
            </div>
            <!-- Count Members -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Members</span>
                  <span class="info-box-number">2,000</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Charts -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Thống kê</h5>

                  <!-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group">
                      <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-wrench"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a href="#" class="dropdown-item">Action</a>
                        <a href="#" class="dropdown-item">Another action</a>
                        <a href="#" class="dropdown-item">Something else here</a>
                        <a class="dropdown-divider"></a>
                        <a href="#" class="dropdown-item">Separated link</a>
                      </div>
                    </div>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div> -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="row">
                    <div  style="width: 100%;">
                      <p class="text-center">
                        <strong>28 ngày gần nhất</strong>
                      </p>

                      <div class="chart">
                        <canvas id="salesChart" height="180" style="height: 280px"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <!-- posts -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                        <h5 class="description-header">$35,210</h5>
                        <span class="description-text">Bài viết</span>
                      </div>
                    </div>
                     <!-- Likes -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                        <h5 class="description-header">$10,390.90</h5>
                        <span class="description-text">Thích</span>
                      </div>
                    </div>
                    <!-- Comments -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                        <h5 class="description-header">$24,813.53</h5>
                        <span class="description-text">Bình luận</span>
                      </div>
                    </div>
                    <!-- Members -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block">
                        <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                        <h5 class="description-header">1200</h5>
                        <span class="description-text">Thành viên mới</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col">
              <!-- TABLE: new posts  -->
              <div class="card">
                <div class="card-header border-transparent">
                  <h3 class="card-title">Bài viết nổi bật</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead >
                        <tr>
                          <th>ID</th>
                          <th>Tiêu đề</th>
                          <th>Ngày tạo</th>
                          <th>Lượt like</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <!-- id of posts -->
                          <td>111</td>
                          <!-- title anh link to this post -->
                          <td><a href="#"> The Awards Night Promo 28677077 - After Effect Template Free</a></td>
                          <td><span >20-12-2020</span></td>
                          <td>
                            <div class="sparkbar" data-color="#00a65a" data-height="20">100</div>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <script src="<?php echo url('/'); ?>/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?php echo url('/'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo url('/'); ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo url('/'); ?>/dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="<?php echo url('/'); ?>/dist/js/demo.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="<?php echo url('/'); ?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="<?php echo url('/'); ?>/plugins/raphael/raphael.min.js"></script>
  <script src="<?php echo url('/'); ?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="<?php echo url('/'); ?>/plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="<?php echo url('/'); ?>/plugins/chart.js/Chart.min.js"></script>

  <!-- PAGE SCRIPTS -->
  <script src="<?php echo url('/'); ?>/dist/js/pages/dashboard2.js"></script>

</body>

</html>