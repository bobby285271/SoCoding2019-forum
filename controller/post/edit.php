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
$id = $_GET['id'];
$details = find($postTable,$db,'id',$id);

if(! $details){
    echo '<script> alert(\'帖子不存在~~\');javascript:history.back(-1);</script>';
    exit;
}

if($userList['user_account'] != $details['user_account']){
    echo '<script> alert(\'发帖的都不是你你改个毛线~~\');javascript:history.back(-1);</script>';
    exit;
}

if($_POST){
	if(empty($_GET['id'])){
		echo '<script> alert(\'未找到帖子，请重试！~~\');javascript:history.back(-1);</script>';
		exit;
	}
	//4.修改帖子
	$post_content = $_POST['post_content'];
	// echo $post_content;
	$post_content = htmlspecialchars($post_content);
	if(!$post_content){
		echo '<script> alert(\'内容不能为空~~\');javascript:history.back(-1);</script>';
		exit;
	}
	// 获取当前时间戳
	// $add_time = time();
	// 修改数据
	$value = 'post_content="'.$post_content.'"';
	$bbsWhere = 'id='.$_GET['id'];
	// echo $value;
	// echo $bbsWhere;
	$id  = save($postTable,$db,$value,$bbsWhere);
	if($id){
		echo '<script> alert(\'修改成功~~\');location.href=\'../../index.php\';</script>';
		exit;
	}else{
		echo '<script> alert(\'修改失败，请重新尝试~~\');javascript:history.back(-1);</script>';
		exit;
	}
}else{
	if(empty($_GET['id'])){
		echo '<script> alert(\'未找到帖子，请重试！~~\');javascript:history.back(-1);</script>';
		exit;
	}
	//4.查询帖子
	$details = find($postTable,$db,'bbs_id',$_GET['id']);
}