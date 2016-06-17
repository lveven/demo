<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/9
 * Time: 13:24
 */
require('mysqli.php');
//1.传入页码
$page=$_GET['p'];

$pageSize=7;
$showPage=5; //显示页数必须为奇数
//2.根据页码取出数据
$sql="SELECT * FROM page LIMIT ".(($page-1)*$pageSize).",$pageSize";
$result=mysqli_query($link,$sql);
echo "<style>
*{font-family:Monaco;}
div.page{
 text-align:center;
}
div.page a{
    border:1px solid #aaaadd;
    text-decoration:none;
    padding:2px 5px;
    margin:2px;
}
div.page span.current{
    border:1px solid #000099;
    background-color:#000099;
    padding:4px 6px;
    margin:2px;
    color:#fff;
    font-weight:bold;
}
div.page span.disable{
    border:1px solid #eee;
    padding:2px 5px;
    margin:2px;
    color:#ddd;
}
div.page form{
    display:inline;
}
div.content{
    height:300px;
}
</style>";
echo "<title>分页设计</title>";
echo "<div class='content'>";
echo "<table align='center' width='500px' border='1' cellpadding='2' cellspacing='0' style='font-size:20px;'>";
echo "<tr><th>id</th><th>name</th></tr>";
while($row=mysqli_fetch_assoc($result)){
    echo "<tr align='center'>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
mysqli_free_result($result);

$total_sql="SELECT COUNT(*) FROM page";
$total_result=mysqli_fetch_array(mysqli_query($link,$total_sql));
$total=$total_result[0];

$total_pages=ceil($total/$pageSize);

mysqli_close($link);
//3.显示数据+分页条
$page_banner='<div class="page">';

//计算偏移量
$pageoffset=($showPage-1)/2;


if($page>1){
    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'><上一页</a>";
}else{
    $page_banner.="<span class='disable'>首页</span>";
    $page_banner.="<span class='disable'><上一页</span>";
}
//初始化数据
$start=1;
$end=$total_pages;
if($total_pages>$showPage){
    if($page>$pageoffset+1){
        $page_banner.="...";
    }
    if($page>$pageoffset){
        $start=$page-$pageoffset;
        $end=$total_pages>$page+$pageoffset?$page+$pageoffset:$total_pages;
    }else{
        $start=1;
        $end=$total_pages>$showPage?$showPage:$total_pages;
    }
    if($page+$pageoffset>$total_pages){
        $start=$start-($page+$pageoffset-$end);
    }
}
for($i=$start;$i<=$end;$i++){
    if($page==$i){
        $page_banner.="<span class='current'>$i</span>";
    }else{
        $page_banner.= "<a href='" . $_SERVER['PHP_SELF'] . "?p=" . $i . "'>{$i}</a>";
    }
}
if($total_pages>$showPage && $total_pages>$page+$pageoffset){
    $page_banner.="...";
}
if($page<$total_pages) {
    $page_banner.= "<a href='" . $_SERVER['PHP_SELF'] . "?p=" . ($page + 1) . "'>下一页></a>";
    $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".$total_pages."'>尾页</a>";
}else{
    $page_banner.="<span class='disable'>下一页></span>";
    $page_banner.="<span class='disable'>尾页</span>";
}
$page_banner.="共{$total_pages}页";
$page_banner.="<form action='mypage.php' method='get'>";
$page_banner.="到第<input type='text' size='2' name='p'>页";
$page_banner.="<input type='submit' value='确定'>";
$page_banner.="</form></div>";
echo $page_banner;