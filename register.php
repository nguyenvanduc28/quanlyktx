<?php
include 'class/user.php';

$user = new user();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $data['email'] = $_POST['email'];
  $data['password'] = $_POST['password'];
  $data['role'] = 'User';
  $data['ten'] = $_POST['ten'];
  $data['ngaysinh'] = $_POST['ngaysinh'];
  $data['sdt'] = $_POST['sdt'];
  $data['gioitinh'] = $_POST['gioitinh'];
  $data['diachi'] = $_POST['diachi'];
  $data['mssv'] = $_POST['mssv'];
  $data['cccd'] = $_POST['cccd'];
  $result = $user->insert($data);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký</title>


  <link rel="stylesheet" href="./css/register.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
  <div id="root">
    <div class="register">
      <h1>Đăng ký</h1>

      <form action="register.php" method="post">
        <div class="form-floating mb-3">
          <label for="hovaten">Họ và tên</label>
          <input type="text" class="form-control" id="hovaten" placeholder="Họ và tên" required autofocus name="ten">
        </div>

        <div class="form-floating mb-3">
          <label for="mssv">MSSV</label>
          <input type="text" class="form-control" id="mssv" placeholder="Mã số sinh viên" required autofocus name="mssv">
        </div>

        <div class="form-floating mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Email" required autofocus name="email">
        </div>
        <div class="form-floating mb-3">
          <label for="password">Mật khẩu</label>
          <input type="password" class="form-control" id="password" placeholder="Mật khẩu" oninput="CheckPassword(this)" required autofocus name="password">
        </div>

        <div class="form-floating mb-3">
          <label for="repassword">Nhập lại mật khẩu</label>
          <input type="password" class="form-control" id="repassword" placeholder="Nhập lại mật khẩu" oninput="checkRePassword(this)" required autofocus>
        </div>

        <div class="form-floating mb-3">
          <label for="sdt">Số điện thoại</label>
          <input type="text" class="form-control" id="sdt" placeholder="SĐT" required autofocus name="sdt">
        </div>
        <div class="form-floating mb-3">
          <label for="ngaysinh">Ngày sinh</label>
          <input type="date" class="form-control" id="ngaysinh" placeholder="Ngày sinh" required autofocus name="ngaysinh">
        </div>
        <div class="form-floating mb-3">
          <label for="diachi">Địa chỉ</label>
          <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" required autofocus name="diachi">
        </div>

        <div class="form-check">
          <input type="radio" class="form-check-input" id="radio1" name="gioitinh" value="Nam" checked>
          <label class="form-check-label" for="radio1">Nam</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" id="radio2" name="gioitinh" value="Nữ" checked>
          <label class="form-check-label" for="radio2">Nữ</label>
        </div>

        <p><?= !empty($result) ? $result : '' ?></p>
        <button type="submit" class="btn btn-primary btn-block mb-4">Đăng ký</button>
        <div class="text-center">
          <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
        </div>
      </form>
    </div>
  </div>
</body>
<script language='javascript' type='text/javascript'>
  function checkRePassword(input) {
    if (input.value != document.getElementById('password').value) {
      input.setCustomValidity('Mật khẩu chưa khớp');
    } else {

      input.setCustomValidity('');
    }
  }


  function CheckPassword(inputtxt) 
{ 
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
if(inputtxt.value.match(passw)) 
{ 
inputtxt.setCustomValidity('');
}
else
{ 
inputtxt.setCustomValidity('Mật khẩu phải từ 8 đến 20 kí tự. Mật khẩu phải bao gồm chữ hoa, chữ cái thường, số và các kí tự !@#$%^&*().?/');
}
}

</script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>