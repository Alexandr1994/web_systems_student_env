<?php
/**
 * Created by PhpStorm.
 * User: Alexandr
 * Date: 26.11.2014
 * Time: 10:52
 */
include_once "libs/smarty/Smarty.class.php";

class CreateSmarty
{

    private static $_instance = null;
    private  $_smarty;


    public function __construct()
    {

    }

    private function __clone()
    {

    }

    private function __wakeup()
    {

    }

    static public function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new CreateSmarty();
        }
        return self::$_instance;
    }

    public function iniSmarty()
    {
        $iniSmarty = new Smarty();
        //$this->_smarty = $iniSmarty;
        return $iniSmarty;
    }

    private function setFolderSmarty(){

    }
}