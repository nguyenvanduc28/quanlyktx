<?php
include_once '../class/sinhvien.php';
include_once '../class/lopsinhvien.php';
include_once '../class/khoa.php';
include_once '../class/thannhan.php';
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$sinhvien = new sinhvien();
$currentSinhvien = $sinhvien->getCurrentSinhvien();
$lopp = new lopsinhvien();
$idLop = $currentSinhvien['lop_id'];
$tenLop = $lopp->getLopName($idLop);
$allLop = $lopp->getAllLop();

$khoa = new khoa();
$allKhoa = $khoa->getAllKhoa();


$thannhan = new thannhan();
$currentThannhan = $thannhan->getCurrentThannhan();





?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <script src="https://kit.fontawesome.com/a78794d350.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/nav-root.css">
  <link rel="stylesheet" href="./css/taikhoan.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Tài khoản</title>

</head>

<body>
  <?php require './inc/nav-root.php'; ?>
  <div class="taikhoan-root">
    <h1>Quản lý hồ sơ</h1>

    <form action="updatesinhvien.php" method="post">
      <div class="form-floating mb-3">
        <label for="hovaten">Họ và tên</label>
        <input type="text" class="form-control" id="hovaten" disabled value="<?= $currentSinhvien['ten'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="mssv">MSSV</label>
        <input type="text" class="form-control" id="mssv" disabled value="<?= $currentSinhvien['mssv'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" disabled value="<?= $currentSinhvien['email'] ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="cccd">Số CCCD</label>
        <input type="text" class="form-control" id="cccd" placeholder="Số Căn cước công dân" name="cccd" required value="<?= $currentSinhvien['cccd'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="sdt">Số điện thoại</label>
        <input type="text" class="form-control" id="sdt" placeholder="SĐT" name="sdt" required value="<?= $currentSinhvien['sdt'] ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="ngaysinh">Ngày sinh</label>
        <input type="date" class="form-control" id="ngaysinh" placeholder="Ngày sinh" required name="ngaysinh" value="<?= $currentSinhvien['ngaysinh'] ?>">
      </div>
      <div class="form-floating mb-3">
        <label for="diachi">Địa chỉ</label>
        <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" required name="diachi" value="<?= $currentSinhvien['diachi'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="lop">Lớp</label>
        <select class="form-control" name="lop" id="lop" required>
          <option selected>Lớp</option>
          <?php
          if (is_array($allLop)){ foreach ($allLop as $value) {
            if ($value['id'] == $currentSinhvien['lop_id']) {
              echo '<option value="' . $value['id'] . '" selected >' . $value['ten'] . ' </option>';
            } else {
              echo '<option value="' . $value['id'] . '">' . $value['ten'] . ' </option>';
            }
          }}
          ?>
        </select>
      </div>

      <div class="form-floating mb-3">
        <label for="khoa">Khóa</label>
        <select class="form-control" name="khoa" id="khoa" required>
          <option selected>Khóa</option>

          <?php
          foreach ($allKhoa as $value) {
            if ($value['id'] == $currentSinhvien['khoa_id']) {
              echo '<option value="' . $value['id'] . '" selected >' . $value['ten'] . ' </option>';
            } else {
              echo '<option value="' . $value['id'] . '">' . $value['ten'] . ' </option>';
            }
          }
          ?>
        </select>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="gioitinh" id="nam" disabled value="Nam" <?= $currentSinhvien['gioitinh'] == 'Nam' ? 'checked' : '' ?>>
        <label class="form-check-label" for="nam">Nam</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gioitinh" id="nu" disabled value="Nữ" <?= $currentSinhvien['gioitinh'] == 'Nữ' ? 'checked' : '' ?>>
        <label class="form-check-label" for="nu">Nữ</label>
      </div>
      <br>
      <button type="submit" class="btn btn-primary btn-block mb-4">Cập nhật</button>

    </form>

    <br>





    <h2>Người giám hộ</h2>

    <form action="updategiamho.php" method="post">

      <div class="form-floating mb-3">
        <label for="tengh">Họ và tên</label>
        <input type="text" class="form-control" id="tengh" placeholder="Họ và tên" required name="tengh" value="<?= $currentThannhan['ten'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="ngaysinhgh">Ngày sinh</label>
        <input type="date" class="form-control" id="ngaysinhgh" placeholder="Ngày sinh" required name="ngaysinhgh" value="<?= $currentThannhan['ngaysinh'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="sdtgh">Số điện thoại</label>
        <input type="text" class="form-control" id="sdtgh" placeholder="Số điện thoại" required name="sdtgh" value="<?= $currentThannhan['sdt'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="diachigh">Địa chỉ</label>
        <input type="text" class="form-control" id="diachigh" placeholder="Địa chỉ" required name="diachigh" value="<?= $currentThannhan['diachi'] ?>">
      </div>

      <div class="form-floating mb-3">
        <label for="nghenghiepgh">Nghề nghiệp</label>
        <input type="text" class="form-control" id="nghenghiepgh" placeholder="Nghề nghiệp" required name="nghenghiepgh" value="<?= $currentThannhan['nghenghiep'] ?>">
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gioitinhgh" id="namgh" value="Nam" <?= $currentThannhan['gioitinh'] == 'Nam' ? 'checked' : '' ?>>
        <label class="form-check-label" for="namgh">Nam</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gioitinhgh" id="nugh" value="Nữ" <?= $currentThannhan['gioitinh'] == 'Nữ' ? 'checked' : '' ?>>
        <label class="form-check-label" for="nugh">Nữ</label>
      </div>

      <button type="submit" class="btn btn-primary btn-block mb-4">Cập nhật</button>

    </form>
    <br>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>


</html>