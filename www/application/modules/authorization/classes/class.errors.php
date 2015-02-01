<?php

Class Errors{



    //временные функции получения сообщений об ошибке, будут исправелны
    public function emptyError(){
        return array("Не заполнено обязательное поле");
    }

    public function incorrectFillError(){
        return array("Некорректное заполенеие поля");
    }

    public function unifyError(){
        return array("Ошибка преобразования значения");
    }

}