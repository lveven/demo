<?php
/**
 * Created by PhpStorm.
 * User: HelloWorld
 * Date: 2016/5/12
 * Time: 19:32
 */
class File{
    private $_dir;
    const EXT='.txt';
    public function _construct(){
        $this->_dir=dirname(__FILE__).'/files/';
    }
    public function cacheData($key,$value='',$path=''){
        $filename=$this->_dir.$path.$key.self::EXT;
        if($value!==''){//将value值写入缓存
            $dir=dirname($filename);
            if(!is_dir($dir)){
                mkdir($dir,0777);
            }
            return file_put_contents($filename,json_encode($value));
        }

        if(!is_file($filename)){
            return FALSE;
        }else{
            return json_decode(file_get_contents($filename),true);
        }
    }
}