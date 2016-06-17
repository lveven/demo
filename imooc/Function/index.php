<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/6/12
 * Time: 14:26
 */
$foo=array("Name"=>"Bob","Sex"=>"Man");
/*$boo=each($foo);
print_r($boo);*/
while(list($k,$v)=each($foo)){
    echo "<br/>".$k."=>".$v;
}

foreach($foo as $key=>$val){
    echo "<br/>".$key."=>".$val;
}
print_r(array_key_exists("Name",$foo));

/*$r=[1,2,3,6,9,77,4,5];
natsort($r);
print_r($r);*/
/*echo dirname("c/s/s/s/s.php");*/
/*echo file_get_contents('http://www.baidu.com');
file_put_contents('1.txt','aaa');*/

$path="/home/httpd/html/index.php";
$file=basename($path);

echo '<pre>';
print_r(pathinfo("/www/htdocs/index.html"));
echo '</pre>';

$fp=opendir("D:/APP/Nox/bin/BignoxVMS/nox/Logs/");
echo readdir($fp);
closedir($fp);

var_dump((bool)"");