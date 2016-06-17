<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/6/3
 * Time: 16:23
 */
interface ICanEat{
    public function eat($food);//接口里面的方法不需要去实现
}
class Man implements ICanEat{ //implement用于接口的实现
    //实现接口的类中必须要实现接口中未实现的方法
    public function eat($food){
        echo "Human eating ".$food."<br/>";
    }
}
$obj=new Man();
$obj->eat("Banana");
var_dump($obj instanceof ICanEat);
function checkEat($obj){
    if($obj instanceof ICanEat){
        $obj->eat('food');
    }else{
        echo "The obj can't eat.<br/>";
    }
}
checkEat($obj);

//接口可以继承接口,而接口实现的类要实现所有接口的方法

//因为接口的方法实现可以有很多,所以对于接口里面定义的方法的具体实现是多种多样的,这种特性我们成为多态

//接口里面的方法都是没有实现的,而类里面的方法大多数实现的

//用于定义抽象类
abstract class ACanEat{
    abstract public function eat($food);//抽象方法不需要实现

    public function breath(){
        echo "Breath use the air.<br/>";
    }
}
//继承抽象类的子类要实现抽象方法
class Animal extends ACanEat{
    public function eat($food){
        echo "Animal eating ".$food."<br/>";
    }
}