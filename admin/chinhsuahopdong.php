<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

include_once '../class/hopdongktx.php';
include_once '../class/phong.php';


$hopdong = new hopdongktx();
$phong = new phong();

if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['sinhvien_id']) and isset($_GET['phong_id'])) {
  $svId = $_GET['sinhvien_id'];
  $pId = $_GET['phong_id'];

  $hd = $hopdong->getHopdongktx($svId);

  $tenphong = $phong->getTenPhong($pId);
} else {
  header("Location: danhsachhopdong.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/a78794d350.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/nav-root.css">
  <link rel="stylesheet" href="./css/chinhsuahopdong.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Admin</title>

</head>

<body>
  <?php require './inc/nav-root.php'; ?>
  <div class="chinhsuahopdong-root">
    <h1>Chỉnh sửa hợp đồng</h1>
    <form action="chinhsuahd.php" method="post">
      <div class="form-floating mb-3">
        <label for="phong">Phòng</label>
        <input type="text" class="form-control" id="phong" disabled name="tenphong" value="<?= $tenphong ?>">
      </div>
      <h3>Sinh viên</h3>
      <div class="form-floating mb-3">
        <label for="hovaten">Họ và tên</label>
        <input type="text" class="form-control" id="hovaten" required name="tensv" value="<?= $hd['tensv'] ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="hovaten">Giới tính</label>
        <input type="text" class="form-control" id="gioitinh" required name="gioitinhsv" value="<?= $hd['gioitinhsv'] ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="ngaysinh">Ngày sinh</label>
        <input type="date" class="form-control" id="ngaysinh" required name="ngaysinhsv" placeholder="Ngày sinh" value="<?= $hd['ngaysinhsv'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="cccd">Số CCCD</label>
        <input type="text" class="form-control" id="cccd" required name="cccdsv" placeholder="cccd" value="<?= $hd['cccdsv'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="sdt">Số điện thoại</label>
        <input type="text" class="form-control" id="sdt" required name="sdtsv" placeholder="SĐT" value="<?= $hd['sdtsv'] ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="diachi">Địa chỉ</label>
        <input type="text" class="form-control" id="diachi" required name="diachisv" placeholder="Địa chỉ" value="<?= $hd['diachisv'] ?>">
      </div>



      <h3>Người giám hộ</h3>
      <div class="form-floating mb-3">
        <label for="hovatengh">Họ và tên</label>
        <input type="text" class="form-control" id="hovatengh" required name="tengh" placeholder="Họ và tên" value="<?= $hd['tengh'] ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="ngaysinhgh">Ngày sinh</label>
        <input type="date" class="form-control" id="ngaysinhgh" required name="ngaysinhgh" placeholder="Ngày sinh" value="<?= $hd['ngaysinhgh'] ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="sdtgh">Số điện thoại</label>
        <input type="text" class="form-control" id="sdtgh" required name="sdtgh" placeholder="SĐT" value="<?= $hd['sdtgh'] ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="diachigh">Địa chỉ</label>
        <input type="text" class="form-control" id="diachigh" required name="diachigh" placeholder="Địa chỉ" value="<?= $hd['diachigh'] ?>">
      </div>

      <br>
      <br>
      <div class="form-floating mb-3">
        <label for="ngaylap">Ngày tạo hợp đồng</label>
        <input type="date" class="form-control" id="ngaylap" required placeholder="Ngày tạo hợp đồng" name="ngaylap" value="<?= $hd['ngaylap'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="ngaybatdau">Ngày bắt đầu</label>
        <input type="date" class="form-control" id="ngaybatdau" required placeholder="Ngày bắt đầu" name="ngaybatdau" value="<?= $hd['ngaybatdau'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="ngayketthuc">Ngày kết thúc</label>
        <input type="date" class="form-control" id="ngayketthuc" required placeholder="Ngày kết thúc" name="ngayketthuc" value="<?= $hd['ngayketthuc'] ?>">
      </div>

      <input type="text" name="sinhvien_id" value="<?= $svId ?>" sv hidden>
      <input type="text" name="phong_id" value="<?= $pId ?>" hidden>

      <button type="submit" class="btn btn-primary btn-block mb-4">Cập nhật</button>
      <br>
    </form>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>