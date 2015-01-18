<?php

abstract Class aForm{

    abstract public function createForm();//построение формы

    abstract public function validateCustomForm();//проверка текущей формы

    abstract public function submitForm();

}