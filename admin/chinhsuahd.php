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



    $data['phong_id'] = isset($_POST['phong_id']) ? $_POST['phong_id'] : '';
    $data['tensv'] = isset($_POST['tensv']) ? $_POST['tensv'] : '';
    $data['gioitinhsv'] = isset($_POST['gioitinhsv']) ? $_POST['gioitinhsv'] : '';
    $data['diachisv'] = isset($_POST['diachisv']) ? $_POST['diachisv'] : '';
    $data['sdtsv'] = isset($_POST['sdtsv']) ? $_POST['sdtsv'] : '';
    $data['ngaysinhsv'] = isset($_POST['ngaysinhsv']) ? $_POST['ngaysinhsv'] : '';
    $data['cccdsv'] = isset($_POST['cccdsv']) ? $_POST['cccdsv'] : '';
    $data['tengh'] = isset($_POST['tengh']) ? $_POST['tengh'] : '';
    $data['ngaysinhgh'] = isset($_POST['ngaysinhgh']) ? $_POST['ngaysinhgh'] : '';
    $data['diachigh'] = isset($_POST['diachigh']) ? $_POST['diachigh'] : '';
    $data['sdtgh'] = isset($_POST['sdtgh']) ? $_POST['sdtgh'] : '';
    $data['ngaylap'] = isset($_POST['ngaylap']) ? $_POST['ngaylap'] : '';
    $data['ngaybatdau'] = isset($_POST['ngaybatdau']) ? $_POST['ngaybatdau'] : '';
    $data['ngayketthuc'] = isset($_POST['ngayketthuc']) ? $_POST['ngayketthuc'] : '';
    $data['sinhvien_id'] = isset($_POST['sinhvien_id']) ? $_POST['sinhvien_id'] : '';

    $result = $hopdong->updateHopdong($data);
    if ($result) {
        echo '<script type="text/javascript">history.back();</script>';
    } else {
        echo '<script type="text/javascript">alert("Không thể chỉnh sửa hợp đồng. Hãy thử lại!"); history.back();</script>';
    }
}
?>