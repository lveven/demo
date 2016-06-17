<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/2
 * Time: 18:07
 */
try{
    $dsn='mysql:host=localhost;dbname=imooc';
    $username='root';
    $pwd='111111';
    $pdo=new PDO($dsn,$username,$pwd);
}catch(PDOException $e){
    echo $e->getMessage();
}