<?php
include_once "libs/smarty/Smarty.class.php";

/**
 * Class: CreateSmarty
 *
 * Класс CreateSmarty создает экземпляр о,ъекта для работы с шаблонизатором.
 * - Определяет какие дериктории будут использоваться в качестве основных
 *   директорий Smarty
 * - Реализован ввиде Синглтона, что исключает его дублирование.
 *
 * @author Shamrik Dmitriy
 *
 * **/
class CreateSmarty
{

    private static $_instance = null;
    private $_smarty;


    public function __construct()
    {

    }

    private function __clone()
    {

    }

    private function __wakeup()
    {

    }

    /**
     * Возвращет единственный экземпляр данного класса.
     * @return object - объект класса Smarty.
     */

    static public function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new CreateSmarty();
        }
        return self::$_instance;
    }

    /*Нужнен ли метод, инициализирующий объект данного класса?
     * Инициализирует объект данного класса User.
     * @return void

    public static function init() {
        self::getInstance();
    }
     */

    /**
     * Инициализирует объект класса Smarty и задает директории
     * для работы с шалонизатором.
     * @param $folder - строковая переменная,
     *        содержит имя директории в которой содержатся
     *        папки, необходимы для работы Smarty.
     *
     * @return object - объект класса Smarty.
     */

    public function iniSmarty($folder)
    {
        $iniSmarty = new Smarty();
        $this->_smarty = $iniSmarty;
        if ($folder == 'index') {
            $iniSmarty->template_dir = 'application/core/smarty_folder/templates/';
            $iniSmarty->compile_dir = 'application/core/smarty_folder/templates_c/';
            $iniSmarty->config_dir = 'application/core/smarty_folder/configs/';
            $iniSmarty->cache_dir = 'application/core/smarty_folder/cache';
        } else {
            $iniSmarty->template_dir = 'application/modules/' . $folder . '/smarty_folder/templates/';
            $iniSmarty->compile_dir = 'application/modules/' . $folder . '/smarty_folder/templates_c/';
            $iniSmarty->config_dir = 'application/modules/' . $folder . '/smarty_folder/configs/';
            $iniSmarty->cache_dir = 'application/modules/' . $folder . '/smarty_folder/cache';
        }
        $iniSmarty->caching = true;
        return $this->_smarty;
    }

    /*
     * */
    public function destroySmarty()
    {
        $this->_smarty = null;
    }
}