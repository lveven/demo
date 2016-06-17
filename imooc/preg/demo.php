<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/4/26
 * Time: 15:06
 */
$pizza="piece1 piece2 piece3 piece4 piece5";
$pieces=explode(" ",$pizza,2);
echo $pieces[0]."<br/>";
echo $pieces[1]."<br/>";
print_r($pieces);
$result=rtrim($pizza);
echo $result;
echo "<br/>";
$array1=['lastname','email','phone'];
$comma_separated=implode(',',$array1);
echo $comma_separated;
$input="Alien";
echo str_pad($input,10,"-",STR_PAD_LEFT);
echo $repeat=str_repeat('-+',100);
echo "<br/>".strlen($repeat);