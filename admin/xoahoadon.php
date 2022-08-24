<?php
include_once '../class/hoadondiennuoc.php';

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

$thanhtoan = new hoadondiennuoc();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if (!empty($id)) {
        $result = $thanhtoan->xoahoadon($id);
        if ($result) {
            echo '<script type="text/javascript">alert("Đã xóa hóa đơn");</script>';
            header("Location:diennuoc.php");
        } else {
            echo '<script type="text/javascript">alert("Không thể xóa hóa đơn. Hãy thử lại!");</script>';
            header("Location:diennuoc.php");
        }
    }
} else header("Location:diennuoc.php");
?>