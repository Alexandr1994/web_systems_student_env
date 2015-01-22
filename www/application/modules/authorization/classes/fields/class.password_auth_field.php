<?php

Class PasswordAuthField extends Field{

    function customValidate($testValue=null){
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $value = $this->value();
        $name = $this->name();
        $label = $this->label();
        $our_field = "$label<br><input type='password' name='$name' value='$value'>";//сформировать текстовое представление полей
        return $our_field;
    }

}