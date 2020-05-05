<?php
/**
 * 发帖模板
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
	$post_title = $_POST['post_title'];
	$post_title = htmlspecialchars($post_title);
	if(!$post_title){
		echo '<script> alert(\'标题不能为空~~\');javascript:history.back(-1);</script>';
		exit;
	}
	$post_content = $_POST['post_content'];
	$post_content = htmlspecialchars($post_content);
	if(!$post_content){
		echo '<script> alert(\'内容不能为空~~\');javascript:history.back(-1);</script>';
		exit;
	}
	$category_id = $_POST['category_id'];
	// // 获取当前时间戳
	// $add_time = time();
	// 创建mysql语句
	$sql = "INSERT INTO {$postTable} VALUES (0,'{$userList['user_account']}','{$post_title}','{$post_content}','{$category_id}')";
	// 添加数据
	$id  = insert($db,$sql);
	// if($id){
		echo '<script> alert(\'发帖成功~~\');location.href=\'../../index.php\';</script>';
		exit;
	// }else{
	// 	echo '<script> alert(\'发帖失败，请重新尝试~~\');javascript:history.back(-1);</script>';
	// 	exit;
	// }
}