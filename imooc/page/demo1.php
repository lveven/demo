<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/25
 * Time: 19:30
 */
/*
 * $page为页数
 * $pageSize为显示条目
 * $showPage为显示页码数量[必须为奇数]
 * */
require('mysqli.php');
//1.传入页码
$page=$_GET['p'];
$pageSize=7;
$showPage=5;
//2.根据页码取出数据
$sql="SELECT * FROM page LIMIT ".(($page-1)*$pageSize).",$pageSize";
$result=mysqli_query($link,$sql);
echo "<style>
*{font-family:Monaco;text-decoration:none}
div.content{
    height:300px;
}
div.page{
    text-align:center;
}
div.page a{
    border:1px solid #aaaadd;
    margin:2px;
    padding:2px 5px;
}
div.page span.current{
    margin:2px;
    padding:4px 6px;
    background:#000099;
    color:white;
    font-weight:bold;
}
div.page span.disable{
    border:1px solid #eee;
    padding:2px 5px;
    margin:2px;
    color:#ddd;
}
</style>";
echo "<title>分页设计[抄]</title>";
echo "<div class='content'>";
echo "<table align='center' width='500px' border='1' cellpadding='2' cellspacing='0' style='font-size:20px'>";
echo "<tr><th>id</th><th>name</th></tr>";
while(@$row=mysqli_fetch_assoc($result)){
    echo "<tr align='center'>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
@mysqli_free_result($result);

/*
 * $total_sql查询数据总量语句
 * $total_result为解压返回数据库结果集操作,其为一个数组
 * $total为数据总量
 * $total_pages为总页数
 * */
$total_sql="SELECT COUNT(*) FROM page";
$total_result=mysqli_fetch_array(mysqli_query($link,$total_sql));
$total=$total_result[0];
$total_pages=ceil($total/$pageSize); //float ceil(float $value)返回不小于value的下一个正数,如果value为小数则进一位

mysqli_close($link);

//3.显示数据+分页条
$page_banner="<div class='page'>";

//计算偏移量
$pageoffset=($showPage-1)/2;

if($page>1){
    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'><上一页</a>";
}else{
    $page_banner.="<span class='disable'>首页</span>";
    $page_banner.="<span class='disable'><上一页</span>";
}

//页码显示[重点]
//初始化数据
$start=1;
$end=$total_pages;

/*如果总页数大于显示页数*/
if($total_pages>$showPage){
    /*如果页码大于显示偏移量+1*/
    if($page>$pageoffset+1){
        $page_banner.="...";
    }
    /*如果页码大于偏移量 以头部情况判断*/
    if($page>$pageoffset){
        $start=$page-$pageoffset;
        $end=$total_pages>$page+$pageoffset?$page+$pageoffset:$total_pages;
    }else{
        $start=1;
        $end=$total_pages>$showPage?$showPage:$total_pages;
    }
    /*如果页码+页码偏移量大于总页数 以尾部情况判断*/
    if($page+$pageoffset>$total_pages){
        $start=$start-($page+$pageoffset-$end);
    }
}
for($i=$start;$i<=$end;$i++){
    if($page==$i){
        $page_banner.="<span class='current'>$i</span>";
    }else{
        $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
    }
}

if($total_pages>$showPage && $total_pages>$page+$pageoffset){
    $page_banner.="...";
}

//下一页和尾页
switch($page){
    case $page<$total_pages:
        $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页></a>";
        $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$total_pages."'>尾页</a>";
        break;
    case $page==$total_pages: //要双等号
        $page_banner.="<span class='disable'>下一页></span>";
        $page_banner.="<span class='disable'>尾页</span>";
        break;
    /*case $page>$total_pages:
        $page_banner.="<pre>无此页</pre>";
        break;*/
}
$page_banner.="共{$total_pages}页";
$page_banner.="<form action='".$_SERVER['PHP_SELF']."' method='get' style='display:inline;'>";
$page_banner.="<input type='text' size='5' name='p'>页";
$page_banner.="<input type='submit' value='确定'>";
if(empty($_GET['p'])){
     $page_banner.='<script type="text/javascript">alert("未填写");history.go(-1)</script>';
}
$page_banner.="</form></div>";

if($page<=$total_pages){
    echo $page_banner;
}else{
    echo "敬请期待!<br/>页面将在5秒后自动跳转至首页...";
    header("Refresh:5;url={$_SERVER['PHP_SELF']}?p=1");
}