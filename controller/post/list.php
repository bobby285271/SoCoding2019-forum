<?php

//1.加载公共函数库
include './controller/public/function.php';

$page = $_GET['page'];
if($page < 1) $page=1;
$category = $_GET['category'];

$edgepost = ($page-1)*10;

if($category){
    $sql = "SELECT * FROM {$postTable} WHERE category_id= {$category} order by id desc LIMIT {$edgepost},10";
}
else {
    $sql = "SELECT * FROM {$postTable} order by id desc LIMIT {$edgepost},10";
}

$conn = db_connect($db);
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["user_account"]. " <br>";
        echo "<a href=\"index.php?action=view&id=" .$row["id"]. "\" class=\"list-group-item list-group-item-action\">" .$row["post_title"]. "</a>";
    }
} else {
    echo "<div class=\"card\"><div class=\"card-body\">暂时还没有帖子。</div></card>";
}
