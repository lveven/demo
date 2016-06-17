<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/13
 * Time: 22:57
 */
class Db{
    static private $_instance;
    static private $_connectSource;
    private $_dbConfig=array(
        'host'=>'127.0.0.1',
        'user'=>'root',
        'password'=>'111111',
        'database'=>'imooc'
    );
    private function _construct(){

    }
    static public function getInstance(){
        if(!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function connect()
    {
        if(!self::$_connectSource) {
            self::$_connectSource = mysqli_connect($this->_dbConfig['host'], $this->_dbConfig['user'], $this->_dbConfig['password'], $this->_dbConfig['database']) or die(mysqli_error());

            if(!self::$_connectSource){
                throw new Exception('mysql connect error'.mysqli_error());
            }
            mysqli_set_charset(self::$_connectSource, "utf8");
        }
        return self::$_connectSource;
    }
}
/*$db=new Db();
$db1=new Db();*/
header("Content-type:text/html;charset=utf-8");
/*$connect=Db::getInstance()->connect();
$sql="SELECT * FROM deepcate";
$result=mysqli_fetch_all(mysqli_query($connect,$sql),MYSQLI_ASSOC);
print_r($result);*/