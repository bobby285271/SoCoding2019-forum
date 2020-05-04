<?php
/**
 * 登录模板
 */

//1.加载公共函数库
include '../public/function.php';


session_start();
if(isset($_SESSION['user'])){
	echo '<script> alert(\'你已登录~~\');location.href=\'../../index.php\';</script>';
	exit;
}


if($_POST){

	$account = $_POST['account'];

	$passwd = $_POST['passwd'];
	
	if(!$account || !$passwd){
		echo '<script> alert(\'抱歉，出现了内部错误，请联系开发者~~\');javascript:history.back(-1);</script>';
		exit;
	}else{
		$passwd = md5($passwd);
	}
	// 获取用户信息
	$userList = find($userTable,$db,'account',$account);
	if($userList){
		if($userList['passwd'] != $passwd){
			echo '<script> alert(\'密码错误~~\');javascript:history.back(-1);</script>';
			exit;
		}
		session_start();
		$_SESSION['user']	=	$userList;
		echo '<script> alert(\'登录成功~~\');location.href=\'../../index.php\';</script>';
		exit;
	}else{
		echo '<script> alert(\'登录失败，请重新尝试~~\');javascript:history.back(-1);</script>';
		exit;
	}
}