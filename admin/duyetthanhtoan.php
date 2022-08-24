<?php
include_once '../class/hoadondiennuoc.php';

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

$thanhtoan = new hoadondiennuoc();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $idThanhtoan = isset($_GET['id']) ? $_GET['id'] : null;

    if (!empty($idThanhtoan)) {
        $result = $thanhtoan->thanhtoan($idThanhtoan);
        if ($result) {
            echo '<script type="text/javascript">alert("Đã duyệt thanh toán");</script>';
            header("Location:diennuoc.php");
        } else {
            echo '<script type="text/javascript">alert("Không thể duyệt thanh toán. Hãy thử lại!");</script>';
            header("Location:diennuoc.php");
        }
    }
}
?>