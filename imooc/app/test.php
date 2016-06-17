<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/10
 * Time: 11:23
 */
require_once('response.php');
$arr=array(
    'id'=>1,
    'name'=>'singwa'
);

/*Response::json(200,'数据返回成功',$arr);*/
Response::show(200,'数据返回成功',$arr);