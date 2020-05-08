<?php
print <<<EOT
    <nav class="navbar navbar-expand-sm bg-info navbar-dark">
    <div class="container">
    <a class="navbar-brand" href="index.php">SoCoding Forum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item"><a class="nav-link" href="index.php?action=create" target="_top">发表帖子</a></li>
    <li class="nav-item dropdown">
EOT;

session_start();
if(isset($_SESSION['user'])){
	echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbardrop\" data-toggle=\"dropdown\">".$_SESSION['user']['user_nickname']."</a>";
    echo "<div class=\"dropdown-menu\">";
    echo "<a class=\"dropdown-item\" href=\"index.php?action=info\" target=\"_top\">个人中心</a>";
    echo "<a class=\"dropdown-item\" href=\"index.php?action=logout\" target=\"_top\">注销</a>";
    echo "</div>";
}
else{
    echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbardrop\" data-toggle=\"dropdown\"未登录</a>";
    echo "<div class=\"dropdown-menu\">";
    echo "<a class=\"dropdown-item\" href=\"index.php?action=login\" target=\"_top\">登录</a>";
    echo "<a class=\"dropdown-item\" href=\"index.php?action=register\" target=\"_top\">注册</a>";
    echo "</div>";
}

print <<<EOT
    </li>
    </ul>
    <!-- TODO：搜索 -->
    <!-- <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="发起搜索..." aria-label="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">搜索</button>
    </form> -->
    </div>
    </div>
    </nav>
    <p></p>
EOT;