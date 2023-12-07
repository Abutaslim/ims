<?php
// echo "<option value ='2'>22</option>";
echo "<option>Select</option>";
require('../inc/db.php');
$sql = "select * from tblvenue order by id";
$r = mysqli_query($dbc, $sql)  or trigger_error ("Query $sql\n <br\> MySQL Error:" . mysqli_error($dbc));
if(mysqli_num_rows($r) > 0) 
{

    while ($row = mysqli_fetch_assoc($r)) {
        // echo "<option value =>".$row['roles']."</option>";
        echo "<option value='".$row['id']."'>".$row['venue_name']."</option>";
    }
} else {

    // echo "<option value ='2'>2</option>";
}
?>
