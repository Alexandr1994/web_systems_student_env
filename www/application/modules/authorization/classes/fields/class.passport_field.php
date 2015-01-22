<?php


Class PassportField extends Field{//текстовое поле для номера и серии паспорта

    function customValidate($testValue){
        $error_module = new Errors();
        if(preg_match_all('/([^\d])/',$testValue)){
            return $error_module->incorrectFillError();
        }//добавить проверку на количество символов
        $this->value($testValue);//записать проверенное занчение
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