<?php
// session_start();
include 'inc/db.php';
// require_once __DIR__ . '/vendor/autoload.php';
require_once "./vendor/autoload.php";
// $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
$mpdf = new \Mpdf\Mpdf();

if (isset($_POST['sdate'])) 
{
	// summary for dg
$sdate = $_POST['sdate'];
$edate = $_POST['edate'];
	// code...
	
		
		// $trip_id = $_GET['trip_id'];
		$a = file_get_contents("http://localhost/nitttraining/pdf_summary_course.php?sdate=".$sdate."&edate=". $edate);

		$mpdf->WriteHtml($a);
		//$invoice_no =get_invoice_no($dbc,$station_id, $trip_id);
		$file_name =  $sdate." to ".$edate." payment details.pdf";
		// $mpdf->output("report.pdf" , "D");
		$mpdf->output($file_name , "D");
	

	// if ($type == 'method') 
	// {

		
	// 	// $trip_id = $_GET['trip_id'];
	// 	$a = file_get_contents("http://localhost/hospital/cashier/pdf_payment_method.php?sdate=".$sdate."&edate=". $edate."&username=". $cashiername);

	// 	$mpdf->WriteHtml($a);

	// 	//$invoice_no =get_invoice_no($dbc,$station_id, $trip_id);
	// 	$file_name = $sdate." to ".$edate." report by mode of payment.pdf";
	// 	// $mpdf->output("report.pdf" , "D");
		
	// 	$mpdf->output($file_name , "D");
	// }
}


if (isset($_GET["type"]))
{
	$type = $_GET["type"];
	

	if($type == "course_details")
	{
		$id = $_GET["id"];
		$a = file_get_contents("http://localhost/nitttraining/pdf_course_details.php?id=".$id);

		$mpdf->WriteHtml($a);
		//$invoice_no =get_invoice_no($dbc,$station_id, $trip_id);
		$file_name =  $id." details.pdf";
		// $mpdf->output("report.pdf" , "D");
		$mpdf->output($file_name , "D");
	
	}
}


//======================================
// require('inc/db.php');


// ==================================
?>