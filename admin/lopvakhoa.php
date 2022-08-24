<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();


include_once '../class/lopsinhvien.php';
include_once '../class/khoa.php';

$lop = new lopsinhvien();
$khoa = new khoa();

$allLop = $lop->getAllLop();
$allKhoa = $khoa->getAllKhoa();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a78794d350.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/nav-root.css">
    <link rel="stylesheet" href="./css/lopvakhoa.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Admin</title>

</head>

<body>
    <?php require './inc/nav-root.php'; ?>
    <div class="lopvakhoa-root">
        <h1>Danh sách lớp và khóa</h1>
        <form action="addLop.php" method="post">
            <div class="form-floating mb-3">
                <label for="lop">Tên lớp</label>
                <input type="text" class="form-control" id="lop" require name="ten">
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4">Thêm lớp</button>
        </form>
        <label>Danh sách Lớp</label>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên lớp</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array($allLop)) {
                    foreach ($allLop as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $value['ten'] ?></td>

                            <td><a href="http://ducduckitucxa.epizy.com/admin/xoaLop.php?id=<?= $value['id'] ?>"><button type="button" class="btn btn-primary" <?= $lop->checkLop($value['id']) ? 'disabled' : '' ?>>Xóa</button></a></td>
                    <?php }
                } else echo 'Không có thông tin'; ?>
            </tbody>
        </table>



        
        <form action="addKhoa.php" method="post">
            <div class="form-floating mb-3">
                <label for="khoa">Tên Khóa</label>
                <input type="text" class="form-control" id="khoa" require name="ten">
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4">Thêm khóa</button>
        </form>

        <label>Danh sách Khóa</label>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên khóa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array($allKhoa)) {
                    foreach ($allKhoa as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $value['ten'] ?></td>

                            <td><a href="http://ducduckitucxa.epizy.com/admin/xoaKhoa.php?id=<?= $value['id'] ?>"><button type="button" class="btn btn-primary" <?= $khoa->checkKhoa($value['id']) ? 'disabled' : '' ?>>Xóa</button></a></td>
                    <?php }
                } else echo 'Không có thông tin'; ?>
            </tbody>
        </table>
        <br>
        <br>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>


</html>