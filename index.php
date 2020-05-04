<?php

if($_GET['action'])
{
    $action = $_GET['action'];
    //帖子部分
    if($action == 'viewpost') {
        //浏览某个帖子
        include './view/post/view.html';
    }
    else if ( $action == 'edit'){
        //编辑帖子
        include './view/post/edit.html';
    }
    else if ( $action == 'create'){
        //新建帖子
        include './view/post/create.html';
    }
    else if ($action == 'allpost'){
        //某个分类所有帖子
        include './view/post/list.html';
    }
    //用户部分
    else if ($action == 'login'){
        //登录
        include './view/user/login.html';
    }
    else if ($action == 'logout'){
        //登录
        include './controller/user/logout.php';
    }
    else if ($action == 'register'){
        //注册
        include './view/user/register.html';
    }
    else if ($action == 'userinfo'){
        //个人中心
        include './view/user/info.html';
    }
    else{
        include './view/index.html';
    }
}
else {
    include './view/index.html';
}


