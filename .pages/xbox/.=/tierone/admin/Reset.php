<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['login-username'])) {
    header("location: Dashboard.php");
    exit();
}

$file_visitor = "../result/log_visitor.txt";
$file_blocked = "../result/total_Blocked.txt";

if (file_exists($file_visitor)) {
    file_put_contents($file_visitor, '');
}

if (file_exists($file_blocked)) {
    file_put_contents($file_blocked, '');
}

echo "<script type='text/javascript'>window.top.location='Dashboard.php';</script>";
?>
