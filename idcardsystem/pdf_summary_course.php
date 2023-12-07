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
		span{
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
				 $total_no_participants = $total_budget = $total_courses = $total_renveue_generated = $total_saving = 0;
				// if (isset($_POST['sdate'])) {
				// 	$sdate = mysqli_real_escape_string($dbc, $_POST['sdate']);
				// 	$starting = mysqli_real_escape_string($dbc, $_POST['sdate']);
				// 	$sdate = date_create($sdate);
				// 	$sdate = date_format($sdate, 'Y-m-d');
				// 	// $check = mysqli_query($dbc,"DELETE FROM tblstudent where course_enrol_id = '$course_enrol_id'");
				// } else {
				// 	$sdate = '';
				// }
			
				// if (isset($_POST['edate'])) {
				// 	$edate = mysqli_real_escape_string($dbc, $_POST['edate']);
				// 	$ending = mysqli_real_escape_string($dbc, $_POST['edate']);
				// 	$edate = date_create($edate);
				// 	$edate = date_format($edate, 'Y-m-d');
				// 	// $check = mysqli_query($dbc,"DELETE FROM tblstudent where course_enrol_id = '$course_enrol_id'");
				// } else {
				// 	$edate = '';
				// }

                $sdate = date('2023-01-01');
				// echo $sdate;
                $edate = date('2023-09-04');
                echo 'Analysis from ' . $sdate . ' To ' . $edate;
                // echo "<br>Cashier: ".$cashiername;
                ?>
            </h4>
        </div>

        <div style="text-align:center;border: none; margin-left: 0%; margin-right:0%; text-align: center;">
            <table name='table' class='table table-bordered'
                style="border:none; margin-right: 10px; width: 100%; text-align:center">
                <thead>

                    <tr>
                        <td style="width:5%;">S/N</td>
                        <td style="width:12%;">Course Name</td>
                        <td style="width:13%;">No of Participants</td>
                        <td style="width:20%;">Fee(₦)</td>
                        <td style="width:15%;">Revenue(₦)</td>
                        <td style="width:10%;">Course Budget(₦)</td>
                        <td style="width:15%;">Savings for Institution(₦)</td>
                        <!-- <td style="width:10%;">Total(₦)</td> -->
                        <!-- <td style="width:8%;">Status</td> -->
                    </tr>
                </thead>
                <tbody>
                    <?php

$sql = "SELECT tblcourses.course, tblusers.fullname, tblcourse_enrolment.course_classification,
tblcourse_enrolment.no_participants, tblvenue.venue_name, course_fee,per_institution,
start_date,ending_date, tblagencies.name, tblcourse_enrolment.course_budget 
FROM `tblcourse_enrolment` 
inner join tblcourses on tblcourse_enrolment.course_id = tblcourses.course_id 
inner join tblusers on tblusers.id = tblcourse_enrolment.coordinator_id 
inner join tblvenue on tblvenue.id =tblcourse_enrolment.venue_id
inner join tblagencies on tblagencies.id = tblcourse_enrolment.agency_id
where  tblcourse_enrolment.start_date >= '$sdate' and tblcourse_enrolment.ending_date <= '$edate'";
$result = mysqli_query($dbc, $sql);
$sn = 1;
while ($row = mysqli_fetch_array($result)) {
$revenu_generated = $row["no_participants"] * $row['course_fee'];
$total_renveue_generated += $revenu_generated;
$total_budget +=$row['course_budget'];
$total_courses += 1;
$total_no_participants += $row['no_participants'];
$total_saving += $row['per_institution'];

	echo "<tr>";
							echo "<td>$sn</td>";
							echo "<td><b>".$row['course']."</b></td>";
							echo "<td><b>". number_format($row['no_participants'],2)."</b></td>";
							echo "<td><b>". number_format($row['course_fee'],2)."</b></td>";
							echo "<td><b>". number_format($revenu_generated,2)."</b></td>";
							echo "<td><b>". number_format($row['course_budget'],2)."</b></td>";
							echo "<td><b>". number_format($row['per_institution'],2)."</b></td>";
							// echo "<td>". number_format($total_by_day,2)."</td>";
						
						echo "</tr>";
						$sn++;
}


                    
                $result_highet_pat_agency = mysqli_query($dbc,"SELECT tblcourse_enrolment.course_id, 
                count(tblcourse_enrolment.agency_id) as `no`, tblagencies.name 
                FROM `tblcourse_enrolment` 
                inner join tblagencies on tblagencies.id =tblcourse_enrolment.agency_id 
                where  tblcourse_enrolment.start_date >= '$sdate' 
                and tblcourse_enrolment.ending_date <= '$edate'
                GROUP by tblcourse_enrolment.agency_id order by no desc limit 1");
                if(mysqli_num_rows($result_highet_pat_agency) == 1) {
                    $no_highset_row = mysqli_fetch_array($result_highet_pat_agency);
                    $agency_name = $no_highset_row["name"];
                    $no_attended = $no_highset_row['no'];
                }

                    ?>
                </tbody>

            </table>
        </div>


		<div style="border: none; margin-left: 0%; margin-right:0%; text-align: left;">

			<h3>Year Summary</h3>
			<hr>
			<div>
				<strong>Total Course Run for the period: <?php if(isset($total_courses)) {echo number_format($total_courses);}?></strong><br>
				<strong>Total No of Participants: <?php if(isset($total_no_participants)) {echo number_format($total_no_participants);}?></strong><br>
				<strong>Total Revenue Generated: ₦ <?php if(isset($total_renveue_generated)) {echo number_format($total_renveue_generated);}?></strong><br>
				<strong>Total Budget: ₦ <?php if(isset($total_budget)) {echo number_format($total_budget);}?></strong><br>
				<strong>Total Savigns for the Institute: ₦ <i><?php if(isset($total_saving)) {echo number_format($total_saving);}?></i></strong><br>
				<strong>Highest Partronising Agency:	<i></i><?php if(isset($agency_name)) {echo ($agency_name);}?></i></strong><br>
			</div>
		</div>

    </div>

</body>

</html>
