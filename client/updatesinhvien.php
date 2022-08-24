<?php
include_once '../class/sinhvien.php';
include_once '../class/lopsinhvien.php';
include_once '../class/khoa.php';
include_once '../class/thannhan.php';
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

$sinhvien = new sinhvien();

$lopp = new lopsinhvien();

$khoa = new khoa();

$thannhan = new thannhan();



if (
    $_SERVER['REQUEST_METHOD'] == 'POST'
) {
    $dataSinhvien['ngaysinh'] = $_POST['ngaysinh'];
    $dataSinhvien['sdt'] = $_POST['sdt'];
    $dataSinhvien['diachi'] = $_POST['diachi'];
    $dataSinhvien['lop'] = $_POST['lop'];
    $dataSinhvien['khoa'] = $_POST['khoa'];
    $dataSinhvien['cccd'] = $_POST['cccd'];
    $result = $sinhvien->update($dataSinhvien);

    echo '<script type="text/javascript">history.back();</script>';
} else header("Location:taikhoan.php");
