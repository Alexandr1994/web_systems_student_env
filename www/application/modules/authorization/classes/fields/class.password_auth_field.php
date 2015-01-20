<?php

Class PasswordAuthField extends aField{

    function customValidate(){
        $testValue = $this->value();//найти значение нужного поля
        $error_module = new Errors();//инициализировать коллекцию ошибок
        if($this->required()) {
            if(is_null($testValue)){//если поле обязательно для заполнениея, проверить его на пустоту
                return $error_module->emptyError();
            }
        }
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $value = $this->value();
        $name = $this->name();
        $label = $this->label();
        $our_field = "$label<input type='password' name='$name' value='$value'>";//сформировать текстовое представление полей
        return $our_field;
    }

}