
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php  
    include 'inc/db.php';
    $page = 'coordinator';
    include 'inc/top-menu.php';
    include 'inc/aside.php';
    
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Gallery</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Gallsery</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h4 class="card-title">Group Pictures</h4>
                </div>
                <div class="card-body" style="height:500px;">
                  <div>
                   
                    <div class="mb-2">
                      <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                      <div class="float-right">
                        
                       
                      </div>
                    </div>
                  </div>
                  <div>

                    <div class="filter-container p-0 row" >
                      <?php 
                      $sql = "SELECT tblcourse_enrolment.id , concat (tblcourses.course, ' (' , tblcourse_enrolment.start_date, ')') as course_name,tbldoc.doc_file_name, tbldoc_type.doc_type, tbldoc.trans_by  FROM `tblcourse_enrolment` inner join tblcourses on tblcourse_enrolment.course_id = tblcourses.course_id
                      inner join tbldoc on tbldoc.course_enrol_id = tblcourse_enrolment.id
                      inner join tbldoc_type on tbldoc.doc_type_id = tbldoc_type.id WHERE tbldoc_type.doc_type = 'Group Picture' ";
                      if ($r = mysqli_query($dbc, $sql)) {
                        if (mysqli_num_rows($r) > 0) {
                          while ($row = mysqli_fetch_assoc($r)) {
                            echo '<div class="filtr-item col-sm-4 col-lg-4" data-category="1"  data-sort="white sample">
                            <a href="files\\'. $row['doc_file_name'] .'"  data-toggle="lightbox"
                              data-title="'.$row['course_name']. '">
                              <img src="files\\'. $row['doc_file_name'] .'" class="img-fluid mb-2"
                                alt="white sample" style="width:80%;height:80%;"/>
                            </a>
                            
                          </div>';

                          }
                        }
                      }

                      
                      
                      
                      ?>
                      
                      
                    </div>
                  </div>

                </div>
              </div>
            </div>
            
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Ekko Lightbox -->
  <script src="plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- Filterizr-->
  <script src="plugins/filterizr/jquery.filterizr.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      $('.filter-container').filterizr({ gutterPixels: 3 });
      $('.btn[data-filter]').on('click', function () {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })
  </script>
</body>

</html>