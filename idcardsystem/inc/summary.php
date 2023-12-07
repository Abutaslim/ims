<?php

$sql = "SELECT (SELECT sum(tblcourse_enrolment.no_participants) as total_students FROM `tblcourse_enrolment`)  as total_students , 
(SELECT  sum(tblcourse_enrolment.no_participants* tblcourse_enrolment.course_fee) as amount_generated FROM `tblcourse_enrolment`) as amount_generated , 
(SELECT count(tblcourse_enrolment.id) as total_course_enrolled from tblcourse_enrolment ) as total_course_enrolled,
(SELECT sum(tblcourse_enrolment.per_institution) as per_institution from tblcourse_enrolment) as per_institution
";
$result = mysqli_query($dbc,$sql);
if ($result) {
    if ($row = mysqli_fetch_array($result)) {
      $total_students = $row['total_students'];
      $amount_generated = $row['amount_generated'];
      $total_course_enrolled = $row['total_course_enrolled'];
      $per_institution = $row['per_institution'];
    }
}

?>

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo number_format($total_course_enrolled);?></h3>

                <p>Courses Enrolled</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3><?php echo number_format($amount_generated,2);?><sup style="font-size: 20px"></sup></h3>

                <p>Amount Generated (₦)</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>

                <p>Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3><?php echo number_format($per_institution);?></h3>

                <p>Savings to Institution (₦)</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
