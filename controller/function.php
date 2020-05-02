<?php
/* 模板统一自动加载函数
 * @param $tplName 模板名称
 * 返回值是要加载的模板文件
 */

header("Content-type: text/html; charset=utf-8");
//设置中国时区
date_default_timezone_set('PRC');
// //域名
// $url = 'http://www.zhibo.com/index.php';
// //设置每页显示信息数量
// $num = 10;
// //设置页面标题后缀
// define('SITE_SUFFIX','SoCoding');

//设置数据库连接参数
$db = array(
    'db_host' => 'localhost',
    'db_user' => 'socoding',
    'db_pass' => 'socoding',
    'db_name' => 'forum'
);

//设置用到的数据表
$bbsTable  = 'forum_bbs';    //帖子
$comTable  = 'forum_comment';//评论
$userTable = 'forum_user';   //用户


function auto_load_tpl($tplName)
{
    global $bbsList;    //论坛帖子列表
    global $bbsListPage;//论坛帖子列表分页html
    global $bbsListHot; //论坛热门帖子列表
    global $bbsType;    //论坛帖子类型 1最新 2热门
    global $details;    //论坛帖子详情
    global $comment;    //论坛评论列表
    global $userList;   //论坛当前用户信息
    global $pUserList;  //论坛发帖人用户信息

    //自动加载模板
    include $tplName.'.php';
}
//连接数据库，使用频繁，每次调用数据，就会使用。
// TP3 查询语句写法。
// M('Forum_bbs')->field(true)->where(array('status'=>1))->find();
function db_connect($db)
{
    // 创建连接
    $conn = mysqli_connect($db['db_host'], $db['db_user'], $db['db_pass'],$db['db_name']);

    // 检测连接
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
/************************增删查改*************************/
//查询数据库，返回数组
function select($table,$db,$where,$order,$limit=0)
{
    $conn = db_connect($db);
           // 'SELECT * FROM forum_bbs WHERE uid=1 ORDER BY bbs_id DESC'
    $sql = 'SELECT * FROM '.$table.' '.$where.' '.$order;
    if($limit){
        // 连接上一个语句
        $sql .= ' limit '.$limit;
    }
    $rows = [];
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        mysqli_free_result($result);
    }
    mysqli_close($conn);
    return $rows;
}
//查询数据库，返回一条数据
function find($table,$db,$where_k,$where_v)
{
    $conn = db_connect($db);
    $sql = 'SELECT * FROM '.$table.' WHERE '.$where_k.'="'.$where_v.'" LIMIT 1';
    $rows=[];
    if ($result = mysqli_query($conn, $sql)) {
        $rows = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
    }
    mysqli_close($conn);
    return $rows;
}
//查询数据库，返回单个值
function find_one($table,$db,$where,$field)
{
    $conn = db_connect($db);
    $sql  = 'SELECT ' .$field. ' FROM '.$table.' '.$where.' LIMIT 1';
    $rows = '';
    if ($result = mysqli_query($conn, $sql)) {
        $row = mysqli_fetch_assoc($result);
        $rows = $row[$field];
        mysqli_free_result($result);
    }
    mysqli_close($conn);
    return $rows;
}
//统计数量
function count_number($table,$db,$where){
    $conn = db_connect($db);
    $sql  = 'SELECT count(*) as count_number FROM '.$table.' '.$where;
    $rows = '';
    if ($result = mysqli_query($conn, $sql)) {
        $row = mysqli_fetch_assoc($result);
        $rows = $row['count_number'];
        mysqli_free_result($result);
    }
    mysqli_close($conn);
    return $rows;
}
//插入数据，返回插入ID
function insert($db,$sql){
    $conn   = db_connect($db);
    // echo $sql;
    $result = mysqli_query($conn,$sql);
    //执行插入操作
    if ($result){
        //只有插入成功后才可以获取新增主键id
        $insert_id = mysqli_insert_id($conn);
    }
    mysqli_close($conn);
    return $insert_id;
}
//修改数据，返回true和false
function save($table,$db,$value,$where){
    $conn = db_connect($db);
    $sql  = 'UPDATE '.$table.' SET '.$value.' WHERE '.$where;
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}
//删除数据，返回true和false
function delete($table,$db,$where=''){
    $conn = db_connect($db);
    $sql  = 'DELETE FROM '.$table.' '.$where;
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}