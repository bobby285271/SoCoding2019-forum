<?php
/**
 * 登录模板
 */

//1.加载公共函数库
include '../public/function.php';


session_start();
if(isset($_SESSION['user'])){
	echo '<script> alert(\'你已登录~~\');location.href=\'../index.php\';</script>';
	exit;
}


if($_POST){
	// 判断账号不能为空
	$account = $_POST['account'];
	if(!$account){
		echo '<script> alert(\'账号不能为空~~\');javascript:history.back(-1);</script>';
		exit;
	}
	// 判断密码不能为空
	$psword = $_POST['psword'];
	if(!$psword){
		echo '<script> alert(\'密码不能为空~~\');javascript:history.back(-1);</script>';
		exit;
	}else{
		$psword = md5($psword);
	}
	// 获取用户信息
	$userList = find($userTable,$db,'account',$account);
	if($userList){
		if($userList['psword'] != $psword){
			echo '<script> alert(\'密码错误~~\');javascript:history.back(-1);</script>';
			exit;
		}
		session_start();
		$_SESSION['user']	=	$userList;
		echo '<script> alert(\'登录成功~~\');location.href=\'../index.php\';</script>';
		exit;
	}else{
		echo '<script> alert(\'登录失败，请重新尝试~~\');javascript:history.back(-1);</script>';
		exit;
	}
}