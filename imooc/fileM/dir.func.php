<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/6/13
 * Time: 19:44
 */
function readDirectory($path)
{
    $handle = opendir($path);
    while (($item = readdir($handle)) !== false) { //不全等 因为0是false
        //. 和 ..
        if ($item != "." && $item != "..") {
            if (is_file($path . "/" . $item)) {
                $arr['file'][] = $item;
            }
            if (is_dir($path . "/" . $item)) {
                $arr['dir'][] = $item;
            }
        }
    }
    closedir($handle);
    return $arr;
}
/*$path="files";
var_dump(readDirectory($path));*/