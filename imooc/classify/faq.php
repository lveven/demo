<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/4/29
 * Time: 14:58
 */
$a=6;
echo $a;
/*var_dump($GLOBALS);*/
function aa(){
    $a=&$GLOBALS['a'];
    $a=7;
    echo $a;
}
aa();
echo $a;