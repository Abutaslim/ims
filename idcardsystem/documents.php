<?php
require_once 'vendor/php-excel-reader/excel_reader2.php';
require_once 'vendor/SpreadsheetReader.php';
$user_id = 1;

include 'inc/db.php';
$page = 'coordinator';
include 'inc/top-menu.php';
include 'inc/aside.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];
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
            

            <!-- Main row -->
            <div class="row">
                <div class="col-sm-12">




                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List of Documents</h3> 
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
                                    inner join tbldoc_type on tbldoc.doc_type_id = tbldoc_type.id where tblcourse_enrolment.id = '$id' ";
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
