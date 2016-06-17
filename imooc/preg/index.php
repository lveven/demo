<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/4/13
 * Time: 15:00
 */
echo "<style>*{font-family:Monaco}</style>";
$pattern='/[0-9]/';
$subject='wesdfsdf234dfsd3f4328';
$replacement='慕女神';



$m1=$m2=array();

preg_match($pattern,$subject,$m1);
show($m1);
preg_match_all($pattern,$subject,$m2);
show($m2);
function show($var=null){
    if(empty($var)){
        echo "null";
    }elseif(is_array($var) || is_object($var)){
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }else{
        echo $var;
    }
}

//str_replace是preg_replace的子集,preg_replace功能更强大
$str1=preg_replace($pattern,$replacement,$subject);
$str2=preg_filter($pattern,$replacement,$subject);
show($str1);
echo "<hr/>";
show($str2);

$replace_array=array('慕','女','神');//如果replacement是一个数组则pattern必须为一个数组,若pattern(此时当做数组)的元素个数少于replacement则用空字符串替换
$pattern_array=array('/[1-3]/','/[4-6]/','/[7-9]/');
echo "<br/>";
show(preg_filter($pattern_array,$replace_array,$subject));
$subject_array=array('wefdsd','re23df','12dsfsa4','wetrtgdf');
show($s=preg_filter($pattern_array,$replacement,$subject_array));
$array_null=array('','','ssss');
print_r($array_null);
echo '<br/>'.count($s);
echo @$s[0]; //preg_filter 匹配的为一个数组,若匹配不到则不显示此元素及其键名
foreach($s as $v){
    echo "<br/>".$v;
}

$grep=preg_grep($pattern,$subject_array);
echo "<pre>";
print_r($grep);
echo "</pre>";