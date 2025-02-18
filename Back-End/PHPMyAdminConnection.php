<?php

$servername = "sql1.njit.edu";
$username = "kv398";
$password = "X1C0vsM76%g";
$dbname = "kv398";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>