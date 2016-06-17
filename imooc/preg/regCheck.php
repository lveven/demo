<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/4/27
 * Time: 13:51
 */
require_once 'regexTool.class.php';

$regex=new regexTool();
$regex->setFixMode('U');
$r=$regex->isEmail('2238340404@qq.com');
show($r);

if(!$regex->noEmpty($_POST['username'])) exit('用户名是必须填写的!');

function show($var=null,$isdump=false){
    $func=$isdump ? 'var_dump':'print_r';
    if(empty($var)){
        echo 'null';
    }elseif(is_array($var) || is_object($var)){
        echo '<pre>';
        $func($var);
        echo '</pre>';
    }else{
        $func($var);
    }
}