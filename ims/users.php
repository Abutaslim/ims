 <?php
 
include ("inc/db.php");
$page="director";
 include 'inc/top-menu.php';
 
 //  <!-- Main Sidebar Container -->
 include 'inc/aside.php';
 ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-12">
                     <h1 class="m-0">Users:</h1>
                     

                 </div><!-- /.col -->

             </div><!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">

             <!-- Main row -->
             <div class="row">
                 <div class="col-sm-12">
                    



<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Users</h3> <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i><a href="add_user.php" style="color:white;"> Add User</a></button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Reset Passord</th>
                   
                </tr>
            </thead>
            <tbody>

            <?php
            
            $q = 'select tblusers.*, tblroles.role as r from tblusers inner join tblroles on tblroles.id = tblusers.role';
            $r = mysqli_query($dbc, $q);
            if (mysqli_num_rows($r) >= 1) 
            {
                $sn=1;
                
             while( $row = mysqli_fetch_array($r, MYSQLI_ASSOC))   
             {
                echo '<tr>
                <td>'.$sn.'</td>
                <td>'.$row['fullname'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['r'].'</td>';
                $role = $row['status']==1 ? "Checked" : "";
                echo '<td><input type="checkbox"  name="my-checkbox" '. $role.' data-bootstrap-switch data-off-color="danger" data-on-color="success"></td>
                <td><input type="submit"  class="btn btn-success btn-sm" value="Reset"></td>
            </tr>';
            $sn+=1;
             }
              
            }
            
            ?>
                
                
              
               
            </tbody>
            <tfoot>
                <tr>
                    <th>S/N</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Reset Passord</th>
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
