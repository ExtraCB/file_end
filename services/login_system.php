<?php 
include('connect.php');
session_start();



if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $img = $_FILES['file']['tmp_name'];


    $query_check = "SELECT * FROM tb_users WHERE  u_username = '$username'";
    $result_check = mysqli_query($conn,$query_check);

    if(mysqli_num_rows($result_check) == 0){
        if($img != ''){
            $type = strrchr($_FILES['file']['name'],".");
            $newname = $numrand.$type;
            $path = "../photo/";
            $pathupload = $path.$newname;
            move_uploaded_file($_FILES['file']['tmp_name'],$pathupload);
        }else{
            $newname = "no.jpg";
        }

        $query_insert = "INSERT INTO `tb_users`(`u_username`, `u_password`, `u_tel`, `u_address`, `u_img`) VALUES ('$username','$password','$tel','$address','$newname')";
        mysqli_query($conn,$query_insert);
        $_SESSION['success'] = "Register Success !";
        header('location:../page_login/login.php');
        
    }else{
        $_SESSION['error'] = "Email or Username already to use";
        header('location:../page_login/register.php');
    }
}


if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query_check = "SELECT * FROM tb_users WHERE u_username = '$username' AND u_password = '$password' LIMIT 1";
    $result_check = mysqli_query($conn,$query_check);
    $fetch_check = mysqli_fetch_assoc($result_check);

    if(mysqli_num_rows($result_check) != 0){
        $_SESSION['myid'] = $fetch_check['u_memberid'];
        $_SESSION['success'] = "Login Success !";
        header('location:../page_post/post.php');

    }else{
        $_SESSION['error'] = "Username Or password Wrong!";  
        header('location:../page_login/login.php');
    }
}