<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/12
 * Time: 19:51
 */
require_once('file.php');
$data=array(
    'id'=>1,
    'name'=>'singwa'
);
$file=new File();
if($file->cacheData('index_mk_cache',$data)){
    echo "success";
}else{
    echo "error";
}

//获取缓存
/*if($file->cacheData('index_mk_cache')){
    var_dump(($file->cacheData('index_mk_cache')));
    echo "success";
}else{
    echo "error";
}*/