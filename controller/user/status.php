<?php

include './controller/public/function.php';

// session_start();
// if(isset($_SESSION['user'])){
// 	echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbardrop\" data-toggle=\"dropdown\">".$_SESSION['user']['nickname']."</a>";
//     echo "<div class=\"dropdown-menu\">";
//     echo "<a class=\"dropdown-item\" href=\"index.php?action=info\" target=\"_top\">个人中心</a>";
//     echo "<a class=\"dropdown-item\" href=\"index.php?action=logout\" target=\"_top\">注销</a>";
//     echo "</div>";
// }
// else{
    echo "<script>alert(\"test\");</script>";
    echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbardrop\" data-toggle=\"dropdown\"未登录</a>";
    echo "<div class=\"dropdown-menu\">";
    echo "<a class=\"dropdown-item\" href=\"index.php?action=login\" target=\"_top\">登录</a>";
    echo "<a class=\"dropdown-item\" href=\"index.php?action=register\" target=\"_top\">注册</a>";
    echo "</div>";
// }