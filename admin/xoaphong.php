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

if ($_SERVER['REQUEST_METHOD'] == 'GET' and !empty($_GET['id'])) {
    $id = $_GET['id'];

    $result = $phong->deletePhong($id);
    if ($result) {
        header("Location:danhsachphong.php");
    } else {
        echo '<script type="text/javascript">alert("Không thể  xóa phòng. Hãy thử lại!"); history.back();</script>';
    }
} else header("Location:danhsachphong.php");
