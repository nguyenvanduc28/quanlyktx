<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();


include_once '../class/hopdongktx.php';

$hopdong = new hopdongktx();


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data['phong_id'] = $_POST['phong_id'];
    $data['tensv'] = $_POST['tensv'];
    $data['gioitinhsv'] = $_POST['gioitinhsv'];
    $data['diachisv'] = $_POST['diachisv'];
    $data['sdtsv'] = $_POST['sdtsv'];
    $data['ngaysinhsv'] = $_POST['ngaysinhsv'];
    $data['cccdsv'] = $_POST['cccdsv'];
    $data['tengh'] = $_POST['tengh'];
    $data['ngaysinhgh'] = $_POST['ngaysinhgh'];
    $data['diachigh'] = $_POST['diachigh'];
    $data['sdtgh'] = $_POST['sdtgh'];
    $data['ngaylap'] = $_POST['ngaylap'];
    $data['ngaybatdau'] = $_POST['ngaybatdau'];
    $data['ngayketthuc'] = $_POST['ngayketthuc'];
    $data['sinhvien_id'] = $_POST['sinhvien_id'];

    $result = $hopdong->insertHopdong($data);
    if ($result) {
        header("Location: duyetdangky.php");
    } else {
        echo '<script type="text/javascript">alert("Không thể tạo hợp đồng. Hãy thử lại!"); history.back();</script>';
    }
}
?>