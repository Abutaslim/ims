 <?php
 
include ("inc/db.php");
$page="coordinator";
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
                     <h1 class="m-0">Courses History:</h1>
                     

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
        <h3 class="card-title">List of Students</h3> <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i><a href="student.php" style="color:white;"> Student</a></button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Reg Number</th>
                    <th>Student Name</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Faculty</th>
                    <th>Program</th>
                    <th>Entry Mode</th>
                    <th>NOK Phone</th>
                    <th>Expirey Date</th>
                   
                </tr>
            </thead>
            <tbody>

            <?php
            
            $q = 'SELECT * FROM tblstudent' ;
            $r = mysqli_query($dbc, $q);
            if (mysqli_num_rows($r) >= 1) 
            {
                $sn=1;
                
             while( $row = mysqli_fetch_array($r))   
             {
                echo '<tr>
                <td>'.$sn.'</td>
                <td>'.$row['reg_number'].'</td>
                <td>'.$row[2].' '.$row[3].'</td>';
                $gender = $row['gender']=='M' ? "Male" : "Female";
             echo   '<td>'.$gender.'</td>
             <td>'.$row[9].'</td>

                <td>'.$row[4].'</td>
                
                <td>'.$row[5].'</td>
                <td>'.$row[6].'</td>
                <td>'.$row[11].'</td>
                <td>'.$row['program_type'].'</td>
                <td>'.$row['nok_phone'].'</td>

                
                <td>'.$row['exp_date'].'</td>'
                
                ;
                
           echo '</tr>';
            $sn+=1;
             }
              
            }
            
            ?>
                
                
              
               
            </tbody>
            <tfoot>
                <tr>
                <th>S/N</th>
                    <th>Reg Number</th>
                    <th>Student Name</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Faculty</th>
                    <th>Program</th>
                    <th>Entry Mode</th>
                    <th>NOK Phone</th>
                    <th>Expirey Date</th>
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
