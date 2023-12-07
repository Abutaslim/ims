<?php
// echo "<option value ='2'>22</option>";
echo "<option>Select</option>";
require('../inc/db.php');
$sql = "SELECT * FROM `tbldoc_type` ORDER BY `doc_type` ASC";
$r = mysqli_query($dbc, $sql)  or trigger_error ("Query $sql\n <br\> MySQL Error:" . mysqli_error($dbc));
if(mysqli_num_rows($r) > 0) 
{

    while ($row = mysqli_fetch_assoc($r)) {
        // echo "<option value =>".$row['roles']."</option>";
        echo "<option value='".$row['id']."'>".$row['doc_type']."</option>";
    }
} else {

    // echo "<option value ='2'>2</option>";
}
?>
