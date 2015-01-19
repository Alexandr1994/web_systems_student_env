<?php
abstract Class aField implements iField{

   //private $input_type = null;//тип поля

    private $label = null;//маркер обязательности
    private $name = null;//имя поля
    private $require = false;//маркер обязательности
    private $value = null;//значение поля
    private $errors = array();//набор выявленных ошибок данного поля

    public function label($new_value=null){//работа с надписью у поля
        if(is_null($new_value)){//вернуть значение label если, нет аргументов
            return $this->label;
        }
        else {
            $this->label = $new_value;//переписать label если пришел аргумент
        }
        return null;
    }

    public function name($new_value=null){//работа с именем поля
        if(is_null($new_value)){//вернуть значение name если, нет аргументов
            return $this->name;
        }
        else {
            $this->name = $new_value;//переписать name если пришел аргумент
        }
        return null;
    }

    public function required($new_value=null){//работа с маркером обязательности
        if(is_null($new_value)){//вернуть значение require если, нет аргументов
            return $this->require;
        }
        else {
            if (is_bool($new_value)) {
                $this->require = $new_value;//переписать require если пришел аргумент и огн boolean
            } else {
                throw new Exception("It's not boolean variable!");
            }
        }
        return null;
    }

    public function value($new_value=null){//работа со значением поля
        if(is_null($new_value)){//вернуть значение value если, нет аргументов
            return $this->value;
        }
        else {
            $this->value = $new_value;//переписать value если пришел аргумент
        }
        return null;
    }

    public function getErrors(){//вернуть набо ошибок данного поля
        return $this->errors;
    }


    public function validate(){//проверка поля на правильность
        $this->customValidate();
    }

    abstract function customValidate();//проверка конкретного типа поелй на правильность

}