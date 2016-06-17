<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/4/29
 * Time: 20:35
 */
header("Content-type:text/html;charset=utf8");
echo "<style>*{font-family:Monaco}</style>";
$db_host='localhost';
$db_user='root';
$db_password='111111';
$db_name='imooc';
$pdo=new PDO('mysql:host=localhost;dbname=imooc',$db_user,$db_password);
$pdo->exec('set names utf8');