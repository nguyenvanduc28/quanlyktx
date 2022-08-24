<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

include_once '../class/phong.php';
include_once '../class/sinhvien.php';
include_once '../class/thannhan.php';
include_once '../class/hopdongktx.php';



$sinhvien = new sinhvien();
$phong = new phong();
$thannhan = new thannhan();

if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['sinhvien_id'])) {
  $svId = $_GET['sinhvien_id'];
  $pId = $_GET['phong_id'];


  $sv = $sinhvien->getSinhvien($svId);
  $tenPhong = $phong->getTenPhong($pId);

  $tn = $thannhan->getThannhan($svId);
} else {
  header("Location: duyetdangky.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta  content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/a78794d350.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/nav-root.css">
  <link rel="stylesheet" href="./css/taohopdong.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Admin</title>

</head>

<body>
  <?php require './inc/nav-root.php'; ?>
  <div class="taohopdong-root">
    <h1>Tạo hợp đồng</h1>
    <form action="addhopdong.php" method="post">
    <div class="form-floating mb-3">
        <label for="phong">Phòng</label>
        <input type="text" class="form-control" id="phong" disabled name="tenphong" value="<?= $tenPhong?>">
      </div>
      <h3>Sinh viên</h3>
      <div class="form-floating mb-3">
        <label for="hovaten">Họ và tên</label>
        <input type="text" class="form-control" id="hovaten"  require  name="tensv" value="<?= $sv['ten'] ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="hovaten">Giới tính</label>
        <input type="text" class="form-control" id="gioitinh" require name="gioitinhsv" value="<?= $sv['gioitinh'] ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="ngaysinh">Ngày sinh</label>
        <input type="date" class="form-control" id="ngaysinh"  require name="ngaysinhsv" placeholder="Ngày sinh"   value="<?= $sv['ngaysinh'] ?>">
      </div>
      
      <div class="form-floating mb-3">
        <label for="cccd">Số CCCD</label>
        <input type="text" class="form-control" id="cccd" require  name="cccdsv" placeholder="cccd"   value="<?= $sv['cccd'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="sdt">Số điện thoại</label>
        <input type="text" class="form-control" id="sdt" require  name="sdtsv" placeholder="SĐT"   value="<?= $sv['sdt'] ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="diachi">Địa chỉ</label>
        <input type="text" class="form-control" id="diachi"  require name="diachisv" placeholder="Địa chỉ"   value="<?= $sv['diachi'] ?>">
      </div>



      <h3>Người giám hộ</h3>
      <div class="form-floating mb-3">
        <label for="hovatengh">Họ và tên</label>
        <input type="text" class="form-control" id="hovatengh" require  name="tengh" placeholder="Họ và tên"  value="<?= !empty($tn['ten']) ? $tn['ten'] : ''  ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="ngaysinhgh">Ngày sinh</label>
        <input type="date" class="form-control" id="ngaysinhgh" require name="ngaysinhgh"  placeholder="Ngày sinh"   value="<?= !empty($tn['ngaysinh']) ? $tn['ngaysinh'] : ''  ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="sdtgh">Số điện thoại</label>
        <input type="text" class="form-control" id="sdtgh" require  name="sdtgh" placeholder="SĐT"   value="<?= !empty($tn['sdt']) ? $tn['sdt'] : ''  ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="diachigh">Địa chỉ</label>
        <input type="text" class="form-control" id="diachigh" require  name="diachigh" placeholder="Địa chỉ"   value="<?= !empty($tn['diachi']) ? $tn['diachi'] : ''  ?>">
      </div>
    <br>
    <br>
    <div class="form-floating mb-3">
        <label for="ngaylap">Ngày tạo hợp đồng</label>
        <input type="date" class="form-control" id="ngaylap" require placeholder="Ngày tạo hợp đồng" name="ngaylap">
      </div>

      <div class="form-floating mb-3">
        <label for="ngaybatdau">Ngày bắt đầu</label>
        <input type="date" class="form-control" id="ngaybatdau" require placeholder="Ngày bắt đầu" name="ngaybatdau">
      </div>

      <div class="form-floating mb-3">
        <label for="ngayketthuc">Ngày kết thúc</label>
        <input type="date" class="form-control" id="ngayketthuc" require placeholder="Ngày kết thúc" name="ngayketthuc">
      </div>

      <input type="text" name="sinhvien_id" value="<?= $svId?>" hidden>
      <input type="text" name="phong_id" value="<?= $pId?>" hidden>

      <button type="submit" class="btn btn-primary btn-block mb-4">Tạo hợp đồng</button>
      <br>
    </form>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>