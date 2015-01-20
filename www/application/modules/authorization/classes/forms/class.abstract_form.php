<?php

abstract Class Form{

   abstract public function createForm();//построение текстового представления формы

    abstract function validateCustomForm();//проверка текущей формы

    abstract public function submitForm();

    function validateForm(){//валидация формы
        //временная реализация
        $this->validateCustomForm();
    }

    public function renderForm(){//отрисовка формы
    //временная реализация
        $form = $this->createForm();
        print $form;
    }

}