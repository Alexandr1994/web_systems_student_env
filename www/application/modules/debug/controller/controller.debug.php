<?php

/**
 * Created by PhpStorm.
 * User: Dmitriy
 * Date: 16.01.2015
 * Time: 17:17
 */
define('DG_REQUESTMETHOD','1');
define('DG_LOADMODULES','0');

class DebugController
{

    private static $_instance = null;

    public function __construct(){
    }

    private function __clone()
    {

    }

    private function __wakeup()
    {

    }

    public static function getInstance(){
        if (is_null(self::$_instance)) {
            self::$_instance = new DebugController();
        }
        return self::$_instance;
    }

    public function showDebugMode()
    {
        $show = ViewDebug::getInstance();
        $show->viewPageInfo();
    }


    public function submitDebug()
    {

    }

    /*
     * Change status debugMode - ON/OFF
     * @params
     * $status - bool - статус режима вкл/выкл
     *
     * */
    protected function changeDebudMode($status)
    {
        if ($status) {
            define('DEBUG','0',true);
        } else {
            define('DEBUG','1',true);
        }
    }


    /* See Request
     *
     * $status - bool
     * */


    private function changeRequest($status){
        if($status){
            define('DG_REQUESTMETHOD','0',true);
        }
        else{
            define('DG_REQUESTMETHOD','1',true);
        }
    }
}