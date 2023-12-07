<!DOCTYPE html>
<html>

<head>
    <title>Payment </title>
    <style type="text/css">
        body {
            font-family: dejavusanscondensed;

        }

        table,
        th,
        td {
            border: 1px solid;
            border-collapse: collapse;
        }

        span {
            bold: true;

        }
    </style>
</head>

<body>

    <div style="">
        <div style="text-align: center;">
            <img src="./imgs/logo.png" style="width:50px;height: 50px;">
            <h2 style="border:none;margin-bottom: 0px;">NITT Training Department Participant Information System </h2>
            <span style="margin-top:0px;border:none;">No: 1 Idi Bukar Road,Datata Jumaat MOsque, Behind Al-saudat CBT
                Center, Kano State</span>
        </div>

        <div style="text-align: center;">
            <!-- <h3>NITT Training Department Participant Information System -->



            <!-- </h3> -->
            <h4>
                <?php
                include 'inc/db.php';
                $role_id  =4;
                $course_id = $_GET['id'];
                $total_no_participants = $total_budget = $total_courses = $total_renveue_generated = $total_saving = 0;
                
                $sql = "SELECT  tblcourse_enrolment.id,tblusers.fullname, tblcourses.course, tblusers.fullname, 
                tblcourse_enrolment.course_classification,tblcourse_enrolment.no_participants,
                 tblvenue.venue_name, course_fee,per_institution,start_date,ending_date, 
                 tblagencies.name, tblcourse_enrolment.course_budget FROM `tblcourse_enrolment` 
                 inner join tblcourses on tblcourse_enrolment.course_id = tblcourses.course_id 
                 inner join tblusers on tblusers.id = tblcourse_enrolment.coordinator_id 
                 inner join tblvenue on tblvenue.id =tblcourse_enrolment.venue_id
                 inner join tblagencies on tblagencies.id = tblcourse_enrolment.agency_id
                 where  tblcourse_enrolment.id = '$course_id' ";
                $result = mysqli_query($dbc, $sql);
                if (mysqli_num_rows($result) == 1) {
                    if ($row = mysqli_fetch_array($result)) {
                        $course_name = $row['course'];
                        $revenu_generated = $row['no_participants'] * $row['course_fee'];
                        $total_renveue_generated += $revenu_generated;
                        $total_budget += $row['course_budget'];
                        $total_courses += 1;
                        $total_no_participants += $row['no_participants'];
                        $total_saving += $row['per_institution'];
                        $start = $row['start_date'];
                        $end = $row['ending_date'];
                        $coordinator_name = $row['fullname'];
                    }
                }
                
                echo '<h2>Course Details for ' . $course_name . '</h2>';
                // echo "<br>Cashier: ".$cashiername;
                ?>

        </div>

        <div style="text-align:center;border: none; margin-left: 0%; margin-right:0%; text-align: center;">

        </div>


        <div style="border: none; margin-left: 5%; margin-right:20%; text-align: left;">
            <h2>Course Summary</h2>
            <div id="details" style="border:none;font-size:15px;">

                <p>
                    <strong>1. Course Coordinator: <?php echo $coordinator_name; ?></strong><br>
                    <strong>2. Number of Participants: <?php echo number_format($total_no_participants); ?></strong><br>
                    <strong>3. Revenue Generated: ₦ <?php echo number_format($total_renveue_generated); ?></strong><br>
                    <strong>4. Course Budget: ₦ <?php echo number_format($total_budget); ?></strong><br>
                    <strong>5. Savings to The Institute: ₦ <?php echo number_format($total_saving); ?></strong><br>
                    <strong>6. Course Commencement Date: <?php echo date_format(date_create($start), 'd-m-Y'); ?></strong><br>
                    <strong>7. Course Finishing Date: <?php echo date_format(date_create($end), 'd-m-Y'); ?></strong><br>


                </p>
            </div>
            <div id="details" style="border:none;">
                <img src="./imgs/logo.png" style="height:50%; width:50%;" alt="">
            </div>
            <br>

            <?php 
            
            if($role_id !== 4)
            {
            
            
            ?>
                                <div>
                                    <h3>List of Participants</h3>
                                    <table name='table' class='table table-bordered'
                style="border:none; margin-right: 10px; width: 100%; text-align:center">
                                        <thead>
                                            <tr>
                                                <td style="width:5%;">S/N</td>
                                                <td style="width:35%;">Full Name</td>
                                                <td style="width:15%;">Gender</td>
                                                <td style="width:25%;">Phone</td>
                                               

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $r = mysqli_query($dbc,"select * from tblstudent where course_enrol_id = '$course_id'");
                                        $sn = 1;
                                        while ($row = mysqli_fetch_array($r)) {
                                        echo '<tr>
                                        <td>'.$sn.'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['gender'].'</td>
                                        <td>'.$row['phone'].'</td>
                                       
                                    </tr>';
                                    $sn+=1;
                                    }

                                    ?>


                                        </tbody>         

                                    </table>
                                    
                                </div>

                                <?php 
            
           
            }
            
            ?>
                                

        </div>

    </div>

</body>

</html>
