 <?php
 
 include 'inc/db.php';
 
 include 'inc/top-menu.php'; ?>


 <!-- Main Sidebar Container -->
 <?php
 $page = 'director';
 include 'inc/aside.php';
 ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-12">
                     <h1 class="m-0">Agencies</h1>

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




                     <div class="card">
                         <div class="card-header">
                             <h3 class="card-title">List of Agencies</h3> <button type="button"
                                 class="btn btn-primary float-right"><i class="fas fa-plus"></i><a href="add_agency.php"
                                     style="color:white;"> Add Agency</a></button>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>S/N</th>
                                         <th>Agency Name</th>
                                         <th>State</th>
                                         <th>Contact Name</th>
                                         <th>Phone</th>
                                         <th>Email</th>

                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     
                                     $q = 'SELECT tblagencies.* FROM `tblagencies` ';
                                     $r = mysqli_query($dbc, $q);
                                     if (mysqli_num_rows($r) >= 1) {
                                         $sn = 1;
                                         while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                             echo '<tr>
                                             <td>'.$sn.'</td>
                                                                                          <td>' .
                                                 $row['name'] .
                                                 '</td>
                                                                                          <td>' .
                                                 $row['state'] .
                                                 '</td>
                                                                                          <td>' .
                                                 $row['contact_person'] .
                                                 '</td>';
                                             // $role = $row['status']==1 ? "Checked" : "";
                                             echo '<td>' .
                                                 $row['phone'] .
                                                 '</td>
                                                                                          <td>' .
                                                 $row['email'] .
                                                 '</td>
                                                                                      </tr>';
                                                                                      $sn+=1;
                                         }
                                     }
                                     
                                     ?>


                                 </tbody>
                                 <tfoot>
                                     <tr>
                                         <th>S/N</th>
                                         <th>Agency Name</th>
                                         <th>State</th>
                                         <th>Contact Name</th>
                                         <th>Phone</th>
                                         <th>Email</th>
                                     </tr>
                                 </tfoot>
                             </table>
                         </div>
                         <!-- /.card-body -->
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
