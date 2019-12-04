<?php
// 数据库设置
$servername = "localhost";
$username = "username";
$password = "password";
$db = "bbs";

// 创建连接
$conn = mysqli_connect($servername, $username, $password, $db);

// 检测连接
if (!$conn) {
    die("数据库连接失败：" . mysqli_connect_error());
}
