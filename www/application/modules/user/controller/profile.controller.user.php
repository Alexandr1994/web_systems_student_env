<?php

/**
 * Class ProfileUserController обрабатывает действия пользователя на странице
 * своего профиля.
 * - обрабатывает запрос на изменение пароля.
 * - обрабатывает запрос на изменение личных данных пользователя
 * - обрабатывает запрос на изменение тарифа
 */
class ProfileUserController extends BaseUserController
{

    private static $_instance = null;

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
            self::$_instance = new CabinetUserController;
        }
        return self::$_instance;
    }

    public function profileInfo()
    {

    }
}