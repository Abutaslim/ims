<?php
session_start();
define('LIVE', false);

DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'ims');

// Make the connection:

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// If no connection could be made, trigger an error:
if (!$dbc) {
    trigger_error('Could not connect to MySQL: ' . mysqli_connect_error());
    // echo "string";
} else {
    // Otherwise, set the encoding:
// echo "co";
    // $q = 'select * from tblschoolinfo';
    // $r = mysqli_query($dbc, $q);
    // if (mysqli_num_rows($r) == 1) {
    //     $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    //     define('NAME', $row['name']);
    //     define('ADDRESS', $row['address']);
    //     define('PHONE', $row['phone']);
    //     define('STATE', $row['state']);
    //     define('EMAIL', $row['email']);
    // }

    // mysqli_set_charset($dbc, 'utf8');
}

// echo "sd";
?>
