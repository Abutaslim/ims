<?php
require_once 'vendor/php-excel-reader/excel_reader2.php';
require_once 'vendor/SpreadsheetReader.php';
$user_id = 1;

<<<<<<< HEAD
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-12">
                     <h1 class="m-0">Courses History:</h1>
                     
=======
include 'inc/db.php';
$page = 'coordinator';
include 'inc/top-menu.php';
include 'inc/aside.php';
>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['course_enrol_id'])) {
        $course_enrol_id = mysqli_real_escape_string($dbc, $_POST['course_enrol_id']);
        $check = mysqli_query($dbc,"DELETE FROM tblstudent where course_enrol_id = '$course_enrol_id'");
    } else {
        $course_enrol_id = 0;
    }

    if (isset($_POST['agency_id'])) {
        $agency_id = mysqli_real_escape_string($dbc, $_POST['agency_id']);
    } else {
        $agency_id = 0;
    }

    $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    if (in_array($_FILES['members_file']['type'], $allowedFileType)) {
        $message = '';
        $error_message='';
        $targetPath = 'uploads/' .$user_id. '_'. time().$_FILES['members_file']['name'];
        move_uploaded_file($_FILES['members_file']['tmp_name'], $targetPath);

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());
        // echo $sheetCount;
        // $message = '<br>Subject: <b>' . $subject . '</b><br>Level:<b>' . $level . '</b><br> Session: <b>' . $session . '</b><br>';
        for ($i = 0; $i < $sheetCount; $i++) {
            $Reader->ChangeSheet($i);
            $n=0;

            foreach ($Reader as $Row) {
                $n++;
                $name = '';

                if (isset($Row[1])) {
                    $name = mysqli_real_escape_string($dbc, $Row[1]);
                }

                $gender = '';
                if (isset($Row[2])) {
                    $gender = mysqli_real_escape_string($dbc, $Row[2]);
                }
                $phone = $email = $agency = $rank = '';
                if (isset($Row[3])) {
                    $phone = mysqli_real_escape_string($dbc, $Row[3]);
                }
                if (isset($Row[4])) {
                    $email = mysqli_real_escape_string($dbc, $Row[4]);
                }
                if (isset($Row[5])) {
                    $agency = mysqli_real_escape_string($dbc, $Row[5]);
                }
                if (isset($Row[6])) {
                    $rank = mysqli_real_escape_string($dbc, $Row[6]);
                }
                if($n<> 1){
                    if (!empty($name) and ($course_enrol_id <> 0 )) {
                        $sql = "INSERT INTO tblstudent (`name`, phone, email, agency, rank, gender, course_enrol_id) 
                        values ('$name' , '$phone','$email','$agency_id','$rank', '$gender', '$course_enrol_id')";
                        $result = mysqli_query($dbc, $sql);
                        if (mysqli_affected_rows($dbc) > 0) {
                            $message .= 'Record Captured for  ' . $name . '<br>';
                            $alert = 'alert alert-info alert-dismissible';
                        } else {
                            $error_message .= ' Record not captured for ' . $name . '<br>';
                            $alert = 'alert alert-danger alert-dismissible';
                        }
                    }
                    else
                    {
                        $message = 'Check the inputs and try again';
                        $alert = 'alert alert-danger alert-dismissible';
                    }
                }

                
            } //ending for each
        } //Ending sheets
        // unlink($targetPath);
    } else {
        
        $alert = 'alert alert-danger alert-dismissible';
       
        $error_message = 'Invalid File Type. Upload Excel File.<br>';
    }
}

//  <!-- Main Sidebar Container -->

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

<<<<<<< HEAD
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Enrolled Courses</h3> <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i><a href="enrol_student.php" style="color:white;"> Enroll Student</a></button>
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
                    <th>Phne</th>
                    <th>Email</th>
                    <th>Rank</th>
                    <th>Agency Name</th>
                    <th>Course</th>
                   
                </tr>
            </thead>
            <tbody>
