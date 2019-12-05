<?php
include  '../core/mysqlDB.php';
// 接收注册信息
$user_name = trim($_POST['user_name']);
$user_password1 = trim($_POST['user_password1']);
$user_password2 = trim($_POST['user_password2']);

// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");

// 检查注册信息是否填写完整，是否符合要求
if ( empty($user_name) ) {
	jump('./register.php', '请填写用户名');
}
else if ( empty($user_password1) || empty($user_password2) ) {
	jump('./register.php', '请填写密码');
}
else if ( strlen($user_name) < 6 || strlen($user_name > 10) ) {
	jump('./register.php', '用户名长度不符要求');
}
else if ( $user_password1 !== $user_password2 ) {
	jump('./register.php', '两次密码输入不一致');
}
else if ( strlen($user_password1) < 6  ) {
	jump('./register.php', '密码长度不符要求');
}
else {
	// 用 MD5 加密用户密码后写入数据库
	$user_password = md5($user_password1);
	$sql = "INSERT INTO user (user_name, user_password)
		VALUES ('$user_name', '$user_password')";
	if ( mysqli_query($conn, $sql) ) {
		mysqli_close($conn);
		jump('./login.php', '注册成功');
	}
	else {
		jump('./register.php', '注册失败');
	}
}
