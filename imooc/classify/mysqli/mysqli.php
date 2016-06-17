<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/4
 * Time: 14:11
 */
header("Content-type:text/html;charset=utf-8");
echo "<style>*{font-family:Monaco;}</style>";
$mysqli=new mysqli('localhost','root','111111','imooc');
if($mysqli->connect_errno){
    die('CONNECT ERROR:'.$mysqli->connect_error);
}
$mysqli->set_charset('utf8');
$sql="SELECT id,pid,catename FROM deepcate";
$mysqli_result=$mysqli->query($sql);
/*print_r($mysqli_result);*/
if($mysqli_result && $mysqli_result->num_rows>0){
    /*echo $mysqli_result->num_rows;*/
    /*$row=$mysqli_result->fetch_all(MYSQLI_ASSOC);
    echo "<pre>";
    print_r($row);
    echo "</pre>";*/
    while($row=$mysqli_result->fetch_array(MYSQLI_ASSOC)){
        /*print_r($row);
        echo '<hr/>';*/
        $rows[]=$row;
    }
    dump($rows);
    $mysqli_result->close();
}else{
    echo '查询错误或结果集中没有记录';
}
function dump($v){
    echo "<pre>";
    print_r($v);
    echo "</pre>";
}