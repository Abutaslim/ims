 <?php
 include 'inc/db.php';
 include 'inc/top-menu.php'; ?>


 <!-- Main Sidebar Container -->
 <?php
 $page = 'user';
 include 'inc/aside.php';
 
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
     if (!empty($username) and !empty($fullname) and !empty($phone)) {
         $sql = "INSERT INTO tblusers (`email`, `fullname`, `phone`, `role`, `status`, `trans_by`)  
              VALUES ('$username','$fullname','$phone','1','1','ubaz')";
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
                     <h1 class="m-0">Add User</h1>

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

                         <form method="POST" action="add_user.php" name="add_user">
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputFullName">Full Name</label>
                                             <input type="text" class="form-control" id="exampleInputEmail1"
                                                 placeholder="Enter Full Name" name="fullname">
                                         </div>
                                     </div>

                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputEmail1">Email address</label>
                                             <input type="email" class="form-control" id="exampleInputEmail1"
                                                 placeholder="Enter email" name="email">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputPassword1">Phone Number</label>
                                             <input type="text" class="form-control" id="exampleInputPassword1"
                                                 placeholder="Enter Number" name="phone">
                                         </div>
                                     </div>

                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputPassword1"> Role </label>
                                             <select name="role" id="" class="form-control select2bs4"
                                                 style="width: 100%;" name="role">
                                                 <option value="1">Admin</option>
                                                 <option value="2">Coordinator</option>
                                                 <option value="3">Director</option>
                                                 <option value="4">Management</option>
                                                 <option value="5">SA</option>
                                                 <option value="6">TA</option>



                                             </select>

                                         </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                     <div class="col-sm-12">
                                         <label for="">Status</label><br>
                                         <input type="checkbox" checked data-bootstrap-switch data-off-color="danger"
                                             data-on-color="success" name="status">
                                     </div>

                                     <div class="col-sm-6">
                                     </div>
                                 </div>



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
