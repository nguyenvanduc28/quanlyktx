<?php
include_once '../class/hoadondiennuoc.php';
include_once '../class/phong.php';
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$hoadon = new hoadondiennuoc();
$allHoadon = $hoadon->getAllHoadon();


$phong = new phong();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a78794d350.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/nav-root.css">
    <link rel="stylesheet" href="./css/hoadondiennuoc.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Hóa đơn điện nước</title>

</head>

<body>
    <?php require './inc/nav-root.php'; ?>
    <div class="hoadondiennuoc-root">
        <h1>Hóa đơn điện nước</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Số phòng</th>
                    <th scope="col">Tháng</th>
                    <th scope="col">Điện cũ</th>
                    <th scope="col">Điện mới</th>
                    <th scope="col">Tổng số điện</th>
                    <th scope="col">Tổng tiền điện</th>
                    <th scope="col">Nước cũ</th>
                    <th scope="col">Nước mới</th>
                    <th scope="col">Tổng số nước</th>
                    <th scope="col">Tổng tiền nước</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Trạng thái thanh toán</th>
                    <th scope="col">Ngày thanh toán</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array($allHoadon)) {
                    foreach ($allHoadon as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $phong->getTenPhong($value['phong_id']) ?></td>
                            <td><?= $value['thang'] ?></td>
                            <td><?= $value['chisodiencu'] ?></td>
                            <td><?= $value['chisodienmoi'] ?></td>
                            <td><?= $value['tongsodien'] ?></td>
                            <td><?= $value['tongtiendien'] ?></td>
                            <td><?= $value['chisonuoccu'] ?></td>
                            <td><?= $value['chisonuocmoi'] ?></td>
                            <td><?= $value['tongsonuoc'] ?></td>
                            <td><?= $value['tongtiennuoc'] ?></td>
                            <td><?= $value['tongtien'] ?></td>
                            <td><?= $value['trangthaithanhtoan'] ? 'Đã thanh toán' : 'Chưa thanh toán' ?></td>
                            <td><?= empty($value['ngaythanhtoan']) ? 'Chưa thanh toán' : $value['ngaythanhtoan'] ?></td>
                <?php }
                } else echo 'Không có thông tin'; ?>
            </tbody>
        </table>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>


</html>