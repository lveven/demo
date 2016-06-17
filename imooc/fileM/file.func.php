<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/6/13
 * Time: 23:49
 */
//Bytes/kb/MB/GB/TB/EB
function transByte($size)
{
    $arr = array("B", "kB", "MB", "GB", "TB", "EB");
    $i = 0;
    while ($size > 1024) {
        $size /= 1024;
        $i++;
    }
    return round($size, 2) . $arr[$i];
}