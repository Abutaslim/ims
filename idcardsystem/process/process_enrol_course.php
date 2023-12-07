<?php
require('../inc/db.php');
$user_id =1;
$message='';
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    $course_name = $_POST['course_id'];
    $category_id    = $_POST['category_id'];
    // $category_classification = $_POST['category_classification'];
    $course_participating = $_POST['course_participating'];
    $sdate = $_POST['sdate'];
    if (empty($sdate))
    {
        $message.="Select Starting Date <br>";
    }
    $sdate = date_create($sdate);
    $sdate  = date_format($sdate,'Y-m-d');


    $edate = $_POST['edate'];
    if (empty($edate))
    {
        $message.="Select Ending Date <br>";
    }



    $edate = date_create($edate);
    $edate  = date_format($edate,'Y-m-d');

    $venue_name = $_POST['venue_name'];
    $fees = $_POST['fees'];
    $course_budget = $_POST['course_budget'];
    $no_participants = $_POST['no_participants'];
    $revenue = $_POST['revenue'];
    $inst_percentage = $_POST['inst_percentage'];
    $agency = $_POST['agency'];

    if ($course_name == 'select')
    {
        $message.="Select Course Name <br>";
    }


    if ($venue_name == 'Select')
    {
        $message.="Select Venue Name <br>";
    }

    


    if ($category_id == 'Select')
    {
        $message.="Select Course Classification <br>";
    }

    if ($fees == 0)
    {
        $message.="Provide Fees <br>";
    }

    if ($no_participants == 0)
    {
        $message.="Provide No of Participants <br>";
    }

    if ($revenue == 0)
    {
        $message.="Provide Revenue <br>";
    }
    if ($course_budget == 0)
    {
        $message.="Provide Course Budget <br>";
    }

    if ($inst_percentage == 0)
    {
        $message.="Provide Savings to Institution <br>";
    }

    if ($agency == 'Select')
    {
        $message.="Select Agency<br>";
    }
    

    // $revenue= $no_participants * $fees;

    // $inst_percentage = $no_participants * $fees - $course_budget;

    if (empty($message)) {
        $check = mysqli_query($dbc,"select * from tblcourse_enrolment 
        where course_id = '$course_name' and coordinator_id= '$user_id' and start_date = '$sdate' 
        and ending_date = '$edate' and no_participants = '$no_participants' and 
        course_fee = '$fees' and course_budget = '$course_budget' and venue_id = '$venue_name'");
        if (mysqli_num_rows($check) >= 1)
        {
            $message = 'Record Exist';
            $alert = 'alert alert-danger alert-dismissible';
        }
        else
        {
            $sql = "INSERT INTO `tblcourse_enrolment`( `course_id`, `coordinator_id`, 
            `course_classification`, `venue_id`, `agency_id`,no_participants, `course_fee`,course_budget, 
            `per_institution`, `start_date`, `ending_date`, `status`)
            
            VALUES ('$course_name','$user_id','$category_id','$venue_name',
            '$agency','$no_participants','$fees','$course_budget','$inst_percentage', '$sdate', '$edate', 'approved')";
            $result = mysqli_query($dbc, $sql);
            if (mysqli_affected_rows($dbc) == 1) {
                $message = 'Record Added Successfully ';
                $alert = 'alert alert-info alert-dismissible';
            } else {
                $message = 'Something went wrong, try again ';
                $alert = 'alert alert-danger alert-dismissible';
            }
        }

        
    }
   else {
        $message .= 'Check the inputs and try again';
        $alert = 'alert alert-danger alert-dismissible';
    }
}
echo ' <div style="width:100%; margin-left:0%"> <div class="' .
    $alert .
    '"> <button type="button" class="close" data-dismiss="alert"  aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-info"></i> Alert!</h5>' .
    $message .
    '</div></div>';

?>
