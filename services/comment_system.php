<?php 
include('connect.php');
session_start();


if(isset($_SESSION['myid'])){
    $myid = $_SESSION['myid'];
}else{
    $_SESSION['error'] = "Please login before use";
    header('location:../page_login/login.php');
}



if(isset($_POST['create_comment'])){
    $pid = $_POST['pid'];
    $c_text = $_POST['c_text'];

    $query_insert = "INSERT INTO tb_comments (c_pid,c_memberid,c_text) VALUES ($pid,$myid,'$c_text')";
    mysqli_query($conn,$query_insert);
    $_SESSION['success'] = "Comment success";
    header('location:../page_post/post.php');

}


if(isset($_POST['edit_comment'])){
    $cid = $_POST['cid'];
    $c_text = $_POST['c_text'];

    $query_update = "UPDATE tb_comments SET c_text  = '$c_text' WHERE c_id = $cid AND c_memberid = $myid";
    mysqli_query($conn,$query_update);
    $_SESSION['success'] = "Edit Comment success";
    header('location:../page_post/post.php');

}

if(isset($_GET['delete_comment'])){
    $cid = $_GET['cid'];

    $query_delete = "DELETE FROM tb_comments WHERE c_id = $cid AND c_memberid = $myid";
    mysqli_query($conn,$query_delete);
    $_SESSION['success'] = "Delete Comment success";
    header('location:../page_post/post.php');
}