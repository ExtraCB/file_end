<!DOCTYPE html>
<html lang="en">
<?php 
include('../services/connect.php');
session_start();

if(isset($_SESSION['myid'])){
    $myid = $_SESSION['myid'];
    $query_myself = "SELECT * FROM tb_users WHERE u_memberid  = $myid";
    $result_myself = mysqli_query($conn,$query_myself);
    $fetch_myself = mysqli_fetch_assoc($result_myself);
}else{
    header('location:../page_login/login.php');
}


$query_select_post_all = "SELECT * FROM tb_posts,tb_users WHERE u_memberid = p_memberid ORDER BY p_id DESC";
$result_select_post_all = mysqli_query($conn,$query_select_post_all);

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.0.0-beta2-dist/css/bootstrap.css">
    <script src="../bootstrap-5.0.0-beta2-dist/js/bootstrap.js"></script>
    <script src="../bootstrap-5.0.0-beta2-dist/js/bootstrap.bundle.js"></script>
    <title>Social</title>
</head>

<body style="background-color: whitesmoke;">
    <?php
    include("../item_web/header.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6 mb-3">
                <div class="card mt-5" style="border-radius: 20px;">
                    <form action="../services/post_system.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="d-flex">
                                <img src="../photo/<?php echo $fetch_myself['u_img'] ?>" alt="" class="rounded img-fluid" width="80px">
                                <input type="text" class="form-control ms-3" name="p_text" id="" aria-describedby="helpId" placeholder="ใส่ความคิดของคุณ" style="border-radius: 10px;" required>
                            </div>
                            <div class="d-flex mt-2">
                                <input type="file" class="form-control" name="file" id="" style="border-radius: 10px;" required>
                                <button type="submit" name="create_post" class="btn btn-info ms-2" style="border-radius: 10px;">Post</button>
                                <button type="reset" class="btn btn-danger ms-2" style="border-radius: 10px;">reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
               <?php
               include("../item_web/item_col4.php");
               ?>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6  mb-5">
                <?php while($fetch_post_all = mysqli_fetch_array($result_select_post_all)){
                    $mpid = $fetch_post_all['p_memberid'];
                    $pid = $fetch_post_all['p_id'];
                    $query_comment = "SELECT * FROM tb_comments,tb_users WHERE c_pid = $pid AND u_memberid = c_memberid ORDER BY c_id DESC";
                    $result_comment = mysqli_query($conn,$query_comment);
                    ?>
                <div class="card mb-5" style="border-radius: 20px;">
                    <div class="card-body">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td>
                                        <img src="../photo/<?php  echo $fetch_post_all['u_img'] ?>" alt="" class="rounded img-fluid" width="50px">

                                    </td>
                                    <td>
                                        <p class="ms-3"><?php  echo $fetch_post_all['u_username'] ?></p>
                                    </td>
                                    <td>
                                        <p class="ms-3"><?php  echo $fetch_post_all['p_timestamp'] ?></p>
                                    </td>
                                    <td>

                                        <!--  trigger modal -->

                                        <?php if($myid == $mpid) {?>
                                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#Editpost<?php echo $pid?>">
                                            <p class="h3" style="color: black;">...</p>
                                        </a>
                                        <?php }?>
                                        <!-- Modal -->
                                        <div class="modal fade" id="Editpost<?php echo $pid?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Editpost</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="../services/post_system.php" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <table width="100%">
                                                            <tbody>
                                                                <tr>
                                                                <td>
                                                                     <img src="../photo/<?php  echo $fetch_post_all['u_img'] ?>" alt="" class="rounded img-fluid" width="50px">

                                                                    </td>
                                                                 <td>
                                                                        <p class="ms-3"><?php  echo $fetch_post_all['u_username'] ?></p>
                                                                    </td>
                                                                    <td>
                                                                     <p class="ms-3"><?php  echo $fetch_post_all['p_timestamp'] ?></p>
                                                                 </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="border-bottom mt-2"></div>
                                                        <div>
                                                            <p class="ms-5 mt-3">สิ่งที่คุณคิดจะแสดงที่นี้</p>
                                                            <textarea name="p_text" class="form-control" id="" required><?php  echo $fetch_post_all['p_text'] ?></textarea>
                                                        </div>
                                                        <div class="mt-3">
                                                    
                                                           <img src="../photo/<?php  echo $fetch_post_all['p_img'] ?>" alt="" width="100%" required>
                                                        </div>
                                                        <input type="file" class="form-control mt-3" name="file" id="" style="border-radius: 10px;" required>
                                                        <input type="hidden" name="pid" value="<?php echo $pid ?>">
                                                    </div>
                                                    <div class="modal-footer">

                                                        <a href="../services/post_system.php<?php echo "?pid=$pid&delete_post=1" ?>"><button type="button" class="btn btn-danger" onclick="return confirm('คุณแน่ใจที่จะทำการลบหรือไม่')">ลบ</button></a>
                                                        <button type="submit" name="edit_post" class="btn btn-primary">ตกลง</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="border-bottom mt-2"></div>
                        <div>
                            <p class="ms-5 mt-3"><?php  echo $fetch_post_all['p_text'] ?></p>
                            <div class="mt-3">
                                <img src="../photo/<?php  echo $fetch_post_all['p_img'] ?>" alt="" width="100%">
                            </div>
                            <div class="card mt-3 p-3">
                              <?php while($fetch_comment_all = mysqli_fetch_array($result_comment)) {
                                  $cid = $fetch_comment_all['c_id'];
                                  $cmid = $fetch_comment_all['c_memberid'];
                                  ?>
                              <table width="100%">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="../photo/<?php echo $fetch_comment_all['u_img'] ?>" alt="" class="rounded img-fluid" width="50rem">

                                            </td>
                                            <td>
                                                <p class="ms-3"><?php echo $fetch_comment_all['u_username'] ?></p>
                                            </td>
                                            <td>
                                                <p class="ms-3"><?php echo $fetch_comment_all['c_timestamp'] ?></p>
                                            </td>
                                            <td>
                                                <!--  trigger modal -->

                                               <?php if($myid == $cmid) {?>
                                               <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#Editcomments<?php echo $cid ?>">
                                                    <p class="h3" style="color: black;">...</p>
                                                </a>
                                               <?php } ?>
                                                <!-- Modal -->
                                                <div class="modal fade" id="Editcomments<?php echo $cid ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Editcomments</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                           <form action="../services/comment_system.php" method="post">
                                                           <div class="modal-body">
                                                                <table width="100%">
                                                                    <tbody>
                                                                        <tr>
                                                                        <td>
                                                <img src="../photo/<?php echo $fetch_comment_all['u_img'] ?>" alt="" class="rounded img-fluid" width="50rem">

                                            </td>
                                            <td>
                                                <p class="ms-3"><?php echo $fetch_comment_all['u_username'] ?></p>
                                            </td>
                                            <td>
                                                <p class="ms-3"><?php echo $fetch_comment_all['c_timestamp'] ?></p>
                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div class="border-bottom mt-2"></div>
                                                                <div>
                                                                    <p class="ms-5 mt-3">สิ่งที่คุณคิดจะแสดงที่นี้</p>
                                                                    <textarea name="c_text" class="form-control" id=""><?php echo $fetch_comment_all['c_text'] ?></textarea>
                                                                    <input type="hidden" name="cid" value="<?php  echo $cid ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                               <a href="../services/comment_system.php<?php  echo "?cid=$cid&delete_comment=1" ?>"> <button type="button" class="btn btn-danger" onclick="return confirm('คุณแน่ใจที่จะทำการลบหรือไม่')">ลบ</button></a>
                                                                <button type="submit" name="edit_comment" class="btn btn-primary">ตกลง</button>
                                                            </div>
                                                           </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div>
                                    <p class="ms-4"><?php echo $fetch_comment_all['c_text'] ?></p>
                                    <div class="border-bottom mt-2"></div>
                                </div>
                              <?php  } ?>
                            </div>
                         </div>             
                        <form action="../services/comment_system.php" method="post">
                        <div class="d-flex mt-2">
                        <input type="text" class="form-control" name="c_text" id="" aria-describedby="helpId" placeholder="">
                        <input type="hidden"  name="pid" value="<?php echo $pid ?>">
                        <button type="submit" class="btn btn-outline-secondary" name="create_comment">ตกลง</button>
                        </div>
                        </form>
                    </div>
                   
                </div>
                <?php } ?>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>

</html>