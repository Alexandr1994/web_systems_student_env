<?php
//require_once'../class.connection.php';


Class Loader
{
    private static $_instance = null;
    protected $loadPlug = array();

    private function __construct(){}

    private function __clone(){}

    private function __wakeup(){}

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Loader();
        }
        return self::$_instance;
    }

    public function load_all_modules()
    {
        $this->includeFunc(glob("application/core/*.php"));
        $this->includeFunc(glob("application/core/libs/system/*/*.php"));
        $this->includeFunc(glob("application/modules/*/*/*.php"));
        $this->includeFunc(glob("application/modules/*/*/*/*.php"));
        $this->includeFunc(glob("application/modules/templates/*/*.php"));
        $this->includeFunc(glob("application/modules/*/routes_collection.php"));
    }

    private function includeFunc($pattern){
        if(!is_array($pattern))
        {
           throw new Exception("It's not array!");
        }
        foreach ($pattern as $filename) {
            include_once $filename;
            array_push($this->loadPlug,$filename);
        }
    }

    public function getPlug(){
        //var_dump($this->loadPlug);
        return $this->loadPlug;
    }
}
