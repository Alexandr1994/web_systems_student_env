<?php

Class Errors{



    //временные функции получения сообщений об ошибке, будут исправелны
    public function emptyError(){
        return "Не заполнено обязательное поле ";
    }

    public function incorrectFillError(){
        return "Некорректное заполенеие поля ";
    }

}