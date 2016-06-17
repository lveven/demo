<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/10
 * Time: 11:00
 */
/*$arr=array(
    'id'=>1,
    'name'=>'singwa'
);
echo json_encode($arr);*/
/*$data="你好吗";
$newData=iconv('UTF-8','GBK',$data);
echo json_encode($newData);*/

class Response{
    const JSON="json";
    /*
     * 综合方式输出通信数据
     * */
    public static function show($code,$message='',$data=array()/*,$type=self::JSON*/){
        if(!is_numeric($code)){
            return '';
        }

        $type=isset($_GET['format'])?(in_array($_GET['format'],['xml','json','array'])?$_GET['format']:self::JSON):self::JSON;

        $result=array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        );
        if($type=='json'){
            self::json($code,$message,$data);
            exit;
        }elseif($type=='array'){
            var_dump($result);
        }elseif($type=='xml'){
            self::xmlEncode($code,$message,$data);
            exit;
        }else{
            //TODO
        }
    }
    /*
     * 按json方式输出通信数据
     * @param integer $code 状态码
     * @param string $message 提示信息
     * @param array $data 数据
     * return string
     * */
    public static function json($code,$message='',$data=array()){
        if(!is_numeric($code)){
            return '';
        }
        $result=array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        );
        echo json_encode($result);
        exit;
    }

    public static function xml(){
        header("Content-type:text/xml");
        $xml="<?xml version='1.0' encoding='utf-8' ?>";
        $xml.="<root>";
        $xml.="<code>200</code>";
        $xml.="<message>数据返回成功</message>";
        $xml.="<data>";
        $xml.="<id>1</id>";
        $xml.="<name>singwa</name>";
        $xml.="</data>";
        $xml.="</root>";

        echo $xml;
    }
    /*
     * 按xml方式输出通信数据
     *
     * */
    public static function xmlEncode($code,$message,$data=array()){
        if(!is_numeric($code)){
            return '';
        }
        $result=array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        );
        /*print_r($result);exit;*/
        header("Content-type:text/xml");
        $xml="<?xml version='1.0' encoding='UTF-8'?>";
        $xml.="<root>";
        $xml.=self::xmlToEncode($result);
        $xml.="</root>";

        echo $xml;
    }
    private static function xmlToEncode($data){
        $xml=$attr="";
        foreach($data as $key=>$value){
            if(is_numeric($key)){
                $attr=" id='{$key}'";
                $key="item";
            }
            $xml.="<{$key}{$attr}>";
            $xml.=is_array($value)?self::xmlToEncode($value):$value;
            $xml.="</{$key}>";
        }
        return $xml;
    }
}

/*Response::xml();*/
$data=array(
    'id'=>1,
    'name'=>'singwa',
    'content'=>array(
        "sss"=>'world',
        "aaa"=>'hello'
    )
);
/*Response::xmlEncode(200,'success',$data);*/
