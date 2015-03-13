<?php
/**
 * Class TicketUserController обрабатывает действия пользователя на странице
 * своего профиля в блоке тикетов.
 * - обрабатывает запрос на вывод всех тикетов данного пользователя
 * - обрабатывает запрос на добавление нового тикета.
 * - обрабатывает запрос на просмотр тикета.
 * */
class TicketUserController extends BaseUserController{

    private static $_instance = null;

    static public function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new TicketUserController;
        }
        return self::$_instance;
    }

    public function __construct(){

    }

    public function ticketInfo(){

    }
}