<?php

Class TextField extends Field{//текстовое поле для ФИО

    function customValidate(){
        $testValue = $this->value();//найти значение нужного поля
        $error_module = new Errors();
        if(preg_match_all('/([\d\|\\\/\{\}\[\]=.:;,+!@#$%^&*()<>?"])/',$testValue)){
            return $error_module->incorrectFillError();
        }
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $value = $this->value();
        $name = $this->name();
        $label = $this->label();
        $our_field = "$label<br><input type='text' name='$name' value='$value'>";//сформировать текстовое представление поля
        return $our_field;
    }



}

