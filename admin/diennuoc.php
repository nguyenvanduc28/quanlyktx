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
$allPhong = $phong->getAllPhong();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data['tenphong'] = !empty($_POST['tenphong']) ? $_POST['tenphong'] : null;
  $data['thang'] = !empty($_POST['thang']) ? $_POST['thang'] : null;
  $data['chisodiencu'] = !empty($_POST['chisodiencu']) ? $_POST['chisodiencu'] : null;
  $data['chisodienmoi'] = !empty($_POST['chisodienmoi']) ? $_POST['chisodienmoi'] : null;
  $data['tongsodien'] = !empty($_POST['tongsodien']) ? $_POST['tongsodien'] : null;
  $data['tongtiendien'] = !empty($_POST['tongtiendien']) ? $_POST['tongtiendien'] : null;
  $data['chisonuoccu'] = !empty($_POST['chisonuoccu']) ? $_POST['chisonuoccu'] : null;
  $data['chisonuocmoi'] = !empty($_POST['chisonuocmoi']) ? $_POST['chisonuocmoi'] : null;
  $data['tongsonuoc'] = !empty($_POST['tongsonuoc']) ? $_POST['tongsonuoc'] : null;
  $data['tongtiennuoc'] = !empty($_POST['tongtiennuoc']) ? $_POST['tongtiennuoc'] : null;
  $data['tongtien'] = !empty($_POST['tongtien']) ? $_POST['tongtien'] : null;

  $result = $hoadon->addHoadon($data);
  if ($result) {
    header("Location:diennuoc.php");
  } else {
    echo '<script type="text/javascript">alert("Không thể tạo hóa đơn. Hãy thử lại!"); history.back();</script>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/a78794d350.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./css/nav-root.css">
  <link rel="stylesheet" href="./css/diennuoc.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Admin</title>

</head>

<body>
  <?php require './inc/nav-root.php'; ?>
  <div class="diennuoc-root">
    <h1>Hóa đơn điện nước</h1>
    <table class="table">
      <thead>
        <tr>
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
          <th scope="col"> </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <form action="http://ducduckitucxa.epizy.com/admin/diennuoc.php" method="post">
            <td>
              <div class="form-floating mb-3">
                <select class="form-control" name="tenphong" id="phong" required>
                  <option selected>Phòng</option>
                  <?php
                  foreach ($allPhong as $value) {
                    echo '<option value="' . $value['tenphong'] . '">' . $value['tenphong'] . ' </option>';
                  }
                  ?>
                </select>
              </div>
            </td>
            <td>
              <div class="form-floating mb-3">
                <select class="form-control" name="thang" id="thang" required>
                  <option selected>Tháng</option>
                  <?php
                  for ($i = 1; $i <= 12; $i++) {
                    echo '<option value="' . $i . '">' . $i . ' </option>';
                  }
                  ?>
                </select>
              </div>
            </td>
            <td>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="chisodiencu" name="chisodiencu" required>
              </div>
            </td>
            <td>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="chisodienmoi" name="chisodienmoi" required>
              </div>
            </td>
            <td>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="tongsodien" name="tongsodien" required>
              </div>
            </td>
            <td>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="tongtiendien" name="tongtiendien" required>
              </div>
            </td>
            <td>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="chisonuoccu" name="chisonuoccu" required>
              </div>
            </td>
            <td>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="chisonuocmoi" name="chisonuocmoi" required>
              </div>
            </td>
            <td>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="tongsonuoc" name="tongsonuoc" required>
              </div>
            </td>
            <td>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="tongtiennuoc" name="tongtiennuoc" required>
              </div>
            </td>
            <td>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="tongtien" name="tongtien" required>
              </div>
            </td>


            <td><button type="submit" class="btn btn-primary">Tạo hóa đơn</button></td>
          </form>
      </tbody>
    </table>
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
          <th scope="col">Xóa</th>
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
              <td><a href="http://ducduckitucxa.epizy.com/admin/duyetthanhtoan.php?id=<?= $value['id'] ?>"><button type="button" class="btn btn-primary" <?= $value['trangthaithanhtoan'] ? 'disabled' : '' ?>><?= $value['trangthaithanhtoan'] ? 'Đã thanh toán' : 'Duyệt' ?></button></a></td>
              <td><?= empty($value['ngaythanhtoan']) ? 'Chưa thanh toán' : $value['ngaythanhtoan'] ?></td>
              <td><a href="http://ducduckitucxa.epizy.com/admin/xoahoadon.php?id=<?= $value['id'] ?>"><button type="button" class="btn btn-primary" <?= $value['trangthaithanhtoan'] ? 'disabled' : '' ?>>Xóa</button></a></td>
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