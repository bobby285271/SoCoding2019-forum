<?php
//1.加载公共函数库
include 'function.php';

$id = $_GET['id'];

session_start();
if(isset($_SESSION['user'])){
	$userList	=	$_SESSION['user'];
}else{
	echo '<script> alert(\'未登录，请先登录！~~\');location.href=\'../login.php\';</script>';
	exit;
}

$details = find($bbsTable,$db,'id',$id);

if($_SESSION['user']['account'] != $details['account']){
    echo '<script> alert(\'发帖的都不是你你删个毛线~~\');javascript:history.back(-1);</script>';
    exit;
}

$sql = "DELETE FROM {$bbsTable} WHERE ((`id` = '$id'))";
$conn = db_connect($db);
$result = mysqli_query($conn, $sql);

echo '<script> alert(\'删除成功~~\');location.href=\'../index.php\';</script>';