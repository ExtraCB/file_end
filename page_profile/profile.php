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
        <div style="height: 150px;"></div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card mt-3" style="border-radius: 10px;">
                    <div class="card-body">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td rowspan="3">
                                        <img src="../photo/<?php echo $fetch_myself['u_img'] ?>" alt="" class="rounded img-fluid" width="250px">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p class="h5 ms-4"><?php echo $fetch_myself['u_username'] ?></p>
                                    </td>
                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modelId">Editprofile</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Editprofile</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link active" id="img-tab" data-bs-toggle="tab" data-bs-target="#img" type="button" role="tab" aria-controls="img" aria-selected="true">img</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="information-tab" data-bs-toggle="tab" data-bs-target="#information" type="button" role="tab" aria-controls="information" aria-selected="false">information</button>
                                                            </li>
                                                            <li class="nav-item" role="presentation">
                                                                <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">password</button>
                                                            </li>
                                                        </ul>

                                                        <!-- Tab panes -->
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade show active" id="img" role="tabpanel" aria-labelledby="img-tab">
                                                                <div class="card shadow" style="border-radius: 10px;">
                                                                    <form action="../services/edit_system.php" method="post" enctype="multipart/form-data">
                                                                        <div class="card-body">
                                                                            <div align="center">
                                                                                <img src="../photo/<?php echo $fetch_myself['u_img'] ?>" alt="" class="rounded img-fluid" width="100px">
                                                                            </div>
                                                                           
                                                                            <div>
                                                                                <input type="file" class="form-control mt-3" name="file" id="" style="border-radius: 10px;" required>
                                                                            </div>
                                                                            <div align="right">
                                                                                <button type="submit" name="edit_img" class="btn btn-primary mt-3">ตกลง</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="informatione-tab">
                                                                <form action="../services/edit_system.php" method="post">
                                                                    <div class="card shadow" style="border-radius: 10px;">
                                                                        <div class="card-body">
                                                                            <div class="mb-3">
                                                                                <label for="" class="form-label">Username</label>
                                                                                <input type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder="<?php echo $fetch_myself['u_username'] ?>" required style="border-radius: 10px;" readonly>
                                                                                
                                                                            </div>
                                                                            <div class="d-flex">
                                                                                <div class="mb-3">
                                                                                    <label for="" class="form-label">tel</label>
                                                                                    <input type="text" class="form-control" name="tel" id="" aria-describedby="helpId" value="<?php echo $fetch_myself['u_tel'] ?>" required style="border-radius: 10px;" required>
                                                                                    <small id="helpId" class="form-text text-muted">กรุณาใส่เบอร์โทรศัพท์ของคุณ</small>
                                                                                </div>
                                                                                <div class="mb-3 ms-3">
                                                                                    <label for="" class="form-label">address</label>
                                                                                    <input type="text" class="form-control" name="address" id="" aria-describedby="helpId" value="<?php echo $fetch_myself['u_address'] ?>" required style="border-radius: 10px;" required>
                                                                                    <small id="helpId" class="form-text text-muted">กรุณาใส่ address ของคุณ</small>
                                                                                </div>

                                                                            </div>
                                                                            <div align="right">
                                                                                <button type="submit" name="edit_info" class="btn btn-primary mt-3">ตกลง</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                            <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                                                                <form action="../services/edit_system.php" method="post">
                                                                    <div class="card shadow" style="border-radius: 10px;">
                                                                        <div class="card-body">
                                                                            <div class="mb-3">
                                                                                <label for="" class="form-label">password ปัจจุบัน</label>
                                                                                <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="password" required style="border-radius: 10px;" required>
                                                                                <small id="helpId" class="form-text text-muted">กรุณาใส่ password ของคุณ</small>
                                                                            </div>
                                                                                <div class="mb-3">
                                                                                    <label for="" class="form-label">password ใหม่</label>
                                                                                    <input type="password" class="form-control" name="new_password" id="" aria-describedby="helpId" placeholder="password" required style="border-radius: 10px;" required>
                                                                                    <small id="helpId" class="form-text text-muted">กรุณาใส่ password ของคุณ</small>
                                                                                </div>
                                                                            <div align="right">
                                                                                <button type="submit" name="edit_password" class="btn btn-primary mt-3">ตกลง</button>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="tel: <?php echo $fetch_myself['u_tel'] ?>" required style="border-radius: 10px;" readonly>

                                    </td>
                                    <td>
                                        <input type="text" class="form-control ms-2" name="" id="" aria-describedby="helpId" placeholder="address: <?php echo $fetch_myself['u_address'] ?>" required style="border-radius: 10px;" readonly>

                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>

</html>