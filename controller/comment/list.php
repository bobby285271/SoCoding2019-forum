<?php

// include './controller/public/function.php';


$id = $_GET['id'];

$sql = "SELECT * FROM {$commentTable}";
$conn = db_connect($db);
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出数据
    while($row = mysqli_fetch_assoc($result)) {
        if($row["id"] == $id) {
            echo "<li class=\"list-group-item\">"  .$row["account"]. "：" .$row["content"]. "</li>";
        }
        
    }
} else {
    echo "0 结果";
}
