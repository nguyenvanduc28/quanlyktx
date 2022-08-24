<?php
include_once '../class/dangkyphong.php';
include_once '../class/hopdongktx.php';
include_once '../class/phong.php';
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$phong = new phong();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data['id'] = !empty($_POST['id']) ? $_POST['id'] : null;
    $data['tenphong'] = !empty($_POST['tenphong']) ? $_POST['tenphong'] : null;
    $data['yeucau'] = !empty($_POST['yeucau']) ? $_POST['yeucau'] : null;
    $data['toida'] = !empty($_POST['toida']) ? $_POST['toida'] : null;
    $data['ghichu'] = !empty($_POST['ghichu']) ? $_POST['ghichu'] : null;

    $result = $phong->updatePhong($data);
    if ($result) {
        header("Location:danhsachphong.php");
    } else {
        echo '<script type="text/javascript">alert("Không thể tạo phòng. Hãy thử lại!"); history.back();</script>';
    }
} else header("Location:chinhsuaphong.php");
