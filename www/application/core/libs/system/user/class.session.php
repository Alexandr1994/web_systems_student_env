<?php

/*
 * Класс: Session
 *
 * Класс для работы с сессиями.
 *
 * Пример использования:
 * $ses = new Session();
 * $ses->current_user = 10;
 * */

class Session
{

    private static $id = null;

    private function __construct($id)
    {
        if (is_numeric($id)) {
            self::$id = $id;
        }
    }

    // $s = new Session();
    // $s->current_user = 10;
    // $_SESSION['current_user'] = 10;

    public function sessionStart()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    /*
     * Установка $param в $value
     * */
    public function __set($param, $value)
    {
        $_SESSION[$param] = $value;
    }

    /*
     * Проверка, установлен ли $param?
     * */
    public function __isset($param)
    {
        return isset($_SESSION[$param]);
    }

    /*
     * Уничтожение $param
     * */
    public function __unset($param)
    {
        unset($_SESSION[$param]);
    }

    /*
     * Получение $param
     * */
    public function __get($param)
    {
        if (array_key_exists($param, $_SESSION)) {
            return $_SESSION[$param];
        }
    }
    /*
     * Session status
     * */
    public function sessionStatus()
    {
        /*
         * PHP_SESSION_DISABLED, если механизм сессий отключен.
         * PHP_SESSION_NONE, если механизм сессий включен, но сессия не создана.
         * PHP_SESSION_ACTIVE, если механизм сессий включен и сессия создана.
         * */
        session_status();
    }
    /*
     * Session unset
     * */
    public function sessionClose()
    {
        session_unset();
    }
    /*
     * Destroy session
     * */
    public function sessionDestroy()
    {
        session_destroy();
    }
}