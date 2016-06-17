<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/4
 * Time: 9:45
 */
header("Content-type:text/html;charset=utf-8");
$db_host='localhost';
$db_user='root';
$db_pwd='111111';
$db_name='imooc';
$link=mysqli_connect($db_host,$db_user,$db_pwd,$db_name) or die(mysqli_error());
mysqli_query($link,"set names utf8");