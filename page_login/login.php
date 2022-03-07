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
        <div style="height: 15rem;"></div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">

                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body">
                        <form action="../services/login_system.php" method="post">
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
                            <div align="center">
                                <button type="submit" class="btn btn-primary shadow w-75" name="login" style="border-radius: 10px">เข้าสู่ระบบ</button>
                            </div>
                        </form>

                        <div class="border-bottom mt-3"></div>
                        <div align="center">
                            <a href="../page_login/register.php"><button type="submit" class="btn btn-success shadow mt-3" style="border-radius: 10px;">ลงทะเบียนเข้าใช้งาน</button></a>
                            
                            <a href="../web_test2/"><button  class="btn btn-success shadow mt-3" style="border-radius: 10px;" >งานที่ 2</button></a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</body>

</html>