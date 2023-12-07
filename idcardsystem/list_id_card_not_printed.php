<?php
 //session_start();   
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
                      <h1 class="m-0">List of ID Card Not Printed:</h1>
                      
 
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
         <h3 class="card-title">List of Students that their ID Card was Printed </h3><button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i><a href="enrol_student.php" style="color:white;"> Enroll Student</a></button>
     </div>
     <!-- /.card-header -->
     <div class="card-body">
         <table id="example1" class="table table-bordered table-striped">
             <thead>
                 <tr>
                     <th>S/N</th>
                     <th>Reg Nummber</th>
                     <th>Full Name</th>
                     <th>Programme</th>
                     <th>Session</th>
                     
                    
                 </tr>
             </thead>
             <tbody>
 
             <?php
             $course_of_study = $_SESSION['course_of_study'];
             $session = $_SESSION['session'];
             $q = "SELECT reg_number, first_name, others, course_of_study, `session` FROM `tblstudent` where `status` = 0 AND `course_of_study` = '$course_of_study' and session = '$session' ORDER BY `reg_number`,`course_of_study`" ;
             $r = mysqli_query($dbc, $q);
             if (mysqli_num_rows($r) >= 1) 
             {
                 $sn=1;
                 
              while( $row = mysqli_fetch_array($r, MYSQLI_ASSOC))   
              {
                 echo '<tr>
                 <td>'.$sn.'</td>
                 <td>'.$row[ 'reg_number'].'</td>
                 <td>'.$row['first_name']. ' '.$row['others'].'</td>
                 <td>'.$row['course_of_study'].'</td>
                 <td>'.$row['session'].'</td>';
                
                 
            echo '</tr>';
             $sn+=1;
              }
               
             }
             
             ?>
                 
                 
               
                
             </tbody>
             <tfoot>
                 <tr>
                 <th>S/N</th>
                 <th>Reg Nummber</th>
                     <th>Full Name</th>
                     <th>Programme</th>
                     <th>Session</th>
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
 