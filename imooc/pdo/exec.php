<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/3
 * Time: 10:42
 */
try{
    $pdo=new PDO('mysql:host=localhost;dbname=imooc','root','111111');
    $sql=<<<EOF
    CREATE TABLE IF NOT EXISTS user(
    id INT UNSIGNED AUTO_INCREMENT KEY,
    username VARCHAR(20) NOT NULL UNIQUE,
    password CHAR(32) NOT NULL,
    email VARCHAR(30) NOT NULL
    );
EOF;
    $res=$pdo->exec($sql);
    var_dump($res);
}catch(PDOException $e){
    echo $e->getMessage();
}