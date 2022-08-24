<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

include_once '../class/lopsinhvien.php';

$lop = new lopsinhvien();
    if ($_SERVER['REQUEST_METHOD'] == 'GET' and !empty($_GET['id'])){
        $id = $_GET['id'];
        $result = $lop->deleteLop($id);

        if ($result) {
            header("Location:lopvakhoa.php");
        } else {
            echo '<script type="text/javascript">alert("Không thể  xóa. Hãy thử lại!"); history.back();</script>';
        }
    } else header("Location:lopvakhoa.php");
?>