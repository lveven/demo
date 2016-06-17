<?php
/**
 * Created by PhpStorm.
 * User: skytop
 * Date: 2016/6/1
 * Time: 13:03
 */
header("Content-Type:text/html;charset=utf-8");
echo "<style>*{font-family:Monaco}</style>";
$staff=array(
    array("name"=>"洪七","number"=>"101","sex"=>"男","job"=>"总经理"),
    array("name"=>"郭靖","number"=>"102","sex"=>"女","job"=>"开发工程师"),
    array("name"=>"黄蓉","number"=>"103","sex"=>"男","job"=>"产品经理"),
);

if($_SERVER["REQUEST_METHOD"]=="GET"){
    search();
}elseif($_SERVER["REQUEST_METHOD"]){
    create();
}

function search(){
    if(!isset($_GET['number']) || empty($_GET["number"])){
        echo "参数错误";
        return;
    }
    global $staff;

    $number=$_GET['number'];
    $result="没有找到员工";

    foreach($staff as $value){
        if($value['number']==$number){
            $result="找到员工:<br/>员工编号:".$value["number"]."<br/>员工姓名:".$value["name"]."<br/>员工性别:".$value['sex']."<br/>职位:".$value['job'];
        }
    }
    echo $result;
}
function create(){
    //判断信息是否填写完全
    if (!isset($_POST["name"]) || empty($_POST["name"])
        || !isset($_POST["number"]) || empty($_POST["number"])
        || !isset($_POST["sex"]) || empty($_POST["sex"])
        || !isset($_POST["job"]) || empty($_POST["job"])) {
        echo "参数错误，员工信息填写不全";
        return;
    }
    //TODO: 获取POST表单数据并保存到数据库

    //提示保存成功
    echo "员工：" . $_POST["name"] . " 信息保存成功！";
    /*JSON {"staff":[{"name":"洪七","age":70},{"name":"郭靖","age":35},{"name":"黄蓉","age":30}]}*/
}
