<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/6/1
 * Time: 22:06
 */
/*final*/ class Human{//final为最终类,不能被继承
    public $name;
    protected $height;
    public $weight;

    public static $sValue="Static value in Human class";

    public function eat($food){
        echo $this->name."'s eating ".$food."<br/>";
    }
}
class Nbaplayer extends Human{
    public $name="Jordan";
    public $height="198cm";
    public $weight="98kg";
    public $team="Bull";
    public $playerNumber="23";

    const CONST_VALUE='A constant value'; //类中定义常量一般用const 和define类似

    private $age=23;//只能在本类中访问,子类也不能访问

    public static $president="David Stern";

    public static function changePresident($newPrsdt){//静态方法里面只能访问静态成员
        self::$president=$newPrsdt;//用static也可以
        echo parent::$sValue."<br/>";//子类调用父类静态成员
        echo self::CONST_VALUE;//self可以访问自身类成员
    }

    public function __construct($name,$height,$weight,$team,$playerNumber){
        echo "In Nbaplayer construct<br/>";
        $this->name=$name;
        $this->height=$height;
        $this->weight=$weight;
        $this->team=$team;
        $this->playerNumber=$playerNumber;
    }

    public function __destruct(){
        echo "Destroying:".$this->name."<br/>";
    }
    public function run(){
        echo "Runing<br/>";
    }
    public function jump(){
        echo "Jumping<br/>";
    }
    public function dribble(){
        echo "Dribbling<br/>";
    }
    public function shoot(){
        echo "Shooting<br/>";
    }
    public function dunk(){
        echo "Dunking<br/>";
    }
    public function pass(){
        echo "Passing<br/>";
    }
}
//类到对象的实例化
$jordan=new Nbaplayer("Jordan","198cm","98kg","Bull","23");
echo $jordan->name."<br/>";echo $jordan->height."<br/>";//重写可改变访问控制级别
/*$jordan=null;*///在程序结尾将对象赋值为null可以干涉析构函数,让其直接执行而不用在程序终止后执行
echo "destruct From now on Jordan will not be used.<br/>";
$jordan->eat("Apple");

$james=new Nbaplayer("James","203cm","120kg","Heat","6");
Nbaplayer::changePresident("Adam Silver");
/*echo "Jordan's President:".$jordan->president."<br/>";
echo "James's President:".$james->president."<br/>";*/
echo Nbaplayer::$president."<br/>"; //静态成员不用实例化类直接可以调用