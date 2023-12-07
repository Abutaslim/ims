<?php
include 'inc/db.php';
$page = "coordinator";
include 'inc/top-menu.php';

$page = 'course';
include 'inc/aside.php';

if (isset($_POST['submit'])) {

    
    $reg_Num = @$_POST['reg_Num'];
    
    //$iid = $_SESSION['username'].$oid;
    $sql = "SELECT id, image_path FROM tblstudent WHERE  reg_number = '$reg_Num'";
    $message ='';
    $alert = '';
    $id =0;
        $image ='';
    $result = mysqli_query($dbc, $sql);
    $rows = mysqli_num_rows($result);
    if ($rows == 0) {
       // $_SESSION['danger'] = 'Record already Exist';
        $message .= 'Sorry, Record does`nt Exist<br>';
        $alert = 'alert alert-danger alert-dismissible';
        
        //echo "<meta http-equiv='refresh' content = '0; url = users.php'/>";
    } else {
        //$user = $_SESSION['username'];
        
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $image = $row['image_path'];
        }
        
        $target_dir = "student_imgs/";
        if (file_exists($target_dir.$image)) {
            unlink($target_dir.$image);
        }
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

                $s = "UPDATE `tblstudent`SET `image_path` = '$image_name' WHERE id = '$id'";
                if (mysqli_query($dbc, $s)) {
                    $message .= 'Image is changed Successfully.<br>';
                     $alert = 'alert alert-info alert-dismissible';
                }


                move_uploaded_file(@$_FILES["passport"]["tmp_name"], $target_file);
                $message .= "The file " . basename(@$_FILES["passport"]["name"]) . " has been uploaded.<br>";
                $alert = 'alert alert-info alert-dismissible';

                // echo "<div class = 'st'>The file " . basename(@$_FILES["passport"]["name"]) . " has been uploaded.<div>";
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
                    <h1 class="m-0">Change Picture</h1>

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
                            <h3 class="card-title">Change Picture Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="change_picture.php" enctype="multipart/form-data" name="enrol_student">
                            <div class="card-body">
                               
                               

                                    
                                    
                                

                                
                                        <div class="form-group">
                                            <label for="text">Registration Number</label>
                                            <input type="text" name="reg_Num" id="reg_Num" class="form-control">

                                        </div>
                                  
                                    

                                   
                                        <div class="form-group">
                                            <label for="image">Picture</label>
                                            <input type="file" name="passport" id="passport" class="form-control">

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