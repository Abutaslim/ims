<?php
include 'inc/db.php';
$page = 'report';
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
                    <h1 class="m-0">Courses:</h1>


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
                            <h3 class="card-title">List of Courses</h3> <button type="button"
                                class="btn btn-primary float-right"><i class="fas fa-plus"></i><a href="add_course.php"
                                    style="color:white;"> Add Course</a></button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Name</th>
                                        <th>Category</th>
                                        <th>Duration(Weeks)</th>
                                        <th>No of Students</th>
                                        <th>Amount Generated (₦)</th>
                                        <th>Inst. %</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    $q = 'SELECT tblcourses.* , tblcategories.category as cat_name FROM `tblcourses` 
                                                inner join tblcategories on tblcategories.id = tblcourses.category_id';
                                    $r = mysqli_query($dbc, $q);
                                    if (mysqli_num_rows($r) >= 1) {
                                        $sn = 1;
                                        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                                            echo '<tr>
                                                    <td>' .
                                                $sn .
                                                '</td>
                                                    <td>' .
                                                $row['course'] .
                                                '</td>
                                                    <td>' .
                                                $row['cat_name'] .
                                                '</td>
                                                    <td>' .
                                                $row['duration'] .
                                                '-Range: (12/05/2023 to 13/06/2023)</td><td>30</td>';
                                            // $role = $row['status']==1 ? "Checked" : "";
                                            echo '<td>' .
                                                $row['fee'] .
                                                '</td>
                                                    <td>' .
                                                $row['institution_percentage'] .
                                                '</td>
                                                </tr>';
                                            $total += $row['fee'];
                                            $sn += 1;
                                        }
                                    }
                                    
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Name</th>
                                        <th>Category</th>
                                        <th>Duration(Weeks)</th>
                                        <th>No of Students</th>
                                        <th>Amount Generated (₦)</th>
                                        <th>Inst. %</th>
                                    </tr>
                                </tfoot>
                            </table>

                            
                        </div>
                        <div class="callout callout-info">
                            <h5>Total Amount Generated for this year: </h5>

                            <p><?php echo "₦ ". number_format( $total,2); ?></p>
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
