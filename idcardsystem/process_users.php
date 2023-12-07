<?php
require('../inc/db.php');

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
    if (!empty($username) and !empty($fullname) and $role !== "Select") {
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
    else
    {
       $message = 'Something went wrong, try again';
            $alert = 'alert alert-danger alert-dismissible';
    }
}


?>




