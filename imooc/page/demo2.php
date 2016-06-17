<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/6/7
 * Time: 8:58
 */
require('mysqli.php');
/*
 * $page为页数
 * $pageSize为显示条目
 * $showPage为显示页码数量[必须为奇数]
 * */
$page=$_GET['p'];
$pageSize=7;
$showPage=5;

//2.根据页码取出数据
$sql="SELECT * FROM page LIMIT ".(($page-1)*$pageSize).",$pageSize";
$result=mysqli_query($link,$sql);
echo "<style>
*{font-family:Monaco;text-decoration:none;}

</style>";
echo "<title>分页设计[抄2]</title>";
echo "<div class='content'>";
echo "<table align='center' width='500px' border='1' cellpadding='2' cellspacing='0' style='font-size:20px'>";
echo "<tr><th>id</th><th>name</th></tr>";
while($row=mysqli_fetch_assoc($result)){
    echo "<tr align='center'>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "</tr>";
    /*print_r($row);*/
}
echo "</table>";echo "</div>";
mysqli_free_result($result);

/*
 * $total_sql查询数据总量语句
 * $total_result为解压返回数据库结果集操作,其为一个数组
 * $total为数据总量
 * $total_pages为总页数
 * */
$total_sql="SELECT COUNT(*) FROM page";