=======
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php
<<<<<<< HEAD
            
            $q = 'SELECT a.`reg_number`, a.`name`, a.`phone`, a.`email`, b.`name` as agency, a.`rank`, a.`gender`, c.`course` FROM `tblstudent` a 
            JOIN tblagencies b ON a.agency = b.id join tblcourses c ON c.course_id = a.course_enrol_id' ;
            $r = mysqli_query($dbc, $q);
            if (mysqli_num_rows($r) >= 1) 
            {
                $sn=1;
                
             while( $row = mysqli_fetch_array($r, MYSQLI_ASSOC))   
             {
                echo '<tr>
                <td>'.$sn.'</td>
                <td>'.$row['reg_number'].'</td>
                <td>'.$row['name'].'</td>';
                $gender = $row['gender']=='M' ? "Male" : "Female";
             echo   '<td>'.$gender.'</td>
                <td>'.$row['phone'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['rank'].'</td>
                <td>'.$row['agency'].'</td>
                
                <td>'.$row['course'].'</td>';
                
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
                    <th>Phne</th>
                    <th>Email</th>
                    <th>Rank</th>
                    <th>Agency Name</th>
                    <th>Course</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
=======
            if(!empty($message)) 
            {
                echo ' <div style="width:100%; margin-left:0%"> <div class="' .
                $alert .
                '"> <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Alert!</h5>' .
                $message .
                '</div></div>';
            } 
>>>>>>> c3d04cc92fe67578ab00ea1ef48a41df536778b9

            if(!empty($error_message))
            {
                echo ' <div style="width:100%; margin-left:0%"> <div class="' .
                $alert .
                '"> <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Alert!</h5>' .
                $error_message .
                '</div></div>';
            }
           
            ?>
            <!-- upload students via excel -->
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Upload Students</h3>
                </div>

                <form action="students.php" method="POST" enctype="multipart/form-data" name="upload_students">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="course_enrol_id">Course Enrolment ID </label><span class='indicator'>
                                        *</span>
                                    <select id="" class="form-control select2bs4" name='course_enrol_id'
                                        required>
                                        <option value="">Select Course Enrolment ID </option>
                                        <?php
                                        $query = "SELECT tblcourse_enrolment.id , concat (tblcourses.course, ' (' , tblcourse_enrolment.start_date, ')') as course_name  FROM `tblcourse_enrolment` inner join tblcourses on tblcourse_enrolment.course_id = tblcourses.course_id";
                                        
                                        $result = mysqli_query($dbc, $query);
                                        
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<option value = ' . $row[0] . '>' . $row[1] . '</option>';
                                        }
                                        ?>


                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="course_enrol_id">Agencies </label><span class='indicator'>
                                        *</span>
                                    <select id="agency_id" class="form-control select2bs4" name='agency_id'
                                        required>
                                        

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="members_file"
                                                id="members_file">
                                            <label class="custom-file-label" for="MembersFile">Choose file</label>
                                        </div>
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-primary btn-flat" data-toggle="modal"
                                                data-target="#modal-overlay">Submit!</button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <!-- Main row -->
            <div class="row">
                <div class="col-sm-12">




                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of Enrolled Students</h3> <button type="button"
                                class="btn btn-primary float-right"><i class="fas fa-plus"></i><a
                                    href="enrol_student.php" style="color:white;"> Enroll Student</a></button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <!-- <th>Reg Number</th> -->
                                        <th>Student Name</th>
                                        <th>Gender</th>
                                        <th>Phne</th>
                                        <th>Email</th>
                                        <th>Rank</th>
                                        <th>Agency Name</th>
                                        <th>Course</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    
                                    $q = "SELECT  a.`name`, a.`phone`, a.`email`, b.`name` as agency, a.`rank`, a.`gender`,concat( d.course,' (' , c.start_date,')') as course FROM `tblstudent` a JOIN tblagencies b ON a.agency = b.id join tblcourse_enrolment c ON c.id = a.course_enrol_id inner join tblcourses d on d.course_id = c.course_id;";
                                    $r = mysqli_query($dbc, $q);
                                    if (mysqli_num_rows($r) >= 1) {
                                        $sn = 1;
                                    
                                        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                            echo '<tr>
                                                                                                                                                                                                     <td>' .
                                                $sn .
                                                '</td>
                                                                                                                                                                                                     <td>' .
                                                $row['name'] .
                                                '</td>';
                                            $gender = $row['gender'] == 'M' ? 'Male' : 'Female';
                                            echo '<td>' .
                                                $gender .
                                                '</td>
                                                                                                                                                                                                     <td>' .
                                                $row['phone'] .
                                                '</td>
                                                                                                                                                                                                     <td>' .
                                                $row['email'] .
                                                '</td>
                                                                                                                                                                                                     <td>' .
                                                $row['rank'] .
                                                '</td>
                                                                                                                                                                                                     <td>' .
                                                $row['agency'] .
                                                '</td>
                                                                                                                                                                                                     
                                                                                                                                                                                                     <td>' .
                                                $row['course'] .
                                                '</td>';
                                    
                                            echo '</tr>';
                                            $sn += 1;
                                        }
                                    }
                                    
                                    ?>




                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <!-- <th>Reg Number</th> -->
                                        <th>Student Name</th>
                                        <th>Gender</th>
                                        <th>Phne</th>
                                        <th>Email</th>
                                        <th>Rank</th>
                                        <th>Agency Name</th>
                                        <th>Course</th>
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
<script type="text/javascript" src="./dist/js/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        // alert("ds");
        //add category
        //add category

        $("#agency_id").load("getters\\getAgencies.php");



      
    });
</script>
<?php include 'inc/footer.php'; ?>
