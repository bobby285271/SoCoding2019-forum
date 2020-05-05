<?php

$category = $_GET['category'];
$page = $_GET['page'];
if($page < 1)$page=1;
$nextpage=$page+1;
$lastpage=$page-1;

// TODO 最后一页
// if($category){
//     $sql = "SELECT COUNT(*) FROM {$postTable} WHERE category_id= {$category} order by id desc LIMIT {$page},10";
// }
// else {
//     $sql = "SELECT COUNT(*) FROM {$postTable} order by id desc LIMIT {$page},10";
// }

// $conn = db_connect($db);
// $result = mysqli_query($conn, $sql);

echo "<hr class=\"mb-4\">";

if($category){

    if($page > 1){
        echo "<div class=\"btn-block  btn-group\"><a class=\"btn btn-outline-info\" href=\"./index.php?action=list&category=" .$category. "&page=" .$lastpage. "\">上一页</a><a class=\"btn btn-outline-info\" href=\"./index.php?action=list&category=" .$category. "&page=" .$nextpage. "\">下一页</a></div>";
    } 
    else{
        echo "<a class=\"btn btn-block btn-outline-info\" href=\"./index.php?action=list&category=" .$category. "&page=2\">下一页</a>";
    }
}
else {

    if($page > 1){
        echo "<div class=\"btn-block btn-group\"><a class=\"btn btn-outline-info\" href=\"./index.php?action=list&page=" .$lastpage. "\">上一页</a><a class=\"btn btn-outline-info\" href=\"./index.php?action=list&page=" .$nextpage. "\">下一页</a></div>";
    } 
    else{
        echo "<a class=\"btn btn-block btn-outline-info\" href=\"./index.php?action=list&page=2\">下一页</a>";
    }
}
