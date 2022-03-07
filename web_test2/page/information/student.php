<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../style/img/Logo1.png" type="image/x-icon">
    <link rel="stylesheet" href="../../style/css/bootstrap.css">
    <link rel="stylesheet" href="../../style/style.css">
    <script src="../../style/js/bootstrap.js"></script>
    <title>ข้อมูลนักเรียน</title>
</head>

<body>

    <header>
        <?php include('../items/header.php') ?>
    </header>
    <div style="height:10rem;"></div>
    <main>
        <div class="row">
            <div class="col-2"></div>
            <div class="col">
                <table class="table table-bordered table-hover">
                    ข้อมูลนักเรียนทั้งหมด
                    <tr>
                        <th>ชาย</th>
                        <th>หญิง</th>
                        <th>รวม </th>
                    </tr>
                    <tr>
                        <td>999</td>
                        <td>819</td>
                        <td>1818</td>
                    </tr>
                </table>
                <table class="table table-bordered table-hover">
                    ประกาศณียบัตรวิชาชีพ ปวช.
                    <tr>
                        <th>ชั้นปี</th>
                        <th>ชาย</th>
                        <th>หญิง</th>
                        <th>รวม</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>256</td>
                        <td>189</td>
                        <td>445</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>222</td>
                        <td>215</td>
                        <td>437</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>201</td>
                        <td>218</td>
                        <td>419</td>
                    </tr>
                    <tr>
                        <td>ตกค้าง</td>
                        <td>74</td>
                        <td>16</td>
                        <td>90</td>
                    </tr>
                    <tr>
                        <td>รวม</td>
                        <td>753</td>
                        <td>638</td>
                        <td>1391</td>
                    </tr>
                </table>

                <table class="table table-bordered table-hover">
                    ประกาศณียบัตรวิชาชีพขั้นสูง ปวส.
                    <tr>
                        <th>ชั้นปี</th>
                        <th>ชาย</th>
                        <th>หญิง</th>
                        <th>รวม</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>131</td>
                        <td>102</td>
                        <td>233</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>92</td>
                        <td>76</td>
                        <td>168</td>
                    </tr>
                    <tr>
                        <td>ตกค้าง</td>
                        <td>23</td>
                        <td>3</td>
                        <td>26</td>
                    </tr>
                    <tr>
                        <td>รวม</td>
                        <td>246</td>
                        <td>181</td>
                        <td>427</td>
                    </tr>
                </table>
            </div>

            <div class="col-2"></div>
        </div>
    </main>
    <footer class=" pt-5">
        <?php include('../items/footer.php') ?>
    </footer>
</body>

</html>