<?php 

// session_start();
$page= 'index';
// include "inc/header-index.php";
require_once('inc/db.php');


if (isset($_POST["login"]))
{
	$username = trim($_POST['username']);
	$username = mysqli_real_escape_string($dbc, trim($username));

	$password= trim ($_POST['password']);
	$password = mysqli_real_escape_string($dbc, $password);

	$sql = "SELECT * FROM tblusers WHERE email='$username' and password='$password'";
	$result = mysqli_query($dbc, $sql);
	if (mysqli_num_rows($result) == 1) 
	{
		if ($row = mysqli_fetch_array($result)) 
		{
			$_SESSION['user'] = $row['email'];
			$_SESSION['Fullname'] = $row['fullname'];
			$_SESSION['status'] = $row['status'];
      $_SESSION['role'] = $row['role'];
      $no_login= $row['no_login'];
    $no_login++;

        

			if ($row['status'] == 1) {
                $update = mysqli_query($dbc,"UPDATE tblusers SET no_login='$no_login' where email ='$username'");

				$url = './dashboard.php'; //Define the URL.
				header("Location: $url");
			}
			else
			{
				 $type = "alert alert-danger";
				$message = "You are not authorise to use this software";
			}
		


		}
		else
			{
				//  $type = "alert alert-danger";
				// $message = "Wrong Username or Password";
			}

		
	}
	else
			{
				 $type = "alert alert-danger";
				$message = "Wrong Username or Password";
			}


}



?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NITT | MIS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition ">
<!-- <div class="wrapper"> -->
  <!-- Navbar -->
 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper1" style ="width: 70%; margin-left: 15%;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Login Page</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <div id="response" class="<?php 

    if (!empty($_SESSION['reason']))
    {
        $type = "alert alert-danger";
    }
    if(!empty($type)) { echo $type . " display-block"; } ?>"><?php 
        
        if (!empty($_SESSION['reason'])) {
            
            $message = $_SESSION['reason'];
            echo $message;
            $_SESSION['reason']=""; 
        }
        else
        {
            if(!empty($message)) { echo $message;} 
        }
        



?>
</div>
    <!-- Main content -->
    <section class="content1">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Login</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

        <div class="row">
            <div class="col-sm-1 col-md-1 col-lg-1 ">
                
            </div>
		    <div class="col-sm-10 col-md-10 col-lg-10 ">
                
            </div>
        </div>


              <form id="quickForm" name="login" method="POST" action="login.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <!-- <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label> -->
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name = 'login' class="btn btn-primary">Login</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
  <!-- /.control-sidebar -->
<!-- </div> -->
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  
  $('#quickForm').validate({
    rules: {
      username: {
        required: true,
        // email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a valid email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
