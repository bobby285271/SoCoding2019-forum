<?php

if($_GET['action'])
{
    $action = $_GET['action'];
    //帖子部分
    if($action == viewpost) {
        //浏览某个帖子
        $id = $_GET['id'];
        include './view/view-head.html';
        echo "<a href=\"controller/delAction.php?id=" .$id. "\">删除帖子</a> <a href=\"edit.php?id=" .$id. "\">编辑帖子</a><br /><br />";
        include "./controller/detailsAction.php";
        include './view/view-mid.html';
        include "./controller/commentListAction.php";
        include './view/view-foot.html';
    }
    else if ( $action == edit){
        //编辑帖子
        include './view/post/edit.html';
    }
    else if ( $action == create){
        //新建帖子
        include './view/post/create.html';
    }
    else if ($action == allpost){
        //某个分类所有帖子
        include './view/post/allpost.html';
    }
    //用户部分
    else if ($action == login){
        //登录
        include './view/user/login.html';
    }
    else if ($action == register){
        //注册
        include './view/user/register.html';
    }
    else if ($action == user){
        //个人中心
        include './view/user/userinfo.html';
    }
}
else {
    include './view/index.html';
}


