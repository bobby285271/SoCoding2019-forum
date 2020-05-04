<?php
/**
 * 个人中心模板
 */

//1.加载公共函数库
include '../public/function.php';

//3.如果登录，存储用户信息。未登录，跳转到登录页面
session_start();
if(isset($_SESSION['user'])){
	$userList	=	$_SESSION['user'];
}else{
	echo "document.write('<div class=\"card\"><div class=\"card-body\">请先登录。</div></card>');";
	exit;
}

echo "document.write('<div class=\"card\"><div class=\"card-body\"><h4>您好，" .$userList['nickname']. "（" .$userList['account']. "）。您可以在这里管理您的帖子。</h4></div></card>');";


$sql = "SELECT * FROM {$postTable}";
$conn = db_connect($db);
$result = mysqli_query($conn, $sql);
$cnt = 0;
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["account"]. " <br>";
        if($userList['account'] == $row['account']) {
            $cnt = $cnt + 1;
            echo "document.write('<a href=\"index.php?action=viewpost&id=" .$row["id"]. "\" class=\"list-group-item list-group-item-action\">" .$row["bbs_title"]. "</a>');";
        }
    }
} 
if ($cnt == 0){
    echo "document.write('<div class=\"card\"><div class=\"card-body\">暂时还没有帖子。</div></card>');";
}
