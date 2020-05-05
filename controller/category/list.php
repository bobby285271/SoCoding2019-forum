<?php

//1.加载公共函数库
include './controller/public/function.php';

$sql = "SELECT * FROM {$categoryTable}";
$conn = db_connect($db);
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        //两种输出格式，在引用本文件前需要指定 type 变量
        if($type == 1)
            echo "<a href=\"index.php?action=list&category=" .$row['category_id']. "&page=1\" class=\"list-group-item list-group-item-action\"><h5>" .$row['category_name']. "</h5><small>" .$row['category_description']. "</small>";
        else if ($type == 2)
            echo "<option value=\"" .$row['category_id']. "\">" .$row['category_name']. "</option>";
        else
            exit;
    }
} 
// else {
    // echo "document.write('<div class=\"card\"><div class=\"card-body\">暂时还没有帖子。</div></card>');";
// }
