<?php 
session_start();
session_destroy();
header('location:../page_login/login.php');