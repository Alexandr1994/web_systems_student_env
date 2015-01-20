<?php


Class LoginField extends aField{//текстовое поле для ФИО

    function customValidate(){
        $testValue = $this->value();//найти значение нужного поля
        $error_module = new Errors();
        if($this->required()) {//есди поле обязательно то проверить на пустоту
            if(is_null($testValue)){
                return $error_module->emptyError();
            }
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