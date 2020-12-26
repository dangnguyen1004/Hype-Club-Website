<?php
session_start();
define("DB_HOST", "sql12.freemysqlhosting.net");
define("DB_USER", "sql12353211");
define("DB_PASS", "VIcgBALTKC");
define("DB_NAME", "sql12353211");

define("DB_HOST", "fdb23.awardspace.net");
define("DB_USER", "3502167_foodcourtdb");
define("DB_PASS", "Xxt]jdoxX1");
define("DB_NAME", "3502167_foodcourtdb");

$con = mysqli_connect("fdb23.awardspace.net", "3502167_foodcourtdb", "Xxt]jdoxX1", "3502167_foodcourtdb");


// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
?>