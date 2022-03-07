<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <div class="d-flex">
            <img src="../../style/img/Logo1.png" alt="" style="width:3rem">
            <a class="navbar-brand p-2" href="#">Pntc Information</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">เมนู</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../main/homepage.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../reward/reward.php">รางวัลที่ได้รับ </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">ข้อมูล</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="../information/department.php">แผนกที่เปิดสอน</a>
                            <a class="dropdown-item" href="../information/manager.php">ผู้บริหาร</a>
                            <a class="dropdown-item" href="../information/student.php">นักศึกษา</a>
                            <a class="dropdown-item" href="../information/personnel.php">บุคลากร</a>
                        </div>
                    </li>
                </ul>
                <a href="../../../index.php"> <button type="button" name="" id="" class="btn btn-danger w-100">งานที่
                        3</button></a>
            </div>
        </div>
    </div>
</nav>