<?php
// 接收注册信息
$user_name = trim($_POST['user_name']);
$user_password1 = trim($_POST['user_password1']);
$user_password2 = trim($_POST['user_password2']);

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