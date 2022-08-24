<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

include_once '../class/phong.php';

$phong = new phong();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data['tenphong'] = !empty($_POST['tenphong']) ? $_POST['tenphong'] : null;
  $data['toida'] = !empty($_POST['toida']) ? $_POST['toida'] : null;
  $data['yeucau'] = !empty($_POST['yeucau']) ? $_POST['yeucau'] : null;
  $data['ghichu'] = !empty($_POST['tenphong']) ? $_POST['ghichu'] : null;


  $result = $phong->insertPhong($data);
  if ($result) {
    header("Location:danhsachphong.php");
  } else {
    echo '<script type="text/javascript">alert("Không thể tạo phòng. Hãy thử lại!"); history.back();</script>';
  }
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
  <link rel="stylesheet" href="./css/addphong.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Admin</title>

</head>

<body>
  <?php require './inc/nav-root.php'; ?>
  <div class="addphong-root">
    <h1>Thêm phòng</h1>
    <form action="addphong.php" method="post">
      <div class="form-floating mb-3">
        <label for="tenphong">Tên phòng</label>
        <input type="text" placeholder="Tên phòng" class="form-control" required name="tenphong" id="tenphong">
      </div>

      <div class="form-floating mb-3">
        <label for="toida">Số lượng sinh viên</label>
        <input type="number" placeholder="Số lượng tối đa" class="form-control" required name="toida" id="toida">
      </div>

      <label>Giới tính</label>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="yeucau" id="nam" required value="Nam">
        <label class="form-check-label" for="nam">Nam</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="yeucau" id="nu" required value="Nữ">
        <label class="form-check-label" for="nu">Nữ</label>
      </div>
      <br>
      <div class="form-floating mb-3">
        <label for="cccd">Ghi chú</label>
        <input type="text" class="form-control" id="ghichu" placeholder="Ghi chú" name="ghichu">
      </div>
      <br>
      <button type="submit" class="btn btn-primary btn-block mb-4">Thêm phòng</button>

    </form>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>