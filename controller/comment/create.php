<?php
/**
 * 发表评论
 */

//1.加载公共函数库
include '../public/function.php';

//3.如果登录了，获取用户信息
session_start();
if(isset($_SESSION['user'])){
	$userList	=	$_SESSION['user'];
}else{
	echo '<script> alert(\'未登录，请先登录！~~\');location.href=\'../../index.php?action=login\';</script>';
	exit;
}

//4.发帖保存
if($_POST){
	$id  = $_GET['id'];
	$comment_content = $_POST['comment_content'];
	$comment_content = htmlspecialchars($comment_content);
	if(!$comment_content){
		echo '<script> alert(\'评论不能为空~~\');javascript:history.back(-1);</script>';
		exit;
	}
	// // 获取当前时间戳
	// $add_time = time();
	// 创建mysql语句
	$sql = "INSERT INTO {$commentTable} VALUES ('{$id}','{$userList['user_account']}','{$comment_content}')";
	// 添加数据
	// echo $sql;
	$id  = insert($db,$sql);
	// if($id){
		echo '<script> alert(\'评论成功~~\');javascript:history.back(-1);</script>';
		exit;
	// }else{
	// 	echo '<script> alert(\'评论失败，请重新尝试~~\');javascript:history.back(-1);</script>';
	// 	exit;
	// }
}