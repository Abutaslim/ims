<?php
// ob_start();
session_start();

unlink($_SESSION['user']);

unlink($_SESSION['Fullname']);
unlink($_SESSION['status']);
unlink( $_SESSION['role']);
// $_SESSION = array();
session_destroy();
// ob_start();
// ob_end_clean( ); // Delete the bufferION['us

$url = './login.php'; //Define the URL.

// ob_end_clean( ); // Delete the buffer.
header("Location: $url");

?>