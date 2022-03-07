<!DOCTYPE html>
<html lang="en">

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
    <div class="container">
        <div style="height: 5rem;"></div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="../services/login_system.php" method="post" enctype="multipart/form-data">
                    <div class="card shadow" style="border-radius: 20px;">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="" aria-describedby="helpId" placeholder="Username" required style="border-radius: 10px;">
                                <small id="helpId" class="form-text text-muted">กรุณาใส่ Username ของคุณ</small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="password" required style="border-radius: 10px;">
                                <small id="helpId" class="form-text text-muted">กรุณาใส่ password ของคุณ</small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tel</label>
                                <input type="text" class="form-control" name="tel" id="" aria-describedby="helpId" placeholder="tel" required style="border-radius: 10px;">
                                <small id="helpId" class="form-text text-muted">กรุณาใส่เบอร์โทรศัพท์ของคุณ</small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="" aria-describedby="helpId" placeholder="address" required style="border-radius: 10px;">
                                <small id="helpId" class="form-text text-muted">กรุณาใส่ address ของคุณ</small>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Profile</label>
                                <input type="file" class="form-control" name="file" id="" style="border-radius: 10px;">
                                <small id="helpId" class="form-text text-muted">กรุณาใส่รูปภาพของคุณ</small>
                            </div>
                            <div class="border-bottom mt-3"></div>
                            <div align="center">
                                <button type="submit" class="btn btn-primary shadow mt-3" name="register" style="border-radius: 10px;">ลงทะเบียน</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>

</html>