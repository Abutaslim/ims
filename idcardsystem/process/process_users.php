<?php
require '../inc/db.php';

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['email'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $role = $_POST['role'];

    if ($status == 'on') {
        $status = 1;
    } else {
        $status = 0;
    }

    if (!empty($username) and !empty($fullname) and $role !== 'Select') {
        $get_result = mysqli_query($dbc, "select * from tblusers where email = '$username'");
        if ($get_result->num_rows > 0) {
            $message = 'Record Exist with ' .$username;
            $alert = 'alert alert-danger alert-dismissible';
        } else {
            $sql = "INSERT INTO tblusers (`email`, `fullname`, `phone`, `role`, `status`, `trans_by`)  
             VALUES ('$username','$fullname','$phone','$role','1','ubaz')";
            $result = mysqli_query($dbc, $sql);
            if (mysqli_affected_rows($dbc) == 1) {
                $message = 'Record Added Successfully';
                $alert = 'alert alert-info alert-dismissible';
            } else {
                $message = 'Something went wrong, try again';
                $alert = 'alert alert-danger alert-dismissible';
            }
        }
    } else {
        $message = 'Check the inputs and try again';
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
