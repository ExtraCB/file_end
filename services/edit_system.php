<?php
include('connect.php');
session_start();


if(isset($_SESSION['myid'])){
    $myid = $_SESSION['myid'];
}else{
    $_SESSION['error'] = "Please login before use";
    header('location:../page_login/login.php');
}

if(isset($_POST['edit_info'])){
    $tel = $_POST['tel'];
    $address = $_POST['address'];

    $query_update = "UPDATE tb_users SET u_tel = '$tel',u_address = '$address' WHERE  u_memberid = $myid";
    mysqli_query($conn,$query_update);
    $_SESSION['success'] = "แก้ไขข้อมูลส่วนตัวสำเร็จ !";
    header('location:../page_profile/profile.php');
}

if(isset($_POST['edit_password'])){
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];


    $query_check = "SELECT * FROM tb_users WHERE u_memberid = $myid AND u_password = '$password'";
    $result_check = mysqli_query($conn,$query_check);
    

    if(mysqli_num_rows($result_check) == 0){
        $_SESSION['error'] = "Current Password Wrong";
        header('location:../page_profile/profile.php');
    }else{
        $query_update = "UPDATE tb_users SET u_password = '$new_password' WHERE u_memberid = $myid";
        mysqli_query($conn,$query_update);
        $_SESSION['success'] = "แก้ไขข้อมูลส่วนตัวสำเร็จ !";
        header('location:../page_profile/profile.php');
    }
}

if(isset($_POST['edit_img'])){
    $img = $_FILES['file']['tmp_name'];

        if($img != ''){
            $type = strrchr($_FILES['file']['name'],".");
            $newname = $numrand.$type;
            $path = "../photo/";
            $pathupload = $path.$newname;
            move_uploaded_file($_FILES['file']['tmp_name'],$pathupload);
        }

        $query_update = "UPDATE tb_users SET u_img = '$newname' WHERE u_memberid = $myid";
        mysqli_query($conn,$query_update);
        $_SESSION['success'] = "แก้ไขข้อมูลส่วนตัวสำเร็จ !";
        header('location:../page_profile/profile.php');

}