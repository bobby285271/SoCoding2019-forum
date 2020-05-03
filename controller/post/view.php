<?php

$id = $_GET['id'];

// /**
//  * 详情模板
//  */

// //1.加载公共函数库
include '../public/function.php';

// //4.获取帖子详情
$details = find($postTable,$db,'id',$id);
// echo $details['bbs_content'];
if(!$details){
    echo "找不到帖子";
	// echo '<script> alert(\'未找到详情！~~\');location.href=\'/index.php\';</script>';
}else{
    // $details['add_time']	=	date('Y-m-d H:i',$details['add_time']);
    echo $details['bbs_content'];
}

