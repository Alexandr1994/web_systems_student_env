<?php

abstract Class aField implements iField{

    private $label = null;//маркер обязательности
    private $name = null;//значение поля

    private $require = false;//маркер обязательности
    private $value = null;//значение поля

    public function label($new_value=null){//работа с надписью у поля
        if(is_null($new_value)){//вернуть значение label если, нет аргументов
            return $this->label;
        }
        else {
            if (is_bool($new_value)) {
                $this->label = $new_value;//переписать label если пришел аргумент
            }
        }
    }

    public function name($new_value=null){//работа с именем поля
        if(is_null($new_value)){//вернуть значение name если, нет аргументов
            return $this->value;
        }
        else {
            if (is_bool($new_value)) {
                $this->name = $new_value;//переписать name если пришел аргумент
            }
        }
    }

    public function required($new_value=null){//работа с маркером обязательности
        if(is_null($new_value)){//вернуть значение require если, нет аргументов
            return $this->require;
        }
        else {
            if (is_bool($new_value)) {
                $this->require = $new_value;//переписать require если пришел аргумент и огн boolean
            } else {
                throw new Exсeption("It's not boolean variable!");
            }
        }
    }

    public function value($new_value=null){//работа со значением поля
        if(is_null($new_value)){//вернуть значение value если, нет аргументов
            return $this->value;
        }
        else {
            if (is_bool($new_value)) {
                $this->value = $new_value;//переписать value если пришел аргумент
            }
        }
    }

    public function validate(){
        if (isset($_POST['login'])) { /*что писать в кавычках POST*/
            /*Определяет, была ли установлена переменная значением отличным от NULL*/
            $text = $_POST['login'];
            if ($text == '') {
                unset($text);
            }
        }
        if (empty($text)) {
            /*ошибка*/
        }
    }

 //   public function Value(){
 //       $text = stripslashes($text); /*Удаляет экранирование символов*/
 //       $text = htmlspecialchars($text); /*Преобразует специальные символы в HTML сущности*/
 //       $text = trim($text); /*Удаляет пробелы из начала и конца строки*/
 //   }



    abstract public function CustomField();

}