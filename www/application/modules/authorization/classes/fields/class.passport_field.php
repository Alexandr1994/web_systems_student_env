<?php


Class PassportField extends aField{//текстовое поле для номера и серии паспорта

    function customValidate(){
        $testValue = $this->value();//найти значение нужного поля
        $error_module = new Errors();
        if($this->required()) {//есди поле обязательно то проверить на пустоту
            if(is_null($testValue)){
                return $error_module->emptyError();
            }
        }//проверка поля на содержание недопустимых символов
        if(preg_match_all('/([A-zА-я\'\-\|\\\/\{\}\[\]=.:;,+!@#$%^&*()<>"?])/',$testValue)){
            return $error_module->incorrectFillError();
        }//добавить проверку на количество символов
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $value = $this->value();
        $name = $this->name();
        $label = $this->label();
        $our_field = "$label<input type='text' name='$name' value='$value'>";//сформировать текстовое представление поля
        return $our_field;
    }

}