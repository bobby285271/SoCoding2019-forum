<?php

//1.加载公共函数库
include 'function.php';

$sql = "SELECT * FROM {$bbsTable}";
$conn = db_connect($db);
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        // echo "id: " . $row["account"]. " <br>";
        echo "document.write('<a href=\"view.php?id=" .$row["id"]. "\" class=\"list-group-item list-group-item-action\">" .$row["bbs_title"]. "</a>');";
    }
} else {
    echo "document.write('<div class=\"card\"><div class=\"card-body\">暂时还没有帖子。</div></card>');";
}
