<?php
include_once '../class/dangkyphong.php';

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$dangkyphong = new dangkyphong();
$allDangky = $dangkyphong->getAllDangky();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/a78794d350.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/nav-root.css">
  <link rel="stylesheet" href="./css/duyetdangky.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title>Admin</title>

</head>

<body>
  <?php require './inc/nav-root.php'; ?>
  <div class="duyetdangky-root">
    <h1>Duyệt đăng ký</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">STT</th>
          <th scope="col">Tên sinh viên</th>
          <th scope="col">Phòng</th>
          <th scope="col">Ngày đăng ký</th>
          <th scope="col">Xác nhận</th>
          <th scope="col">Hợp đồng</th>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($allDangky)) { foreach ($allDangky as $key => $value) { ?>
          <tr>
            <th scope="row"><?= $key + 1 ?></th>
            <td><?= $value['ten'] ?></td>
            <td><?= $value['phong'] ?></td>
            <td><?= $value['ngaydangky'] ?></td>
            <td><a href="
            http://ducduckitucxa.epizy.com/admin/taohopdong.php?sinhvien_id=<?= $value['sinhvien_id'] ?>&phong_id=<?= $value['phong_id'] ?>
            "><button type="button" class="btn btn-primary" <?= $value['xacnhan'] ? 'disabled' : '' ?>><?= $value['xacnhan'] ? 'Đã duyệt' : 'Tạo hợp đồng'?>
                </button>
              </a></td>
            
              <td><a href="
            http://ducduckitucxa.epizy.com/admin/chinhsuahopdong.php?sinhvien_id=<?= $value['sinhvien_id'] ?>&phong_id=<?= $value['phong_id'] ?>
            "><button type="button" class="btn btn-primary" <?= $value['xacnhan'] ? '' : 'disabled' ?>><?= $value['xacnhan'] ? 'Chỉnh sủa hợp đồng' : 'Chưa có hợp đồng'?>
                </button>
              </a></td>
          </tr>
        <?php }} else {
          echo 'Không có thông tin'; }
        ?>
      </tbody>
    </table>

    <br>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>