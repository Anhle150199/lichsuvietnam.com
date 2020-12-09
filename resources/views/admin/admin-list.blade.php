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
              <h1 class="m-0 text-dark">Admin</h1>
            </div>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col">
              <!-- TABLE: new posts  -->
              <div class="card">
                <div class="card-header border-transparent">

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
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Họ tên</th>
                          <th>Email</th>
                          <th>Ngày tạo</th>
                          <!-- <th>Số bài đăng</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($users as $item) { ?>
                          <tr>
                            <td><?php echo $item['username']; ?></td>
                            <td><?php echo $item['email']; ?></td>
                            <td><?php echo $item['create_at']; ?></td>
                            <!-- <td>
                              <form method="POST" class="form-delete" action="<?php# echo create_link(base_url(''), array('m' => 'user', 'a' => 'delete')); ?>">
                                <a href="<?php #echo create_link(base_url('admin'), array('m' => 'user', 'a' => 'edit', 'id' => $item['id'])); ?>">Edit</a>
                                <input type="hidden" name="user_id" value="<?php #echo $item['id']; ?>" />
                                <input type="hidden" name="request_name" value="delete_user" />
                                <a href="#" class="btn-submit">Delete</a>
                              </form>
                            </td> -->
                          </tr>
                        <?php } ?>

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