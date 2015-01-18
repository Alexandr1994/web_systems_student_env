<?php
/**
 * Created by PhpStorm.
 * User: Alexandr
 * Date: 16.01.2015
 * Time: 20:37
 */
interface iField{
    public function label($new_value=null);//надпись у формы
    public function name($new_value=null);//имя значения формы
    public function validate();//проверка на правильность формы
    public function value($new_value=null);//значение формы
    public function render();//команда на отрисовку
    public function required($new_value=null);//маркер обязательности
    public function getErrors();//вернуть набор ошибок
}