<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/4
 * Time: 15:39
 */
header("Content-type:text/html;charset=utf-8");
$mysqli=new mysqli('localhost','root','111111','imooc');
$mysqli->set_charset('utf8');
if($mysqli->connect_errno){
    die('connect error:'.$mysqli->connect_error());
}
$sql="SELECT id,pid,catename FROM deepcate";
$mysqli_result=$mysqli->query($sql);
if($mysqli_result && $mysqli_result->num_rows>0){
    while($row=$mysqli_result->fetch_assoc()){
        $rows[]=$row;
    }
    //print_r($rows);
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <mate charset="utf-8">
    <title>userlist</title>
</head>
<body>
<h2>用户列表</h2>
    <table border="1" cellpadding="0" cellpadding="0" width="80%" bgcolor="#ABCDEF">
        <tr>
            <th>编号</th>
            <th>用户名</th>
            <th>栏目名</th>
        </tr>
        <?php foreach($rows as $row):?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['pid'];?></td>
                <td><?php echo $row['catename'];?></td>
            </tr>
        <?php endforeach;?>
    </table>
</body>
</html>