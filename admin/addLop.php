<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

include_once '../class/lopsinhvien.php';

$lop = new lopsinhvien();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST['ten'])){
        $ten = $_POST['ten'];
        $result = $lop->insertLop($ten);

        if ($result) {
            header("Location:lopvakhoa.php");
        } else {
            echo '<script type="text/javascript">alert("Không thể  thêm. Hãy thử lại!"); history.back();</script>';
        }
    } else header("Location:lopvakhoa.php");
?>