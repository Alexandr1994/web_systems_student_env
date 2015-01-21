<?php

Class NumberField extends Field{//текстовое поле для обработки номеров телефонов

    function customValidate(){
        $testValue = $this->value();//найти значение нужного поля
        $error_module = new Errors();
        if(preg_match_all('/([A-zА-я\'\-\|\\\/\{\}\[\]=.:;,+!@#$%^&*()<>"?])/',$testValue)){
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
