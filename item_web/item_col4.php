<?php 
include('../services/connect.php');

if(isset($_SESSION['myid'])){
    $myid = $_SESSION['myid'];
    $query_myself = "SELECT * FROM tb_users WHERE u_memberid  = $myid";
    $result_myself = mysqli_query($conn,$query_myself);
    $fetch_myself = mysqli_fetch_assoc($result_myself);
}else{
    header('location:../page_login/login.php');
}


$query_user_all = "SELECT * FROM tb_users WHERE u_memberid != $myid";
$result_user_all = mysqli_query($conn,$query_user_all);


?>

<div class="card-body mt-5 position-fixed">
    <table width="100%">
        <tbody>
            <tr>
                <td>
                    <img src="../photo/<?php echo $fetch_myself['u_img'] ?>" alt="" class="rounded img-fluid" width="80rem">

                </td>
                <td>
                    <p class="h6 ms-4"><?php echo $fetch_myself['u_username'] ?></p>
                </td>
                <td>
                    <a href="../page_profile/profile.php" class="nav-link ms-4">Profile</a>
                </td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody>
            <tr>
                <td colspan="2">
                    <p class="h5 mt-3" style="color: gray;">ผู้ใช้งานในระบบ</p>

                </td>
                <td></td>
                </tr>
            <?php while($fetch_user_all = mysqli_fetch_array($result_user_all)){ 

                ?>
            <tr>
            <td>
                    <img src="../photo/<?php echo $fetch_user_all['u_img'] ?>" alt="" class="rounded img-fluid" width="40rem">

                </td>
                <td>
                    <p class="ms-4"><?php echo $fetch_user_all['u_username'] ?></p>
                </td>
            </tr>

            <?php  } ?>
        
        </tbody>
    </table>

</div>