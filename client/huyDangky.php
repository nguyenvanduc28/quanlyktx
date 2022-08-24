<?php
include_once '../class/dangkyphong.php';
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dangky = new dangkyphong();

if ($_SERVER['REQUEST_METHOD'] == 'GET' and !empty($_GET['id'])) {
    $id = $_GET['id'];
    $result = $dangky->huyDangky($id);
    if ($result) {
        header("Location: xemdangky.php");
    } else {
        echo '<script type="text/javascript">alert("Không thể gửi đăng ký. Hãy thử lại!"); history.back();</script>';
    }
}
