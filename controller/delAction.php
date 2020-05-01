<?php
//1.加载公共函数库
include 'function.php';

$id = $_GET['id'];
echo "$id";

$sql = "DELETE FROM {$bbsTable} WHERE ((`id` = '$id'))";
$conn = db_connect($db);
$result = mysqli_query($conn, $sql);

echo '<script> alert(\'删除成功~~\');location.href=\'../index.php\';</script>';