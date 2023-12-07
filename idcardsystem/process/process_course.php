<?php
require('../inc/db.php');

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = $_POST['course_name'];
    $duration = $_POST['duration'];
    $fees = $_POST['fees'];
    $status = $_POST['status'];
    $percentage = $_POST['percentage'];
    $category   = $_POST['category'];

    if ($status == 'on') {
        $status = 1;
    } else {
        $status = 0;
    }
    if (!empty($course_name) and !empty($fees) and !empty($duration)) {
        $sql = "INSERT INTO `tblcourses`( `course`, `category_id`, `duration`, `fee`, `institution_percentage`, 
        `status`, `trans_by`) VALUES ('$course_name','$category','$duration','$fees','$percentage', '$status','ubaz')";
        $result = mysqli_query($dbc, $sql);
        if (mysqli_affected_rows($dbc) == 1) {
            $message = 'Record Added Successfully for '. $course_name ;
            $alert = 'alert alert-info alert-dismissible';
        } else {
            $message = 'Something went wrong, try again for '. $course_name;
            $alert = 'alert alert-danger alert-dismissible';
        }
    }
}
echo ' <div style="width:100%; margin-left:0%"> <div class="' .
         $alert .'"> <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-info"></i> Alert!</h5>' .
         $message .'</div></div>';
 

?>




