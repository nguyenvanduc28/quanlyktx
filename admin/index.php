<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::checkSession();

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a78794d350.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/nav-root.css">
    <title>Admin</title>
   
</head>

<body>
    <?php require './inc/nav-root.php'; ?>
    <div>Trang chu</div>
</body>

</html>