<?php

require_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'phpThumb'.DIRECTORY_SEPARATOR.'phpthumb.class.php');



class Thumbnailer

{



    private $_phpThumb;

    
    public function init() {}


    public function __construct(){
        $this->_phpThumb = new phpThumb();
    }


    public function __call($method, $params){
        if (is_object($this->_phpThumb) && get_class($this->_phpThumb) === 'phpthumb') return call_user_func_array(array($this->_phpThumb, $method), $params);
        else throw new CException(Yii::t('Thumbnailer', 'Can not call a method of a non existent object'));
    }



    public function __set($name, $value) {
        if (is_object($this->_phpThumb) && get_class($this->_phpThumb) === 'phpthumb') $this->_phpThumb->$name = $value;
        else throw new CException(Yii::t('Thumbnailer', 'Can not set a property of a non existent object'));
    }



    public function __get($name){
        if (is_object($this->_phpThumb) && get_class($this->_phpThumb) === 'phpthumb') return $this->_phpThumb->$name;
        else throw new CException(Yii::t('Thumbnailer', 'Can not access a property of a non existent object'));
    }



    public function __sleep() {}
    public function __wakeup() {}
}

