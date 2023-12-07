<?php
require_once 'vendor/php-excel-reader/excel_reader2.php';
require_once 'vendor/SpreadsheetReader.php';
$user_id = 1;

include 'inc/db.php';
$page = 'coordinator';
include 'inc/top-menu.php';
include 'inc/aside.php';

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['course_enrol_id'])) {
        $course_enrol_id = mysqli_real_escape_string($dbc, $_POST['course_enrol_id']);
        $check = mysqli_query($dbc,"DELETE FROM tblstudent where course_enrol_id = '$course_enrol_id'");
    } else {
        $course_enrol_id = 0;
    }

    if (isset($_POST['doc_type_id'])) {
        $doc_type_id = mysqli_real_escape_string($dbc, $_POST['doc_type_id']);
    } else {
        $doc_type_id = 0;
    }
    $filename = basename($_FILES['file']['name']);
    $file_name = $_FILES['file']['name'];
    $file_type= $_FILES['file']['type'];   
    $fileExt = explode('.', $_FILES['file']['name']);
    $fileActualExt = strtolower(end($fileExt));
    $allowedFileType = array('xls', 'xlsx','docs', 'pdf', 'png', 'jpg','jpeg');

    // $allowedFileType = ['image/gif', 'image/jpeg', 'image/png', ];
    if (in_array($fileActualExt, $allowedFileType)) {
        $message = '';
        $error_message='';
       $new_file_name = $doc_type_id. '_'.$course_enrol_id.' '. time().' '.$_FILES['file']['name'];
        $targetPath = 'files/' .$new_file_name;
       if(move_uploaded_file($_FILES['file']['tmp_name'], $targetPath))
       {
            if (($doc_type_id <> 0) and ($course_enrol_id <> 0 )) {
                $sql = "INSERT INTO `tbldoc`(`doc_type_id`, `doc_file_name`, `course_enrol_id`, `trans_by`) 
                values ('$doc_type_id' , '$new_file_name','$course_enrol_id','ubaz')";
                $result = mysqli_query($dbc, $sql);
                if (mysqli_affected_rows($dbc) > 0) {
                    $message .= 'Record Captured for  ' . $filename . '<br>';
                    $alert = 'alert alert-info alert-dismissible';
                } else {
                    $error_message .= ' Record not captured for ' . $filename . '<br>';
                    $alert = 'alert alert-danger alert-dismissible';
                }
            }
            else
            {
                $error_message = 'Check the inputs and try again';
                $alert = 'alert alert-danger alert-dismissible';
            }
       }
        else{
            $error_message .= ' File not Uploaded for ' . $filename . '<br>';
            $alert = 'alert alert-danger alert-dismissible';
        }
 
        // unlink($targetPath);
    } else {
        
        $alert = 'alert alert-danger alert-dismissible';
       
        $error_message = 'Invalid File Type.<br>';
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

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php
            if(!empty($message)) 
            {
                echo ' <div style="width:100%; margin-left:0%"> <div class="' .
                $alert .
                '"> <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Alert!</h5>' .
                $message .
                '</div></div>';
            } 

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

                <form action="doc.php" method="POST" enctype="multipart/form-data" name="upload_students">

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
                                    <label for="course_enrol_id">Document Type </label><span class='indicator'>
                                        *</span>
                                    <select id="doc_type_id" class="form-control select2bs4" name='doc_type_id'
                                        required>
                                        

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file"
                                                id="file">
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
                                        <th>Course Name</th>
                                        <th>Document Type</th>
                                        <th>Uploaded By</th>
                                        <th>Delete</th>
                                       

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    
                                    $q = "SELECT tblcourse_enrolment.id , concat (tblcourses.course, ' (' , tblcourse_enrolment.start_date, ')') as course_name,tbldoc.doc_file_name, tbldoc_type.doc_type, tbldoc.trans_by  FROM `tblcourse_enrolment` inner join tblcourses on tblcourse_enrolment.course_id = tblcourses.course_id
                                    inner join tbldoc on tbldoc.course_enrol_id = tblcourse_enrolment.id
                                    inner join tbldoc_type on tbldoc.doc_type_id = tbldoc_type.id;";
                                    $r = mysqli_query($dbc, $q);
                                    if (mysqli_num_rows($r) >= 1) {
                                        $sn = 1;
                                    
                                        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                            echo '<tr><td>' .
                                                $sn .
                                                '</td>
                                             <td>' . $row['course_name'] .'</td>
                                             <td><a href="files/'.$row['doc_file_name'].'" target=”_blank”>' . $row['doc_type'] .
                                                '</a></td>
                                                                                                                                <td>' .
                                                $row['trans_by'] .'</td>';
                                   echo '<td><a href="" class = "btn btn-danger btn-sm">Delete </a></td>';
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
                                        <th>Course Name</th>
                                        <th>Document Type</th>
                                        <th>Uploaded By</th>
                                        <th>Delete</th>
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

        
        $("#doc_type_id").load("getters\\getDocType.php");
        // alert("ds");
        //add category
        //add category

        // $("#agency_id").load("getters\\getAgencies.php");



      
    });
</script>
<?php include 'inc/footer.php'; ?>
