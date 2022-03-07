<?php 
$local = "localhost";
$user = "root";
$pass = "";
$dbname  = "test_database";

$numrand = (mt_rand());

$conn = mysqli_connect($local,$user,$pass,$dbname) or die ('Error Connect');

mysqli_set_charset($conn,"utf8");