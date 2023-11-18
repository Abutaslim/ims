 <?php
 
 include 'inc/db.php';
 include 'inc/top-menu.php';
 $page = 'agencies';
 include 'inc/aside.php';
 
 if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
     $agency_name = $_POST['agency_name'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $state = $_POST['state'];
     $fullname = $_POST['fullname'];
 
     if (!empty($agency_name) and !empty($state) and !empty($fullname)) {
         $sql = "INSERT INTO `tblagencies`(`name`, `state`, `contact_person`, `phone`, `email`, `address`) VALUES
          ('$agency_name','$state','$fullname','$phone','$email', '$address')";
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
                     <h1 class="m-0">Add Agency</h1>

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
                     <div class="card card-primary">
                         <div class="card-header">
                             <h3 class="card-title">Add Agency Form</h3>
                         </div>
                         <!-- /.card-header -->
                         <!-- form start -->
                         <form method="POST" action="add_agency.php" name="add_agency">
                             <div class="card-body">
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputFullName">Agency Name</label>
                                             <input type="text" class="form-control" id="exampleInputEmail1"
                                                 placeholder="Enter Agency Name" name='agency_name'>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputPassword1">Contact Person</label>
                                             <input type="text" class="form-control" id="exampleInputPassword1"
                                                 placeholder="Enter Contact Person" name="fullname">
                                         </div>
                                     </div>

                                 </div>
                                 <div class="row">
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputPassword1">Phone Number</label>
                                             <input type="text" class="form-control" id="exampleInputPassword1"
                                                 placeholder="Enter Phone Number" name='phone'>
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="form-group">
                                             <label for="exampleInputEmail1">Email address</label>
                                             <input type="email" class="form-control" id="exampleInputEmail1"
                                                 placeholder="Enter email" name='email'>
                                         </div>
                                     </div>


                                 </div>


                                 <div class="row">

                                     <div class="col-sm-6">
                                            <div class="form-group">
                                                    <label for="exampleInputPassword1"> State </label>
                                                    <select id="" class="form-control" name="state">
                                                        <option value="kano">kano</option>
                                                        <option value="Jigawa">Jigawa</option>
                                                        <option value="Katsina">Katsina</option>
                                                        <option value="Kaduna">Kaduna</option>
                                                        


                                                    </select>

                                            </div>
                                     </div>

                                     <div class="col-sm-6">
                                         <label for="">Address</label><br>
                                         <input type="text" class="form-control" id="exampleInputEmail1"
                                             placeholder="Enter Address" name='address'>
                                     </div>

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
