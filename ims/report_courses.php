<?php
include 'inc/db.php';
include 'inc/top-menu.php';

$page = 'course';
include 'inc/aside.php';

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Report</h1>

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- message -->
                    <?php
                    //  echo $status;
                    //  echo $course_name;
                    //  echo $duration;
                    //  echo $category;
                    //  echo $fees;
                    if (!empty($message)) {
                        echo '<div style="width:100%; margin-left:0%">
                                                                                      <div class="' .
                            $alert .
                            '">
                                                                                          <button type="button" class="close" data-dismiss="alert"
                                                                                              aria-hidden="true">&times;</button>
                                                                                          <h5><i class="icon fas fa-info"></i> Alert!</h5>
                                                                                          ' .
                            $message .
                            '
                                                                                      </div>
                                                                                  </div>';
                    }
                    
                    ?>
                    <!-- end of message -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add User Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="add_course.php" name="add_course">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputFullName">Course Name</label>
                                            <select name="course_name" id="" class="form-control select2bs4">
                                                <option value="1">s</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="exampleInputFullName">Report Type</label>
                                            <select name="course_name" id="" class="form-control select2bs4">

                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Starting Date</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Ending Date</label>
                                            <div class="input-group date" id="reservationdate"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate" />
                                                <div class="input-group-append" data-target="#reservationdate"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row">



                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Institution's Percentate</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter Percentage" name='percentage'>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="">Status</label><br>
                                        <input type="checkbox" checked data-bootstrap-switch data-off-color="danger"
                                            data-on-color="success" name='status'>
                                    </div>

                                </div> -->



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'inc/footer.php'; ?>
