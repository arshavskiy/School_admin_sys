<?php
session_start();
include '../lib/Fetcher.php';

if (!isset($_SESSION['name'])) {
    header("Location:/theschool/");
}
if (!isset($_GET['subject']) || empty($_GET['subject'])) {
    header("Location: index.php?subject=school");
    die();
}
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title>School Admin System - SAS</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="../img/favicon.png" />
        <link href="newcss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
<?php

include 'view/header.php';
    switch ($_GET['subject']) {

        case 'school':
            include 'view/main_School.php';
            break;

        case 'admin':
            include 'view/main_Admin.php';
            break;
    }
 ?>
    </body>
    <script src="../js/newjavascript.js" type="text/javascript"></script>
</html>

