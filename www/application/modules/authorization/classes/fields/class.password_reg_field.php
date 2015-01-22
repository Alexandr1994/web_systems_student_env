<?php

Class PasswordRegField extends Field{


      function customValidate($testValue){
        $error_module = new Errors();//инициализировать коллекцию ошибок
        if($testValue) {
            if ($testValue[0] != $testValue[1]) {//проверка на совпадение пароля и его повтора
                return $error_module->incorrectFillError();
            }
            $this->value($testValue[0]);//если ошибок не произошло то записать одно из значений полей в окончательное значение
        }
        return null;
    }

    public function render(){//вернуть строковое представление текстового поля
        $value = $this->value();
        $name = $this->name();
        $label = $this->label();
        $our_field = "$label[0]<br><input type='password' name='$name[0]' value='$value[0]'><br>
$label[1]<br><input type='password' name='$name[1]' value='$value[1]'>";//сформировать текстовое представление полей
        return $our_field;
    }

}