<?php
Class UserController{

    private $current_id = null;
    private static $localStorageInfo = array();


    public function __construct(){
    }

    private function __clone(){

    }

    private function __wakeup(){

    }

    public function accountInfo(){
    print 'Hello %username! Welcome to home page!';
    }


}