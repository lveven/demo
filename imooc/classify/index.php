<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/3
 * Time: 17:12
 */
include('mysql_sql.php');
/*var_dump($GLOBALS);*/
function getList($pid=0,&$result=array(),$spac=0){
    $link=$GLOBALS['link'];
    $spac=$spac+2;
    $sql="SELECT * FROM deepcate WHERE pid=$pid";
    $res=mysqli_query($link,$sql);
    while($row=mysqli_fetch_assoc($res)){
        $row['catename']=str_repeat('&nbsp;&nbsp;',$spac).'|--'.$row['catename'];
        $result[]=$row;
        getList($row['id'],$result,$spac);
    }
    return $result;
}

function displayCate($pid=0,$selected=1)
{
    $rs=getList($pid);
    $str="<select name='cate'>";
    foreach ($rs as $key => $val) {
        $selectedstr='';
        if($val['id']==$selected){
            $selectedstr="selected";
        }
        $str.= "<option {$selectedstr}>{$val['catename']}</option>" . '<br/>';
    }
    return $str.="</select>";
}
echo displayCate(0,2);
