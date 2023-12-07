<?php
include 'inc/db.php';
$page = "coordinator";
include 'inc/top-menu.php';

$page = 'course';
include 'inc/aside.php';

if (isset($_POST['submit'])) {

    $fname = @$_POST['fname'];
    $others = @$_POST['others'];
    $reg_Num = @$_POST['reg_Num'];
    $p_num = @$_POST['p_num'];
    $gender = @$_POST['gender'];
    $faculty = @$_POST['faculty'];
    $department = @$_POST['department'];
    $programme_Type = @$_POST['programme_Type'];
    $course_of_study = @$_POST['course_of_study'];
    //$prog = @$_POST['prog'];
    $nok_phone = @$_POST['nok_phone'];
    $session = @$_POST['session'];
    $blood_group = @$_POST['blood_group'];
    $exp_date = @$_POST['exp_date'];
    //$iid = $_SESSION['username'].$oid;
    $sql = "SELECT * FROM tblstudent WHERE  reg_number = '$reg_Num'";
    $message ='';
    $alert = '';
    $rows = mysqli_num_rows(mysqli_query($dbc, $sql));
    if ($rows == 1) {
       // $_SESSION['danger'] = 'Record already Exist';
        $message .= 'Sorry, Record Exist<br>';
        $alert = 'alert alert-danger alert-dismissible';
        
        //echo "<meta http-equiv='refresh' content = '0; url = users.php'/>";
    } else {
        //$user = $_SESSION['username'];
        $target_dir = "student_imgs/";
        //sleep(rand(1,3));
        //$text = (@$_FILES["userimage"]["name"]);
        //echo $text;
        $image = explode("/", $reg_Num);

        $image_name = $image[0] . $image[1] . $image[2];
        //$image = "";
        //$name = rand(1, 999);
        $target_file1 = $target_dir . basename(@$_FILES["passport"]["name"]);
        ;
        //echo $target_file;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
        $target_file = $target_dir . $image_name . "." . $imageFileType;
        //$iname = $name.".".$imageFileType;
        $image_name = $image_name . "." . $imageFileType;

        // Check if image file is a actual image or fake image
        @$check = getimagesize(@$_FILES["passport"]["tmp_name"]);


        if ($check !== false) {


            $uploadOk = 1;
            echo "<div class = 'st'>File is an image - " . $check["mime"] . ".</div>";
            $message .= 'File is an image - ' . $check["mime"] . '<br>';
            $alert = 'alert alert-info alert-dismissible';
            //$_SESSION['img'] = 'a';

        } else {


            $uploadOk = 0;
            echo "<div class = 'st'>Sorry, File is not an image.</div>";
            $message .= 'Sorry, File is not an image.<br>';
            $alert = 'alert alert-danger alert-dismissible';
            // $_SESSION['img'] = 'b';
        }

        // Check if file already exists
        if (file_exists($target_file)) {


            $uploadOk = 0;
            //echo "<div class = 'st'>Sorry, file already exists.</div>";
            $message .= 'Sorry, file already exists.<br>';
            $alert = 'alert alert-danger alert-dismissible';
            // $_SESSION['img'] = 'c';
        }
        // Check file size
        if (@$_FILES["passport"]["size"] > 1000000) {


            $uploadOk = 0;
            //echo "<div class = 'st'>Sorry, your file is too large.</div>";
            $message .= 'Sorry, your file is too large.<br>';
            $alert = 'alert alert-danger alert-dismissible';
            // $_SESSION['img'] = 'd';
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {

            $uploadOk = 0;
            //echo "<div class = 'st'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>";
            $message .= 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>';
            $alert = 'alert alert-danger alert-dismissible';
            //$_SESSION['img'] = 'e';

        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
           // echo "<div class = 'st'>Sorry, your file was not uploaded.</div>";
            $message .= 'Sorry, your file was not uploaded.<br>';
            $alert = 'alert alert-danger alert-dismissible';
            // $_SESSION['img'] = 'f';

            // if everything is ok, try to upload file
        } else {

            if (move_uploaded_file(@$_FILES["passport"]["tmp_name"], $target_file)) {

                $s = "INSERT INTO `tblstudent`( `reg_number`, `first_name`, `others` ,`student_phone`, `department`, `faculty`, `nok_phone`, `gender`, `blood_group`, `session`, `course_of_study`, `program_type`, `image_path`, `exp_date`) VALUES 
                ('$reg_Num','$fname','$others','$p_num','$department','$faculty','$nok_phone','$gender','$blood_group','$session','$course_of_study','$programme_Type','$image_name','$exp_date')";
                if (mysqli_query($dbc, $s)) {
                    $message .= 'Record Added Successfully.<br>';
                     $alert = 'alert alert-info alert-dismissible';
                }


                move_uploaded_file(@$_FILES["passport"]["tmp_name"], $target_file);


                echo "<div class = 'st'>The file " . basename(@$_FILES["passport"]["name"]) . " has been uploaded.<div>";
                // $_SESSION['img'] = 'g';
            } else {
                //echo "<div class = 'st'>Sorry, there was an error uploading your file.</div>";
                $message .= 'Sorry, there was an error uploading your file.<br>';
            $alert = 'alert alert-danger alert-dismissible';
                // $_SESSION['img'] = 'h';
                $sub2 = '';
            }
        }
    }
}
//include 'footer.php';


// if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
//     $reg_Num = $_POST['reg_Num'];
//     $name = $_POST['name'];
//     $gender = $_POST['gender'];
//     $p_num = $_POST['p_num'];
//     $course_enrol_id = $_POST['course_enrol_id'];
//     $email = $_POST['email'];
//     $agency = $_POST['agency'];
//     $rank = $_POST['rank'];


//     // if (!empty($reg_num) and !empty($gender) and !empty($name)) {
//         $sql = "INSERT INTO `tblstudent`(`reg_number`, `name`, `phone`, `email`, `agency`, `rank`, `gender`, `course_enrol_id`) VALUES 
//         ('$reg_Num','$name','$p_num','$email','$agency','$rank','$gender','$course_enrol_id')";
//         $result = mysqli_query($dbc, $sql);
//         if (mysqli_affected_rows($dbc) == 1) {
//             $message = 'Record Added Successfully';
//             $alert = 'alert alert-info alert-dismissible';
//         } else {
//             $message = 'Something went wrong, try again';
//             $alert = 'alert alert-danger alert-dismissible';
//         }
//     }
//}



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Add Student</h1>

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
                    //  echo $gender;
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
                            <h3 class="card-title">Add Student Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="student.php" enctype="multipart/form-data" name="enrol_student">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="RegistrationNumber">Registration Number</label>
                                            <input type="text" class="form-control" id="reg_Num"
                                                placeholder="Enter Registration Number" name='reg_Num'>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name">First Name</label>
                                            <input type="text" class="form-control" id="fname" placeholder="Enter First Name"
                                                name='fname'>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="name">Other Names</label>
                                            <input type="text" class="form-control" id="others" placeholder="Enter Other Names"
                                                name='others'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="gender"> Gender </label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="">Select Gender</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="p_num">Phone Number</label>
                                            <input type="text" class="form-control" id="p_num" placeholder="Enter Name"
                                                name='p_num'>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="nok_phone">Next of Kin Phone </label>
                                            <input type="nok_phone" class="form-control" id="nok_phone"
                                                placeholder="Enter Next of Kin Phone" name='nok_phone'>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="text">Department</label>
                                            <input type="text" name="department" class="form-control" id="department">
                                            <!-- <select id="" class="form-control" name='department'>
                                                <option value="">Select Department </option> -->
                                            <?php
                                            // $query = 'SELECT `id`, `name` FROM `tblagencies`';
                                            
                                            // $result = mysqli_query($dbc, $query);
                                            

                                            // while ($row = mysqli_fetch_array($result)) {
                                            //     echo '<option value = '.$row[0].'>' . $row[1] . '</option>';
                                            // }
                                            ?>


                                            <!-- </select> -->
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="faculty">Faculty</label>

                                            <input type="text" name="faculty" class="form-control" id="faculty">

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="session">Session </label>
                                            <input type="session" class="form-control" id="session"
                                                placeholder="Enter session" name='session'>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="course_of_study">Course of Study</label>
                                            <select id="" class="form-control" name='course_of_study'>
                                                <option value="">Select Course of Study </option>
                                                <?php
                                                $query = 'SELECT a.course_id, a.course FROM `tblcourse_enrolment` b JOIN tblcourses a ON a.course_id = b.course_id';

                                                $result = mysqli_query($dbc, $query);


                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo '<option value = ' . $row[0] . '>' . $row[1] . '</option>';
                                                }
                                                ?>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="programme Type">Mode of Entry </label>
                                            <input type="programme_Type" class="form-control" id="programme_Type"
                                                placeholder="Enter programme Type" name='programme_Type'>
                                        </div>
                                    </div>
                                

                                <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="text">Expiry Date</label>
                                            <input type="text" name="exp_date" id="exp_date" class="form-control">

                                        </div>
                                    </div>
                            </div>
                                <div class="row">

                                    

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="image">Picture</label>
                                            <input type="file" name="passport" id="passport" class="form-control">

                                        </div>
                                    </div>
                                    
                                </div>





                   




                    




                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button> &nbsp<a
                            class="btn btn-info" href="courses_his.php">Back</a>
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