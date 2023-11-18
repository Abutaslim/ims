<?php
include 'inc/db.php';
include 'inc/top-menu.php';

$page = 'coordinator';
include 'inc/aside.php';

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_id = $_POST['course_id'];
    $user_id = $_POST['user_id'];
    $fees = $_POST['fees'];
    $sdate = ($_POST['sdate']);
    // $sd = date_format($sdate, 'Y-m-d');
   
    $edate = ($_POST['edate']);
    // $ed = date_format($edate, 'Y-m-d');
    $venue_name = $_POST['venue_name'];
    $category_id = $_POST['category_id'];

  
    if (!empty($course_id) and !empty($user_id) and !empty($sdate)) {
        $sql = "INSERT INTO `tblcourse_enrolment`(`course_id`, `coordinator_id`, `course_classification`, 
        `venue_id`, `course_fee`, `start_date`, `ending_date`) 
        VALUES ('$course_id','$user_id','$category_id','$venue_name','$fees', '$sdate', '$edate')";
        $result = mysqli_query($dbc, $sql);
        if (mysqli_affected_rows($dbc) == 1) {
            $message = 'Record Added Successfully';
            $alert = 'alert alert-info alert-dismissible';
        } else {
            $message = 'Something went wrong, try again';
            $alert = 'alert alert-danger alert-dismissible';
        }
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Add Courses</h1>

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
                        <form method="POST" action="enrol_course.php" name="enrol_course">
                            <input type="number" value="2" hidden name='user_id'>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputFullName">Course Name</label>
                                            <select id="" class="form-control" name='course_id'>
                                                <option value="select">Select</option>
                                                <?php
                                                $result = mysqli_query($dbc, 'SELECT * FROM `tblcourses` ORDER BY `tblcourses`.`course` ASC');
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo '<option value=' . $row['course_id'] . '>' . $row['course'] . '</option>';
                                                }
                                                
                                                ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Fees</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter Fees" name='fees'>
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
                                                    data-target="#reservationdate" name='sdate' />
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
                                            <div class="input-group date" id="reservationdate1"
                                                data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input"
                                                    data-target="#reservationdate1" name='edate' />
                                                <div class="input-group-append" data-target="#reservationdate1"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1"> Category </label>
                                            <select  id="" class="form-control"  name='category_id'>
                                                <option value="1">Scheduled</option>
                                                <option value="2">Customised</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="">Venue</label><br>
                                        <select id="" class="form-control" name='venue_name'>
                                            <option value="select">Select</option>
                                            <?php
                                            $result = mysqli_query($dbc, 'SELECT * FROM `tblvenue` ORDER BY `venue_name` ASC');
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option value=' . $row['id'] . '>' . $row['venue_name'] . '</option>';
                                            }
                                            
                                            ?>
                                        </select>

                                    </div>

                                </div>

                            </div>






                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button> &nbsp<a class="btn btn-info" href="courses_his.php">Back</a>
                            </div>
                        </form>
                    </div>
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
