<?php 
include('connect.php');
session_start();


if(isset($_SESSION['myid'])){
    $myid = $_SESSION['myid'];
}else{
    $_SESSION['error'] = "Please login before use";
    header('location:../page_login/login.php');
}


if(isset($_POST['create_post'])){
    $p_text = $_POST['p_text'];
    $img = $_FILES['file']['tmp_name'];

    if($img != ''){
        $type = strrchr($_FILES['file']['name'],".");
        $newname = $numrand.$type;
        $path = "../photo/";
        $pathupload = $path.$newname;
        move_uploaded_file($_FILES['file']['tmp_name'],$pathupload);
    }

    $query_insert  = "INSERT INTO `tb_posts`(`p_memberid`, `p_text`, `p_img`) VALUES ($myid,'$p_text','$newname')";
    $_SESSION['success'] = "โพสต์สำเร็จ !";
    mysqli_query($conn,$query_insert);
    header('location:../page_post/post.php');
   
}

if(isset($_POST['edit_post'])){
    $pid = $_POST['pid'];
    $p_text = $_POST['p_text'];
    $img  = $_FILES['file']['tmp_name'];

    if($img != ''){
        $type = strrchr($_FILES['file']['name'],".");
        $newname = $numrand.$type;
        $path = "../photo/";
        $pathupload = $path.$newname;
        move_uploaded_file($_FILES['file']['tmp_name'],$pathupload);
    }

    $query_update = "UPDATE tb_posts SET p_text = '$p_text',p_img = '$newname' WHERE p_id = $pid AND p_memberid = $myid";
    $_SESSION['success'] = "แก้ไขโพสต์สำเร็จ !";
    mysqli_query($conn,$query_update);
    header('location:../page_post/post.php');
}


if(isset($_GET['delete_post'])){
    $pid = $_GET['pid'];
    $query_delete = "DELETE FROM tb_posts WHERE p_id  = $pid AND p_memberid = $myid";
    $_SESSION['success'] = "ลบโพสต์สำเร็จ !";
    mysqli_query($conn,$query_delete);
    header('location:../page_post/post.php');
}