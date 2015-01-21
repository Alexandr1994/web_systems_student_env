<?php

abstract Class Form{

    abstract protected function createForm();//построение текстового представления формы

    abstract protected function validateCustomForm();//проверка текущей формы

    abstract protected function submitForm();

    protected function validateForm(){//валидация формы
        //временная реализация
        return $this->validateCustomForm();
    }

    abstract public function renderForm();//отрисовка формы

    abstract public function process();//обработка формы

}