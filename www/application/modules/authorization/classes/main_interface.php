<?php
/**
 * Created by PhpStorm.
 * User: Alexandr
 * Date: 16.01.2015
 * Time: 20:37
 */
interface iField{

    public function label();//надпись у формы
    public function name();//имя значения формы
    public function validate();//проверка на правильность формы
    public function value();//значение формы
    public function render();//команда на отрисовку
    public function requered($new_value=null);//маркер обязательности
    public function getErrors();//вернуть набор ошибок

}