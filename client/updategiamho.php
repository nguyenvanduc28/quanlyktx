<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();


include_once '../class/sinhvien.php';
include_once '../class/lopsinhvien.php';
include_once '../class/khoa.php';
include_once '../class/thannhan.php';
$sinhvien = new sinhvien();

$lopp = new lopsinhvien();

$khoa = new khoa();

$thannhan = new thannhan();



if (
    $_SERVER['REQUEST_METHOD'] == 'POST'
) {
    $dataThannhan['tengh'] = $_POST['tengh'];
    $dataThannhan['ngaysinhgh'] = $_POST['ngaysinhgh'];
    $dataThannhan['diachigh'] = $_POST['diachigh'];
    $dataThannhan['gioitinhgh'] = $_POST['gioitinhgh'];
    $dataThannhan['nghenghiepgh'] = $_POST['nghenghiepgh'];
    $dataThannhan['sdtgh'] = $_POST['sdtgh'];
    $result2 = $thannhan->setThannhan($dataThannhan);
}

echo '<script type="text/javascript">history.back();</script>';
