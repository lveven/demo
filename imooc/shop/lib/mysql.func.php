<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/6/8
 * Time: 9:49
 */
/*require_once "../configs/configs.php";*/

function connect(){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_DNAME) or die(mysqli_error());
    mysqli_query($link,DB_CHARSET);
    return $link;
}

function insert($table,$array){
    $keys=join(",",array_keys($array));
    $vals="'".join("','",array_values($array))."'";
    $sql="insert {$table}{$keys} values({$vals})";
    mysqli_query(connect(),$sql);
    return mysqli_insert_id();
}

function update($table,$array,$where=null){
    foreach($array as $key=>$val){
        if($str==null){
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
    }
    $sql="update{$table} set {$str} ".($where==null?null:"where ".$where);
    mysqli_query(connect(),$sql);
    return mysqli_affected_rows();
}

function delete($table,$where=null){
    $where=$where==null?null:"where ".$where;
    $sql="delete from {}";
    mysqli_query(connect(),$sql);
    return mysql_affected_rows();
}