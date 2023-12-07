<?php
require '../inc/db.php';
$user_id =1;
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    // $reg_Num = $_POST['reg_Num'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $p_num = $_POST['p_num'];
    $course_enrol_id = $_POST['course_enrol_id'];
    $email = $_POST['email'];
    $agency = $_POST['agency'];
    $rank = $_POST['rank'];

   
    if ( !empty($gender) and !empty($name)) {
        $sql = "INSERT INTO `tblstudent`(`name`, `phone`, `email`, `agency`, `rank`, `gender`, `course_enrol_id`) VALUES 
        ('$name','$p_num','$email','$agency','$rank','$gender','$course_enrol_id')";
        $result = mysqli_query($dbc, $sql);
        if (mysqli_affected_rows($dbc) == 1) {
            $message = 'Record Added Successfully';
            $alert = 'alert alert-info alert-dismissible';
        } else {
            $message = 'Something went wrong, try again';
            $alert = 'alert alert-danger alert-dismissible';
        }
    }
    else {
        $message = 'Check the inputs and try again ' ;
        // $message = "name $name reg nio is $reg_Num and gender is $gender";
        $alert = 'alert alert-danger alert-dismissible';
    }
}
echo ' <div style="width:100%; margin-left:0%"> <div class="' .
    $alert .
    '"> <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-info"></i> Alert!</h5>' .
    $message .
    '</div></div>';

?>
