<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/14
 * Time: 13:33
 */
require_once('response.php');
require_once('db.php');
$page=isset($_GET['page'])?$_GET['page']:1;
$pageSize=isset($_GET['pagesize'])?$_GET['pagesize']:1;
if(!is_numeric($page) || !is_numeric($pageSize)){
    return Response::show(401,'数据不合法');
}
$offset=($page-1)*$pageSize;
$sql="SELECT * FROM deepcate where createtime=0 ORDER BY id ASC limit ".$offset.",".$pageSize;

//接收异常
try{
    $connect=Db::getInstance()->connect();
}catch(Exception $e){
    return Response::show(403,'数据库连接失败');
}

$connect=Db::getInstance()->connect();
$result=mysqli_fetch_all(mysqli_query($connect,$sql),MYSQLI_ASSOC);
if($result){
    return Response::show(200,'首页数据获取成功',$result);
}else{
    return Response::show(400,'首页数据获取失败',$result);
}